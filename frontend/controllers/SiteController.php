<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\IzinSearch;
use frontend\models\BidangSearch;
use \yii\db\Query;
use frontend\models\Berita;
use frontend\models\Download;
use yii\data\Pagination;
use backend\models\SliderSearch;
use backend\models\PageSearch;
use backend\models\FungsiSearch;
use backend\models\Faq;
use backend\models\FaqSearch;
use backend\models\MenuKatalogSearch;
use backend\models\VisiMisiSearch;
use backend\models\ManfaatSearch;
use frontend\models\AllSearch;
/**
 * Site controller
 */
class SiteController extends Controller {
    public $layout = 'landing';
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionValidate($kode) {
        $model = \backend\models\Perizinan::findOne(['kode_registrasi' => $kode]);

        if ($model !== null) {
            $siup = \backend\models\IzinSiup::findOne($model->referrer_id);
            return $this->render('valid', [
                        'validasi' => $siup->teks_validasi,
            ]);
        } else {
            return $this->render('invalid', [
                        'model' => $model,
            ]);
        }
    }

    public function actionIndex() {
        $lang = $this->language();
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('perizinan/index');
        } elseif (Yii::$app->request->post()) {
            //Cari Page
            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];

            $model = new AllSearch();
            $data_page = $model->page($kata_kunci);

            foreach ($data_page as $value) {
                $judul[] = $value["page_title"];
                $id[] = '';
                $link[] = '#' . $value["page_title_seo"];
            }

