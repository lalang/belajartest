<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinKesehatan;
use backend\models\IzinKesehatanSearch;
use backend\models\Lokasi;
use backend\models\Perizinan;
use backend\models\PerizinanProses;
use kartik\mpdf\Pdf;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use backend\models\Izin;
use backend\models\IzinKesehatanJadwal;
use backend\models\IzinKesehatanJadwalSatu;
use backend\models\IzinKesehatanJadwalDua;
/**
 * IzinKesehatanController implements the CRUD actions for IzinKesehatan model.
 */
class IzinKesehatanController extends Controller
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
     * Lists all IzinKesehatan models.
     * @return mixed
     */
    public function actionIndex()
    {
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
    public function actionView($id)
    {
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
    public function actionCreate()
    {
        $model = new IzinKesehatan();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
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
        $model->tipe = $izin->tipe;
        $model->nama_izin = $izin->nama;
        
        $perizinan_id = $model->perizinan_id;
        $parent_id = $model->id_izin_parent;
       
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
            if ($model->nama_tempat_praktik_i != '') {
                $jadwalMaster = \backend\models\IzinKesehatanJadwalSatu::findAll(['izin_kesehatan_id' => $parent_id]);
                foreach ($jadwalMaster as $data) {
                    $jadwalSatu = new IzinKesehatanJadwalSatu;
                    $jadwalSatu->izin_kesehatan_id = $model->id;
                    $jadwalSatu->hari_praktik = $data->hari_praktik;
                    $jadwalSatu->jam_praktik = $data->jam_praktik;
                    $jadwalSatu->save();
                }
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
//end costume
            Perizinan::updateAll(['relasi_id' => $perizinan_id, 'tanggal_expired' => $get_expired], ['id' => $model->perizinan_id]);

            return $this->redirect(['/perizinan/upload', 'id' => $model->perizinan_id, 'ref' => $model->id]);
        } else {
            return $this->render('create-jangbut', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinKesehatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
    public function actionDelete($id)
    {
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
    protected function findModel($id)
    {
        if (($model = IzinKesehatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
     
    /**
    * Action to load a tabular form grid
    * for IzinKesehatanJadwal
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinKesehatanJadwal()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwal');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
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
    public function actionAddIzinKesehatanJadwalDua()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwalDua');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
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
    public function actionAddIzinKesehatanJadwalSatu()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwalSatu');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinKesehatanJadwalSatu', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
//Petugas Melakukan Revisi
	public function actionUpdatePetugas($id)
    {
        //$id = Yii::$app->getRequest()->getQueryParam('id');
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            $session->set('UpdatePetugas',1);
            
            $model->saveAll();
            
            $idCurPros = PerizinanProses::findOne(['perizinan_id'=>$model->perizinan_id, 'active'=>1, 'pelaksana_id'=>Yii::$app->user->identity->pelaksana_id])->id;
            //update Update_by dan Upate_date
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            PerizinanProses::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $idCurPros]);
            $a= $_SERVER["HTTP_REFERER"];
            $get_url = explode('?',$_SERVER["HTTP_REFERER"]);
         
           if($find = strpos(strtoupper($a), strtoupper("cek-form"))){
            header('Location: ' . $_SERVER["HTTP_REFERER"].'&alert=1');
           }elseif($find = strpos(strtoupper($a), strtoupper("form-manage-izin"))){
            header('Location: ' . $_SERVER["HTTP_REFERER"].'&alert=1');
           }
            else {
               header('Location: ' . $get_url[0].'?alert=1');
          }
            exit;
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
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
                 }  else {
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
                 }  else {
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
                 }  else {
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
