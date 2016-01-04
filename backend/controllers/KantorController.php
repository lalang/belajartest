<?php

namespace backend\controllers;

use Yii;
use backend\models\Kantor;
use backend\models\KantorSearch;
use backend\models\LokasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KantorController implements the CRUD actions for Kantor model.
 */
class KantorController extends Controller
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
     * Lists all Kantor models.
     * @return mixed
     */
    public function actionIndex($id)
    {	
        $session = Yii::$app->session;
        $session->set('id_induk',$id);

        $searchModel = new KantorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kantor model.
     * @param string $id
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
     * Creates a new Kantor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kantor();
        
        $searchModel = new LokasiSearch();
        
        $query = $searchModel->searchById(Yii::$app->request->queryParams,$_SESSION['id_induk']);
        
        $namaLoc = $query->nama;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'namaLoc' => $namaLoc,
            ]);
        }
    }

    /**
     * Updates an existing Kantor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $searchModel = new LokasiSearch();
        
        $query = $searchModel->searchById(Yii::$app->request->queryParams,$_SESSION['id_induk']);
        
        $namaLoc = $query->nama;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'namaLoc' => $namaLoc,
            ]);
        }
    }

    /**
     * Deletes an existing Kantor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index','id'=>$_SESSION['id_induk']]);
    }
    
    /**
     * Finds the Kantor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Kantor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kantor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
