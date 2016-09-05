<?php

namespace backend\controllers;

use backend\models\Izin;
use backend\models\IzinSiup;
use backend\models\Perizinan;
use backend\models\PerizinanDokumen;
use backend\models\PerizinanBerkas;
use backend\models\PerizinanProses;
use backend\models\PerizinanSearch;
use backend\models\Pelaksana;
use backend\models\Kuota;
use backend\models\Lokasi;
use backend\models\Params;
use backend\models\Simultan;
use frontend\models\SearchIzin;
use DateTime;
use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use dektrium\user\models\Profile;
//use common\components\Mailer;
use dosamigos\qrcode\QrCode;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\IzinTdg;
use backend\models\IzinTdp;
use backend\models\IzinPm1;
use backend\models\IzinSkdp;
use backend\models\IzinPenelitian;
use backend\models\IzinKesehatan;
use yii\helpers\Json;
use yii\web\UploadedFile;

//use yii\helpers\Html;

/**
 * PerizinanController implements the CRUD actions for Perizinan model.
 */
class PerizinanController extends Controller {

//    public $layout = 'lay-admin';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
	
	public function actionHome() {
		return $this->render('home');
	}	

    public function actionDashboard() {
        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')) {
            return $this->render('perizinanAdmin');
        } else {
            $connection = \Yii::$app->db;
            $query = $connection->createCommand("select id from history_plh hp
                                            where user_id = :pid 
                                            AND (CURDATE() between hp.tanggal_mulai and hp.tanggal_akhir)
                                            AND hp.`status` = 'Y'");
            $query->bindValue(':pid', Yii::$app->user->identity->id);
            $result = $query->queryAll();

            foreach ($result as $key) {
                $plh = $key['id'];
            }

            return $this->render('dashboard', ['plh_id' => $plh]);
        }
    }

    public function actionDataStatistik() {
        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer')) {
            return $this->render('perizinanAdmin');
        } else {
            $connection = \Yii::$app->db;
            $query = $connection->createCommand("select id from history_plh hp
                                            where user_id = :pid 
                                            AND (CURDATE() between hp.tanggal_mulai and hp.tanggal_akhir)
                                            AND hp.`status` = 'Y'");
            $query->bindValue(':pid', Yii::$app->user->identity->id);
            $result = $query->queryAll();

            foreach ($result as $key) {
                $plh = $key['id'];
            }

            return $this->render('data-statistik', ['plh_id' => $plh]);
        }
    }

    public function actionDashboardPlh($plh) {
        return $this->render('dashboard_plh', ['plh_id' => $plh]);
    }

    public function actionStatus($id) {
        $model = $this->findModel($id);
        return $this->renderAjax('_status', ['model' => $model]);
    }

    public function actionLihat($id) {
        $model = $this->findModel($id);

        if ($model->izin->action == 'izin-tdg') {
            $izin = \backend\models\IzinTdg::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-pm1') {
            $izin = \backend\models\IzinPm1::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-tdp') {
            $izin = \backend\models\IzinTdp::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-skdp') {
            $izin = \backend\models\IzinSkdp::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-penelitian') {
            $izin = \backend\models\IzinPenelitian::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-kesehatan') {
            $izin = \backend\models\IzinKesehatan::findOne($model->referrer_id);
        } else {
            $izin = \backend\models\IzinSiup::findOne($model->referrer_id);
        }


        return $this->renderAjax('_lihat', [
                    'model' => $izin,]);
    }

    public function actionLihatUlangSk() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne(['perizinan_id' => $id]);
        $statusIzin = Perizinan::findOne($id)->status;

        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        if ($statusIzin == 'Selesai') {
            $sk_siup = $model->dokumen;

            $sk_siup = str_replace('{qrcode}', '<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);

            $model->dokumen = $sk_siup;
        } elseif ($statusIzin == 'Berkas Siap') {


            $model->dokumen = str_replace('{keterangan}', $model->keterangan, $model->dokumen);
        } else {
            //$model->dokumen = IzinSiup::findOne($model->perizinan->referrer_id)->preview_data;
        }
        return $this->renderAjax('_sk', ['model' => $model]);
    }

    /**
     * Lists all Perizinan models.
     * @return mixed
     */
    public function actionIndex($status = null) {
        $searchModel = new PerizinanSearch();

        $searchModel->status = $status;

        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')) {

            $dataProvider = $searchModel->searchAdmin(Yii::$app->request->get());

            return $this->render('indexAdmin', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else {
            $connection = \Yii::$app->db;
            $query = $connection->createCommand("select id from history_plh hp
                                            where user_id = :pid 
                                            AND (CURDATE() between hp.tanggal_mulai and hp.tanggal_akhir)
                                            AND hp.`status` = 'Y'");
            $query->bindValue(':pid', Yii::$app->user->identity->id);
            $result = $query->queryAll();
//die(print_r(Yii::$app->user->identity->id));
            foreach ($result as $key) {
                $plh = $key['id'];
            }
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $plh);

            return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'varKey' => 'index',
                        'status' => $status,
            ]);
        }
    }

    public function actionViewHistory($pemohonID) {

        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->searchPerizinanByID(Yii::$app->request->queryParams, $pemohonID);

        return $this->render('view-detail-history', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'status' => 'view-history',
                    'pemohonID' => $pemohonID,
        ]);
    }

    public function actionApprov($action = null, $status = null) {

        $searchModel = new PerizinanSearch();

        $searchModel->action = $action;
        $searchModel->status = $status;

        $dataProvider = $searchModel->searchApprove(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'approv',
                    'status' => $status,
                    'action' => $action,
        ]);
    }

    public function actionApprovPlh($action = null, $status = null, $plh = null) {

        $lokasi = \backend\models\HistoryPlh::findOne($plh);

        $searchModel = new PerizinanSearch();

        $searchModel->action = $action;
        $searchModel->status = $status;

        $dataProvider = $searchModel->searchApprovePLH(Yii::$app->request->queryParams, $lokasi->user_lokasi);

//        echo $plh;
//        die();

        return $this->render('index-plh', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'approv-plh',
                    'status' => $status,
                    'action' => $action,
                    'plh' => $plh,
        ]);
    }

    public function actionStatistik($lokasi = NULL) {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->searchPerizinanByLokasi(Yii::$app->request->queryParams, $lokasi);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'statistik',
                    'status' => 'statistik',
                    'lokasi' => $lokasi,
        ]);
    }

    public function actionStatistikStatus($lokasi, $status) {
        $searchModel = new PerizinanSearch();

        if ($status == "daftar") {
            $get_status = "'daftar'";
        } elseif ($status == "proses") {
            $get_status = "'proses','lanjut','berkas siap', 'verifikasi', 'verifikasi tolak', 'berkas tolak siap','tolak'";
        } elseif ($status == "revisi") {
            $get_status = "'revisi'";
        } elseif ($status == "selesai") {
            $get_status = "'selesai','tolak selesai','batal'";
        } elseif ($status == "lanjut_selesai") {
            $get_status = "'selesai'";
        } elseif ($status == "tolak_selesai") {
            $get_status = "'tolak selesai'";
        } elseif ($status == "batal") {
            $get_status = "'batal'";
        }


        $dataProvider = $searchModel->searchPerizinanByStatus(Yii::$app->request->queryParams, $lokasi, $get_status);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'statistik',
                    'status' => 'statistik',
                    'lokasi' => $lokasi,
        ]);
    }

    public function actionProses() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInProses(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'proses',
        ]);
    }

    public function actionBaru() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInBaru(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'baru',
        ]);
    }

    public function actionRevisi() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInRevisi(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'revisi',
        ]);
    }

    //samuel
    public function actionProsesadmin() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInProsesAdmin(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'proses',
        ]);
    }

    public function actionBaruadmin() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInBaruAdmin(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'baru',
        ]);
    }

    //samuel
    public function actionRevisiadmin() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInRevisiAdmin(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'revisi',
        ]);
    }

    public function actionSelesaiadmin() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInSelesaiAdmin(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'selesai',
        ]);
    }

    //Samuel
    public function actionTolakSelesaiadmin() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInTolakSelesaiAdmin(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'tolak-selesai',
        ]);
    }

    public function actionSelesai() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInSelesai(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'selesai',
        ]);
    }

    public function actionTolakSelesai() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInTolakSelesai(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'tolak-selesai',
        ]);
    }

    public function actionTolak() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInTolak(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    //Samuel
    public function actionBataladmin() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInBatalAdmin(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'batal',
        ]);
    }

    public function actionBatal() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInBatal(Yii::$app->request->queryParams);

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'batal',
        ]);
    }

    public function actionLacak() {
        $searchModel = new PerizinanSearch();

        if (Yii::$app->user->can('Viewer') || Yii::$app->user->can('Petugas')) {

            $dataProvider = $searchModel->searchPerizinanDataEis(Yii::$app->request->get());
            return $this->render('lacak-eis', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else {
            $dataProvider = $searchModel->searchPerizinanDataByLokasi(Yii::$app->request->queryParams);

            return $this->render('lacak', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'varKey' => 'lacak',
            ]);
        }
    }

    public function actionEta($status = NULL) {

        $searchModel = new PerizinanSearch();

        switch ($status) {
            case 'Red' :
                $dataProvider = $searchModel->getDataEtaRed(Yii::$app->request->queryParams);
                break;
            case 'Red2' :
                $dataProvider = $searchModel->getDataEtaRed2(Yii::$app->request->queryParams);
                break;
            case 'Yellow' :
                $dataProvider = $searchModel->getDataEtaYellow(Yii::$app->request->queryParams);
                break;
            case 'Green' :
                $dataProvider = $searchModel->getDataEtaGreen(Yii::$app->request->queryParams);
                break;
        }

        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'eta',
                    'status' => $status,
        ]);
    }

    public function actionFilter($status) {
        $searchModel = new PerizinanSearch();
        $searchModel->status = $status;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perizinan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerDokumenPendukung = new ArrayDataProvider([
            'allModels' => $model->izin->dokumenPendukungs,
        ]);
        $providerPerizinan = new ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerDokumenPendukung' => $providerDokumenPendukung,
                    'providerPerizinan' => $providerPerizinan,
                    'providerPerizinanProses' => $providerPerizinanProses,
        ]);
    }

    public function actionProsesPencabutan($id, $status) {
        if ($status == 'Lanjut') {
            Perizinan::updateAll(['flag_cabut' => 'Y'], ['id' => $id]);
        } elseif ($status == 'Batal') {
            Perizinan::updateAll(['flag_cabut' => 'N'], ['id' => $id]);
        }
        
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    public function actionVerifikasi() {

        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);

        $perizinan_id = $model->perizinan_id;
        $model2 = $this->findModel($perizinan_id);
        //$model2 = Perizinan::findOne($perizinan_id);
        //find stat bapl file
        $model2->statBAPL = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_lapangan is not null or izin.template_ba_lapangan <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapl' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');

        if ($model2->load(Yii::$app->request->post())) {

            $model2->fileBAPL = UploadedFile::getInstance($model2, 'fileBAPL');
            if ($model2->fileBAPL) {
                $this->uploadBAPL($model2);
                $model2->file_bapl = $model2->kode_registrasi . '.' . $model2->fileBAPL->extension;
            } else {
                
            }

            $model2->save();
        }

        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if (\Yii::$app->request->post()) {
            $connection = new Query;
            if (isset($_POST['selection'])) {
                $connection->createCommand()
                        ->update('perizinan_dokumen', ['check' => '0'], 'perizinan_id = ' . $model->perizinan_id)
                        ->execute();


                for ($i = 0; $i < count($_POST['selection']); $i++) {
                    $connection->createCommand()
                            ->update('perizinan_dokumen', ['check' => '1'], 'id = ' . $_POST['selection'][$i])
                            ->execute();
                }
            }

            if (\Yii::$app->request->post('PerizinanProses') != null) {
                if ($model->perizinan->status == 'Verifikasi Tolak') {
                    //TODO_BY
                    $model->todo_by = Yii::$app->user->identity->id;
                    $model->todo_date = date("Y-m-d");
                    $model->attributes = \Yii::$app->request->post('PerizinanProses');
                    $model->status = $model->status;
                    $model->selesai = new Expression('NOW()');
                    $model->save();
                    Perizinan::updateAll(['pengambil_nik' => $model->pengambil_nik, 'pengambil_nama' => $model->pengambil_nama, 'pengambil_telepon' => $model->pengambil_telepon, 'status' => $model->status, 'keterangan' => $model->keterangan], ['id' => $model->perizinan_id]);
                    return $this->redirect(['index?status=verifikasi-tolak']);
                } else if ($model->perizinan->status == 'Verifikasi') {
                    //TODO_BY
                    $model->todo_by = Yii::$app->user->identity->id;
                    $model->todo_date = date("Y-m-d");
                    $model->attributes = \Yii::$app->request->post('PerizinanProses');
                    $model->status = $model->status;
                    $model->selesai = new Expression('NOW()');
                    $model->save();

                    Perizinan::updateAll(['pengambil_nik' => $model->pengambil_nik, 'pengambil_nama' => $model->pengambil_nama, 'pengambil_telepon' => $model->pengambil_telepon, 'status' => $model->status, 'keterangan' => $model->keterangan], ['id' => $model->perizinan_id]);

                    // eko/wsdl
//                    if ($model->status == 'Selesai') {
//                        $service = \common\components\Service::Sendtransaksi4bpjs($model->perizinan_id);
//                        if (substr($service['message'], 0, 10) == 'SOAP Fault') {
//                            $errtyp = 'danger';
//                        } else {
//                            $errtyp = 'success';
//                        }
//                        Yii::$app->getSession()->setFlash('warning', [
//                            'type' => $errtyp,
//                            'duration' => 9000,
//                            'icon' => 'fa fa-info',
//                            'message' => $service['message'],
//                            'title' => 'BPJS package',
//                            'positonY' => 'top',
//                            'positonX' => 'right'
//                        ]);
//                    }

                    return $this->redirect(['index?status=verifikasi']);
                }
            }

            return $this->redirect('verifikasi?id=' . $model->id);
        } else {

            if ($model->perizinan->status == 'Verifikasi Tolak') {
                return $this->render('verifikasi-tolak', [
                            'model' => $model,
                            'providerPerizinanDokumen' => $providerPerizinanDokumen,
                            'model2' => $model2,
                ]);
            } else if ($model->perizinan->status == 'Verifikasi') {
                return $this->render('verifikasi', [
                            'model' => $model,
                            'providerPerizinanDokumen' => $providerPerizinanDokumen,
                            'model2' => $model2,
                ]);
            }
        }
    }

    public function actionRegistrasi() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');

        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        $perizinan_id = $model->perizinan_id;
        $model2 = $this->findModel($perizinan_id);
        //$model2 = Perizinan::findOne($perizinan_id);
        //find stat bapl file
        $model2->statBAPL = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_lapangan is not null or izin.template_ba_lapangan <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapl' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');

        if ($model2->load(Yii::$app->request->post())) {

            $model2->fileBAPL = UploadedFile::getInstance($model2, 'fileBAPL');
            if ($model2->fileBAPL) {
                $this->uploadBAPL($model2);
                $model2->file_bapl = $model2->kode_registrasi . '.' . $model2->fileBAPL->extension;
            } else {
                
            }

            $model2->save();
        }

        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //TODO_BY
            PerizinanProses::updateAll(['todo_by' => Yii::$app->user->identity->id, 'todo_date' => date("Y-m-d")], ['id' => $id]);

            $next = PerizinanProses::findOne(['perizinan_id' => $model->perizinan_id, 'urutan' => $model->urutan + 1]);
            $next->dokumen = $model->dokumen;
            $next->keterangan = $model->keterangan;
            $next->active = 1;
            $next->save(false);
            if ($next->action == 'approval') {
                Perizinan::updateAll(['status' => 'Lanjut'], ['id' => $model->perizinan_id]);
            }
