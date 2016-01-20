<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinPm1;
use backend\models\IzinPm1Search;
use backend\models\Izin;
use backend\models\Lokasi;
use \backend\models\PerizinanProses;
use kartik\mpdf\Pdf;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
/**
 * IzinPm1Controller implements the CRUD actions for IzinPm1 model.
 */
class IzinPm1Controller extends Controller
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
     * Lists all IzinPm1 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinPm1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinPm1 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IzinPm1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$user_id)
    {
        $model = new IzinPm1();
        $izin = Izin::findOne($id);
        $user = \backend\models\User::findOne($user_id);
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = $user_id;
        
        $model->nama = $user->profile->name;
        $model->nik = $user->username;
        $model->jenkel = $user->profile->jenkel;
        $model->no_kk = $user->profile->no_kk;
        $model->alamat = $user->profile->alamat;
        $model->telepon = $user->profile->telepon;
        $model->tempat_lahir = $user->profile->tempat_lahir;
        $model->tanggal_lahir = $user->profile->tgl_lahir;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinPm1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //$id = Yii::$app->getRequest()->getQueryParam('id');
        $model = $this->findModel($id);
        
        $model->update_by = Yii::$app->user->identity->id;
        $model->update_date = date("Y-m-d");

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionUpdatePetugas($id)
    {
        //$id = Yii::$app->getRequest()->getQueryParam('id');
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            $idCurPros = PerizinanProses::findOne(['perizinan_id'=>$model->perizinan_id, 'active'=>1, 'pelaksana_id'=>Yii::$app->user->identity->pelaksana_id])->id;
            //update Update_by dan Upate_date
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            PerizinanProses::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $idCurPros]);
            
            header('Location: ' . $_SERVER["HTTP_REFERER"] );
            exit;
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinPm1 model.
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
     * Finds the IzinPm1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinPm1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinPm1::findOne($id)) !== null) {
            return $model;
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
    
    public function getDataCapil($NIK, $KK){
        
        $service = \common\components\Service::getPendudukInfo($this->nik, $this->no_kk);
        if($service['message'] == 'fault'){
                 $this->addError('nik', Yii::t('user', 'Maaf Koneksi ke Disdukcapil Sedang Ada Gangguan'));
                 $this->addError('no_kk', Yii::t('user', 'Maaf Koneksi ke Disdukcapil Sedang Ada Gangguan'));
                 return true;
        }
    }
}
