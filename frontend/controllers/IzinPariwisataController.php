<?php

namespace frontend\controllers;

use Yii;
use backend\models\Izin;
use backend\models\Perizinan;
use backend\models\IzinPariwisata;
use frontend\models\IzinPariwisataSearch;
use backend\models\BidangIzinUsaha;
use backend\models\JenisUsaha;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * IzinPariwisataController implements the CRUD actions for IzinPariwisata model.
 */
class IzinPariwisataController extends Controller
{
    public function behaviors()
    {
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
     * Lists all IzinPariwisata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinPariwisataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinPariwisata model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerIzinPariwisataAkta = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataAktas,
        ]);
        $providerIzinPariwisataFasilitas = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataFasilitas,
        ]);
        $providerIzinPariwisataJenisManum = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataJenisManums,
        ]);
        $providerIzinPariwisataKapasitasAkomodasi = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataKapasitasAkomodasis,
        ]);
        $providerIzinPariwisataKapasitasTransport = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataKapasitasTransports,
        ]);
        $providerIzinPariwisataKbli = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataKblis,
        ]);
        $providerIzinPariwisataTeknis = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataTeknis,
        ]);
        $providerIzinPariwisataTujuanWisata = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataTujuanWisatas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerIzinPariwisataAkta' => $providerIzinPariwisataAkta,
            'providerIzinPariwisataFasilitas' => $providerIzinPariwisataFasilitas,
            'providerIzinPariwisataJenisManum' => $providerIzinPariwisataJenisManum,
            'providerIzinPariwisataKapasitasAkomodasi' => $providerIzinPariwisataKapasitasAkomodasi,
            'providerIzinPariwisataKapasitasTransport' => $providerIzinPariwisataKapasitasTransport,
            'providerIzinPariwisataKbli' => $providerIzinPariwisataKbli,
            'providerIzinPariwisataTeknis' => $providerIzinPariwisataTeknis,
            'providerIzinPariwisataTujuanWisata' => $providerIzinPariwisataTujuanWisata,
        ]);
    }

    /**
     * Creates a new IzinPariwisata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
	
		$type_profile = Yii::$app->user->identity->profile->tipe;
		
        $model = new IzinPariwisata();
		$izin = Izin::findOne($id);

		$model->nama_izin= $izin->nama;        
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;

		$BidangIzinUsaha = BidangIzinUsaha::findOne($izin->bidang_izin_id);
		$model->kode = $BidangIzinUsaha->kode;
		$JenisUsaha = JenisUsaha::findOne($izin->jenis_usaha_id);
		$model->kode_sub = $JenisUsaha->kode;

        if($type_profile == "Perusahaan"){
            $model->npwp_perusahaan = Yii::$app->user->identity->username;
            $model->nama_perusahaan = Yii::$app->user->identity->profile->name;
            $model->telpon_perusahaan = Yii::$app->user->identity->profile->telepon;
			$model->email_perusahaan = Yii::$app->user->identity->email;
        } else {
            if(Yii::$app->user->identity->status == 'DKI'){
                $arrAlamat = explode(" RW ",Yii::$app->user->identity->profile->alamat);
                $RW = $arrAlamat[1];
                $arrAlamat = explode(" RT ",$arrAlamat[0]);
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
			$model->email = Yii::$app->user->identity->email;
            $model->telepon = Yii::$app->user->identity->profile->telepon;
            $model->tempat_lahir = Yii::$app->user->identity->profile->tempat_lahir;
            $model->tanggal_lahir = Yii::$app->user->identity->profile->tgl_lahir;
        }
					
        if ($model->loadAll(Yii::$app->request->post())) {
			
			if($model->identitas_sama=="Y"){
				$model->nik_penanggung_jawab = $model->nik;
				$model->nama_penanggung_jawab = $model->nama;
				$model->tempat_lahir_penanggung_jawab = $model->tempat_lahir;
				$model->tanggal_lahir_penanggung_jawab = $model->tanggal_lahir;
				$model->jenkel_penanggung_jawab = $model->jenkel;
				$model->alamat_penanggung_jawab = $model->alamat;
				$model->rt_penanggung_jawab = $model->rt;
				$model->rw_penanggung_jawab = $model->rw;			
				$model->kodepos_penanggung_jawab = $model->kodepos;
				$model->telepon_penanggung_jawab = $model->telepon;
				$model->passport_penanggung_jawab = $model->passport;
				$model->kitas_penanggung_jawab = $model->kitas;
				$model->propinsi_id_penanggung_jawab = $model->propinsi_id;
				$model->wilayah_id_penanggung_jawab = $model->wilayah_id;
				$model->kecamatan_id_penanggung_jawab = $model->kecamatan_id;
				$model->kelurahan_id_penanggung_jawab = $model->kelurahan_id;
				$model->kewarganegaraan_id_penanggung_jawab = $model->kewarganegaraan_id;				
			}

			$model->saveAll();
			return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
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
            $aktaMaster = \backend\models\IzinSkdpAkta::findAll(['izin_skdp_id' => $parent_id]);
            foreach ($aktaMaster as $data) {
                $akta = new \backend\models\IzinSkdpAkta;
                $akta->izin_skdp_id = $model->id;
                $akta->nomor_akta = $data->nomor_akta;
                $akta->tanggal_akta = $data->tanggal_akta;
                $akta->nama_notaris = $data->nama_notaris;
                $akta->nomor_pengesahan = $data->nomor_pengesahan;
                $akta->tanggal_pengesahan = $data->tanggal_pengesahan;
                $akta->save();
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
            $aktaMaster = \backend\models\IzinSkdpAkta::findAll(['izin_skdp_id' => $parent_id]);
            foreach ($aktaMaster as $data) {
                $akta = new \backend\models\IzinSkdpAkta;
                $akta->izin_skdp_id = $model->id;
                $akta->nomor_akta = $data->nomor_akta;
                $akta->tanggal_akta = $data->tanggal_akta;
                $akta->nama_notaris = $data->nama_notaris;
                $akta->nomor_pengesahan = $data->nomor_pengesahan;
                $akta->tanggal_pengesahan = $data->tanggal_pengesahan;
                $akta->save();
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
     * Updates an existing IzinPariwisata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
			
			if($model->identitas_sama=="Y"){
				$model->nik_penanggung_jawab = $model->nik;
				$model->nama_penanggung_jawab = $model->nama;
				$model->tempat_lahir_penanggung_jawab = $model->tempat_lahir;
				$model->tanggal_lahir_penanggung_jawab = $model->tanggal_lahir;
				$model->jenkel_penanggung_jawab = $model->jenkel;
				$model->alamat_penanggung_jawab = $model->alamat;
				$model->rt_penanggung_jawab = $model->rt;
				$model->rw_penanggung_jawab = $model->rw;			
				$model->kodepos_penanggung_jawab = $model->kodepos;
				$model->telepon_penanggung_jawab = $model->telepon;
				$model->passport_penanggung_jawab = $model->passport;
				$model->kitas_penanggung_jawab = $model->kitas;
				$model->propinsi_id_penanggung_jawab = $model->propinsi_id;
				$model->wilayah_id_penanggung_jawab = $model->wilayah_id;
				$model->kecamatan_id_penanggung_jawab = $model->kecamatan_id;
				$model->kelurahan_id_penanggung_jawab = $model->kelurahan_id;
				$model->kewarganegaraan_id_penanggung_jawab = $model->kewarganegaraan_id;	
			}
            $model->saveAll();
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
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
			
			
			$izin = Izin::findOne($model->izin_id);
			
			$BidangIzinUsaha = BidangIzinUsaha::findOne($izin->bidang_izin_id);
			$model->kode = $BidangIzinUsaha->kode;
			$JenisUsaha = JenisUsaha::findOne($izin->jenis_usaha_id);
			$model->kode_sub = $JenisUsaha->kode;

			if($model->identitas_sama=="Y"){
				$model->nik_penanggung_jawab = $model->nik;
				$model->nama_penanggung_jawab = $model->nama;
				$model->tempat_lahir_penanggung_jawab = $model->tempat_lahir;
				$model->tanggal_lahir_penanggung_jawab = $model->tanggal_lahir;
				$model->jenkel_penanggung_jawab = $model->jenkel;
				$model->alamat_penanggung_jawab = $model->alamat;
				$model->rt_penanggung_jawab = $model->rt;
				$model->rw_penanggung_jawab = $model->rw;			
				$model->kodepos_penanggung_jawab = $model->kodepos;
				$model->telepon_penanggung_jawab = $model->telepon;
				$model->kewarganegaraan_id_penanggung_jawab = $model->kewarganegaraan_id;
				$model->passport_penanggung_jawab = $model->passport;
				$model->kitas_penanggung_jawab = $model->kitas;
			}
			
            //Sampai sini
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinPariwisata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the IzinPariwisata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinPariwisata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinPariwisata::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataAkta
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataAkta()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataAkta');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataAkta', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataFasilitas
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataFasilitas()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataFasilitas');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataFasilitas', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataJenisManum
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataJenisManum()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataJenisManum');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataJenisManum', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataKapasitasAkomodasi
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataKapasitasAkomodasi()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataKapasitasAkomodasi');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataKapasitasAkomodasi', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataKapasitasTransport
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataKapasitasTransport()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataKapasitasTransport');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataKapasitasTransport', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataKbli
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataKbli()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataKbli');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataKbli', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataTeknis
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataTeknis()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataTeknis');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataTeknis', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataTujuanWisata
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataTujuanWisata()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataTujuanWisata');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataTujuanWisata', ['row' => $row]);
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

}