//            Perizinan::updateAll(['status' => 'Proses'], ['id' => $model->perizinan_id]);
            $FindParent = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->id;
            if ($FindParent) {
                $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;
                return $this->redirect(['index-simultan', 'id' => $idChild, 'status' => 'registrasi']);
            }
            return $this->redirect(['index?status=registrasi']);
        } else {
            Perizinan::updateAll(['status' => 'Proses'], ['id' => $model->perizinan_id]);
//            return $this->render('proses', [
            return $this->render('registrasi', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
                        'model2' => $model2,
            ]);
        }
    }

    public function uploadBAPL($model2) {
        if (!is_dir(Yii::getAlias('@backend') . '/web/images/documents/bapl/' . $model2->izin_id)) {

            if (!mkdir(Yii::getAlias('@backend') . '/web/images/documents/bapl/' . $model2->izin_id, 0777, true)) {//0777
                echo 'Gagal Membuat Folder Upload';
                //die();
            }
            $model2->fileBAPL->saveAs(Yii::getAlias('@backend') . '/web/images/documents/bapl/' . $model2->izin_id . '/' . $model2->kode_registrasi . '.' . $model2->fileBAPL->extension);
//                mkdir(Yii::getAlias('@test') . '/web/images/documents/bapl/' . $model2->izin_id, 0777, true);
        } else {
            $model2->fileBAPL->saveAs(Yii::getAlias('@backend') . '/web/images/documents/bapl/' . $model2->izin_id . '/' . $model2->kode_registrasi . '.' . $model2->fileBAPL->extension);
        }
    }

    public function uploadBAPT($model2) {
        if (!is_dir(Yii::getAlias('@backend') . '/web/images/documents/bapt/' . $model2->izin_id)) {

            if (!mkdir(Yii::getAlias('@backend') . '/web/images/documents/bapt/' . $model2->izin_id, 0777, true)) {//0777
                echo 'Gagal Membuat Folder Upload';
                //die();
            }
            $model2->fileBAPT->saveAs(Yii::getAlias('@backend') . '/web/images/documents/bapt/' . $model2->izin_id . '/' . $model2->kode_registrasi . '.' . $model2->fileBAPT->extension);
//                mkdir(Yii::getAlias('@test') . '/web/images/documents/bapl/' . $model2->izin_id, 0777, true);
        } else {
            $model2->fileBAPT->saveAs(Yii::getAlias('@backend') . '/web/images/documents/bapt/' . $model2->izin_id . '/' . $model2->kode_registrasi . '.' . $model2->fileBAPT->extension);
        }
    }

    public function actionCekForm() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');

        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        $perizinan_id = $model->perizinan_id;
        $model2 = $this->findModel($perizinan_id);
        //$model2 = Perizinan::findOne($perizinan_id);
        //find stat bapl file
        $model2->statBAPL = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_lapangan is not null or izin.template_ba_lapangan <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapl' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');
        $model2->statBAPT = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_teknis is not null or izin.template_ba_teknis <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapt' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');
        if ($model2->load(Yii::$app->request->post())) {

            $model2->fileBAPL = UploadedFile::getInstance($model2, 'fileBAPL');
            $model2->fileBAPT = UploadedFile::getInstance($model2, 'fileBAPT');
            if ($model2->fileBAPL) {
                $this->uploadBAPL($model2);
                $model2->file_bapl = $model2->kode_registrasi . '.' . $model2->fileBAPL->extension;
            } elseif ($model2->fileBAPT) {
                $this->uploadBAPT($model2);
                $model2->file_bapt = $model2->kode_registrasi . '.' . $model2->fileBAPT->extension;
            } else {
                
            }

            $model2->save();
        }

        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //die($model2->zonasi_sesuai);
            if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                //TODO_BY
                PerizinanProses::updateAll(['todo_by' => Yii::$app->user->identity->id, 'todo_date' => date("Y-m-d")], ['id' => $id]);

                $next = PerizinanProses::findOne(['perizinan_id' => $model->perizinan_id, 'urutan' => $model->urutan + 1]);
                $next->dokumen = $model->dokumen;
                $next->status = $model->status;
                $next->keterangan = $model->keterangan;
                $next->zonasi_id = $model->zonasi_id;
                $next->zonasi_sesuai = $model->zonasi_sesuai;
                $next->active = 1;
                $next->save(false);
            } else if ($model->status == 'Revisi') {
                $prev = PerizinanProses::findOne($id - 1);
                $prev->dokumen = $model->dokumen;
                $prev->keterangan = $model->keterangan;
                $prev->zonasi_id = $model->zonasi_id;
                $prev->zonasi_sesuai = $model->zonasi_sesuai;
                $prev->active = 1;
                $prev->save(false);
            }
            Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $model->perizinan_id]);

            $FindParent = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->id;
            if ($FindParent) {
                $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;
                //Update Child too
                $curChild = PerizinanProses::findOne(['perizinan_id' => $idChild, 'active' => 1]);
                $curChild->status = $model->status;
                $curChild->keterangan = $model->keterangan;
                $curChild->zonasi_id = $model->zonasi_id;
                $curChild->zonasi_sesuai = $model->zonasi_sesuai;
                $curChild->save(false);
                Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $idChild]);
                return $this->redirect(['index-simultan', 'id' => $idChild, 'status' => 'cek-form']);
            }
            return $this->redirect(['index?status=cek-form']);
        } else {
            return $this->render('cek-form', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
                        'model2' => $model2,
            ]);
        }
    }

    public function actionQrcode($data) {
        return QrCode::png(Yii::getAlias('@front') . '/site/validate?kode=' . $data, Yii::$app->basePath . '/web/images/qrcode/' . $data . '.png', 0, 3, 4, true);
//        return QrCode::png('http://portal-ptsp.garudatekno.com/site/validate?kode=' . $data, Yii::$app->basePath.'/images/'.$data.'.png');
        //         // you could also use the following
        // return return QrCode::png($mailTo);
    }
 public function actionQrdigitals($data) {
        $model=  Perizinan::find()
                ->where('id='.$data)
                ->one();
   //$model->dokumen = Perizinan::Digital($model->perizinan->izin_id, $model->perizinan->referrer_id);
            return QrCode::png(Yii::getAlias('@test').'/'.$model->izin->action.'/dgs1?key='.$model->id.'&token='.$model->kode_registrasi, Yii::$app->basePath . '/web/images/qrcodedigital/' . $model->kode_registrasi . '.png', 0, 3, 4, true);

    }
    public function actionQrdigital($data) {
        $model=  Perizinan::find()
                ->where('id='.$data)
                ->one();
//        die($model);
        
//    return QrCode::png(Yii::getAlias('@test').'/'.Html::label(['/'.$model->izin->action.'/dgs', 'id' => $model->perizinan_id]), Yii::$app->basePath . '/web/images/qrcode/' . $model->kode_registrasi . '.png', 0, 3, 4, true);
//      
        return QrCode::png(Yii::getAlias('@test').'/'.$model->izin->action.'/dgs?kode='.$model->kode_registrasi, Yii::$app->basePath . '/web/images/qrcodedigital/' . $model->kode_registrasi . '.png', 0, 3, 4, true);
//        return QrCode::png('http://portal-ptsp.garudatekno.com/site/validate?kode=' . $data, Yii::$app->basePath.'/images/'.$data.'.png');
        //         // you could also use the following
        // return return QrCode::png($mailTo);
    }
    
    public function actionApproval($plh = NULL) {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');

        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        $model->dokumen = str_replace('{namawil}', $model->perizinan->lokasiIzin->nama, $model->dokumen);

        if ($plh != NULL) {
            $model->dokumen = str_replace('{plh}', "PLH", $model->dokumen);
        } else {
            $model->dokumen = str_replace('{plh}', "", $model->dokumen);
        }
        $model->dokumen = str_replace('{qrcode}', '<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $model->dokumen);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        $perizinan_id = $model->perizinan_id;
        $model2 = $this->findModel($perizinan_id);
        $open_form_tgl = 1;
        $izin_p = \backend\models\IzinPenelitian::findOne(['perizinan_id' => $model->perizinan_id]);
        $tgl_mulai = date($izin_p->tgl_mulai_penelitian);
        //find stat bapl file
        $model2->statBAPL = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_lapangan is not null or izin.template_ba_lapangan <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapl' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');
        $model2->statBAPT = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_teknis is not null or izin.template_ba_teknis <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapt' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');
        if ($model2->load(Yii::$app->request->post())) {

            $model2->fileBAPL = UploadedFile::getInstance($model2, 'fileBAPL');
            $model2->fileBAPT = UploadedFile::getInstance($model2, 'fileBAPT');
            if ($model2->fileBAPL) {
                $this->uploadBAPL($model2);
                $model2->file_bapl = $model2->kode_registrasi . '.' . $model2->fileBAPL->extension;
            } elseif ($model2->fileBAPT) {
                $this->uploadBAPT($model2);
                $model2->file_bapt = $model2->kode_registrasi . '.' . $model2->fileBAPT->extension;
            } else {
                
            }
            $get_expired = $model2->tanggal_expired . ' ' . date("H:i:s");
            $model2->save();
        }

        if ($model->load(Yii::$app->request->post())) {
            if($model->status == 'Tolak'){
                $next->dokumen = Perizinan::getTemplateSK_tolak($model->perizinan->izin_id, $model->perizinan->referrer_id);
            } else {
                $next->dokumen = $model->dokumen;
            }
            $model->save();
            $findLokasi = Perizinan::findOne(['id' => $model->perizinan_id])->lokasi_izin_id;
            $findIzinID = Perizinan::findOne(['id' => $model->perizinan_id])->izin_id;
            $kodeIzin = Izin::findOne(['id' => $findIzinID])->kode;
            $perizinan = Perizinan::findOne($model->perizinan_id);

            if ($kodeIzin != '' or $kodeIzin != NULL) {
                if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                    //TODO_BY
                    PerizinanProses::updateAll(['todo_by' => Yii::$app->user->identity->id, 'todo_date' => date("Y-m-d")], ['id' => $id]);

                    $next = PerizinanProses::findOne(['perizinan_id' => $model->perizinan_id, 'urutan' => $model->urutan + 1]);
                    
                    $next->status = $model->status;
                    $next->keterangan = $model->keterangan;
                    $next->active = 1;
                    $next->save(false);
                    $now = new DateTime();
                    $now2 = new DateTime();

                    //save to no_izin

                    $getNoMax = Perizinan::getNoIzin($model->perizinan->izin_id, $model->perizinan->lokasi_izin_id, $model->status);
//                    $newYear = Perizinan::getNewYear($model->perizinan->izin_id,$model->perizinan->lokasi_izin_id,$model->perizinan->status);
//                    echo $getNoMax;
//                    die();
                    if ($getNoMax == "") {
                        $no = 1;
                    } elseif ($getNoMax != "") {
                        $no = $getNoMax + 1;
                    }
                    //$no = Perizinan::getNoIzin($model->perizinan->izin_id,$model->perizinan->lokasi_izin_id,$model->perizinan->status);
                    //$qrcode = $now->format('YmdHis') . '.' . $model->perizinan_id . '.' . preg_replace("/[^0-9]/","",\Yii::$app->session->get('siup.no_sk'));
                    $qrcode = $model->perizinan->kode_registrasi;

                    if ($model2->tanggal_expired) {
                        if ($model->perizinan->izin->action == 'izin-penelitian') {
                            $now2 = $tgl_mulai;
                        } else {
                            $now2 = $now->format('Y-m-d');
                        }
                        $expired = Perizinan::getExpired($now2, $model->perizinan->izin->masa_berlaku, $model->perizinan->izin->masa_berlaku_satuan);
                        $get_expired_max = $expired->format('Y-m-d H:i:s');
                        $get_expired = $model2->tanggal_expired . ' ' . date("H:i:s");
                        if ($get_expired > $get_expired_max) {
                            $get_expired = $get_expired_max;
                        } else {
                            $get_expired = $get_expired;
                        }
                    } else {
                        $expired = Perizinan::getExpired($now->format('Y-m-d'), $model->perizinan->izin->masa_berlaku, $model->perizinan->izin->masa_berlaku_satuan);
                        $get_expired = $expired->format('Y-m-d H:i:s');
                    }

                    if ($model->zonasi_id) {
                        Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $model->perizinan_id]);
                    }
                    $FindParent = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->id;

                    if ($model->status == "Tolak" && $model->perizinan->no_izin == NULL) {

//                        $wil = substr($model->perizinan->lokasiIzin->kode, 0, strpos($model->perizinan->lokasiIzin->kode, '.00'));
                        $wil = substr($model->perizinan->lokasiIzin->kode, 0, (strpos($model->perizinan->lokasiIzin->kode, '.00') == '') ? strlen($model->perizinan->lokasiIzin->kode) : strpos($model->perizinan->lokasiIzin->kode, '.00'));

                        $arsip = $model->perizinan->izin->arsip->kode;
                        $thn = date('Y');
                        $no_penolakan = "$no/$wil/$arsip/e/$thn";

                        if ($plh == NULL) {
                            Perizinan::updateAll([
                                'alasan_penolakan' => $model->alasan_penolakan,
                                'status' => $model->status,
                                'tanggal_izin' => $now->format('Y-m-d H:i:s'),
                                'pengesah_id' => Yii::$app->user->id,
                                //'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                                'tanggal_expired' => $get_expired,
                                'qr_code' => $qrcode,
                                'no_izin' => $no_penolakan
                                    ], [
                                'id' => $model->perizinan_id
                            ]);

                            $model->no_izin = $no_penolakan;
                            $model->save();

                            if ($FindParent) {
                                $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;
                                //Update Child too
                                $curChild = PerizinanProses::findOne(['perizinan_id' => $idChild, 'active' => 1]);
                                $curChild->status = $model->status;
                                $curChild->keterangan = $model->keterangan;
                                $curChild->zonasi_id = $model->zonasi_id;
                                $curChild->zonasi_sesuai = $model->zonasi_sesuai;
                                $curChild->save(false);
                                Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $idChild]);

                                //cegatan
                                $this->cekSync($model->perizinan_id);

                                return $this->redirect(['approv-simultan', 'id' => $idChild, 'action' => 'approval', 'status' => $model->status]);
                            }

                            //cegatan
                            $this->cekSync($model->perizinan_id);

                            return $this->redirect(['approv?action=approval&status=Tolak']);
                        } else {
                            Perizinan::updateAll([
                                'alasan_penolakan' => $model->alasan_penolakan,
                                'status' => $model->status,
                                'tanggal_izin' => $now->format('Y-m-d H:i:s'),
                                'plh_id' => $plh,
                                'pengesah_id' => Yii::$app->user->id,
                                //'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                                'tanggal_expired' => $get_expired,
                                'qr_code' => $qrcode,
                                'no_izin' => $no_penolakan
                                    ], [
                                'id' => $model->perizinan_id
                            ]);

                            if ($FindParent) {
                                $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;
                                //Update Child too
                                $curChild = PerizinanProses::findOne(['perizinan_id' => $idChild, 'active' => 1]);
                                $curChild->status = $model->status;
                                $curChild->keterangan = $model->keterangan;
                                $curChild->zonasi_id = $model->zonasi_id;
                                $curChild->zonasi_sesuai = $model->zonasi_sesuai;
                                $curChild->save(false);
                                Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $idChild]);

                                //cegatan
                                $this->cekSync($model->perizinan_id);

                                return $this->redirect(['approv-simultan', 'id' => $idChild, 'action' => 'approval', 'status' => $model->status, 'plh' => $plh]);
                            }

                            //cegatan
                            $this->cekSync($model->perizinan_id);

                            return $this->redirect(['approv-plh', 'action' => 'approval', 'status' => 'Tolak', 'plh' => $plh]);
                        }
                    } elseif ($model->status == "Lanjut" && $model->perizinan->no_izin == NULL) {

                        if ($model->perizinan->relasi_id) {
                            Perizinan::updateAll([
                                'aktif' => 'N',
                                    ], [
                                'id' => $model->perizinan->relasi_id
                            ]);
                        }

                        $no_sk = $model->perizinan->izin->fno_surat;
                        $no_sk = str_replace('{no_izin}', $no, $no_sk);
                        $no_sk = str_replace('{kode_izin}', $model->perizinan->izin->kode, $no_sk);
                        $no_sk = str_replace('{status}', $model->perizinan->status_id, $no_sk);
                        $no_sk = str_replace('{kode_wilayah}', substr($model->perizinan->lokasiIzin->kode, 0, (strpos($model->perizinan->lokasiIzin->kode, '.00') == '') ? strlen($model->perizinan->lokasiIzin->kode) : strpos($model->perizinan->lokasiIzin->kode, '.00')), $no_sk);
                        $no_sk = str_replace('{kode_arsip}', $model->perizinan->izin->arsip->kode, $no_sk);
                        $no_sk = str_replace('{tahun}', date('Y'), $no_sk);

                        $model->no_izin = $no_sk;
                        $model->save();

                        if ($plh == NULL) {
                            Perizinan::updateAll([
                                'status' => $model->status,
                                'tanggal_izin' => $now->format('Y-m-d H:i:s'),
                                'pengesah_id' => Yii::$app->user->id,
                                // 'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                                'tanggal_expired' => $get_expired,
                                'qr_code' => $qrcode,
                                'no_izin' => $model->no_izin
                                    ], [
                                'id' => $model->perizinan_id
                            ]);

                            if ($FindParent) {
                                $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;
                                //Update Child too
                                $curChild = PerizinanProses::findOne(['perizinan_id' => $idChild, 'active' => 1]);
                                $curChild->status = $model->status;
                                $curChild->keterangan = $model->keterangan;
                                $curChild->zonasi_id = $model->zonasi_id;
                                $curChild->zonasi_sesuai = $model->zonasi_sesuai;
                                $curChild->save(false);
                                Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $idChild]);

                                //cegatan
                                $this->cekSync($model->perizinan_id);

                                return $this->redirect(['approv-simultan', 'id' => $idChild, 'action' => 'approval', 'status' => $model->status]);
                            }

                            //cegatan
                            $this->cekSync($model->perizinan_id);

                            return $this->redirect(['approv?action=approval&status=Lanjut']);
                        } else {
                            Perizinan::updateAll([
                                'status' => $model->status,
                                'tanggal_izin' => $now->format('Y-m-d H:i:s'),
                                'plh_id' => $plh,
                                'pengesah_id' => Yii::$app->user->id,
                                // 'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                                'tanggal_expired' => $get_expired,
                                'qr_code' => $qrcode,
                                'no_izin' => $model->no_izin
                                    ], [
                                'id' => $model->perizinan_id
                            ]);

                            if ($FindParent) {
                                $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;
                                //Update Child too
                                $curChild = PerizinanProses::findOne(['perizinan_id' => $idChild, 'active' => 1]);
                                $curChild->status = $model->status;
                                $curChild->keterangan = $model->keterangan;
                                $curChild->zonasi_id = $model->zonasi_id;
                                $curChild->zonasi_sesuai = $model->zonasi_sesuai;
                                $curChild->save(false);
                                Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $idChild]);

                                //cegatan
                                $this->cekSync($model->perizinan_id);

                                return $this->redirect(['approv-simultan', 'id' => $idChild, 'action' => 'approval', 'status' => $model->status, 'plh' => $plh]);
                            }

                            //cegatan
                            $this->cekSync($model->perizinan_id);

                            return $this->redirect(['approv-plh', 'action' => 'approval', 'status' => 'Lanjut', 'plh' => $plh]);
                        }
                    }
                } else if ($model->status == 'Revisi') {
                    $prev = PerizinanProses::findOne($id - 1);
                    $prev->dokumen = $model->dokumen;
                    $prev->keterangan = $model->keterangan;
                    $prev->active = 1;
                    $prev->save(false);
                    Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
                }

                if ($FindParent) {
                    $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;
                    //Update Child too
                    $curChild = PerizinanProses::findOne(['perizinan_id' => $idChild, 'active' => 1]);
                    $curChild->status = $model->status;
                    $curChild->keterangan = $model->keterangan;
                    $curChild->zonasi_id = $model->zonasi_id;
                    $curChild->zonasi_sesuai = $model->zonasi_sesuai;
                    $curChild->save(false);
                    Perizinan::updateAll(['status' => $model->status, 'zonasi_id' => $model->zonasi_id, 'zonasi_sesuai' => $model->zonasi_sesuai], ['id' => $idChild]);

                    //cegatan
                    $this->cekSync($model->perizinan_id);

                    return $this->redirect(['approv-simultan', 'id' => $idChild, 'action' => 'approval', 'status' => $model->status]);
                }

                //cegatan
                $this->cekSync($model->perizinan_id);

                return $this->redirect(['approv']);
            } else {
                //TO DO jika kode tidak di set
            }
        } else {
            return $this->render('approval', [
                        'model' => $model,
                        'model2' => $model2,
            ]);
        }
    }

    public function cekSync($id) {
        $modelP = Perizinan::findOne($id);
        $modelPP = PerizinanProses::findOne(['perizinan_id' => $id, 'active' => 1]);
        $statP = $modelP->status;
        $statPP = $modelPP->status;
        $idPP = $modelPP->id;
        $noRegP = $modelP->kode_registrasi;
        if ($statP != $statPP) {

            PerizinanProses::updateAll([
                'active = NULL'
                    ], [
                'id' => $idPP
            ]);

            Yii::$app->getSession()->setFlash('warning', [
                'type' => 'warning',
                'duration' => 9000,
                'icon' => 'fa fa-info',
                'message' => 'Maaf terjadi kesalahan pada perizinan ini dengan no Reg. ' . $noRegP . ', Mohon di print screen notif ini dan dikirim kan ke Tim SITI. Terima kasih',
                'title' => 'Warning',
                'positonY' => 'top',
                'positonX' => 'right'
            ]);

            $email = "simptsp.helpdesk@gmail.com";
            //Kirim Email
            $mailer = Yii::$app->mailer;
            $mailer->viewPath = '@dektrium/user/views/mail';
            $mailer->getView()->theme = Yii::$app->view->theme;
            $params = ['id' => $id];

            $mailer->compose(['html' => 'ReportKesalahan', 'text' => 'text/' . 'ReportKesalahan'], $params)
                    ->setTo($email)
                    ->setCc(array('erwin.lim168@gmail.com'))
                    ->setFrom(\Yii::$app->params['adminEmail'])
                    ->setSubject(\Yii::t('user', 'Report Kesalahan Status', \Yii::$app->name))
                    ->send();
        }
        return true;
    }

    public function actionCetak() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);

