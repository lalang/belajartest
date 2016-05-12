<?php

namespace backend\controllers;

use Yii;
use backend\models\MetodePenelitian;
use backend\models\MetodePenelitianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MetodePenelitianController implements the CRUD actions for MetodePenelitian model.
 */
class MetodePenelitianController extends Controller
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
     * Lists all MetodePenelitian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MetodePenelitianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MetodePenelitian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
//        $providerIzinPenelitianMetode = new \yii\data\ArrayDataProvider([
//            'allModels' => $model->izinPenelitianMetodes,
//        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
//            'providerIzinPenelitianMetode' => $providerIzinPenelitianMetode,
        ]);
    }

    /**
     * Creates a new MetodePenelitian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MetodePenelitian();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MetodePenelitian model.
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
     * Deletes an existing MetodePenelitian model.
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
     * Finds the MetodePenelitian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MetodePenelitian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MetodePenelitian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
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
//    public function actionAddIzinPenelitianMetode()
//    {
//        if (Yii::$app->request->isAjax) {
//            $row = Yii::$app->request->post('IzinPenelitianMetode');
//            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
//                $row[] = [];
//            return $this->renderAjax('_formIzinPenelitianMetode', ['row' => $row]);
//        } else {
//            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
//        }
//    }
}
