<?php

namespace frontend\controllers;

use Yii;
use backend\models\Perizinan;
use backend\models\IzinPenelitian;
use frontend\models\IzinPenelitianSearch;
use backend\models\Izin;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Lokasi;
use yii\helpers\Json;

/**
 * IzinPenelitianController implements the CRUD actions for IzinPenelitian model.
 */
class IzinPenelitianController extends Controller {

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

    /**
     * Lists all IzinPenelitian models.
     * @return mixed
     */
    public function actionIndex() {
        if(Yii::$app->user->identity->pelaksana_id == null || Yii::$app->user->identity->pelaksana_id == 1){
            return $this->redirect(['/perizinan/dashboard']);
        } else {
            return $this->redirect(['/admin/perizinan/dashboard']);
        }
        /* $searchModel = new IzinPenelitianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]); */
    }

    /**
     * Displays a single IzinPenelitian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerAnggotaPenelitian = new \yii\data\ArrayDataProvider([
            'allModels' => $model->anggotaPenelitians,
        ]);
        $providerIzinPenelitianLokasi = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPenelitianLokasis,
        ]);
        $providerIzinPenelitianMetode = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPenelitianMetodes,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerAnggotaPenelitian' => $providerAnggotaPenelitian,
                    'providerIzinPenelitianLokasi' => $providerIzinPenelitianLokasi,
                    'providerIzinPenelitianMetode' => $providerIzinPenelitianMetode,
        ]);
    }

    /**
     * Creates a new IzinPenelitian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $type_profile = Yii::$app->user->identity->profile->tipe;
        $model = new IzinPenelitian();
        $izin = Izin::findOne($id);
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;
        $model->anggota = 1;
//           $model->perizinan->tanggal_expired = $model->tgl_akhir_penelitian;
        if ($type_profile == "Perusahaan") {
            $model->npwp = Yii::$app->user->identity->username;
            $model->nama_instansi = Yii::$app->user->identity->profile->name;
            $model->email_instansi = Yii::$app->user->identity->email;
        } elseif ($type_profile == "Perorangan") {
            if (Yii::$app->user->identity->status == 'DKI') {
                $arrAlamat = explode(" RW ", Yii::$app->user->identity->profile->alamat);
                $RW = $arrAlamat[1];
                $arrAlamat = explode(" RT ", $arrAlamat[0]);
                $RT = $arrAlamat[1];
                $model->alamat_pemohon = $arrAlamat[0];
                $model->rw = $RW;
                $model->rt = $RT;
                $model->provinsi_pemohon = Yii::$app->user->identity->kdprop;
                $model->kabupaten_pemohon = Yii::$app->user->identity->kdwil;
                $model->kecamatan_pemohon = Yii::$app->user->identity->kdkec;
                $model->kelurahan_pemohon = Yii::$app->user->identity->kdkel;
            }

            $model->nik = Yii::$app->user->identity->username;
            $model->nama = Yii::$app->user->identity->profile->name;
            $model->tempat_lahir = Yii::$app->user->identity->profile->tempat_lahir;
            $model->tanggal_lahir = Yii::$app->user->identity->profile->tgl_lahir;
            $model->alamat_pemohon = Yii::$app->user->identity->profile->alamat;
            $model->email = Yii::$app->user->identity->email;
        }
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
                //$perizinan = Perizinan::findOne(['id' => $model->perizinan_id]);
                //$perizinan->tanggal_expired = date($model->tgl_akhir_penelitian);
                //$perizinan->save();
                Perizinan::updateAll(['tanggal_expired' => $model->tgl_akhir_penelitian], ['id' => $model->perizinan_id]);
                
            if ($type_profile == "Perorangan") {
                $member = new \backend\models\AnggotaPenelitian();
                $member->penelitian_id = $model->id;
                $member->nama_peneliti = $model->nama;
                $member->nik_peneliti = $model->user_id;

                $member->save();
            }
            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

        //Wajib di copy dan di custome untuk izin lain
    public function actionPerpanjangan($id, $sumber) {
        $perizinan = Perizinan::findOne($sumber);
        $model = $this->findModel($perizinan->referrer_id);
        $izin = Izin::findOne($id);
        $model->isNewRecord = true;
        $parent_id = $model->id;
        $model->id = null;
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;

        $perizinan_id = $model->perizinan_id;
        //$parent_id = $model->id_izin_parent;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $lokasiMaster = \backend\models\IzinPenelitianLokasi::findAll(['penelitian_id' => $parent_id]);
            foreach ($lokasiMaster as $data) {
                $lokasi = new IzinKesehatanJadwal;
                $lokasi->penelitian_id = $model->id;
                $lokasi->kota_id = $data->kota_id;
                $lokasi->kecamatan_id = $data->kecamatan_id;
                $lokasi->kelurahan_id = $data->kelurahan_id;
                $lokasi->save();
            }
            $metodeMaster = \backend\models\IzinPenelitianMetode::findAll(['penelitian_id' => $parent_id]);
            foreach ($metodeMaster as $data) {
                $metode = new IzinKesehatanJadwal;
                $metode->penelitian_id = $model->id;
                $metode->metode_id = $data->metode_id;
                $lokasi->save();
            }
//end costume
            Perizinan::updateAll(['relasi_id' => $perizinan_id], ['id' => $model->perizinan_id]);

            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            return $this->render('create-jangbut', [
                        'model' => $model,
            ]);
        }
    }

    public function actionPencabutan($id, $sumber) {
        $perizinan = Perizinan::findOne($sumber);
        $model = $this->findModel($perizinan->referrer_id);
        $izin = Izin::findOne($id);
        $model->isNewRecord = true;
        $parent_id = $model->id;
        $model->id = null;
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;

        $perizinan_id = $model->perizinan_id;
        //$parent_id = $model->id_izin_parent;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $lokasiMaster = \backend\models\IzinPenelitianLokasi::findAll(['penelitian_id' => $parent_id]);
            foreach ($lokasiMaster as $data) {
                $lokasi = new IzinKesehatanJadwal;
                $lokasi->penelitian_id = $model->id;
                $lokasi->kota_id = $data->kota_id;
                $lokasi->kecamatan_id = $data->kecamatan_id;
                $lokasi->kelurahan_id = $data->kelurahan_id;
                $lokasi->save();
            }
            $metodeMaster = \backend\models\IzinPenelitianMetode::findAll(['penelitian_id' => $parent_id]);
            foreach ($metodeMaster as $data) {
                $metode = new IzinKesehatanJadwal;
                $metode->penelitian_id = $model->id;
                $metode->metode_id = $data->metode_id;
                $metode->save();
            }
//end costume
            Perizinan::updateAll(['relasi_id' => $perizinan_id], ['id' => $model->perizinan_id]);

            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            return $this->render('create-jangbut', [
                        'model' => $model,
            ]);
        }
    }

//Sampai di sini
    
    /**
     * Updates an existing IzinPenelitian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $type_profile = Yii::$app->user->identity->profile->tipe;
        $model = $this->findModel($id);
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
//            die(print_r($model));
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            //Wajib di copy jika buat ijin baru
            $kodeIzin = 0;
            if (substr_count($model->izin->kode, ".") == 2) {
                $kodeArr = explode(".",$model->izin->kode);
                $kodeIzin = $kodeArr[2];
            }
            
            if($model->perizinan->relasi_id){
                if($kodeIzin == 1 || $kodeIzin == 8){
                    return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
                }
            }
            //Sampai sini
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinPenelitian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IzinPenelitian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinPenelitian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = IzinPenelitian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSubkot() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kot_id = $parents[0];
                $out = \backend\models\Lokasi::getAllKotOptions($kot_id);
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

    public function actionSubkec() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = \backend\models\Lokasi::getAllKecOptions($cat_id, $subcat_id);
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

    public function actionSubkel() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $prov_id = empty($ids[0]) ? null : $ids[0];
            $subkot_id = empty($ids[1]) ? null : $ids[1];
            $subkec_id = empty($ids[2]) ? null : $ids[2];
            if ($prov_id != null) {
                $data = \backend\models\Lokasi::getAllKelOptions($prov_id, $subkot_id, $subkec_id);
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

    /**
     * Action to load a tabular form grid
     * for AnggotaPenelitian
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddAnggotaPenelitian() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('AnggotaPenelitian');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formAnggotaPenelitian', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinPenelitianLokasi
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinPenelitianLokasi() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPenelitianLokasi');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPenelitianLokasi', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinPenelitianMetode
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinPenelitianMetode() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPenelitianMetode');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPenelitianMetode', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
