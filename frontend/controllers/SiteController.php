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
use backend\models\Download;
use yii\data\Pagination;
use backend\models\SliderSearch;
use backend\models\PageSearch;
use backend\models\Faq;
use backend\models\FaqSearch;
use backend\models\MenuKatalogSearch;
use backend\models\KantorSearch;
use frontend\models\AllSearch;
use frontend\models\PerizinanSearch;
use backend\models\Perizinan;
use backend\models\Izin;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubLanding1Search;
use backend\models\SubLanding2Search;
use backend\models\SubLanding3Search;
use backend\models\TitleSubLandingSearch;
use backend\models\RegulasiSearch;
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

    public function actionTest() {
        return $this->render('test');
    }

    public function actionSlider() {

        $model = new SliderSearch();
        $data_slide = $model->active_slider();

        return $this->render('test2', ['data_slide' => $data_slide]);
    }

    public function actionLokasi() {

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $kata_kunci = $post['nama'];

            $model = new KantorSearch();
            $lokasi = $model->search_lokasi_nama($kata_kunci);
            $data_kantor = $model->all_kantor();

            return $this->render('lokasi', ['data_kantor' => $data_kantor, 'lokasi' => $lokasi]);
        } else {

            $model = new KantorSearch();
            $id = "11";
            $lokasi = $model->search_lokasi_id($id);
            $data_kantor = $model->all_kantor();

            return $this->render('lokasi', ['data_kantor' => $data_kantor, 'lokasi' => $lokasi]);
        }
    }

    public function actionIndex() {
        $lang = $this->language();
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/perizinan/index');
        } else {

            $model = new SliderSearch();
            $data_slide = $model->active_slider();

            $model = new MenuKatalogSearch();
            $data_menu_katalog = $model->active_menu_katalog();

            $model = new PageSearch();
            $data_page = $model->active_page_landing();

            $model = new SubLanding1Search();
            $data_Sublan1_left = $model->getSublan1Left();
            $data_Sublan1_right = $model->getSublan1Right();

            $model = new SubLanding2Search();
            $data_sublan2 = $model->active_sublan2();

            $model = new SubLanding3Search();
            $data_Sublan3_left = $model->getSubLan3Left();
            $data_Sublan3_right = $model->getSubLan3Right();
			
            $model = new TitleSubLandingSearch($lang);
            $data_TitleSubLan = $model->searchTitleSubLan();

            foreach ($data_TitleSubLan as $data) {
                if ($lang == "en") {
                    $title_sub[] = $data->nama_en;
                    $title_seo_sub[] = $data->nama_seo_en;
                    $publish_sub[] = $data->publish;
                } else {
                    $title_sub[] = $data->nama;
                    $title_seo_sub[] = $data->nama_seo;
                    $publish_sub[] = $data->publish;
                }
            }

            $model = new Berita();
            $data_berita_utama = $model->getBeritaUtama();
            $data_berita_list_left = $model->getBeritaListLeft();
            $data_berita_list_right = $model->getBeritaListRight();

            $model = new KantorSearch();
            $id = "11";
            $lokasi = $model->search_lokasi_id($id);
            $data_kantor = $model->all_kantor();

            return $this->render('index', ['beritaUtama' => $data_berita_utama, 'beritaListLeft' => $data_berita_list_left, 'beritaListRight' => $data_berita_list_right, 'data_slide' => $data_slide, 'data_menu_katalog' => $data_menu_katalog, 'data_page' => $data_page, 'data_kantor' => $data_kantor, 'lokasi' => $lokasi, 'title_sub' => $title_sub,'title_seo_sub'=>$title_seo_sub,'publish_sub'=>$publish_sub,'data_sublan2' => $data_sublan2, 'data_Sublan3_left' => $data_Sublan3_left, 'data_Sublan3_right' => $data_Sublan3_right, 'Sublan1Left' => $data_Sublan1_left, 'Sublan1Right' => $data_Sublan1_right,]);
        }
    }

    public function actionSearchglobal() {
        if (Yii::$app->request->post()) {
            //Cari Page
            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];

            $model = new AllSearch();
            $data_page = $model->page($kata_kunci);

            foreach ($data_page as $value) {
                $judul[] = $value["judul"];
                $id[] = '';
                $link[] = '#' . $value["judul_seo"];
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

            //Cari Izin 
            $model = new AllSearch();
            $data_izin = $model->izin($kata_kunci);

            foreach ($data_izin as $value) {
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
            $this->redirect('/site/index');
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

    public function actionIzinSearch($search = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $kriteria = explode(' ', $search);
            $cari = [];
            foreach ($kriteria as $value) {
                $cari[] = 'concat(izin.nama," || ",bidang.nama) LIKE "%' . $value . '%"';
            }

            $cari2 = implode($cari, ' and ');
            $query = Izin::find()->where($cari2)
                    ->joinWith(['bidang']);
            $query->select(['izin.id', 'concat(izin.nama," || ",bidang.nama) as text'])
                    ->from('izin')
                    ->joinWith(['bidang']);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } else {
            $out['results'] = ['id' => 0, 'text' => 'Data tidak ditemukan'];
        }
        echo Json::encode($out);
    }

    public function actionPerizinan() {

        if (Yii::$app->request->post()) {

            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];
			
			if($kata_kunci==""){
				$alert = "1";
				$query = new Query;
                $query->select('id, nama')
                        ->from('bidang');
                $rows = $query->all();
                $command = $query->createCommand();
                $rows = $command->queryAll();

                $query = new Query;
                $query->select('nama')
                        ->from('izin');
                $model = $query->all();
                foreach ($model as $value_data) {
                    $data_izin[] = $value_data[nama];
                }
				return $this->render('perizinan', ['rows' => $rows, 'alert' => $alert, 'data_izin' => $data_izin
                ]);
				
			}else{
			
				$query = new Query;
				$query->select(['nama', 'id'])
						->andWhere(['like', 'id', $kata_kunci])
						//    ->groupBy(['bidang_id'])
						->from('izin');

				$rows = $query->all();
				$command = $query->createCommand();
				$rows = $command->queryAll();
				$jml = count($rows);
				
				return $this->render('cariPerizinan', ['rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci]);
            }
		
        } else {
            $query = new Query;
            $query->select('id, nama')
                    ->from('bidang');
            $rows = $query->all();
            $command = $query->createCommand();
            $rows = $command->queryAll();

            $query = new Query;
            $query->select('nama')
                    ->from('izin');
            $model = $query->all();
            foreach ($model as $value_data) {
                $data_izin[] = $value_data[nama];
            }

            return $this->render('perizinan', ['rows' => $rows,
                        'data_izin' => $data_izin,
            ]);
        }
    }

    public function actionDetailperizinan($id) {

        $izin_id = $id;
        $query = new Query;

        //Persyaratan
        $query->select(['nama'])
                ->where([
                    'id' => $id,
                ])
                ->from('izin');
        $rows_izin = $query->all();
        foreach ($rows_izin as $data_izin) {
            $nm_izin = $data_izin['nama'];
        }

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
        $query->select(['sop.deskripsi_sop', 'pelaksana.nama'])
                ->where([
                    'sop.izin_id' => $izin_id
                ])
                ->leftJoin('pelaksana', 'pelaksana.id = sop.pelaksana_id')
                ->from('sop');
        $rows_pelayanan = $query->all();

        return $this->render('detailperizinan', ['nm_izin' => $nm_izin, 'rows_persyaratan' => $rows_persyaratan,
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

            $query = Download::find()->where(['publish' => 'Y']);

            $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
            ]);

            $models = $query->orderBy('id')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();

            $query = new Query;
            $query->select('judul')->where(['publish' => 'Y'])
                    ->from('download');
            $data_download = $query->all();
            foreach ($data_download as $value_data) {
                $data_regulasi[] = $value_data[judul];
            }

            return $this->render('regulasi', [
                        'models' => $models,
                        'pagination' => $pagination,
                        'data_regulasi' => $data_regulasi,
            ]);
        }
    }

    public function actionPage($id) {

        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search($id);
        $rows = $dataProvider->getModels();

        foreach ($rows as $value) {
            $title = $value->judul;
            $description = $value->description;
            $image = $value->gambar;
        }

        return $this->render('page', ['title' => $title, 'description' => $description, 'image' => $image]);
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
    
    public function actionRegistrasiSukses() {

        return $this->render('registrasisukses');
    }

    public function language() {

        if (Yii::$app->getRequest()->getCookies()->has('language')) {
            $language = Yii::$app->getRequest()->getCookies()->getValue('language');
            Yii::$app->language = $language;

            return $language;
        } else {
            $language = 'id';
            return $language;
        }
    }

    public function actionLang($id) {
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
