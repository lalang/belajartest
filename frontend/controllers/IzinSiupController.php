<?php

namespace frontend\controllers;

use backend\models\Izin;
use backend\models\IzinSiup;
use backend\models\Lokasi;
use backend\models\Perizinan;
use backend\models\BentukPerusahaan;
use backend\models\Matarantai;
use backend\models\StatusPerusahaan;
use frontend\models\IzinSiupSearch;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

/**
 * IzinSiupController implements the CRUD actions for IzinSiup model.
 */
class IzinSiupController extends Controller {

    //public $layout = 'lay-admin';

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
     * Lists all IzinSiup models.
     * @return mixed
     */
    public function actionIndex() {
        if(Yii::$app->user->identity->pelaksana_id == null || Yii::$app->user->identity->pelaksana_id == 1){
            return $this->redirect(['/perizinan/dashboard']);
        } else {
            return $this->redirect(['/admin/perizinan/dashboard']);
        }
        /* $searchModel = new IzinSiupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]); */
    }

    /**
     * Displays a single IzinSiup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerIzinSiupAkta = new ArrayDataProvider([
            'allModels' => $model->izinSiupAktas,
        ]);
        $providerIzinSiupKbli = new ArrayDataProvider([
            'allModels' => $model->izinSiupKblis,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerIzinSiupAkta' => $providerIzinSiupAkta,
                    'providerIzinSiupKbli' => $providerIzinSiupKbli,
        ]);
    }

    /**
     * Creates a new IzinSiup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) { 
		$type_profile = Yii::$app->user->identity->profile->tipe;	
		$data_bp=ArrayHelper::map(BentukPerusahaan::find()->andFilterWhere(['LIKE', 'type', $type_profile])->all(),'nama','nama');
		$data_sp=ArrayHelper::map(StatusPerusahaan::find()->orderBy('id')->all(),'nama','nama');
		$data_lembaga=ArrayHelper::map(Matarantai::find()->where (['kelembagaan'=>'Y'])->all(),'id','nama');

        $model = new IzinSiup();
        $izin = Izin::findOne($id); 
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;
//        $model->nama = Yii::$app->user->identity->profile->name;
        /*Erwin Aja*/
        if($type_profile == "Perusahaan"){
            if(Yii::$app->user->identity->status == 'NPWP Badan'){
                $model->npwp_perusahaan = Yii::$app->user->identity->username;
                $model->nama_perusahaan = Yii::$app->user->identity->profile->name;
                $model->telpon_perusahaan = Yii::$app->user->identity->profile->telepon;
            } elseif (Yii::$app->user->identity->status == 'Koneksi Error') {
                $model->npwp_perusahaan = Yii::$app->user->identity->username;
                $model->nama_perusahaan = Yii::$app->user->identity->profile->name;
                $model->telpon_perusahaan = Yii::$app->user->identity->profile->telepon;
            }
        } else {
            $model->nama = Yii::$app->user->identity->profile->name;
            $model->ktp = Yii::$app->user->identity->username;
            $model->alamat = Yii::$app->user->identity->profile->alamat;
            $model->telepon = Yii::$app->user->identity->profile->telepon;
            $model->tempat_lahir = Yii::$app->user->identity->profile->tempat_lahir;
            $model->tanggal_lahir = Yii::$app->user->identity->profile->tgl_lahir;
        }
        /*Erwin Aja*/
//        if(Yii::$app->user->identity->status == 'NPWP Badan'){
//            $model->npwp_perusahaan = Yii::$app->user->identity->username;
//            $model->nama_perusahaan = Yii::$app->user->identity->profile->name;
//            $model->telpon_perusahaan = Yii::$app->user->identity->profile->telepon;
//        }  else {
//            $model->nama = Yii::$app->user->identity->profile->name;
//            $model->ktp = Yii::$app->user->identity->username;
//            $model->alamat = Yii::$app->user->identity->profile->alamat;
//            $model->telepon = Yii::$app->user->identity->profile->telepon;
//            $model->tempat_lahir = Yii::$app->user->identity->profile->tempat_lahir;
//            $model->tanggal_lahir = Yii::$app->user->identity->profile->tgl_lahir;
//        }
//        -----------------------------------------------------------------------------
//        $model->alamat = Yii::$app->user->identity->profile->alamat;
//        $model->telepon = Yii::$app->user->identity->profile->telepon;
//        $model->tempat_lahir = Yii::$app->user->identity->profile->tempat_lahir;
//        $model->tanggal_lahir = Yii::$app->user->identity->profile->tgl_lahir;