//        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
//        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);


        $model->selesai = new Expression('NOW()');

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        $perizinan_id = $model->perizinan_id;
        $model2 = $this->findModel($perizinan_id);
        $izin = Izin::findOne($model2->izin_id);

        //find stat bapl file
        $model2->statBAPL = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_lapangan is not null or izin.template_ba_lapangan <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapl' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');
        $model2->statBAPT = \backend\models\Sop::find()
                ->joinWith('izin')
                ->where(['izin.id' => $model2->izin_id])
                ->andWhere('izin.template_ba_teknis is not null or izin.template_ba_teknis <> ""')
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere(['sop.upload_bapt' => 'Y'])
                ->andWhere(['sop.nama_sop' => $model->nama_sop])
                ->count('sop.id');
        if ($model2->load(Yii::$app->request->post())) {

            $model2->fileBAPL = UploadedFile::getInstance($model2, 'fileBAPL');
            $model2->fileBAPT = UploadedFile::getInstance($model2, 'fileBAPT');
            if ($model2->fileBAPL) {
                $this->uploadBAPL($model2);
                $model2->file_bapl = $model2->kode_registrasi . '.' . $model2->fileBAPL->extension;
            } elseif ($model2->fileBAPT) {
                $this->uploadBAPT($model2);
                $model2->file_bapt = $model2->kode_registrasi . '.' . $model2->fileBAPT->extension;
            } else {
                
            }

            $model2->save();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut') {
                //TODO_BY
                PerizinanProses::updateAll(['todo_by' => Yii::$app->user->identity->id, 'todo_date' => date("Y-m-d")], ['id' => $id]);

                $next = PerizinanProses::findOne(['perizinan_id' => $model->perizinan_id, 'urutan' => $model->urutan + 1]);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->active = 1;
//                if ($model->perizinan->lokasi_izin_id == $model->perizinan->lokasi_pengambilan_id) {
//                    $status = 'Verifikasi';
//                } else {
//                    $status = 'Berkas Siap';
//                }
                $next->save(false);
                Perizinan::updateAll(['status' => 'Berkas Siap'], ['id' => $model->perizinan_id]);

                $FindParent = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->id;
                if ($FindParent) {
                    $idChild = Simultan::findOne(['perizinan_parent_id' => $model->perizinan_id])->perizinan_child_id;

                    return $this->redirect(['index-simultan', 'id' => $idChild, 'status' => 'cetak']);
                }

                return $this->redirect(['index?status=cetak']);
            } else if ($model->status == 'Tolak') {
                //TODO_BY
                PerizinanProses::updateAll(['todo_by' => Yii::$app->user->identity->id, 'todo_date' => date("Y-m-d")], ['id' => $id]);

                $next = PerizinanProses::findOne(['perizinan_id' => $model->perizinan_id, 'urutan' => $model->urutan + 1]);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->active = 1;
//                if ($model->perizinan->lokasi_izin_id == $model->perizinan->lokasi_pengambilan_id) {
//                    $status = 'Verifikasi';
//                } else {
//                    $status = 'Berkas Siap';
//                }
                $next->save(false);
                Perizinan::updateAll(['status' => 'Berkas Tolak Siap'], ['id' => $model->perizinan_id]);
                return $this->redirect(['index?status=tolak']);
            }
        } else {
            if ($model->perizinan->status == 'Lanjut') {
                $sk_siup = $model->dokumen;
//                $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_siup);
//$sk_siup = str_replace('{qrcode}','<img src="' . \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png',TRUE). '"/>', $sk_siup);
                $filename = '../web/images/qrcode/' . $model->perizinan->kode_registrasi . '.png';
                //die($filename);
                if (file_exists($filename)) {
                    $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/qrcode/' . $model->perizinan->kode_registrasi . '.png', TRUE) . '"/>', $sk_siup);
                } elseif (!file_exists($filename)) {
                    $sk_siup = str_replace('{qrcode}', '<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
                }
//$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/logo-dki-small.png', true) . '"/>', $sk_siup);

                $model->dokumen = $sk_siup;

                return $this->render('cetak-sk', [
                            'model' => $model,
                            'model2' => $model2,
                ]);
            } elseif ($model->perizinan->status == 'Tolak') {

                switch ($model->perizinan->izin->action) {
                    case 'izin-siup':
                        $model->dokumen = IzinSiup::findOne($model->perizinan->referrer_id)->teks_penolakan;
                        break;
                    case 'izin-tdp':
                        $model->dokumen = IzinTdp::findOne($model->perizinan->referrer_id)->teks_penolakan;
                        break;
                    case 'izin-tdg':
                        $model->dokumen = IzinTdg::findOne($model->perizinan->referrer_id)->teks_penolakan;
                        break;
                    case 'izin-pm1':
                        $model->dokumen = IzinPm1::findOne($model->perizinan->referrer_id)->teks_penolakan;
                        break;
                    case 'izin-skdp':
                        $model->dokumen = IzinSkdp::findOne($model->perizinan->referrer_id)->teks_penolakan;
                        break;
                    case 'izin-penelitian':
                        $model->dokumen = IzinPenelitian::findOne($model->perizinan->referrer_id)->teks_penolakan;
                        break;
                    case 'izin-kesehatan':
                        $model->dokumen = IzinKesehatan::findOne($model->perizinan->referrer_id)->teks_penolakan;
                        break;
                }
                $model->dokumen = str_replace('{keterangan}', $model->keterangan, $model->dokumen);
                return $this->render('cetak-penolakan', [
                            'model' => $model,
                            'model2' => $model2,
                ]);
            }
        }
    }

    public function actionPrintUlangSk() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);

