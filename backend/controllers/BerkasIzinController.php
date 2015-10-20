<?php

namespace backend\controllers;

use Yii;
use backend\models\BerkasIzin;
use backend\models\BerkasIzinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BerkasIzinController implements the CRUD actions for BerkasIzin model.
 */
class BerkasIzinController extends Controller
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
     * Lists all BerkasIzin models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		$session = Yii::$app->session;
		$session->set('id_induk',$id);
		
        $searchModel = new BerkasIzinSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BerkasIzin model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerPerizinanBerkas = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinanBerkas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerPerizinanBerkas' => $providerPerizinanBerkas,'id_induk'=>$_SESSION['id_induk']
        ]);
    }

    /**
     * Creates a new BerkasIzin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BerkasIzin();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,'id_induk'=>$_SESSION['id_induk']
            ]);
        }
    }

    /**
     * Updates an existing BerkasIzin model.
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
                'model' => $model,'id_induk'=>$_SESSION['id_induk']
            ]);
        }
    }

    /**
     * Deletes an existing BerkasIzin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index','id'=>$_SESSION['id_induk']]);
    }
    
    /**
     * Finds the BerkasIzin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BerkasIzin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BerkasIzin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PerizinanBerkas
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPerizinanBerkas()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PerizinanBerkas');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinanBerkas', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
