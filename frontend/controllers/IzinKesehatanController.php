<?php

namespace frontend\controllers;

use Yii;
use backend\models\IzinKesehatan;
use frontend\models\IzinKesehatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
}