        if (strpos(strtolower($izin->nama), 'besar') !== false)
            $model->kelembagaan = 'Perdagangan Besar';
        else if (strpos(strtolower($izin->nama), 'menengah') !== false)
            $model->kelembagaan = 'Perdagangan Menengah';
        else if (strpos(strtolower($izin->nama), 'kecil') !== false)
            $model->kelembagaan = 'Perdagangan Kecil';
        else
            $model->kelembagaan = 'Usaha Mikro';

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
//             \Yii::$app->session->set('user.pid',$model->perizinan_id);
//            \Yii::$app->session->set('user.ref',$model->id);
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,'data_lembaga'=>$data_lembaga,
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
            $aktaMaster = \backend\models\IzinSiupAkta::findAll(['izin_siup_id' => $parent_id]);
            foreach ($aktaMaster as $data) {
                $akta = new \backend\models\IzinSiupAkta;
                $akta->izin_siup_id = $model->id;
                $akta->nomor_akta = $data->nomor_akta;
                $akta->tanggal_akta = $data->tanggal_akta;
                $akta->nomor_pengesahan = $data->nomor_pengesahan;
                $akta->tanggal_pengesahan = $data->tanggal_pengesahan;
                $akta->save();
            }
            $kbliMaster = \backend\models\IzinSiupKbli::findAll(['izin_siup_id' => $parent_id]);
            foreach ($kbliMaster as $data) {
                $kbli = new \backend\models\IzinSiupKbli;
                $kbli->izin_siup_id = $model->id;
                $kbli->kbli_id = $data->kbli_id;
                $kbli->keterangan = $data->keterangan;
                $kbli->save();
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
            $aktaMaster = \backend\models\IzinSiupAkta::findAll(['izin_siup_id' => $parent_id]);
            foreach ($aktaMaster as $data) {
                $akta = new \backend\models\IzinSiupAkta;
                $akta->izin_siup_id = $model->id;
                $akta->nomor_akta = $data->nomor_akta;
                $akta->tanggal_akta = $data->tanggal_akta;
                $akta->nomor_pengesahan = $data->nomor_pengesahan;
                $akta->tanggal_pengesahan = $data->tanggal_pengesahan;
                $akta->save();
            }
            $kbliMaster = \backend\models\IzinSiupKbli::findAll(['izin_siup_id' => $parent_id]);
            foreach ($kbliMaster as $data) {
                $kbli = new \backend\models\IzinSiupKbli;
                $kbli->izin_siup_id = $model->id;
                $kbli->kbli_id = $data->kbli_id;
                $kbli->keterangan = $data->keterangan;
                $kbli->save();
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
     * Updates an existing IzinSiup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
      public function actionUpdate($id) {
		
		$type_profile = Yii::$app->user->identity->profile->tipe;	
		$data_bp=ArrayHelper::map(BentukPerusahaan::find()->andFilterWhere(['LIKE', 'type', $type_profile])->all(),'nama','nama');
		$data_sp=ArrayHelper::map(StatusPerusahaan::find()->all(),'nama','nama');
		$data_lembaga=ArrayHelper::map(Matarantai::find()->where (['kelembagaan'=>'Y'])->all(),'id','nama');
		
        $model = $this->findModel($id);
        
//      $model->scenario = 'update';
        
       // $model->setIsNewRecord(false);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            //update Update_by dan Upate_date ERWIN
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            //End
           
          //  if($model->perizinan->lokasi_pengambilan_id == NULL){
               // return $this->redirect(['/perizinan/preview', 'id' => $id]);
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
//            }
//            else{
//                return $this->redirect(['/perizinan/active']);
//            }
//            return $this->redirect(['view', 'id' => $model->id]);
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
                        'model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp,'data_lembaga'=>$data_lembaga
            ]);
        }
    }


    /**
     * Deletes an existing IzinSiup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
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
        $providerIzinSiupAkta = new ArrayDataProvider([
            'allModels' => $model->izinSiupAktas,
        ]);
        $providerIzinSiupKbli = new ArrayDataProvider([
            'allModels' => $model->izinSiupKblis,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiupAkta' => $providerIzinSiupAkta,
            'providerIzinSiupKbli' => $providerIzinSiupKbli,
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
     * Finds the IzinSiup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinSiup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = IzinSiup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinSiupAkta
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinSiupAkta() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinSiupAkta');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinSiupAkta', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinSiupKbli
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinSiupKbli() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinSiupKbli');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinSiupKbli', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
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
                 }  else {
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
                 }  else {
                     $selected = '';
                 }
                echo Json::encode(['output' => $data, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionSubizin() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $bid = $_POST['depdrop_parents'];
            if ($bid != null) {
                $bid_id = $bid[0];
                $out = Izin($bid_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
	
	/*Mobile*/
	
    public function actionPerpanjanganMobile($id, $sumber) {
		$this->layout = 'mobile-backend';
		
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
            $aktaMaster = \backend\models\IzinSiupAkta::findAll(['izin_siup_id' => $parent_id]);
            foreach ($aktaMaster as $data) {
                $akta = new \backend\models\IzinSiupAkta;
                $akta->izin_siup_id = $model->id;
                $akta->nomor_akta = $data->nomor_akta;
                $akta->tanggal_akta = $data->tanggal_akta;
                $akta->nomor_pengesahan = $data->nomor_pengesahan;
                $akta->tanggal_pengesahan = $data->tanggal_pengesahan;
                $akta->save();
            }
            $kbliMaster = \backend\models\IzinSiupKbli::findAll(['izin_siup_id' => $parent_id]);
            foreach ($kbliMaster as $data) {
                $kbli = new \backend\models\IzinSiupKbli;
                $kbli->izin_siup_id = $model->id;
                $kbli->kbli_id = $data->kbli_id;
                $kbli->keterangan = $data->keterangan;
                $kbli->save();
            }
//end costume
            Perizinan::updateAll(['relasi_id' => $perizinan_id], ['id' => $model->perizinan_id]);

            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            return $this->render('/mobile-backend/perpanjangan/form', [
                        'model' => $model,
            ]);
        }
    }
	/*End Mobile*/
}
