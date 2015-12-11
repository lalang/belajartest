<?php

namespace backend\controllers;


use backend\models\HistoryPlh;
use backend\models\HistoryPlhSearch;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

/**
 * HistoryPlhController implements the CRUD actions for HistoryPlh model.
 */
class HistoryPlhController extends Controller
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
     * Lists all HistoryPlh models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistoryPlhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'stat' => 'Create',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HistoryPlh model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerPerizinan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerPerizinan' => $providerPerizinan,
        ]);
    }
    
    public function actionViewHistory()
    {
        $searchModel = new HistoryPlhSearch();
        $dataProvider = $searchModel->searchHistory(Yii::$app->request->queryParams);

        return $this->render('index', [
            'stat' => 'History',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new HistoryPlh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HistoryPlh();

        if ($model->loadAll(Yii::$app->request->post()) ) {
            
            $lokasi = \backend\models\User::findOne(['id'=>$model->user_id]);
            $model->user_lokasi = $lokasi->lokasi_id;
            $lokasiPLH = \backend\models\User::findOne(['id'=>$model->user_plh_id]);
            $model->user_plh_lokasi = $lokasiPLH->lokasi_id;
            
            $model->saveAll();
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HistoryPlh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        

        if ($model->loadAll(Yii::$app->request->post())) {
            
            $lokasi = \backend\models\User::findOne(['id'=>$model->user_id]);
            $model->user_lokasi = $lokasi->lokasi_id;
            $lokasiPLH = \backend\models\User::findOne(['id'=>$model->user_plh_id]);
            $model->user_plh_lokasi = $lokasiPLH->lokasi_id;
            
            $model->saveAll();
            
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HistoryPlh model.
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
     * Finds the HistoryPlh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HistoryPlh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HistoryPlh::findOne($id)) !== null) {
            return $model;
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
    public function actionAddPerizinan()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Perizinan');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    public function actionChildAccount() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \backend\models\User::getUserPLH($cat_id);
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
}
