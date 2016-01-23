<?php

namespace frontend\controllers;

use Yii;
use backend\models\IzinTdp;
use frontend\models\IzinTdpSearch;
use backend\models\Izin;
use backend\models\Lokasi;
use backend\models\Perizinan;
use backend\models\BentukPerusahaan;
use backend\models\StatusPerusahaan;
use kartik\mpdf\Pdf;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

/**
 * IzinTdpController implements the CRUD actions for IzinTdp model.
 */
class IzinTdpController extends Controller
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
     * Lists all IzinTdp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinTdpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinTdp model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerIzinTdpKantorcabang = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpKantorcabangs,
        ]);
        $providerIzinTdpKegiatan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpKegiatans,
        ]);
        $providerIzinTdpLegal = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpLegals,
        ]);
        $providerIzinTdpPimpinan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpPimpinans,
        ]);
        $providerIzinTdpSaham = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpSahams,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerIzinTdpKantorcabang' => $providerIzinTdpKantorcabang,
            'providerIzinTdpKegiatan' => $providerIzinTdpKegiatan,
            'providerIzinTdpLegal' => $providerIzinTdpLegal,
            'providerIzinTdpPimpinan' => $providerIzinTdpPimpinan,
            'providerIzinTdpSaham' => $providerIzinTdpSaham,
        ]);
    }

    /**
     * Creates a new IzinTdp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $type_profile = Yii::$app->user->identity->profile->tipe;	
        $data_bp=ArrayHelper::map(BentukPerusahaan::find()->andFilterWhere(['LIKE', 'type', $type_profile])->all(),'id','nama');
        $data_sp=ArrayHelper::map(StatusPerusahaan::find()->orderBy('id')->all(),'id','nama');
        
        $model = new IzinTdp();
        $izin = Izin::findOne($id);
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        
        if($type_profile == "Perusahaan"){
            //Todo Jika Perusahaan
        } else {
           //Todo Jika Perorangan 
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,'data_bp'=>$data_bp,'data_sp'=>$data_sp
            ]);
        }
    }

    /**
     * Updates an existing IzinTdp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $type_profile = Yii::$app->user->identity->profile->tipe;	
        $data_bp=ArrayHelper::map(BentukPerusahaan::find()->andFilterWhere(['LIKE', 'type', $type_profile])->all(),'id','nama');
        $data_sp=ArrayHelper::map(StatusPerusahaan::find()->orderBy('id')->all(),'id','nama');
        
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            //update Update_by dan Upate_date
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinTdp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the IzinTdp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IzinTdp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinTdp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpKantorcabang
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpKantorcabang()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpKantorcabang');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpKantorcabang', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpKegiatan
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpKegiatan()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpKegiatan');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpKegiatan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpLegal
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpLegal()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpLegal');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpLegal', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpPimpinan
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpPimpinan()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpPimpinan');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpPimpinan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpSaham
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpSaham()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpSaham');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpSaham', ['row' => $row]);
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
}
