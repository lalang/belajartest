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
use yii\data\Pagination;
use backend\models\SliderSearch;
use backend\models\PageSearch;
use backend\models\Faq;
use backend\models\FaqSearch;
use backend\models\MenuKatalog;
use backend\models\MenuKatalogSearch;
use backend\models\KantorSearch;
use frontend\models\AllSearch;
use frontend\models\PerizinanSearch;
use frontend\models\DetailPerizinanSearch;
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
use backend\models\Download;
use backend\models\PublikasiSearch;
use backend\models\DownloadPublikasi;
use backend\models\PopupSearch;
use yii\web\Session;

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

    public function actionBeritaApi() {
        echo"hallo";

        $data = Berita::getBerita('ekonomi');
        $data2 = Berita::getBerita('pemerintahan');
        $data3 = Berita::getBerita('pembangunan');
        $data4 = Berita::getBerita('kesra');

        //	 $model = new Berita();
        //   $model->getBeritaApi();
        $model = new Berita();
        $data_slide = $model->active_slider();

        $model->saveAll();
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
            return $this->redirect('/perizinan/dashboard');
        } else {

            $model = new PopupSearch();
            $data_popup = $model->active_popup();
            foreach ($data_popup as $data) {
                $img_popup = $data['image'];
                $link_popup = $data['url'];
                $target_popup = $data['target'];
            }

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

            return $this->render('index', ['link_popup' => $link_popup, 'target_popup' => $target_popup, 'img_popup' => $img_popup, 'beritaUtama' => $data_berita_utama, 'beritaListLeft' => $data_berita_list_left, 'beritaListRight' => $data_berita_list_right, 'data_slide' => $data_slide, 'data_menu_katalog' => $data_menu_katalog, 'data_page' => $data_page, 'data_kantor' => $data_kantor, 'lokasi' => $lokasi, 'title_sub' => $title_sub, 'title_seo_sub' => $title_seo_sub, 'publish_sub' => $publish_sub, 'data_sublan2' => $data_sublan2, 'data_Sublan3_left' => $data_Sublan3_left, 'data_Sublan3_right' => $data_Sublan3_right, 'Sublan1Left' => $data_Sublan1_left, 'Sublan1Right' => $data_Sublan1_right,]);
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
            $data_berita = $model->berita($kata_kunci);

            foreach ($data_berita as $value) {
                $judul[] = $value["judul"];
                $id[] = $value["judul_seo"];
                $link[] = '/site/detailnews';
            }

            //Cari Bidang 
            $data_bidang = $model->bidang($kata_kunci);

            foreach ($data_bidang as $value) {
                $judul[] = $value["nama"];
                $id[] = $value["id"];
                $link[] = '/site/detailperizinan';
            }

            //Cari Izin 
            $data_izin = $model->izin($kata_kunci);

            foreach ($data_izin as $value) {
                $judul[] = $value["nama"];
                $id[] = $value["id"];
                $link[] = '/site/detailperizinan';
            }

            //Cari FAQ 
            $data_bidang = $model->faq($kata_kunci);

            foreach ($data_bidang as $value) {
                $judul[] = $value["tanya"];
                $id[] = "";
                $link[] = '/site/faq';
            }

            //Cari Kategori Regulasi
            $data_regulasi = $model->kat_regulasi($kata_kunci);

            foreach ($data_regulasi as $value) {
                $judul[] = $value["judul"];
                $id[] = $value["id"];
                $link[] = '/site/viewregulasi';
            }

            //Cari Regulasi
            $data_regulasi = $model->regulasi($kata_kunci);

            foreach ($data_regulasi as $value) {
                $judul[] = $value["judul"];
                $id[] = $value["id"];
                $link[] = '/site/viewregulasi';
            }

            //Cari Kategori Informasi Publikasi
            $data_regulasi = $model->kat_publikasi($kata_kunci);

            foreach ($data_regulasi as $value) {
                $judul[] = $value["judul"];
                $id[] = $value["id"];
                $link[] = '/site/viewpublikasi';
            }

            //Cari Informasi Publikasi
            $data_regulasi = $model->publikasi($kata_kunci);

            foreach ($data_regulasi as $value) {
                $judul[] = $value["judul"];
                $id[] = $value["id"];
                $link[] = '/site/viewpublikasi';
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

    public function actionRequestPasswordReset($step = null) {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
//                
//                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
//
//                return $this->goHome();
                $pesan = 'Check your email for further instructions.';

                return $this->render('LupaPassSukses', [
                            'pesan' => $pesan,
                ]);
            } else {

//                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');

                $pesan = 'Sorry, we are unable to reset password for email provided.';

                return $this->render('LupaPassSukses', [
                            'pesan' => $pesan,
                ]);
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
                $cari[] = 'concat(izin.nama," || ",bidang.nama) LIKE "%' . $value . '%" and izin.aktif="Y"';
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

            if ($kata_kunci == "") {
                $alert = "1";
                $query = new Query;
                $query->select('id, nama')
                        ->from('bidang')->orderBy('id asc');
                $rows = $query->all();
                $command = $query->createCommand();
                $rows = $command->queryAll();

                foreach ($rows as $value_data) {
                    $data_izin[] = $value_data[nama];
                }
                return $this->render('perizinan', ['rows' => $rows, 'alert' => $alert, 'data_izin' => $data_izin
                ]);
            } else {

                $query = new Query;
                $query->select(['nama', 'id'])
                        ->andWhere(['like', 'id', $kata_kunci])
                        //    ->groupBy(['bidang_id'])
                        ->from('izin')->orderBy('id asc');

                $rows = $query->all();
                $command = $query->createCommand();
                $rows = $command->queryAll();
                $jml = count($rows);

                return $this->render('cariPerizinan', ['rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci]);
            }
        } else {
            $query = new Query;
            $query->select('id, nama')
                    ->from('bidang')->orderBy('id asc');
            $rows = $query->all();
            $command = $query->createCommand();
            $rows = $command->queryAll();

            foreach ($rows as $value_data) {
                $data_izin[] = $value_data[nama];
            }

            return $this->render('perizinan', ['rows' => $rows,
                        'data_izin' => $data_izin,
            ]);
        }
    }

    public function actionDetailperizinan($id) {

        $model = new DetailPerizinanSearch();

        //Izin
        $rows_izin = $model->active_izin($id);

        foreach ($rows_izin as $data_izin) {
            $data_izin[] = $data_izin['nama'];
            $data_izin[] = $data_izin['durasi'];
            $data_izin[] = $data_izin['durasi_satuan'];
        }

        //Persyaratan
        $rows_persyaratan = $model->active_persyaratan($id);

        //Pelayanan
        $rows_pelayanan = $model->active_pelayanan($id);

        //Pengaduan
        $rows_pengaduan = $model->active_pengaduan($id);

        //Dasar Hukum
        $rows_dasar_hukum = $model->active_hukum($id);

        //Definisi
        $rows_definisi = $model->active_definisi($id);
		
		//Biaya
        $rows_biaya = $model->active_biaya($id);
		
        return $this->render('detailperizinan', ['data_izin' => $data_izin, 'rows_persyaratan' => $rows_persyaratan,
                    'rows_pelayanan' => $rows_pelayanan, 'rows_pengaduan' => $rows_pengaduan,
                    'rows_dasar_hukum' => $rows_dasar_hukum, 'rows_definisi' => $rows_definisi, 'rows_biaya' => $rows_biaya]);
    }

    public function actionRegulasiSearch($search = null) {
        $lang = $this->language();
        $out = ['more' => false];

        if ($lang == "en") {

            if (!is_null($search)) {
                $kriteria = explode(' ', $search);
                $cari = [];
                foreach ($kriteria as $value) {
                    $cari[] = 'concat(download.judul_eng," || ",regulasi.nama_en," || ",download.deskripsi_eng) LIKE "%' . $value . '%" and download.publish="Y" and regulasi.publish="Y"';
                }

                $cari2 = implode($cari, ' and ');
                $query = Download::find()->where($cari2)
                        ->joinWith(['regulasi']);
                $query->select(['download.id', 'concat(download.judul_eng," || ",regulasi.nama_en," || ",download.deskripsi_eng) as text'])
                        ->from('download')
                        ->joinWith(['regulasi']);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            } else {
                $out['results'] = ['id' => 0, 'text' => 'Data tidak ditemukan'];
            }
        } else {

            if (!is_null($search)) {
                $kriteria = explode(' ', $search);
                $cari = [];
                foreach ($kriteria as $value) {
                   $cari[] = 'concat(download.judul," || ",regulasi.nama," || ",download.deskripsi) LIKE "%' . $value . '%" and download.publish="Y" and regulasi.publish="Y"';
                }

                $cari2 = implode($cari, ' and ');
                $query = Download::find()->where($cari2)
                        ->joinWith(['regulasi']);
                $query->select(['download.id', 'concat(download.judul," || ",regulasi.nama," || ",download.deskripsi) as text'])
                        ->from('download')
                        ->joinWith(['regulasi']);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            } else {
                $out['results'] = ['id' => 0, 'text' => 'Data tidak ditemukan'];
            }
        }
        echo Json::encode($out);
    }

    public function actionRegulasi() {

        $lang = $this->language();
        $model = new MenuKatalogSearch();
        $link = "/site/regulasi";
        $data_menu_katalog = $model->title_menu_katalog($link);

        foreach ($data_menu_katalog as $value) {
            if ($lang == "en") {
                $judul_page = $value['nama_en'];
            } else {
                $judul_page = $value['nama'];
            }
        }

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];
            $query = new Query;

            $query->select(['nama_file', 'judul', 'judul_eng'])
                    ->where(['id' => $kata_kunci])
                    ->from('download');
            $rows = $query->all();
            $jml = count($rows);
            return $this->render('cariRegulasi', ['judul_page' => $judul_page,
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

            //Baru
            $model = new RegulasiSearch();
            $data_kategori = $model->ActiveRegulasi();

            return $this->render('regulasi', ['judul_page' => $judul_page,
                        'models' => $models,
                        'pagination' => $pagination,
                        'data_regulasi' => $data_regulasi,
                        'data_kategori' => $data_kategori,
            ]);
        }
    }

    public function actionViewregulasi($id) {
        $kata_kunci = $id;
        $query = new Query;

        $query->select(['nama_file', 'judul', 'judul_eng'])
                ->where(['id' => $kata_kunci])
                ->from('download');
        $rows = $query->all();
        $jml = count($rows);
        return $this->render('cariRegulasi', ['judul_page' => $judul_page,
                    'rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci
        ]);
    }

    public function actionViewpublikasi($id) {
        $kata_kunci = $id;
        $query = new Query;

        $query->select(['nama_file', 'judul', 'judul_eng'])
                ->where(['id' => $kata_kunci])
                ->from('download_publikasi');
        $rows = $query->all();
        $jml = count($rows);
        return $this->render('cariInformasiPublikasi', ['judul_page' => $judul_page,
                    'rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci
        ]);
    }

    public function actionInformasiPublikasi() {
        $lang = $this->language();
        $model = new MenuKatalogSearch();
        $link = "/site/informasi-publikasi";
        $data_menu_katalog = $model->title_menu_katalog($link);

        foreach ($data_menu_katalog as $value) {
            if ($lang == "en") {
                $judul_page = $value['nama_en'];
            } else {
                $judul_page = $value['nama'];
            }
        }

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();
            $kata_kunci = $post['cari'];
            $query = new Query;

            $query->select(['nama_file', 'judul', 'judul_eng'])
                    ->where(['id' => $kata_kunci])
                    ->from('download_publikasi');
            $rows = $query->all();
            $jml = count($rows);
            return $this->render('cariInformasiPublikasi', ['judul_page' => $judul_page,
                        'rows' => $rows, 'jml' => $jml, 'keyword' => $kata_kunci
            ]);
        } else {

            $query = DownloadPublikasi::find()->where(['publish' => 'Y']);

            $query = new Query;
            $query->select('judul')->where(['publish' => 'Y'])
                    ->from('download_publikasi');
            $data_download = $query->all();
            foreach ($data_download as $value_data) {
                $data_InformasiPublikasi[] = $value_data[judul];
            }

            //Baru
            $model = new PublikasiSearch();
            $data_kategori = $model->ActivePublikasi();

            return $this->render('InformasiPublikasi', ['judul_page' => $judul_page,
                        'models' => $models,
                        'data_InformasiPublikasi' => $data_InformasiPublikasi,
                        'data_kategori' => $data_kategori,
            ]);
        }
    }

    public function actionPublikasiSearch($search = null) {
        $lang = $this->language();
        $out = ['more' => false];

        if ($lang == "en") {

            if (!is_null($search)) {
                $kriteria = explode(' ', $search);
                $cari = [];
                foreach ($kriteria as $value) {
                    $cari[] = 'concat(download_publikasi.judul_eng," || ",publikasi.nama_en," || ",download_publikasi.deskripsi_eng) LIKE "%' . $value . '%" and download_publikasi.publish="Y" and publikasi.publish="Y"';
                }

                $cari2 = implode($cari, ' and ');
                $query = DownloadPublikasi::find()->where($cari2)
                        ->joinWith(['publikasi']);
                $query->select(['download_publikasi.id', 'concat(download_publikasi.judul_eng," || ",publikasi.nama_en," || ",download_publikasi.deskripsi_eng) as text'])
                        ->from('download_publikasi')
                        ->joinWith(['publikasi']);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            } else {
                $out['results'] = ['id' => 0, 'text' => 'Data tidak ditemukan'];
            }
        } else {

            if (!is_null($search)) {
                $kriteria = explode(' ', $search);
                $cari = [];
                foreach ($kriteria as $value) {
                    $cari[] = 'concat(download_publikasi.judul," || ",publikasi.nama," || ",download_publikasi.deskripsi) LIKE "%' . $value . '%" and download_publikasi.publish="Y" and publikasi.publish="Y"';
                }

                $cari2 = implode($cari, ' and ');
                $query = DownloadPublikasi::find()->where($cari2)
                        ->joinWith(['publikasi']);
                $query->select(['download_publikasi.id', 'concat(download_publikasi.judul," || ",publikasi.nama," || ",download_publikasi.deskripsi) as text'])
                        ->from('download_publikasi')
                        ->joinWith(['publikasi']);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            } else {
                $out['results'] = ['id' => 0, 'text' => 'Data tidak ditemukan'];
            }
        }
        echo Json::encode($out);
    }

    public function actionPage($pid) {
        $lang = $this->language();
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search_page($pid, $lang);
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

    public function actionResetSukses($step = null) {

        switch ($step) {
            case 'Send Token' :
                $pesan = 'An email has been sent with instructions for resetting your password.';
                break;
            case 'Token Expired' :
                $pesan = 'Recovery link is invalid or expired. Please try requesting a new one.';
                break;
            case 'Reset Sukses' :
                $pesan = 'Your password has been changed successfully.';
                break;
        }

        return $this->render('LupaPassSukses', [
                    'pesan' => $pesan,
        ]);

//        return $this->render('registrasisukses');
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
