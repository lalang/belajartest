<?php

namespace frontend\controllers;

use backend\models\Izin;
use backend\models\IzinSiup;
use backend\models\IzinTdg;
use backend\models\Kuota;
use backend\models\Lokasi;
use backend\models\Params;
use backend\models\Perizinan;
use backend\models\PerizinanBerkas;
use frontend\models\PerizinanSearch;
use frontend\models\SearchIzin;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PerizinanController implements the CRUD actions for Perizinan model.
 */
class PerizinanController extends Controller {

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
     * Lists all Perizinan models.
     * @return mixed
     */
    public function actionIndex() { 
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'index',
        ]);
    }

    /**
     * Lists all Perizinan models.
     * @return mixed
     */
    public function actionDashboard() {
        $session = Yii::$app->session;
	$session->set('id_paket',NULL);
        $session->set('id_simul',NULL);
        
        return $this->render('dashboard');
    }

    public function actionActive() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchAktif(Yii::$app->request->queryParams, true);

        return $this->render('index-proses', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'active',
        ]);
    }

    //    halaman jika sudah selesai
    public function actionBaru() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchBaru(Yii::$app->request->queryParams, false);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'baru',
        ]);
    }
    
    //    halaman jika sudah selesai
    public function actionVerifikasi() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchVerifikasi(Yii::$app->request->queryParams, false);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'verifikasi',
        ]);
    }
    
//    halaman jika sudah selesai
    public function actionDone() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, false);

        return $this->render('index-done', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'done',
        ]);
    }
    
    //    halaman jika sudah Tolak
    public function actionTolak() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchTolak(Yii::$app->request->queryParams, false);

        return $this->render('index-tolak', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'tolak',
        ]);
    }
    
    //    halaman jika sudah Aktif
    public function actionAktif() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchPerizinanAktif(Yii::$app->request->queryParams, Yii::$app->user->id);

        return $this->render('index-aktif', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'aktif',
        ]);
    }
    