//        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);
        //die($model);
        if ($model->perizinan->status == 'Berkas Siap' || $model->perizinan->status == 'Verifikasi' || $model->perizinan->status == 'Lanjut' || $model->perizinan->status == 'Selesai') {
            $sk_siup = $model->dokumen;
//                $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_siup);
//$sk_siup = str_replace('{qrcode}', \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi), $sk_siup);
            $sk_siup = str_replace('{qrcode}', '<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
//$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/logo-dki-small.png', true) . '"/>', $sk_siup);
            $model->dokumen = $sk_siup;

            return $this->render('cetak-ulang-sk', [
                        'model' => $model,
            ]);
        } elseif ($model->perizinan->status == 'Berkas Tolak Siap' || $model->perizinan->status == 'Tolak' || $model->perizinan->status == 'Verifikasi Tolak' || $model->perizinan->status == 'Tolak Selesai') {
            switch ($model->perizinan->izin->action) {
                case 'izin-siup':
                    $model->dokumen = IzinSiup::findOne($model->perizinan->referrer_id)->teks_penolakan;

                    break;
                case 'izin-tdp':

                    $model->dokumen = IzinTdp::findOne($model->perizinan->referrer_id)->teks_penolakan;
                    break;
                case 'izin-tdg':
                    $model->dokumen = IzinTdg::findOne($model->perizinan->referrer_id)->teks_penolakan;

                    break;
                case 'izin-pm1':
                    $model->dokumen = IzinPm1::findOne($model->perizinan->referrer_id)->teks_penolakan;
                    break;
                case 'izin-skdp':
                    $model->dokumen = IzinSkdp::findOne($model->perizinan->referrer_id)->teks_penolakan;
                    break;
                case 'izin-penelitian':
                    $model->dokumen = IzinPenelitian::findOne($model->perizinan->referrer_id)->teks_penolakan;
                    break;
                case 'izin-kesehatan':
                    $model->dokumen = IzinKesehatan::findOne($model->perizinan->referrer_id)->teks_penolakan;
                    break;
            }
            $model->dokumen = str_replace('{keterangan}', $model->keterangan, $model->dokumen);

            return $this->render('cetak-ulang-sk', [
                        'model' => $model,
            ]);
        } elseif ($model->perizinan->status == 'Batal') {
//            $model->dokumen = IzinSiup::findOne($model->perizinan->referrer_id)->teks_batal;
//            $model->dokumen = str_replace('{keterangan}', $model->keterangan, $model->dokumen);
            $sk_siup = $model->dokumen;
            $model->dokumen = $sk_siup;
            return $this->render('cetak-ulang-sk', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCetakBatal() {

        $searchModel = new PerizinanSearch();
        if (Yii::$app->request->queryParams) {
            $dataProvider = $searchModel->searchCetakBatal(Yii::$app->request->queryParams, Yii::$app->user->identity->lokasi_id);
        } else {
            $dataProvider = $searchModel->getCetakBatal(Yii::$app->user->identity->lokasi_id);
        }

        //$id = Yii::$app->getRequest()->getQueryParam('id');
        //$model = PerizinanProses::findOne($id);
//        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
        //$model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        return $this->render('cetakBatal', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCetakUlangSk() {

        $searchModel = new PerizinanSearch();

        if (Yii::$app->request->queryParams) {
            //Samuel
            if (Yii::$app->request->queryParams['page'] == '') {
                $dataProvider = $searchModel->searchCetakUlangSk(Yii::$app->request->queryParams, Yii::$app->user->identity->lokasi_id);
            } else {
                $dataProvider = $searchModel->getCetakUlangSk(Yii::$app->user->identity->lokasi_id);
            }
        } else {
            $dataProvider = $searchModel->getCetakUlangSk(Yii::$app->user->identity->lokasi_id);
        }

        //$id = Yii::$app->getRequest()->getQueryParam('id');
        //$model = PerizinanProses::findOne($id);
//        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
        //$model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        return $this->render('CetakUlangSk', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPrint() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        $sk_siup = $model->dokumen;

        $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
        //$sk_siup = str_replace('{qrcode}', '<img src="' . Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_siup);

        $model->dokumen = $sk_siup;

        $content = $this->renderAjax('_sk', [
            'model' => $model,
        ]);
//        $content = $model->dokumen;

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LEGAL,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
        ]);

        return $pdf->render();
    }

    public function actionPrintTolak() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        //$sk_penolakan = $model->dokumen;
//        $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
        //$sk_penolakan = str_replace('{qrcode}', '<img src="' . Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_penolakan);
        //$model->dokumen = $sk_penolakan;

        $content = $this->renderAjax('_sk', [
            'model' => $model,
        ]);
//        $content = $model->dokumen;

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LEGAL,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new Perizinan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Perizinan();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Perizinan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

//        $model->scenario = 'update';
        // $model->setIsNewRecord(false);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            if ($model->perizinan->lokasi_pengambilan_id == NULL) {
                return $this->redirect(['/perizinan/schedule', 'id' => $id]);
            } else {
                return $this->redirect(['/perizinan/active']);
            }
