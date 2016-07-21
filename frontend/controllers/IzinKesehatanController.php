<?php

namespace frontend\controllers;

use Yii;
use backend\models\Izin;
use backend\models\Perizinan;
use backend\models\IzinKesehatan;
use frontend\models\IzinKesehatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use backend\models\IzinKesehatanJadwal;
use backend\models\IzinKesehatanJadwalSatu;
use backend\models\IzinKesehatanJadwalDua;

/**
 * IzinKesehatanController implements the CRUD actions for IzinKesehatan model.
 */
class IzinKesehatanController extends Controller {

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
     * Lists all IzinKesehatan models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new IzinKesehatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinKesehatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerIzinKesehatanJadwal = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinKesehatanJadwals,
        ]);
        $providerIzinKesehatanJadwalDua = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinKesehatanJadwalDuas,
        ]);
        $providerIzinKesehatanJadwalSatu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinKesehatanJadwalSatus,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerIzinKesehatanJadwal' => $providerIzinKesehatanJadwal,
                    'providerIzinKesehatanJadwalDua' => $providerIzinKesehatanJadwalDua,
                    'providerIzinKesehatanJadwalSatu' => $providerIzinKesehatanJadwalSatu,
        ]);
    }

    /**
     * Creates a new IzinKesehatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $model = new IzinKesehatan();
        $izin = Izin::findOne($id);
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;
        $model->nama_izin = $izin->nama;
        $model->jumlah_sip_offline = 1;
        $model->id_izin_parent = '';

        //cek str 3x atau 2x
        $dataSIP = IzinKesehatan::find()
                ->joinWith('perizinan')
                ->where(['user_id' => Yii::$app->user->identity->id])
                ->andWhere(['perizinan.status' => 'Selesai'])
                ->andWhere('perizinan.tanggal_expired >= curdate()')
                ->andWhere('status <> 4')
                ->andWhere('perizinan.aktif = "Y"')
                ->all();
        $countOnline = 0;
        $countOffline = 0;
        foreach ($dataSIP as $value) {
            $countOnline++;
            $value->izin_id;
        }
        if (strpos(strtoupper($izin->nama), strtoupper("Dokter"))) {
            $kuota = 3;
            if ($countOnline != $kuota) {
                $dataSIPoff = IzinKesehatan::find()
                        ->joinWith('perizinan')
                        ->where(['user_id' => Yii::$app->user->identity->id])
                        ->andWhere('nomor_sip_i is not null and nomor_sip_i <> ""')
                        ->andWhere('nomor_sip_ii is not null and nomor_sip_ii <> ""')
                        ->andWhere(['perizinan.status' => 'Selesai'])
                        ->andWhere('perizinan.tanggal_expired > NOW()')
                        ->andWhere('status <> 4')
                        ->andWhere('perizinan.aktif = "Y"')
                        ->count();
                $countOffline = $dataSIPoff;
            }
        } else {
            $kuota = 2;
            if (strpos(strtoupper($value->izin->nama)) == strpos(strtoupper($izin->nama))) {
                $countOffline = 1;
            } else {
                if ($countOnline != $kuota) {
                    $dataSIPoff = IzinKesehatan::find()
                            ->joinWith('perizinan')
                            ->where(['user_id' => Yii::$app->user->identity->id])
                            ->andWhere('nomor_sip_i is not null and nomor_sip_i <> ""')
                            ->andWhere(['perizinan.status' => 'Selesai'])
                            ->andWhere('perizinan.tanggal_expired > NOW()')
                            ->andWhere('status <> 4')
                            ->andWhere('perizinan.aktif = "Y"')
                            ->count();
                    $countOffline = $dataSIPoff;
//                die(print_r($countOffline));
                }
            }
        }


        //jika sudah 3x STR Dokter
//die(print_r($countOffline));
        if ($countOnline == $kuota || $countOffline == 1) {

            $message = "Maaf Anda Tidak Dapat Mengajukan SIP, Di Karenakan SIP Anda Telah Mencapai Batas Maksimal ";
            echo "<script type='text/javascript'>
                            alert('$message');
                            document.location = '/perizinan/search';
                        </script>";
        } else if ($countOnline != 0) {
            foreach ($dataSIP as $data) {

                $model->id_izin_parent = $data->id;
                $model->nomor_str = $data->nomor_str;
                $model->tanggal_berlaku_str = $data->tanggal_berlaku_str;

                if (strpos(strtoupper($data->izin->nama), strtoupper("Fasilitas Kesehatan"))) {
                    $jenisPrak = "Fasilitas Kesehatan";
                } else {
                    $jenisPrak = "Praktik Perorangan";
                }
                $model->jenis_praktik_i = $jenisPrak;
                $model->nama_tempat_praktik_i = $data->nama_tempat_praktik;
                $model->nomor_sip_i = $data->perizinan->no_izin;
                $model->tanggal_berlaku_sip_i = date('Y-m-d', strtotime($data->perizinan->tanggal_expired));
                $model->nama_gedung_praktik_i = $data->nama_gedung_praktik;
                $model->blok_tempat_praktik_i = $data->blok_tempat_praktik;
                $model->alamat_tempat_praktik_i = $data->alamat_tempat_praktik;
                $model->rt_tempat_praktik_i = $data->rt_tempat_praktik;
                $model->rw_tempat_praktik_i = $data->rw_tempat_praktik;
                $model->propinsi_id_tempat_praktik_i = 11;
                $model->wilayah_id_tempat_praktik_i = $data->wilayah_id_tempat_praktik;
                $model->kecamatan_id_tempat_praktik_i = $data->kecamatan_id_tempat_praktik;
                $model->kelurahan_id_tempat_praktik_i = $data->kelurahan_id_tempat_praktik;
                $model->telpon_tempat_praktik_i = $data->telpon_tempat_praktik;
                $model->jenis_praktik_ii = $data->jenis_praktik_i;
                $model->nama_tempat_praktik_ii = $data->nama_tempat_praktik_i;
                $model->nomor_sip_ii = $data->nomor_sip_i;
                $model->tanggal_berlaku_sip_ii = $data->tanggal_berlaku_sip_i;
                $model->nama_gedung_praktik_ii = $data->nama_gedung_praktik_i;
                $model->blok_tempat_praktik_ii = $data->blok_tempat_praktik_i;
                $model->alamat_tempat_praktik_ii = $data->alamat_tempat_praktik_i;
                $model->rt_tempat_praktik_ii = $data->rt_tempat_praktik_i;
                $model->rw_tempat_praktik_ii = $data->rw_tempat_praktik_i;
                $model->propinsi_id_tempat_praktik_ii = $data->propinsi_id_tempat_praktik_i;
                $model->wilayah_id_tempat_praktik_ii = $data->wilayah_id_tempat_praktik_i;
                $model->kecamatan_id_tempat_praktik_ii = $data->kecamatan_id_tempat_praktik_i;
                $model->kelurahan_id_tempat_praktik_ii = $data->kelurahan_id_tempat_praktik_i;
                $model->telpon_tempat_praktik_ii = $data->telpon_tempat_praktik_i;

//                $model->izinKesehatanJadwalSatus[] = $data->izinKesehatanJadwals;
//                foreach ($data->izinKesehatanJadwals as $dataJadwal) {
////                    die('hai'.$dataJadwal->hari_praktik);
//                    $model->izinKesehatanJadwalSatus->hari_praktik = $dataJadwal->hari_praktik;
//                    $model->izinKesehatanJadwalSatus->jam_praktik = $dataJadwal->jam_praktik;
//                }
            }
            if ($model->nama_tempat_praktik_ii != '') {
                $model->status_sip_offline = 'Y';
                $model->jumlah_sip_offline = 2;
            }
        } else {
            
        }

        if ($model->tipe == "Perorangan") {
            if (Yii::$app->user->identity->status == 'DKI') {
                $arrAlamat = explode(" RW ", Yii::$app->user->identity->profile->alamat);
                $RW = $arrAlamat[1];
                $arrAlamat = explode(" RT ", $arrAlamat[0]);
                $RT = $arrAlamat[1];
                $model->alamat = $arrAlamat[0];
                $model->rw = $RW;
                $model->rt = $RT;
                $model->propinsi_id = Yii::$app->user->identity->kdprop;
                $model->wilayah_id = Yii::$app->user->identity->kdwil;
                $model->kecamatan_id = Yii::$app->user->identity->kdkec;
                $model->kelurahan_id = Yii::$app->user->identity->kdkel;
            } else {
                $model->alamat = Yii::$app->user->identity->profile->alamat;
            }
            $model->nama = Yii::$app->user->identity->profile->name;
            $model->nik = Yii::$app->user->identity->username;
            $model->telepon = Yii::$app->user->identity->profile->telepon;
            $model->tempat_lahir = Yii::$app->user->identity->profile->tempat_lahir;
            $model->tanggal_lahir = Yii::$app->user->identity->profile->tgl_lahir;
            $model->email = Yii::$app->user->identity->email;
        }
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            if ($model->id_izin_parent) {
                $jadwalMaster = \backend\models\IzinKesehatanJadwal::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
                foreach ($jadwalMaster as $data) {
                    $jadwalSatu = new IzinKesehatanJadwalSatu;
                    $jadwalSatu->izin_kesehatan_id = $model->id;
                    $jadwalSatu->hari_praktik = $data->hari_praktik;
                    $jadwalSatu->jam_praktik = $data->jam_praktik;
                    $jadwalSatu->save();
                }
                if ($model->nama_tempat_praktik_ii != '') {
                    $jadwalSatuMaster = IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
                    foreach ($jadwalSatuMaster as $data) {
                        $jadwalDua = new IzinKesehatanJadwalDua;
                        $jadwalDua->izin_kesehatan_id = $model->id;
                        $jadwalDua->hari_praktik = $data->hari_praktik;
                        $jadwalDua->jam_praktik = $data->jam_praktik;
                        $jadwalDua->save();
                    }
                }
            }

            $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
            $perizinan->tanggal_expired = $this->tanggal_berlaku_str;
            $perizinan->save();

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
        $model->id_izin_parent = $model->id;
        $model->id = null;
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;
        $model->nama_izin = $izin->nama;

        $perizinan_id = $model->perizinan_id;
        $parent_id = $model->id_izin_parent;

        if ($model->perizinan->relasi_id) {
            $message = "Maaf Anda Tidak Dapat Mengajukan Perpanjangan, Di Karenakan Kesempatan Perpanjangan Anda Telah Habis";
            echo "<script type='text/javascript'>
                            alert('$message');
                            document.location = '/perizinan/search';
                        </script>";
        }

        //costume
        $expired = Perizinan::getExpired($model->tanggal_berlaku_str, $izin->masa_berlaku, $izin->masa_berlaku_satuan);
        $get_expired = $expired->format('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $jadwalMaster = \backend\models\IzinKesehatanJadwal::findAll(['izin_kesehatan_id' => $parent_id]);
            foreach ($jadwalMaster as $data) {
                $jadwal = new IzinKesehatanJadwal;
                $jadwal->izin_kesehatan_id = $model->id;
                $jadwal->hari_praktik = $data->hari_praktik;
                $jadwal->jam_praktik = $data->jam_praktik;
                $jadwal->save();
            }

            $jadwalMaster = \backend\models\IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $parent_id]);
            foreach ($jadwalMaster as $data) {
                $jadwalSatu = new IzinKesehatanJadwalSatu;
                $jadwalSatu->izin_kesehatan_id = $model->id;
                $jadwalSatu->hari_praktik = $data->hari_praktik;
                $jadwalSatu->jam_praktik = $data->jam_praktik;
                $jadwalSatu->save();
            }
            $jadwalSatuMaster = IzinKesehatanJadwalDua::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
            foreach ($jadwalSatuMaster as $data) {
                $jadwalDua = new IzinKesehatanJadwalDua;
                $jadwalDua->izin_kesehatan_id = $model->id;
                $jadwalDua->hari_praktik = $data->hari_praktik;
                $jadwalDua->jam_praktik = $data->jam_praktik;
                $jadwalDua->save();
            }
//end costume
            Perizinan::updateAll(['relasi_id' => $perizinan_id, 'tanggal_expired' => $get_expired], ['id' => $model->perizinan_id]);

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
        $model->id_izin_parent = $model->id;
        $model->id = null;
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;
        $model->nama_izin = $izin->nama;

        $perizinan_id = $model->perizinan_id;
        $parent_id = $model->id_izin_parent;

//costume
        $expired = $model->tanggal_berlaku_str;
        $get_expired = $expired;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $jadwalMaster = \backend\models\IzinKesehatanJadwal::findAll(['izin_kesehatan_id' => $parent_id]);
            foreach ($jadwalMaster as $data) {
                $jadwal = new IzinKesehatanJadwal;
                $jadwal->izin_kesehatan_id = $model->id;
                $jadwal->hari_praktik = $data->hari_praktik;
                $jadwal->jam_praktik = $data->jam_praktik;
                $jadwal->save();
            }
            $jadwalMaster = \backend\models\IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $parent_id]);
            foreach ($jadwalMaster as $data) {
                $jadwalSatu = new IzinKesehatanJadwalSatu;
                $jadwalSatu->izin_kesehatan_id = $model->id;
                $jadwalSatu->hari_praktik = $data->hari_praktik;
                $jadwalSatu->jam_praktik = $data->jam_praktik;
                $jadwalSatu->save();
            }
            $jadwalSatuMaster = IzinKesehatanJadwalDua::findAll(['izin_kesehatan_id' => $model->id_izin_parent]);
            foreach ($jadwalSatuMaster as $data) {
                $jadwalDua = new IzinKesehatanJadwalDua;
                $jadwalDua->izin_kesehatan_id = $model->id;
                $jadwalDua->hari_praktik = $data->hari_praktik;
                $jadwalDua->jam_praktik = $data->jam_praktik;
                $jadwalDua->save();
            }
//end costume
            Perizinan::updateAll(['relasi_id' => $perizinan_id, 'tanggal_expired' => $get_expired], ['id' => $model->perizinan_id]);

            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            return $this->render('create-jangbut', [
                        'model' => $model,
            ]);
        }
    }

//Sampai di sini

    /**
     * Updates an existing IzinKesehatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        //$model->nama_izin = $model->izin->nama;
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            Perizinan::updateAll(['tanggal_expired' => $model->tanggal_berlaku_str, 'update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);

            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinKesehatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IzinKesehatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinKesehatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = IzinKesehatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
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

    /**
     * Action to load a tabular form grid
     * for IzinKesehatanJadwal
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinKesehatanJadwal() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwal');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinKesehatanJadwal', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinKesehatanJadwalDua
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinKesehatanJadwalDua() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwalDua');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinKesehatanJadwalDua', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinKesehatanJadwalSatu
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinKesehatanJadwalSatu() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwalSatu');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinKesehatanJadwalSatu', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

}