//    halaman jika sudah expired
    public function actionExpired() {
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchPerizinanNonAktif(Yii::$app->request->queryParams, Yii::$app->user->id);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar'=>'expired',
        ]);
    }

    /**
     * Lists all Izin models.
     * @return mixed
     */
    public function actionSearch() {
        $session = Yii::$app->session;
		$session->set('id_paket',NULL);
        $session->set('id_simul',NULL);
        
        $model = new SearchIzin();

        if ($model->load(Yii::$app->request->post())) {
            $action = Izin::findOne($model->izin)->action . '/create';
            
            $session = Yii::$app->session;
            $session->set('SiupID',$model->id_izin_siup);

            return $this->redirect([$action, 'id' => $model->izin]);
        } else {
            return $this->render('search', [
                        'model' => $model,
            ]);
        }
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
            $query = Izin::find()->where($cari2)->andWhere('status_id=' . $_GET['status'] . ' and tipe = "' . Yii::$app->user->identity->profile->tipe . '"')
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

    public function actionIzinLabel() {

        echo Izin::findOne($_GET['izin'])->bidang->nama;
    }

    /**
     * Displays a single Perizinan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id); 
		
        if($model->izin->type=='TDG'){ 
            $izin = \backend\models\IzinTdg::findOne($model->referrer_id);
            return $this->render('view-izinTdg', [
                        'model' => $model,
                        'izin' => $izin
            ]);
        } elseif($model->izin->type=='PM1'){
            $izin = \backend\models\IzinPm1::findOne($model->referrer_id);
            return $this->render('view-pm1', [
                        'model' => $model,
                        'izin' => $izin
            ]);
        } else{
            $izin = IzinSiup::findOne($model->referrer_id);
            return $this->render('view', [
                        'model' => $model,
                        'izin' => $izin
            ]);
        }
        
    }

    /**
     * Creates a new Perizinan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Perizinan();

        if ($model->loadAll(Yii::$app->request->post()) ) {
			
			$data = $model->loadAll(Yii::$app->request->post());
			echo"<pre>";print_r($data); die();
			//&& $model->saveAll()
        //    return $this->redirect(['view', 'id' => $model->id]);
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

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
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
            $dateF = date_create($model->pengambilan_tanggal);
            $model->pengambilan_tanggal = date_format($dateF, "Y-m-d");
            
            if ($model->save()) {
                
                return $this->redirect(['view', 'id' => $id]);
            }
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

    public function actionIzinList($status) {
        $izins = Izin::find()->where('status_id=' . $status . ' and tipe = "' . Yii::$app->user->identity->profile->tipe . '"')->orderBy('id')->asArray()->all();
        echo "<option value='0'> Pilih Izin </option>";
        foreach ($izins as $izin) {
            echo "<option value='" . $izin['id'] . "'>" . $izin['alias'] . "</option>";
        }
    }

    public function actionSiupList($idizin) {
        
        echo "<option value=''> Pilih Nama  </option>";
        
        if($idizin == 613 || $idizin == 614 || $idizin == 615){
            $izins = IzinSiup::find()->joinWith('perizinan')
                    ->where('user_id='. Yii::$app->user->identity->id . ' and perizinan.status = "Selesai" and perizinan.tanggal_expired > "'.date("Y-m-d H:i:s").'"')
                    ->orderBy('id')->asArray()->all();
            foreach ($izins as $izin) {
                echo "<option value='" . $izin['id'] . "'>" . $izin['nama_perusahaan'] . "</option>";
            }
        } else {
            echo "<option value='0'> Data Tidak Di Temukan </option>";
        }
        
//        $izins = Izin::find()->where('status_id=' . $status . ' and tipe = "' . Yii::$app->user->identity->profile->tipe . '"')->orderBy('id')->asArray()->all();
//        foreach ($izins as $izin) {
//            echo "<option value='" . $izin['id'] . "'>" . $izin['alias'] . "</option>";
//        }
    }
    
    public function actionPreview($id) {
        $model = $this->findModel($id);
        $file = $model->perizinanBerkas[0];
        //echo $model->izin->type; die();
        if($model->izin->type=='TDG'){ 
            $izin = \backend\models\IzinTdg::findOne($model->referrer_id);
        } elseif($model->izin->type=='PM1'){
            $izin = \backend\models\IzinPm1::findOne($model->referrer_id);
            
        } elseif($model->izin->type=='TDP'){ 
            $izin = \backend\models\IzinTdp::findOne($model->referrer_id);
        }else{
            $izin = \backend\models\IzinSiup::findOne($model->referrer_id);
        }
        //$izin = \backend\models\IzinSiup::findOne($model->referrer_id);
        if (Yii::$app->request->post()) {
            if ($_POST['action'] == 'next') {
                return $this->redirect(['schedule', 'id' => $id]);
            }else if($_POST['action'] == 'back') { 
                return $this->redirect([$model->izin->action . '/update', 'id' => $izin->id]);
            }else {
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

    public function actionStatus($id) {
        $model = $this->findModel($id);
        return $this->renderAjax('_status', ['model' => $model]);
    }

    public function actionUpload($id, $ref) {
//        $id = \Yii::$app->session->get('user.pid');
//        $ref = \Yii::$app->session->get('user.ref');
        $model = $this->findModel($id);

        $model->referrer_id = $ref;

        $model->save();

        $modelPerizinanBerkas = PerizinanBerkas::findAll(['perizinan_id' => $model->id]);
        
        if($modelPerizinanBerkas){
            if (Yii::$app->request->post()) {
                $post = Yii::$app->request->post();

                foreach ($modelPerizinanBerkas as $key => $value) {

                    $user_file = PerizinanBerkas::findOne(['perizinan_id' => $value['perizinan_id']]);				
                    $user_file->user_file_id = $post['user_file'][$key];
                 //   $user_file->update();

                             PerizinanBerkas::updateAll(['user_file_id'=>$post['user_file'][$key]], ['id' => $value['id']]);


                }

                return $this->redirect(['preview', 'id' => $id]);
            } else {
                return $this->render('upload', [
                            'model' => $model,
    //                        'ref' => $ref,
                            'perizinan_berkas' => $modelPerizinanBerkas,
                            'alert'=>'0',
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
				PerizinanBerkas::updateAll(['user_file_id'=>$post['user_file'][$key]], ['id' => $value['id']]);
            }

            return $this->redirect(['preview', 'id' => $id]);
        } else {
            return $this->render('upload', [
                        'model' => $model,
                        'perizinan_berkas' => $modelPerizinanBerkas,
			'alert'=>'1',
            ]);
        }
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Lokasi::getKecamatanOptions($cat_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionKecamatan() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Lokasi::getKecOptions($cat_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionKelurahan() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = Lokasi::getKelOptions($cat_id, $subcat_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
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
                $data = Lokasi::getKelurahanOptions($cat_id, $subcat_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
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
        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinanDokumens,
        ]);
        $providerPerizinanProses = new ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiup' => $providerIzinSiup,
            'providerPerizinan' => $providerPerizinan,
            'providerPerizinanDokumen' => $providerPerizinanDokumen,
            'providerPerizinanProses' => $providerPerizinanProses,
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
//            'methods' => [
//                'SetHeader' => [\Yii::$app->name],
//                'SetFooter' => ['{PAGENO}'],
//            ]
        ]);

        return $pdf->render();
    }

    public function actionPrintTandaTerima($id) {
		
		$data = $this->findModel($id);
        
        if($data->izin->type=='TDG'){ 
            $model = \backend\models\IzinTdg::findOne(['perizinan_id'=>$id]);
        }
        elseif($model->izin->type=='TDP'){
            $izin = \backend\models\IzinTdp::findOne(['perizinan_id'=>$id]);
        }else{
            $model = IzinSiup::findOne(['perizinan_id'=>$id]);
        }
		
       // $model = IzinSiup::findOne(['perizinan_id'=>$id]);
        $providerPerizinan = new ArrayDataProvider([
            'allModels' => $model->perizinan,
        ]);
        $providerIzin = new ArrayDataProvider([
            'allModels' => $model->izin,
        ]);
        $content = $this->renderAjax('_print-tandaterima', [
            'model' => $model,
            'providerPerizinan' => $providerPerizinan,
            'providerIzin' => $providerIzin,
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
//            'methods' => [
//                'SetHeader' => [\Yii::$app->name],
//                'SetFooter' => ['{PAGENO}'],
//            ]
        ]);

        return $pdf->render();
    }

    public function actionPrintPendaftaranSiup($id) {
        $model = $this->findModel($id);
        
        if($model->izin->type=='TDG'){ 
           // $izin = \backend\models\IzinTdg::findOne($model->referrer_id);
		   $izin = \backend\models\IzinTdg::findOne(['perizinan_id'=>$id]);
        } elseif($model->izin->type=='PM1'){
            $izin = \backend\models\IzinPm1::findOne(['perizinan_id'=>$id]);
        }
        elseif($model->izin->type=='TDP'){
            $izin = \backend\models\IzinTdp::findOne(['perizinan_id'=>$id]);
        }else{
            $izin = IzinSiup::findOne(['perizinan_id'=>$id]);
        }
        
        $content = $this->renderAjax('_print-siup', [
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
//            'methods' => [
//                'SetHeader' => [\Yii::$app->name],
//                'SetFooter' => ['{PAGENO}'],
//            ]
        ]);

        return $pdf->render();
    }

    public function actionPrintKuasaPengurusan($id) {
        $model = $this->findModel($id);
        
        if($model->izin->type=='TDG'){ 
            $izin = \backend\models\IzinTdg::findOne($model->referrer_id);
        } elseif($model->izin->type=='PM1'){
            $izin = \backend\models\IzinPm1::findOne(['perizinan_id'=>$id]);
        }
        elseif($model->izin->type=='TDP'){
            $izin = \backend\models\IzinTdp::findOne(['perizinan_id'=>$id]);
        }else{
            $izin = IzinSiup::findOne(['perizinan_id'=>$id]);
        }
        
        $content = $this->renderAjax('_print-pengurusan', [
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
//            'methods' => [
//                'SetHeader' => [\Yii::$app->name],
//                'SetFooter' => ['{PAGENO}'],
//            ]
        ]);

        return $pdf->render();
    }

    public function actionPrintKuasaTtd($id) {
        $model = $this->findModel($id);
        
        if($model->izin->type=='TDG'){ 
            $izin = \backend\models\IzinTdg::findOne(['perizinan_id'=>$id]);
        } elseif($model->izin->type=='PM1'){
            $izin = \backend\models\IzinPm1::findOne(['perizinan_id'=>$id]);
        } 
        elseif($model->izin->type=='TDP'){
            $izin = \backend\models\IzinTdp::findOne(['perizinan_id'=>$id]);
        }else{
            $izin = IzinSiup::findOne(['perizinan_id'=>$id]);
        }
        
        $content = $this->renderAjax('_print-kuasattd', [
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
//            'methods' => [
//                'SetHeader' => [\Yii::$app->name],
//                'SetFooter' => ['{PAGENO}'],
//            ]
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
     * for PerizinanDokumen
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPerizinanDokumen() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PerizinanDokumen');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinanDokumen', ['row' => $row]);
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

    public function actionSession() {
        if (isset($_GET['lokasi'])) {
            $sesi = Kuota::findOne(['lokasi_id' => $_GET['lokasi']]);
            $dateF = date_create($_GET['tanggal']);
            $tanggal = date_format($dateF, "Y-m-d");
            $kuota1 = Perizinan::getKuota($tanggal, $_GET['lokasi'], 'Sesi I');
            $kuota2 = Perizinan::getKuota($tanggal, $_GET['lokasi'], 'Sesi 2');
            $sesi_data = 'Sesi I (' . $sesi->sesi_1_mulai . ' - ' . $sesi->sesi_1_selesai . ') Kuota: ' . $sesi->sesi_1_kuota . ' Tersedia:' . ($sesi->sesi_1_kuota - $kuota1) . "<br>";
            $sesi_data .= 'Sesi II (' . $sesi->sesi_2_mulai . ' - ' . $sesi->sesi_2_selesai . ') Kuota: ' . $sesi->sesi_2_kuota . ' Tersedia:' . ($sesi->sesi_2_kuota - $kuota2) . "<br>";
//            $sesi_data .= 'Tanggal '.$tanggal;
            echo $sesi_data;
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
    
    public function actionPaket($id) {
        $session = Yii::$app->session;
	$session->set('id_paket',$id);
        
        $model = new Perizinan();
        
        return $this->renderAjax('_simultanSearch', ['model' => $model]);
        
//        if ($model->loadAll(Yii::$app->request->post()) ) {
////            echo '<pre>';
////            print_r($model);
////            echo '</pre>';
//            echo $model->izinChild;
//            die();
//        } else {
//            return $this->render('_simultanSearch', ['model' => $model]);
//        }
        
        
        
        
    }
    
    public function actionProsesSimultan($id=NULL) {
        $session = Yii::$app->session;
	$session->set('stat_simul',$id);
        
        $action = Izin::findOne($id)->action . '/create';
            
        $session = Yii::$app->session;
        $session->set('SiupID',$model->id_izin_siup);
//        if ($model->loadAll(Yii::$app->request->post()) ) {
        return $this->redirect([$action, 'id' => $id]);
//            echo $_POST['SearchIzin[izin]'];
//        }
        
        
    }

}