//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionUpdateTanggal($id) {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 9000,
                    'icon' => 'fa fa-info',
                    'message' => 'Proses Update Berhasil',
                    'title' => 'Notifikasi!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            } else {
                Yii::$app->getSession()->setFlash('warning', [
                    'type' => 'warning',
                    'duration' => 9000,
                    'icon' => 'fa fa-info',
                    'message' => 'Proses Update Gagal',
                    'title' => 'Notifikasi!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Perizinan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    public function actionBerkasSiap($id, $cid) {
        $current_action = PerizinanProses::findOne(['active' => 1, 'id' => $cid])->action;
        $pemohon = Perizinan::findOne(['id' => $id])->pemohon_id;
        $noRegis = Perizinan::findOne(['id' => $id])->kode_registrasi;
        $id_izin = Perizinan::findOne(['id' => $id])->izin_id;

        $now = strtotime(date("H:i:s"));
        if (($now > strtotime('03:00:00')) && ($now <= strtotime('11:00:59'))) {
            $salam = ' Pagi';
        } elseif (($now > strtotime('11:00:59')) && ($now <= strtotime('15:00:59'))) {
            $salam = ' Siang';
        } elseif (($now > strtotime('15:00:59')) && ($now <= strtotime('18:00:59'))) {
            $salam = ' Sore';
        } elseif (($now > strtotime('18:00:59')) && ($now <= strtotime('03:00:59'))) {
            $salam = ' Malam';
        } else {
            $salam = ',';
        }

        $email = \backend\models\User::findOne(['id' => $pemohon])->email;
        Perizinan::updateAll(['status' => 'Verifikasi'], ['id' => $id]);
        //Kirim Email
        $mailer = Yii::$app->mailer;
        $mailer->viewPath = '@dektrium/user/views/mail';
        $mailer->getView()->theme = Yii::$app->view->theme;
        $params = ['module' => $this->module, 'email' => $email, 'noRegis' => $noRegis, 'salam' => $salam, 'id_izin' => $id_izin];

        $mailer->compose(['html' => 'confirmSKFinish', 'text' => 'text/' . 'confirmSKFinish'], $params)
                ->setTo($email)
                ->setCc(array('bptsp.registrasi@jakarta.go.id'))
                ->setFrom(\Yii::$app->params['adminEmail'])
                ->setSubject(\Yii::t('user', 'Welcome to {0}', \Yii::$app->name))
                ->send();
//        return $this->redirect(['index?status='. $current_action]);

        $params = [
            'pemohon' => $pemohon,
            'reg' => $noRegis
        ];
        //$this->render('_sendsms', $params);
        //header('Location: ' . $url);

        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    public function actionBerkasTolak($id, $cid) {
        $current_action = PerizinanProses::findOne(['active' => 1, 'id' => $cid])->action;
        $perizinan = Perizinan::findOne(['id' => $id]);
        $izinSiup = IzinSiup::findOne(['perizinan_id' => $perizinan->id]);
        $alasan = \backend\models\PerizinanProses::findOne(['perizinan_id' => $perizinan->id, 'pelaksana_id' => 5]);
        $pemohon = $perizinan->pemohon_id;
        $kode_registrasi = $perizinan->kode_registrasi;
        $tgl_mohon = Yii::$app->formatter->asDate($perizinan->tanggal_mohon, 'php: d F Y');
        $nama_perusahaan = $izinSiup->nama_perusahaan;
        $nama = $izinSiup->nama;
        $alamat_perusahaan = $izinSiup->alamat_perusahaan;
        $nama_izin = $perizinan->izin->nama;
        $keterangan = $alasan->keterangan;



        $now = strtotime(date("H:i:s"));
        if (($now > strtotime('03:00:00')) && ($now <= strtotime('11:00:59'))) {
            $salam = 'Pagi';
        } elseif (($now > strtotime('11:00:59')) && ($now <= strtotime('15:00:59'))) {
            $salam = 'Siang';
        } elseif (($now > strtotime('15:00:59')) && ($now <= strtotime('18:00:59'))) {
            $salam = 'Sore';
        } elseif (($now > strtotime('18:00:59')) && ($now <= strtotime('03:00:59'))) {
            $salam = 'Malam';
        }

        $email = \backend\models\User::findOne(['id' => $pemohon])->email;
        Perizinan::updateAll(['status' => 'Verifikasi Tolak'], ['id' => $id]);
        //Kirim Email
        $mailer = Yii::$app->mailer;
        $mailer->viewPath = '@dektrium/user/views/mail';
        $mailer->getView()->theme = Yii::$app->view->theme;
        $params = ['module' => $this->module, 'salam' => $salam, 'kode_registrasi' => $kode_registrasi, 'tgl_mohon' => $tgl_mohon, 'nama_perusahaan' => $nama_perusahaan, 'nama' => $nama, 'alamat_perusahaan' => $alamat_perusahaan, 'nama_izin' => $nama_izin, 'keterangan' => $keterangan];

        $mailer->compose(['html' => 'confirmSKFinishTolak', 'text' => 'text/' . 'confirmSKFinishTolak'], $params)
                ->setTo($email)
                ->setCc(array('bptsp.registrasi@jakarta.go.id'))
                ->setFrom(\Yii::$app->params['adminEmail'])
                ->setSubject(\Yii::t('user', 'Welcome to {0}', \Yii::$app->name))
                ->send();
        //return $this->redirect(['index?status='. $current_action.'-tolak']);

        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    public function actionMulai($id, $plh = NULL) {
        $current_action = PerizinanProses::findOne(['active' => 1, 'id' => $id])->action;
        $current_perizinanID = PerizinanProses::findOne(['active' => 1, 'id' => $id])->perizinan_id;
        $status = PerizinanProses::findOne(['id' => $id - 1])->status;
        $statTolak = Perizinan::findOne(['id' => $current_perizinanID])->status;

        $this->setWaktuMulai($id);

        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;

//        if($plh == NULL){
//            if($current_action=='cetak' && $status=='Tolak'){
//                return $this->redirect(['index?status=tolak']);
//            } else if($current_action == 'verifikasi' && $statTolak == 'Verifikasi Tolak' ){
//                return $this->redirect(['index?status='. $current_action.'-tolak']);
//            } else if($current_action == 'approval' && $statTolak == 'Tolak' ){
//                return $this->redirect(['approv','action'=>$current_action,'status'=>$statTolak]);
//            } else if($current_action == 'approval' && $statTolak == 'Lanjut' ){
//                return $this->redirect(['approv','action'=>$current_action,'status'=>$statTolak]);
//            } else {    
//                return $this->redirect(['index?status='. $current_action]);
//            } 
//        } else {
//            return $this->redirect(['approv-plh','action'=>$current_action,'status'=>$statTolak,'plh'=>$plh]);
//        }
    }

//    public function actionMulaiPLH($id,$plh) {
//        $current_action = PerizinanProses::findOne(['active' => 1, 'id' => $id])->action;
//        $current_perizinanID = PerizinanProses::findOne(['active' => 1, 'id' => $id])->perizinan_id;
//        $status = PerizinanProses::findOne(['id' => $id-1])->status;
//        $statTolak = Perizinan::findOne(['id' => $current_perizinanID])->status;
//        
//        $this->setWaktuMulai($id);   
//        
//        if($current_action=='cetak' && $status=='Tolak'){
//            return $this->redirect(['index?status=tolak']);
//        } else if($current_action == 'verifikasi' && $statTolak == 'Verifikasi Tolak' ){
//            return $this->redirect(['index?status='. $current_action.'-tolak']);
//        } else if($current_action == 'approval' && $statTolak == 'Tolak' ){
//            return $this->redirect(['approv','action'=>$current_action,'status'=>$statTolak]);
//        } else if($current_action == 'approval' && $statTolak == 'Lanjut' ){
//            return $this->redirect(['approv','action'=>$current_action,'status'=>$statTolak]);
//        } else {    
//            return $this->redirect(['index?status='. $current_action]);
//        }
//    }

    function setWaktuMulai($id) {
        $model = PerizinanProses::findOne($id);
        $model->mulai = date("Y-m-d H:i:s");
        $model->save(false);
    }

    public function actionCheck($id) {
        PerizinanDokumen::updateAll(['check' => 1], 'id=' . $id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUncheck($id) {
        PerizinanDokumen::updateAll(['check' => 0], 'id=' . $id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * 
     * for export pdf at actionView
     *  
     * @param type $id
     * @return type
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerIzinSiup = new ArrayDataProvider([
            'allModels' => $model->izinSiups,
        ]);
        $providerPerizinan = new ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiup' => $providerIzinSiup,
            'providerPerizinan' => $providerPerizinan,
            'providerPerizinanProses' => $providerPerizinanProses,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
     * Finds the Perizinan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perizinan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Perizinan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinSiup
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinSiup() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinSiup');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinSiup', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for Perizinan
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPerizinan() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Perizinan');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for PerizinanProses
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPerizinanProses() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PerizinanProses');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinanProses', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    public function actionConfirmPemohon() {
//        Url::remember('', 'actions-redirect');
        $searchModel = Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->searchPemohon(Yii::$app->request->get());

        return $this->render('confirm-pemohon', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    public function actionConfirm($id) {
        $this->findModelUser($id)->confirm();
        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been confirmed'));

        // return $this->redirect('/perizinan/confirm-pemohon');
        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    protected function findModelUser($id) {
        $user = User::findIdentity($id);
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }

        return $user;
    }

    public function actionPending() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchPending(Yii::$app->request->queryParams, true);

        return $this->render('index-pending', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar' => 'active',
        ]);
    }

    /**
     * Lists all Izin models.
     * @return mixed
     */
    public function actionSearch($id = NULL) {
        $model = new SearchIzin();

        if ($id != Null) {
            $model->id_user = $id;
            $typeUser = Profile::findOne(['user_id' => $id])->tipe;
            $model->tipe = $typeUser;
        } else {
            if ($model->load(Yii::$app->request->post())) {
                $action = Izin::findOne($model->izin)->action . '/create';
                return $this->redirect([$action, 'id' => $model->izin, 'user_id' => $model->id_user]);
            } else {
                return $this->render('search', ['model' => $model]);
            }
        }
    }

    public function actionUpload($id, $ref) {
//        $id = \Yii::$app->session->get('user.pid');
//        $ref = \Yii::$app->session->get('user.ref');
        $model = $this->findModel($id);

        $model->referrer_id = $ref;

        $model->save();

        //$modelPerizinanBerkas = PerizinanBerkas::findAll(['perizinan_id' => $model->id]);
        $modelPerizinanBerkas = PerizinanBerkas::find()->andWhere(['perizinan_id' => $model->id])->orderBy('urutan')->all();

        if ($modelPerizinanBerkas) {
            if (Yii::$app->request->post()) {
                $post = Yii::$app->request->post();

                foreach ($modelPerizinanBerkas as $key => $value) {

                    $user_file = PerizinanBerkas::findOne(['perizinan_id' => $value['perizinan_id']]);
                    $user_file->user_file_id = $post['user_file'][$key];
                    //   $user_file->update();

                    PerizinanBerkas::updateAll(['user_file_id' => $post['user_file'][$key]], ['id' => $value['id']]);
                }

                return $this->redirect(['preview', 'id' => $id]);
            } else {
                return $this->render('upload', [
                            'model' => $model,
                            //                        'ref' => $ref,
                            'perizinan_berkas' => $modelPerizinanBerkas,
                            'alert' => '0',
                ]);
            }
        } else {
            //return $this->redirect(['/izin-pm1/create', 'id' => $model->izin_id]);
            return $this->redirect(['preview', 'id' => $id]);
        }
    }

    public function actionUploadGagal($id, $ref) {

        $model = $this->findModel($id);

        $model->referrer_id = $ref;

        $model->save();

        $modelPerizinanBerkas = PerizinanBerkas::findAll(['perizinan_id' => $model->id]);

        if (Yii::$app->request->post()) {
            $post = Yii::$app->request->post();

            foreach ($modelPerizinanBerkas as $key => $value) {
                $user_file = PerizinanBerkas::findOne(['perizinan_id' => $value['perizinan_id']]);
                $user_file->user_file_id = $post['user_file'][$key];
                //$user_file->update();
                PerizinanBerkas::updateAll(['user_file_id' => $post['user_file'][$key]], ['id' => $value['id']]);
            }

            return $this->redirect(['preview', 'id' => $id]);
        } else {
            return $this->render('upload', [
                        'model' => $model,
                        'perizinan_berkas' => $modelPerizinanBerkas,
                        'alert' => '1',
            ]);
        }
    }

    public function actionPreview($id) {
        $model = $this->findModel($id);
        $file = $model->perizinanBerkas[0];
        //echo $model->izin->type; die();
        if ($model->izin->action == 'izin-tdg') {
            $izin = \backend\models\IzinTdg::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-pm1') {
            $izin = \backend\models\IzinPm1::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-tdp') {
            $izin = \backend\models\IzinTdp::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-skdp') {
            $izin = \backend\models\IzinSkdp::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-penelitian') {
            $izin = \backend\models\IzinPenelitian::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-kesehatan') {
            $izin = \backend\models\IzinKesehatan::findOne($model->referrer_id);
        } else {
            $izin = \backend\models\IzinSiup::findOne($model->referrer_id);
        }
        //$izin = \backend\models\IzinSiup::findOne($model->referrer_id);
        if (Yii::$app->request->post()) {
            if ($_POST['action'] == 'next') {
                return $this->redirect(['schedule', 'id' => $id]);
            } else if ($_POST['action'] == 'back') {
                return $this->redirect([$model->izin->action . '/update', 'id' => $izin->id, 'user_id' => $model->pemohon_id]);
            } else {
                return $this->redirect(['/perizinan/active']);
            }
        } else {
            return $this->render('preview', [
                        'model' => $model,
                        'izin' => $izin,
                        'file' => $file
            ]);
        }
    }

    public function actionSchedule($id) {
//        $id = \Yii::$app->session->get('user.id');
//        $ref  = 3;//\Yii::$app->session->get('user.ref');
        $model = $this->findModel($id);
//        $kuota = Kuota::getKuotaList($model->lokasi_izin_id, $model->izin->wewenang_id, '2015-10-14');
        //$model->referrer_id = $ref;

        if ($model->load(Yii::$app->request->post())) {
            $current_id = PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $id])->id;
            $current_action = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $id])->action;
            $this->setWaktuMulai($current_id);

            $dateF = date_create($model->pengambilan_tanggal);
            $model->pengambilan_tanggal = date_format($dateF, "Y-m-d");
            // Add by Panji
            $lokasi_id = $model->lokasi_izin_id;
            $wewenang_id = $model->izin->wewenang_id;
            $tanggal = $model->pengambilan_tanggal;
            $opsi_pengambilan = $model->pengambilan_sesi;

            $kuota = Kuota::getKuotaList($lokasi_id, $wewenang_id, $tanggal, $opsi_pengambilan);
            foreach ($kuota as $value) {
                $kuota_sesi_1 = $value['sesi_1_kuota'];
                $kuota_sesi_2 = $value['sesi_2_kuota'];
            }
            if ($opsi_pengambilan == 'Sesi I') {
                if ($kuota_sesi_1 < 1) {
                    $show_popup_kuota = 1;
                } else {
                    $show_popup_kuota = 0;
                }
            } else {
                if ($kuota_sesi_2 < 1) {
                    $show_popup_kuota = 1;
                } else {
                    $show_popup_kuota = 0;
                }
            }

            if ($show_popup_kuota == 0) {
                if ($model->save()) {
                    return $this->redirect([$current_action, 'id' => $current_id]);
                }
            } else {
                return $this->render('schedule', [
                            'model' => $model, 'show_popup_kuota' => $show_popup_kuota,
                ]);
            }
            // End
        } else {
            return $this->render('schedule', [
                        'model' => $model,
                            //'kuota' => $kuota,
//                'ref'=>$ref
            ]);
        }
    }

    public function actionRenderSchedule() {
        if (isset($_GET['opsi_pengambilan'])) {
            $model = $this->findModel($_GET['pid']);
            $eta = Perizinan::getETA($model->tanggal_mohon, $model->izin->durasi, $_GET['opsi_pengambilan']);

            return $this->renderAjax('_schedule', [
                        'model' => $model,
                        'eta' => date_format($eta, "d-m-Y")
            ]);
        }
    }

    public function actionKuota() {
        if (isset($_GET['tanggal'])) {
            $getTanggal = $_GET['tanggal'];
            $explodeTanggal = explode("-", $getTanggal);
            $tanggal = $explodeTanggal[2] . '-' . $explodeTanggal[1] . '-' . $explodeTanggal[0];

            $kuota = Kuota::getKuotaList($_GET['lokasi'], $_GET['wewenang'], $tanggal, $_GET['opsi_pengambilan']);
            $result = '<table class="table table-striped table-bordered">';
            $result .= '<tbody> <tr>
                            <th style="width: 10px">#</th>
                            <th>Lokasi</th>
                            <th class="text-center">Sesi I<br>' . Params::findOne("Sesi I")->value . '</th>
                            <th class="text-center">Sesi II<br>' . Params::findOne("Sesi II")->value . '</th>
                        </tr>';


            $i = 1;

            foreach ($kuota as $key => $val) {
                $result .= '<tr>';
                $result .= '<td class="text-center">' . $i++ . '</td>';
                $result .= '<td>' . $val['nama'] . '</td>';
                $kuota1 = $val['sesi_1_kuota'] - $val['sesi_1_terpakai'];
                $kuota2 = $val['sesi_2_kuota'] - $val['sesi_2_terpakai'];
                if ($kuota1 > 0) {
                    $result .= '<td class="text-center"><button type="button" class="btn btn-block btn-info btn-flat" value="' . $val['lokasi_id'] . ',Sesi I" onclick="js:select()">' . ($kuota1) . '</button></td>';
                } else {
                    $result .= '<td class="text-center">' . ($kuota1) . '</td>';
                }

                if ($kuota2 > 0) {
                    $result .= '<td class="text-center"><button type="button" class="btn btn-block btn-info btn-flat" value="' . $val['lokasi_id'] . ',Sesi II" onclick="js:select()">' . ($kuota2) . '</button></td>';
                } else {
                    $result .= '<td class="text-center">' . ($kuota2) . '</td>';
                }

                $result .= '</tr>';
            }



            $result .= '</tbody></table>';

            $result .= "<script>
                            $(document).ready(function(){
                                var all_tr = $('.btn');
                                $('td button[type=button]').on('click', function () {
                                    all_tr.removeClass('selected btn-warning');
                                    $(this).closest('.btn').addClass('selected btn-warning');

                                    console.log($(this).closest('.btn').val());
                                    var result = $(this).closest('.btn').val().split(',');
                                    //alert( result[2] );
                                    $('#perizinan-lokasi_pengambilan_id').val(result[0]);
                                    $('#perizinan-pengambilan_sesi').val(result[1]);
                                    $('#submit-btn').prop('disabled', false);
                                });
                            });
                        </script>";

            echo $result;
        }
    }

    public function actionTypeUser() {

        echo Profile::findOne(['user_id' => $_GET['userID']])->tipe;
    }

    public function actionIzinLabel() {

        echo Izin::findOne($_GET['izin'])->bidang->nama;
    }

    public function actionIzinSearch($search = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $kriteria = explode(' ', $search);
            $cari = [];
            foreach ($kriteria as $value) {
                $cari[] = 'concat(izin.alias) LIKE "%' . $value . '%"';
            }

            $cari2 = implode($cari, ' and ');
            $query = Izin::find()
                    ->where($cari2)
                    ->andWhere('status_id=' . $_GET['status'] . ' and tipe = "' . $_GET['type'] . '"')
                    ->andWhere('cek_sprtrw = "Y" and wewenang_id = "' . Yii::$app->user->identity->wewenang_id . '"')
                    ->joinWith(['bidang']);
            $query->select(['izin.id', 'concat(izin.alias) as text'])
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

    public function actionUserSearch($search = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $kriteria = explode(' ', $search);
            $cari = [];
            foreach ($kriteria as $value) {
                $cari[] = 'concat(user.username," | ",profile.name) LIKE "%' . $value . '%"';
            }

            $queryIN = \backend\models\User::find()
                ->where(['lokasi_id' => Yii::$app->user->identity->lokasi_id])
                ->select('id');
			
            $cari2 = implode($cari, ' and ');
            $query = \backend\models\User::find()
                    ->where($cari2)
                    ->andWhere('pelaksana_id is NULL or pelaksana_id = 1')
                    ->andWhere('id <> 1')
                    ->andWhere(['in','created_by',$queryIN])
                    ->joinWith(['profile'])
                    ->select(['user.id', 'CONCAT(user.username," | ",profile.name) as text']);

            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } else {
            $out['results'] = ['id' => 0, 'text' => 'Pemohon tidak ditemukan'];
        }
        echo Json::encode($out);
    }

    public function actionIzinList($status) {
        $izins = Izin::find()->where('status_id=' . $status . ' and tipe = "' . Yii::$app->user->identity->profile->tipe . '"')->orderBy('id')->asArray()->all();
        foreach ($izins as $izin) {
            echo "<option value='" . $izin['id'] . "'>" . $izin['alias'] . "</option>";
        }
    }

    //s: TDG buat cari kota

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \backend\models\Lokasi::getKecOptions($cat_id);
                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0];
                } else {
                    $selected = '';
                }
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionProd() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = \backend\models\Lokasi::getLurahOptions($cat_id, $subcat_id);
                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0];
                } else {
                    $selected = '';
                }
                echo Json::encode(['output' => $data, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionIndexSimultan($id = null, $status = null) {
        $searchModel = new PerizinanSearch();
        //die($id_child);
        $searchModel->status = $status;
        $searchModel->id_child = $id;

        $dataProvider = $searchModel->searchSimultan(Yii::$app->request->queryParams);

        return $this->render('index-simultan', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey' => 'index',
                    'status' => $status,
        ]);
    }

    public function actionApprovSimultan($id = null, $action = null, $status = null, $plh = null) {

        $searchModel = new PerizinanSearch();

        $searchModel->action = $action;
        $searchModel->status = $status;
        $searchModel->id_child = $id;

        if (!$plh) {
            $dataProvider = $searchModel->searchApproveSimultan(Yii::$app->request->queryParams);

            return $this->render('index-simultan', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'varKey' => 'approv',
                        'status' => $status,
                        'action' => $action,
            ]);
        } else {
            $lokasi = \backend\models\HistoryPlh::findOne($plh);

            $dataProvider = $searchModel->searchApprovePLHsimultan(Yii::$app->request->queryParams, $lokasi->user_lokasi);

            return $this->render('index-plh', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'varKey' => 'approv-plh',
                        'status' => $status,
                        'action' => $action,
                        'plh' => $plh,
            ]);
        }
    }

    //e: TDG
    //s: TDP

    public function actionAddIzinTdpKantorcabang() {
        return \backend\controllers\IzinTdpController::actionAddIzinTdpKantorcabang();
    }

    public function actionAddIzinTdpKegiatan() {
        return \backend\controllers\IzinTdpController::actionAddIzinTdpKegiatan();
    }

    public function actionAddIzinTdpLegal() {
        return \backend\controllers\IzinTdpController::actionAddIzinTdpLegal();
    }

    public function actionAddIzinTdpPimpinan() {
        return \backend\controllers\IzinTdpController::actionAddIzinTdpPimpinan();
    }

    public function actionAddIzinTdpSaham() {
        return \backend\controllers\IzinTdpController::actionAddIzinTdpSaham();
    }

    public function actionSk($id) {
        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');

        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        //die();
        return $this->renderAjax('_sk', ['model' => $model]);
    }

    //e: TDP
    //Khusus admin
    public function actionPrintLaporan() {
        $model = Perizinan::PrintLaporan();
        $tgl_now = gmdate("Y-m-d");
        $jam = date('H:i');
        $jml = count($model);
        $n = 0;

        while ($n < $jml) {
            $data .= '
				<tr>
				<td style="text-align: left;">' . $model[$n]['lokasi'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_daftar'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_proses'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_selesai'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_tolak'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_subtotal'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_daftar'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_proses'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_selesai'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_tolak'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_subtotal'] . '</td>
				</tr>';
            $n++;
        }

        $tmp = "
		<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table style='height: 122px; border-bottom: 2px solid black;' width='100%'>
<tbody>
<tr>
<td style='text-align: center; font-size: 20px;'><strong>LAPORAN TDP REGULER DAN SIUP - TDP SIMULTAN</strong></td>
</tr>
<tr>
<td style='text-align: center; font-size: 20px;'>PERIODE S/D <em>{tgl_now}</em></td>
</tr>
</tbody>
</table>
<br>
<table border='1' style='border-collapse: collapse; border: 1px solid black;' width='100%'>
<tbody>
<tr>
<td style='text-align: center;' width='40%' rowspan='2'>
<b>LOKASI</b>
</td>
<td style='text-align: center;' width='30%' colspan='5'>
<b>TDP</b>
</td>
<td style='text-align: center;' width='30%' colspan='5'>
<b>SIUP - TDP SIMULTAN</b>
</td>
</tr>
<tr>
<td style='text-align: center;'>
<b>Daftar</b>
</td>
<td style='text-align: center;'>
<b>Proses</b>
</td>
<td style='text-align: center;'>
<b>Selesai</b>
</td>
<td style='text-align: center;'>
<b>Tolak</b>
</td>
<td style='text-align: center;'>
<b>Total</b>
</td>
<td style='text-align: center;'>
<b>Daftar</b>
</td>
<td style='text-align: center;'>
<b>Proses</b>
</td>
<td style='text-align: center;'>
<b>Selesai</b>
</td>
<td style='text-align: center;'>
<b>Tolak</b>
</td>
<td style='text-align: center;'>
<b>Total</b>
</td>
</tr>" . $data . "
</tbody>
</table>
<br>
<ul>
<li>Laporan total dari tgl 29 Feb 2016 (launching TDP) s/d tgl pelaporan.</li>
<li>Laporan dilaporkan tiap <b>jam {jam}.</b></li>
<li>Daftar adalah total permohonan yang sudah memilih jadwal pengambilan.</li>
<li>Proses adalah total permohonan yang diproses oleh petugas.</li>
<li>Selesai adalah permohonan yang telah diterbitkan SK, status SELESAI dan BATAL.</li>
<li>Tolak adalah permohonan yang telah diterbitkan Surat Penolakannya (FO klik berkas siap).</li>
</ul>
</body>
</html>	
		";

        $tmp = str_replace('{tgl_now}', $tgl_now, $tmp);
        $content = str_replace('{jam}', $jam, $tmp);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LEGAL,
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
        ]);

        return $pdf->render();
    }

    public function actionPrintPernyataan($id) {
        $model = $this->findModel($id);

        if ($model->izin->action == 'izin-tdg') {
            $izin = \backend\models\IzinTdg::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-pm1') {
            $izin = \backend\models\IzinPm1::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-tdp') {
            $izin = \backend\models\IzinTdp::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-skdp') {
            $izin = \backend\models\IzinSkdp::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-penelitian') {
            $izin = \backend\models\IzinPenelitian::findOne($model->referrer_id);
        } elseif ($model->izin->action == 'izin-kesehatan') {
            $izin = \backend\models\IzinKesehatan::findOne($model->referrer_id);
        } else {
            $izin = \backend\models\IzinSiup::findOne($model->referrer_id);
        }

        $content = $this->renderAjax('_print-pernyataan', [
            'model' => $model,
            'izin' => $izin,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
        ]);

        return $pdf->render();
    }