            //Cari Berita
            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];

            $model = new AllSearch();
            $data_berita = $model->berita($kata_kunci);

            foreach ($data_berita as $value) {
                $judul[] = $value["judul"];
                $id[] = $value["judul_seo"];
                $link[] = '/site/detailnews';
            }

            //Cari Bidang			
            $model = new AllSearch();
            $data_bidang = $model->bidang($kata_kunci);

            foreach ($data_bidang as $value) {
                $judul[] = $value["nama"];
                $id[] = $value["id"];
                $link[] = '/site/detailperizinan';
            }

            //Cari FAQ			
            $model = new AllSearch();
            $data_bidang = $model->faq($kata_kunci);

            foreach ($data_bidang as $value) {
                $judul[] = $value["tanya"];
                $id[] = "";
                $link[] = '/site/faq';
            }

            $jml = count($judul);
            return $this->render('resultAllSearch', ['id' => $id, 'link' => $link, 'jml' => $jml, 'keyword' => $kata_kunci, 'judul' => $judul]);
        } else {
			
			$model = new SliderSearch();
            $data_slide = $model->active_slider();
			
			$model = new MenuKatalogSearch();
            $data_menu_katalog = $model->active_menu_katalog();
			
			$model = new VisiMisiSearch();
            $data_visi_misi = $model->active_visi_misi();
			
			$model = new ManfaatSearch();
            $data_manfaat_left = $model->getManfaatLeft();
            $data_manfaat_right = $model->getManfaatRight();
			
            $model = new FungsiSearch();
            $data_fungsi_left = $model->getFungsiLeft();
            $data_fungsi_right = $model->getFungsiRight();

            $model = new Berita();
            $data_berita_utama = $model->getBeritaUtama();
            $data_berita_list_left = $model->getBeritaListLeft();
            $data_berita_list_right = $model->getBeritaListRight();

            return $this->render('index', ['beritaUtama' => $data_berita_utama, 'beritaListLeft' => $data_berita_list_left, 'beritaListRight' => $data_berita_list_right, 'fungsiLeft' => $data_fungsi_left, 'fungsiRight' => $data_fungsi_right,'data_slide'=>$data_slide,'data_menu_katalog'=>$data_menu_katalog, 'data_visi_misi'=>$data_visi_misi,'data_manfaat_left'=>$data_manfaat_left,'data_manfaat_right'=>$data_manfaat_right]);
        }
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionDaftar() {
        return $this->render('daftar');
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

//	public function actionAboutptsp()
//    {   
//
//        $query = new Query;
//        $query->select(['page_title','page_description'])
//        ->where(['page_id' => '2'])
//        ->from('page');
//        $rows = $query->all();
//        $command = $query->createCommand();
//        $rows = $command->queryAll();
//
//        foreach ($rows as $value){ 
//            $title = $value['page_title'];
//            $description = $value['page_description'];
//        }
//
//        return $this->render('page', [
//                 'title' => $title, 'description' => $description,
//            ]);
//    }
//
//    public function actionVisimisi()
//    {   
//        $query = new Query;
//        $query->select(['page_title','page_description'])
//        ->where(['page_id' => '1'])
//        ->from('page');
//        $rows = $query->all();
//        $command = $query->createCommand();
//        $rows = $command->queryAll();
//
//        foreach ($rows as $value){ 
//            $title = $value['page_title'];
//            $description = $value['page_description'];
//        }
//
//        return $this->render('page', [
//                'title' => $title, 'description' => $description,
//            ]);
//    }

    public function actionNews() {

        $query = Berita::find();

        $model = new Berita();
        $models = $model->getAllBeritaAktif();
        $pagination = $model->getAllBeritaAktifPagination();

        return $this->render('news', [
                    'models' => $models,
                    'pagination' => $pagination,
        ]);


//        $query = Berita::find();
//
//        $pagination = new Pagination([
//            'defaultPageSize' => 6,
//            'totalCount' => $query->count(),
//        ]);
//
//        $models = $query->orderBy('id')
//                ->where(['publish' => 'Y'])
//                ->offset($pagination->offset)
//                ->limit($pagination->limit)
//                ->all();
//
//        return $this->render('news', [
//                    'models' => $models,
//                    'pagination' => $pagination,
//        ]);
    }

    public function actionDetailnews($id) {
        $model = new Berita();
        $data_berita = $model->getDetailBerita($id);

        Berita::updateAllCounters(['dibaca' => 1]);

        return $this->render('detailnews', [
                    'rows' => $data_berita
        ]);
    }

    public function actionPerizinan() {
        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];
            $flag = $post['flag'];
            $query = new Query;

            if ($flag == "bidang") {
                $query->select(['nama', 'bidang_id'])
                        ->andWhere(['like', 'nama', $kata_kunci])
                        ->groupBy(['bidang_id'])
                        ->from('bidang');
            } else {
                $query->select(['id','nama'])
                        ->andWhere(['like', 'nama', $kata_kunci])
                        //    ->groupBy(['bidang_id'])
                        ->from('izin');
            }

            $rows = $query->all();
            $command = $query->createCommand();
            $rows = $command->queryAll();
            $jml = count($rows);


            if ($jml) {
                if ($flag == "bidang") {
                    return $this->render('perizinan', ['rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci]);
                } else {
                    return $this->render('cariPerizinan', ['rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci]);
                }
            } else {
                $alert = "1";
                return $this->render('perizinan', [
                            'alert' => $alert,
                ]);
            }
        } else {
            $query = new Query;
            $query->select('id, nama')
                    ->from('bidang');
            $rows = $query->all();
            $command = $query->createCommand();
            $rows = $command->queryAll();

            return $this->render('perizinan', ['rows' => $rows]);
        }
    }

    public function actionDetailperizinan($id) {

        $izin_id = $id;
        $query = new Query;

        //Persyaratan
        $query->select(['isi'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Persyaratan Izin',
                ])
                ->from('dokumen_pendukung');
        $rows_persyaratan = $query->all();

        //Pengaduan
        $query->select(['isi'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Mekanisme Pengaduan',
                ])
                ->from('dokumen_pendukung');
        $rows_pengaduan = $query->all();

        //Dasar Hukum
        $query->select(['isi'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Dasarhukum Izin',
                ])
                ->from('dokumen_pendukung');
        $rows_dasar_hukum = $query->all();

        //Definisi
        $query->select(['isi'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Definisi',
                ])
                ->from('dokumen_pendukung');
        $rows_definisi = $query->all();

        //Pelayanan
        $query->select(['mekanisme_pelayanan.isi', 'pelaksana.nama'])
                ->where([
                    'mekanisme_pelayanan.izin_id' => $izin_id
                ])
                ->leftJoin('pelaksana', 'pelaksana.id = mekanisme_pelayanan.pelaksana_id')
                ->from('mekanisme_pelayanan');
        $rows_pelayanan = $query->all();

        return $this->render('detailperizinan', ['rows_persyaratan' => $rows_persyaratan,
                    'rows_pelayanan' => $rows_pelayanan, 'rows_pengaduan' => $rows_pengaduan,
                    'rows_dasar_hukum' => $rows_dasar_hukum, 'rows_definisi' => $rows_definisi]);
    }

    public function actionRegulasi() {

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];
            $query = new Query;

            $query->select(['nama_file', 'judul'])
                    ->andWhere(['like', 'judul', $kata_kunci])
                    ->from('download');
            $rows = $query->all();
            $jml = count($rows);
            return $this->render('cariRegulasi', [
                        'rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci
            ]);
        } else {

            $query = Download::find();

            $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
            ]);

            $models = $query->orderBy('id_download')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();

            return $this->render('regulasi', [
                        'models' => $models,
                        'pagination' => $pagination,
            ]);
        }
    }

    public function actionPage($id) {

        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search($id);
        $rows = $dataProvider->getModels();

        foreach ($rows as $value) {
            $title = $value->page_title;
            $description = $value->page_description;
        }

        return $this->render('page', ['title' => $title, 'description' => $description]);
    }

    public function actionFaq() {

        $searchModel = new FaqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $rows = $dataProvider->getModels();

        return $this->render('faq', ['rows' => $rows]);
    }

    public function actionAktifasiSukses() {

        return $this->render('aktifasisukses');
    }
    
    public function language(){
	
		if(Yii::$app->getRequest()->getCookies()->has('language')){		
			$language = Yii::$app->getRequest()->getCookies()->getValue('language');
			Yii::$app->language = $language;
			
			return $language;
		}else{
			$language='id';
			return $language;
		}
		
	}
        
    public function actionLang($id){
		$language = $id;
		$cookies = Yii::$app->response->cookies;

		// add a new cookie to the response to be sent
		$cookies->add(new \yii\web\Cookie([
			'name' => 'language',
			'value' => $language,
			'expire' => time() + 60 * 60 * 24 * 30, // 30 days
		]));
		$isi_language = $cookies['language'];
		Yii::$app->language = $isi_language;

		Yii::$app->response->redirect(Yii::$app->homeUrl);
	}
}