//Kepala
    public function actionPrintLaporanWilayah($id) {
        $model = Perizinan::PrintLaporanWilayah($id);
        $tgl_now = gmdate("Y-m-d");
        $jam = date('H:i');
        $jml = count($model);
        $n = 0;

        while ($n < $jml) {
            $data .= '
				<tr>
				<td style="text-align: left;">' . $model[$n]['lokasi'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_daftar'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_proses'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_selesai'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_tolak'] . '</td>
				<td style="text-align: right;">' . $model[$n]['r_subtotal'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_daftar'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_proses'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_selesai'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_tolak'] . '</td>
				<td style="text-align: right;">' . $model[$n]['s_subtotal'] . '</td>
				</tr>';
            $n++;
        }

        $tmp = "
		<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table style='height: 122px; border-bottom: 2px solid black;' width='100%'>
<tbody>
<tr>
<td style='text-align: center; font-size: 20px;'><strong>LAPORAN TDP REGULER DAN SIUP - TDP SIMULTAN</strong></td>
</tr>
<tr>
<td style='text-align: center; font-size: 20px;'>PERIODE S/D <em>{tgl_now}</em></td>
</tr>
</tbody>
</table>
<br>
<table border='1' style='border-collapse: collapse; border: 1px solid black;' width='100%'>
<tbody>
<tr>
<td style='text-align: center;' width='40%' rowspan='2'>
<b>LOKASI</b>
</td>
<td style='text-align: center;' width='30%' colspan='5'>
<b>TDP</b>
</td>
<td style='text-align: center;' width='30%' colspan='5'>
<b>SIUP - TDP SIMULTAN</b>
</td>
</tr>
<tr>
<td style='text-align: center;'>
<b>Daftar</b>
</td>
<td style='text-align: center;'>
<b>Proses</b>
</td>
<td style='text-align: center;'>
<b>Selesai</b>
</td>
<td style='text-align: center;'>
<b>Tolak</b>
</td>
<td style='text-align: center;'>
<b>Total</b>
</td>
<td style='text-align: center;'>
<b>Daftar</b>
</td>
<td style='text-align: center;'>
<b>Proses</b>
</td>
<td style='text-align: center;'>
<b>Selesai</b>
</td>
<td style='text-align: center;'>
<b>Tolak</b>
</td>
<td style='text-align: center;'>
<b>Total</b>
</td>
</tr>" . $data . "
</tbody>
</table>
<br>
<ul>
<li>Laporan total dari tgl 29 Feb 2016 (launching TDP) s/d tgl pelaporan.</li>
<li>Laporan dilaporkan tiap <b>jam {jam}.</b></li>
<li>Daftar adalah total permohonan yang sudah memilih jadwal pengambilan.</li>
<li>Proses adalah total permohonan yang diproses oleh petugas.</li>
<li>Selesai adalah permohonan yang telah diterbitkan SK, status SELESAI dan BATAL.</li>
<li>Tolak adalah permohonan yang telah diterbitkan Surat Penolakannya (FO klik berkas siap).</li>
</ul>
</body>
</html>	
		";

        $tmp = str_replace('{tgl_now}', $tgl_now, $tmp);
        $content = str_replace('{jam}', $jam, $tmp);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LEGAL,
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
        ]);

        return $pdf->render();
    }

    public function actionLaporan() {

        $model = new Perizinan();
        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $id_laporan = $data['Perizinan']['id_laporan'];
            $getBlnAwal = $data['Perizinan']['bln_awal_laporan'];
            $getBlnAkhir = $data['Perizinan']['bln_akhir_laporan'];
            $blnAwal = $this->bulan($data['Perizinan']['bln_awal_laporan']);
            $blnAkhir = $this->bulan($data['Perizinan']['bln_akhir_laporan']);
            $thnAwal = $data['Perizinan']['thn_awal_laporan'];
            $thnAkhir = $data['Perizinan']['thn_akhir_laporan'];
			
			$pKesehatan = $data['Perizinan']['pilih_kesehatan'];
			
            $connection = Yii::$app->db;

            if ($id_laporan == 6) {
                $command = $connection->createCommand("CALL sp_laporan_detail_skdp(" . $getBlnAwal . "," . $thnAwal . "," . $getBlnAkhir . "," . $thnAkhir . ")");
                $result = $command->queryAll();
                $this->SKDPToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
            }elseif ($id_laporan == 7) {
                $command = $connection->createCommand("CALL sp_laporan_detail_penelitian(" . $getBlnAwal . "," . $thnAwal . "," . $getBlnAkhir . "," . $thnAkhir . ")");
                $result = $command->queryAll();				
                $this->PenelitianToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
            }elseif ($id_laporan == 8) {
                $command = $connection->createCommand("CALL sp_laporan_detail_kesehatan(".$pKesehatan."," . $getBlnAwal . "," . $thnAwal . "," . $getBlnAkhir . "," . $thnAkhir . ")");
                $result = $command->queryAll();				
                $this->KesehatanToExcel($result, $id_laporan, $pKesehatan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
            } else {

                $command = $connection->createCommand("CALL sp_laporan_siup_tdp_online(" . $id_laporan . "," . $getBlnAwal . "," . $thnAwal . "," . $getBlnAkhir . "," . $thnAkhir . ")");
                $result = $command->queryAll();
                if ($id_laporan == 1) {
                    $this->SiupToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
                } elseif ($id_laporan == 2) {
                    $this->TDPToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
                } elseif ($id_laporan == 3) {
                    $this->TDGToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
                } elseif ($id_laporan == 4 || $id_laporan == 5) {
                    $this->PMToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
                }
            }
        } else {
            return $this->render('form_laporan', ['model' => $model]);
        }
    }

    public function bulan($bulan) {
        if ($bulan == 1) {
            $bln = "Januari";
        } elseif ($bulan == 2) {
            $bln = "Februari";
        } elseif ($bulan == 3) {
            $bln = "Maret";
        } elseif ($bulan == 4) {
            $bln = "April";
        } elseif ($bulan == 5) {
            $bln = "Mei";
        } elseif ($bulan == 6) {
            $bln = "Juni";
        } elseif ($bulan == 7) {
            $bln = "Juli";
        } elseif ($bulan == 8) {
            $bln = "Agustus";
        } elseif ($bulan == 9) {
            $bln = "September";
        } elseif ($bulan == 10) {
            $bln = "Oktober";
        } elseif ($bulan == 11) {
            $bln = "November";
        } elseif ($bulan == 12) {
            $bln = "Desember";
        }

        return $bln;
    }

    public function SiupToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $title_file = "LAPORAN_SIUP_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN SIUP ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
				->setCellValue('B4', 'NO REGISTRASI SIMULTAN')
                ->setCellValue('C4', 'NAMA IZIN')
                ->setCellValue('D4', 'JENIS IZIN')
                ->setCellValue('E4', 'NO SK')
                ->setCellValue('F4', 'TANGGAL SK')
                ->setCellValue('G4', 'MASA BERLAKU SK')
                ->setCellValue('H4', 'NPWP')
                ->setCellValue('I4', 'NAMA PERUSAHAAN/PERORANGAN')
                ->setCellValue('J4', 'NAMA PENANGGUNG JAWAB')
                ->setCellValue('K4', 'JABATAN')
                ->setCellValue('L4', 'ALAMAT PERUSAHAAN')
                ->setCellValue('M4', 'BENTUK PERUSAHAAN')
                ->setCellValue('N4', 'NO TLP PERUSAHAAN')
                ->setCellValue('O4', 'NO. FAX')
                ->setCellValue('P4', 'NILAI KEKAYAAN BERSIH')
                ->setCellValue('Q4', 'KELEMBAGAAN')
                ->setCellValue('R4', 'KBLI 1')
                ->setCellValue('S4', 'KBLI 2')
                ->setCellValue('T4', 'KBLI 3')
                ->setCellValue('U4', 'KBLI 4')
                ->setCellValue('V4', 'KBLI 5')
                ->setCellValue('W4', 'STATUS PERUSAHAAN')
                ->setCellValue('X4', 'ZONASI')
                ->setCellValue('Y4', 'MODAL DISETOR')
                ->setCellValue('Z4', 'INVESTASI')
                ->setCellValue('AA4', 'PERALATAN DLM MESIN')
                ->setCellValue('AB4', 'KEWENANGAN')
                ->setCellValue('AC4', 'STATUS');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['noreg_simultan']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['jenis_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['npwp']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['perusahaan_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['pimpinan_penanggung_jawab']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['pimpinan_jabatan']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['perusahaan_alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['bentuk_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['perusahaan_telepon']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['perusahaan_fax']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['perusahaan_kekayaan_bersih']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['kelembagaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['kbli1']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['kbli2']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $data['kbli3']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $data['kbli4']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $data['kbli5']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $data['status_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $data['zonasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $data['modal']);
            $objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $data['aktiva_tetap_investasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $data['aktiva_tetap_peralatan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function TDPToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $title_file = "LAPORAN_TDP_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN TDP ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
				->setCellValue('B4', 'NO REGISTRASI SIMULTAN')
                ->setCellValue('C4', 'NAMA IZIN')
                ->setCellValue('D4', 'JENIS IZIN')
                ->setCellValue('E4', 'NO SK')
                ->setCellValue('F4', 'TANGGAL SK')
                ->setCellValue('G4', 'MASA BERLAKU SK')
                ->setCellValue('H4', 'NO TDP')
                ->setCellValue('I4', 'PERPANJANG KE')
                ->setCellValue('J4', 'NPWP')
                ->setCellValue('K4', 'NAMA PERUSAHAAN/PERORANGAN')
                ->setCellValue('L4', 'NAMA PENANGGUNG JAWAB')
                ->setCellValue('M4', 'ALAMAT PERUSAHAAN')
                ->setCellValue('N4', 'STATUS')
                ->setCellValue('O4', 'KBLI')
                ->setCellValue('P4', 'NO TELEPON PERUSAHAAN')
                ->setCellValue('Q4', 'NO FAX PERUSAHAAN')
                ->setCellValue('R4', 'KEWENANGAN')
                ->setCellValue('S4', 'STATUS IZIN');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['noreg_simultan']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['jenis_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['notdp']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['perpanjangan_ke']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['npwp']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['perusahaan_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['pimpinan_penanggung_jawab']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['perusahaan_alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['status_prsh']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['kbli']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['perusahaan_telepon']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['perusahaan_fax']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function TDGToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $title_file = "LAPORAN_TDG_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN TDG ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'NAMA IZIN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'MASA BERLAKU SK')
                ->setCellValue('F4', 'NAMA PEMILIK/PENANGGUNG JAWAB')
                ->setCellValue('G4', 'NIK')
                ->setCellValue('H4', 'ALAMAT PEMILIK/PENANGGUNG JAWAB')
                ->setCellValue('I4', 'TELEPON, FAX, EMAIL')
                ->setCellValue('J4', 'ALAMAT GUDANG')
                ->setCellValue('K4', 'LATITUDE')
				->setCellValue('L4', 'LONGITUDE')
				->setCellValue('M4', 'TITIK KOORDINAT')
                ->setCellValue('N4', 'TELEPON, FAX, EMAIL')
                ->setCellValue('O4', 'LUAS DAN KAPASITAS GUDANG')
                ->setCellValue('P4', 'GOLONGAN GUDANG')
                ->setCellValue('Q4', 'KEWENANGAN')
                ->setCellValue('R4', 'STATUS');

        $row = 5;
        foreach ($result as $data) {
			
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['pemilik_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['pemilik_nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['pemilik_alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['pemilik_tfe']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['gudang_alamat']);
			$objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['latitude']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['longitude']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['koordinat']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['gudang_tfe']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['luaskapasitas']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['golongan_gudang']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function PMToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        if ($id_laporan == 4) {
            $sub_title = "SKCK";
        } else {
            $sub_title = "SKTM";
        }

        $title_file = "LAPORAN_PM1_" . $sub_title . "_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN PM1 ' . $sub_title . ' ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'NAMA IZIN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'MASA BERLAKU SK')
                ->setCellValue('F4', 'NAMA PEMOHON')
                ->setCellValue('G4', 'NIK')
                ->setCellValue('H4', 'ALAMAT PEMOHON')
                ->setCellValue('I4', 'PEKERJAAN')
                ->setCellValue('J4', 'SKCK PADA')
                ->setCellValue('K4', 'KEPERLUAN')
                ->setCellValue('L4', 'KEWENANGAN')
                ->setCellValue('M4', 'STATUS');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_non_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['nama_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['alamat_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['pekerjaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['skck_pada']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['keperluan']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function SKDPToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        if ($id_laporan == 6) {
            $sub_title = "SKDU";
        }

        $title_file = "LAPORAN_" . $sub_title . "_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN ' . $sub_title . ' ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'JENIS SURAT KETERANGAN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'MASA BERLAKU SK')
                ->setCellValue('F4', 'NAMA')
                ->setCellValue('G4', 'NIK')
                ->setCellValue('H4', 'PASSPORT')
                ->setCellValue('I4', 'KEWARGA NEGARAAN')
                ->setCellValue('J4', 'ALAMAT')
                ->setCellValue('K4', 'NAMA PERUSAHAAN/ ORGANISASI/ YAYASAN')
                ->setCellValue('L4', 'NPWP')
                ->setCellValue('M4', 'KLASIFIKASI USAHA')
                ->setCellValue('N4', 'ALAMAT PERUSAHAAN/ ORGANISASI/ YAYASAN')
                ->setCellValue('O4', 'NO. TELP')
                ->setCellValue('P4', 'JUMLAH KARYAWAN')
                ->setCellValue('Q4', 'STATUS KEPEMILIKAN BANGUNAN')
                ->setCellValue('R4', 'STATUS KANTOR')
				->setCellValue('S4', 'LATITUDE')
				->setCellValue('T4', 'LONGITUDE')
                ->setCellValue('U4', 'KOORDINAT')
                ->setCellValue('V4', 'ZONASI')
                ->setCellValue('W4', 'AKTA PENDIRIAN NAMA NOTARIS')
                ->setCellValue('X4', 'AKTA PERUBAHAN NO & TGL AKTA')
                ->setCellValue('Y4', 'AKTA PERUBAHAN NO & TGL SK PENGESAHAN')
                ->setCellValue('Z4', 'AKTA PENDIRIAN NAMA NOTARIS')
                ->setCellValue('AA4', 'AKTA PERUBAHAN NO & TGL AKTA')
                ->setCellValue('AB4', 'AKTA PERUBAHAN NO & TGL SK PENGESAHAN')
                ->setCellValue('AC4', 'KEWENANGAN')
                ->setCellValue('AD4', 'STATUS');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['nama_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['passport']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['kewarganegaraan']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['alamat_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['nama_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['npwp_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['klasifikasi_usaha']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['alamat_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['telpon_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['jumlah_karyawan']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['status_kepemilikan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['status_kantor']);
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['latitude']);
			$objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $data['longitude']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $data['koordinat']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $data['zonasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $data['notaris_pendirian']);
            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $data['notgl_pendirian']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $data['pengesahaan_pendirian']);
            $objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $data['notaris_perubahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $data['notgl_perubahan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $data['pengesahaan_perubahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
	public function PenelitianToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $sub_title = "PENELITIAN";
        $title_file = "LAPORAN_" . $sub_title . "_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN ' . $sub_title . ' ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'NAMA IZIN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'MASA BERLAKU SK')
                ->setCellValue('F4', 'NAMA')
                ->setCellValue('G4', 'NIK')
                ->setCellValue('H4', 'ALAMAT')
                ->setCellValue('I4', 'PEKERJAAN')
                ->setCellValue('J4', 'NAMA INSTANSI')
                ->setCellValue('K4', 'JUDUL PENELITIAN')
                ->setCellValue('L4', 'LOKASI PENELITIAN')
                ->setCellValue('M4', 'BIDANG PENELITIAN')
                ->setCellValue('N4', 'TANGGAL MULAI')
                ->setCellValue('O4', 'TANGGAL SELESAI')
                ->setCellValue('P4', 'INSTANSI PENELITIAN')
                ->setCellValue('Q4', 'KEWENANGAN')
                ->setCellValue('R4', 'STATUS IZIN');

        $row = 5;
        foreach ($result as $data) {
			
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['nama_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['alamat_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['pekerjaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['nama_instansi']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['judul_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['lokasi_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['bidang_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['tgl_mulai']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['tgl_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['instansi_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['kewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
	public function KesehatanToExcel($result, $id_laporan, $pKesehatan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();
		
		if($pKesehatan=="1"){
			$wewenang='DOKTER_UMUM';
		}elseif($pKesehatan=="2"){
			$wewenang='DOKTER_GIGI';
		}elseif($pKesehatan=="3"){
			$wewenang='PERAWAT';
		}elseif($pKesehatan=="4"){
			$wewenang='PERAWAT_GIGI';
		}elseif($pKesehatan=="5"){
			$wewenang='BIDAN';
		}
		
        $sub_title = "KESEHATAN";
        $title_file = "LAPORAN_" . $sub_title . "_ONLINE_".$wewenang;

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN ' . $sub_title . ' ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'NAMA IZIN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'NAMA PEMOHON')
                ->setCellValue('F4', 'NIK')
                ->setCellValue('G4', 'ALAMAT PEMOHON')
                ->setCellValue('H4', 'KEWARGA NEGARAAN')
                ->setCellValue('I4', 'KITAS')
                ->setCellValue('J4', 'STR')
                ->setCellValue('K4', 'TANGGAL BERLAKU STR')
                ->setCellValue('L4', 'NPWP TEMPAT PRAKTIK')
                ->setCellValue('M4', 'NAMA TEMPAT PRAKTIK')
                ->setCellValue('N4', 'ALAMAT TEMPAT PERAKTIK')
				->setCellValue('O4', 'LATITUDE')
				->setCellValue('P4', 'LONGITUDE')
                ->setCellValue('Q4', 'KOORDINAT')
                ->setCellValue('R4', 'JADWAL PRAKTIK')
                ->setCellValue('S4', 'JADWAL PRAKTIK 2')
                ->setCellValue('T4', 'JADWAL PRAKTIK 3')
                ->setCellValue('U4', 'KEWENANGAN')
                ->setCellValue('V4', 'STATUS IZIN');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['nama_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['alamat_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['kewarganegaraan']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['kitas']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['STR']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['tanggal_berlaku_STR']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['npwp_tempat_praktik']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['nama_tempat_praktik']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['alamat_tempat_praktik']);
			$objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['latitude']);
			$objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['longitude']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['koordinat']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['jadwal_praktik']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['jadwal_praktik_2']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $data['jadwal_praktik_3']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $data['kewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $data['status_izin']);

            $row++;
        }

        //header('Content-Type: application/vnd.ms-excel');
		header("Content-type: application/vnd.ms-excel; charset=UTF-8; encoding=UTF-8");
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    // Add by Panji    
    public function actionSummary() {
        $model = new Perizinan();
        if (Yii::$app->request->post()) {
            $params = $_POST['Perizinan']['params'];
            $data = Yii::$app->db->createCommand("CALL sp_laporan_progres(" . $params . ")")->queryAll();
	
            if ($params == 1) {
                $this->summaryToExcelKantor($data);
            }elseif ($params == 2) {
                $this->summaryToExcelKecamatan($data);
            } else if ($params == 3) {
                $this->summaryToExcelKelurahan($data);
            } else { 
				$this->summaryToExcelBadan($data);
            }
        } else {
            return $this->render('form_summary', ['model' => $model]);
        }
    }

	public function summaryToExcelBadan($data) {
		
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Badan";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kantor')
                ->setCellValue('A1', 'LAPORAN PERIZINAN ONLINE(Badan)')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C4', 'PENELITIAN')->mergeCells('C4:I4')
                ->setCellValue('C5', 'Masuk')
                ->setCellValue('D5', 'Daftar')
				->setCellValue('E5', 'Daftar ETA')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal');

        $row = 6;
        foreach ($data as $newData) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['penelitian_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['penelitian_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['penelitian_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['penelitian_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['penelitian_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['penelitian_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['penelitian_batal']);
			
            $row++;
        }
		
		header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
		
	}
	
    public function summaryToExcelKantor($data) {
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Kantor";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kantor')
                ->setCellValue('A1', 'LAPORAN PERIZINAN ONLINE(KANTOR PTSP)')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C4', 'SIUP BESAR REGULER')->mergeCells('C4:I4')
                ->setCellValue('C5', 'Masuk')
				->setCellValue('D5', 'Daftar ETA')
                ->setCellValue('E5', 'Daftar')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal')
                ->setCellValue('J4', 'SIUP MENENGAH REGULER')->mergeCells('J4:P4')
                ->setCellValue('J5', 'Masuk')
                ->setCellValue('K5', 'Daftar')
				->setCellValue('L5', 'Daftar ETA')
                ->setCellValue('M5', 'Proses')
                ->setCellValue('N5', 'Selesai')
                ->setCellValue('O5', 'Tolak')
                ->setCellValue('P5', 'Batal')
                ->setCellValue('Q4', 'TDP REGULER')->mergeCells('Q4:W4')
                ->setCellValue('Q5', 'Masuk')
                ->setCellValue('R5', 'Daftar')
				->setCellValue('S5', 'Daftar ETA')
                ->setCellValue('T5', 'Proses')
                ->setCellValue('U5', 'Selesai')
                ->setCellValue('V5', 'Tolak')
                ->setCellValue('W5', 'Batal')
                ->setCellValue('X4', 'SIUP-TDP SIMULTAN')->mergeCells('X4:AD4')
                ->setCellValue('X5', 'Masuk')
                ->setCellValue('Y5', 'Daftar')
				->setCellValue('Z5', 'Daftar ETA')
                ->setCellValue('AA5', 'Proses')
                ->setCellValue('AB5', 'Selesai')
                ->setCellValue('AC5', 'Tolak')
                ->setCellValue('AD5', 'Batal')
                ->setCellValue('AE4', 'TDG')->mergeCells('AE4:AK4')
                ->setCellValue('AE5', 'Masuk')
                ->setCellValue('AF5', 'Daftar')
				->setCellValue('AG5', 'Daftar ETA')
                ->setCellValue('AH5', 'Proses')
                ->setCellValue('AI5', 'Selesai')
                ->setCellValue('AJ5', 'Tolak')
                ->setCellValue('AK5', 'Batal')
				->setCellValue('AL4', 'PENELITIAN')->mergeCells('AL4:AR4')
                ->setCellValue('AL5', 'Masuk')
                ->setCellValue('AM5', 'Daftar')
				->setCellValue('AN5', 'Daftar ETA')
                ->setCellValue('AO5', 'Proses')
                ->setCellValue('AP5', 'Selesai')
                ->setCellValue('AQ5', 'Tolak')
                ->setCellValue('AR5', 'Batal');

        $row = 6;
        foreach ($data as $newData) {
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['siup_besar_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['siup_besar_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['siup_besar_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['siup_besar_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['siup_besar_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['siup_besar_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['siup_besar_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $newData['siup_menengah_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $newData['siup_menengah_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $newData['siup_menengah_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $newData['siup_menengah_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $newData['siup_menengah_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $newData['siup_menengah_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $newData['siup_menengah_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $newData['tdp_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $newData['tdp_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $newData['tdp_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $newData['tdp_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $newData['tdp_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $newData['tdp_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $newData['tdp_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $newData['simultan_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $newData['simultan_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $newData['simultan_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $newData['simultan_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $newData['simultan_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $newData['simultan_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $newData['simultan_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, $newData['tdg_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, $newData['tdg_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, $newData['tdg_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, $newData['tdg_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, $newData['tdg_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, $newData['tdg_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AK' . $row, $newData['tdg_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AL' . $row, $newData['penelitian_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('AM' . $row, $newData['penelitian_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('AN' . $row, $newData['penelitian_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AO' . $row, $newData['penelitian_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AP' . $row, $newData['penelitian_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AQ' . $row, $newData['penelitian_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AR' . $row, $newData['penelitian_batal']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function summaryToExcelKecamatan($data) {
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Kecamatan";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kecamatan')
                ->setCellValue('A1', 'LAPORAN PERIZINAN ONLINE(Kecamatan)')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
                ->setCellValue('C4', 'SIUP')->mergeCells('C4:I4')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C5', 'Masuk')
                ->setCellValue('D5', 'Daftar')
				->setCellValue('E5', 'Daftar ETA')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal')
				
				->setCellValue('J4', 'TDP')->mergeCells('J4:Q4')
                ->setCellValue('K5', 'Masuk')
                ->setCellValue('L5', 'Daftar')
				->setCellValue('M5', 'Daftar ETA')
                ->setCellValue('N5', 'Proses')
                ->setCellValue('O5', 'Selesai')
                ->setCellValue('P5', 'Tolak')
                ->setCellValue('Q5', 'Batal')
				
				->setCellValue('R4', 'SIMULTAN')->mergeCells('R4:Y4')
                ->setCellValue('S5', 'Masuk')
                ->setCellValue('T5', 'Daftar')
				->setCellValue('U5', 'Daftar ETA')
                ->setCellValue('V5', 'Proses')
                ->setCellValue('W5', 'Selesai')
                ->setCellValue('X5', 'Tolak')
                ->setCellValue('Y5', 'Batal')
				
				
				->setCellValue('Z4', 'TDG')->mergeCells('Z4:Z4')
                ->setCellValue('AA5', 'Masuk')
                ->setCellValue('AB5', 'Daftar')
				->setCellValue('AC5', 'Daftar ETA')
                ->setCellValue('AD5', 'Proses')
                ->setCellValue('AE5', 'Selesai')
                ->setCellValue('AF5', 'Tolak')
                ->setCellValue('AG5', 'Batal')
				
				->setCellValue('AH4', 'KESEHATAN')->mergeCells('AH4:AO4')
                ->setCellValue('AI5', 'Masuk')
                ->setCellValue('AJ5', 'Daftar')
				->setCellValue('AK5', 'Daftar ETA')
                ->setCellValue('AL5', 'Proses')
                ->setCellValue('AM5', 'Selesai')
                ->setCellValue('AN5', 'Tolak')
                ->setCellValue('AO5', 'Batal');

        $row = 6;
        foreach ($data as $newData) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['siup_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['siup_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['siup_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['siup_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['siup_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['siup_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['siup_batal']);
			
			
			$objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $newData['tdp_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $newData['tdp_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $newData['tdp_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $newData['tdp_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $newData['tdp_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $newData['tdp_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $newData['tdp_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $newData['simultan_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $newData['simultan_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $newData['simultan_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $newData['simultan_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $newData['simultan_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $newData['simultan_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $newData['simultan_batal']);
			
			
			$objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $newData['tdg_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $newData['tdg_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $newData['tdg_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $newData['tdg_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $newData['tdg_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $newData['tdg_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, $newData['tdg_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, $newData['kesehatan_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, $newData['kesehatan_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, $newData['kesehatan_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, $newData['kesehatan_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, $newData['kesehatan_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AK' . $row, $newData['kesehatan_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AL' . $row, $newData['kesehatan_batal']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function summaryToExcelKelurahan($data) {
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Kelurahan";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kelurahan')
                ->setCellValue('A1', 'LAPORAN PM1')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C4', 'SKTM')->mergeCells('C4:I4')
                ->setCellValue('C5', 'Masuk')
                ->setCellValue('D5', 'Daftar')
				->setCellValue('E5', 'Daftar ETA')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal')
                ->setCellValue('J4', 'SKCK')->mergeCells('J4:P4')
                ->setCellValue('J5', 'Masuk')
                ->setCellValue('K5', 'Daftar')
				->setCellValue('L5', 'Daftar ETA')
                ->setCellValue('M5', 'Proses')
                ->setCellValue('N5', 'Selesai')
                ->setCellValue('O5', 'Tolak')
                ->setCellValue('P5', 'Batal')
                ->setCellValue('Q4', 'SKDP')->mergeCells('Q4:W4')
                ->setCellValue('Q5', 'Masuk')
                ->setCellValue('R5', 'Daftar')
				->setCellValue('S5', 'Daftar ETA')
                ->setCellValue('T5', 'Proses')
                ->setCellValue('U5', 'Selesai')
                ->setCellValue('V5', 'Tolak')
                ->setCellValue('W5', 'Batal')
				->setCellValue('X4', 'KESEHATAN')->mergeCells('X4:AD4')
                ->setCellValue('X5', 'Masuk')
                ->setCellValue('Y5', 'Daftar')
				->setCellValue('Z5', 'Daftar ETA')
                ->setCellValue('AA5', 'Proses')
                ->setCellValue('AB5', 'Selesai')
                ->setCellValue('AC5', 'Tolak')
                ->setCellValue('AD5', 'Batal');

        $row = 6;
        foreach ($data as $newData) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
			
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['sktm_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['sktm_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['sktm_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['sktm_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['sktm_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['sktm_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['sktm_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $newData['skck_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $newData['skck_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $newData['skck_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $newData['skck_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $newData['skck_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $newData['skck_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $newData['skck_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $newData['skdp_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $newData['skdp_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $newData['skdp_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $newData['skdp_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $newData['skdp_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $newData['skdp_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $newData['skdp_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $newData['kesehatan_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $newData['kesehatan_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $newData['kesehatan_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $newData['kesehatan_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $newData['kesehatan_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $newData['kesehatan_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $newData['kesehatan_batal']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function actionPencabutan() {
        $searchModel = new PerizinanSearch();
        $searchModel->status = 'Selesai';

        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')) {
            $dataProvider = $searchModel->searchAdmin(Yii::$app->request->get());
            return $this->render('indexAdmin', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
        } else {
            $connection = \Yii::$app->db;
            $query = $connection->createCommand("select id from history_plh hp
                where user_id = :pid 
                AND (CURDATE() between hp.tanggal_mulai and hp.tanggal_akhir)
                AND hp.`status` = 'Y'"
            );
            $query->bindValue(':pid', Yii::$app->user->identity->id);
            $result = $query->queryAll();

            foreach ($result as $key) {
                $plh = $key['id'];
            }
            $dataProvider = $searchModel->searchAktif(Yii::$app->request->queryParams, $plh);

            return $this->render('index-pencabutan', [
                        'searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'varKey' => 'index', 'status' => $status,
            ]);
        }
    }
    
    public function actionPencabutanList() {
        $searchModel = new PerizinanSearch();
        $searchModel->status = 'Selesai';

        if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster')) {
            $dataProvider = $searchModel->searchAdmin(Yii::$app->request->get());
            return $this->render('indexAdmin', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
        } else {
            
            $dataProvider = $searchModel->searchPencabutanAktif(Yii::$app->request->queryParams);

            return $this->render('create-pencabutan', [
                        'searchModel' => $searchModel, 'dataProvider' => $dataProvider, 'varKey' => 'index', 'status' => $status,
            ]);
        }
    }
	
	// End
	
	//Untuk izin di admin
	public function actionManageIzin(){
		$model = new Perizinan();
		
		if ($model->load(Yii::$app->request->post())) {			
			return $this->redirect(['search-manage-izin', 'id' => $model->kode_registrasi]);
		}else{		
			return $this->render('/manage-izin/index', ['model' => $model,'alert'=>'0']);
		}
	}
	
	public function actionManageIzinAlert(){
		$model = new Perizinan();
		
		if ($model->load(Yii::$app->request->post())) {			
			return $this->redirect(['search-manage-izin', 'id' => $model->kode_registrasi]);
		}else{		
			return $this->render('/manage-izin/index', ['model' => $model,'alert'=>'1']);
		}
	}
	
	public function actionSearchManageIzin($id){
		$model = new Perizinan();
		$model2 = Perizinan::find()->where(['kode_registrasi' => $id])->one();
        $model = PerizinanProses::find()->where(['perizinan_id' => $model2->id])->one();
		if($model->id){
			return $this->redirect(['form-manage-izin', 'id' => $model->id]);
		}else{
			return $this->redirect(['manage-izin-alert']);
		}
	}
	
	public function actionFormManageIzin($id){	
        $model = PerizinanProses::findOne($id);
		$model3 = Izin::find()->where(['id' => $model->perizinan_id])->one();
		$nm_judul_izin = $model3->nama; 		
		return $this->render('/manage-izin/form_manage_izin', ['model' => $model, 'nm_judul_izin' => $nm_judul_izin]);
	}
        
        public function actionVerifikasiqr(){
            if (Yii::$app->request->isAjax) {
                $post_data = Yii::$app->request->post();
            }
            
            $data = (new \yii\db\Query())
                ->select('id, perizinan_id, sign1, sign2, sign3, sign4, sign5')
                ->from('perizinan_signature')
                ->where('perizinan_id ='.$post_data['perizinan_id'])
                ->one();
            
            if($data){
                if(Yii::$app->user->identity->pelaksana_id == '5'){
                    if($data['sign3'] == '1'){
                        echo 'success';
                    } else if($data['sign3'] == '0'){
                        echo 'fail';
                    } else {
                        echo 'process';
                    }
                } else if(Yii::$app->user->identity->pelaksana_id == '15'){
                    if($data['sign2'] == '1'){
                        echo 'success';
                    } else if($data['sign2'] == '0'){
                        echo 'fail';
                    } else {
                        echo 'process';
                    }
                } else {
                    if($data['sign1'] == '1'){
                        echo 'success';
                    } else if($data['sign1'] == '0'){
                        echo 'fail';
                    } else {
                        echo 'process';
                    }
                }
            } else {
               echo 'process';
            }
        }

}
