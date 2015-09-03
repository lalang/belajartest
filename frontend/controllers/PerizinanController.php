<?php

namespace frontend\controllers;

use Yii;
use backend\models\Perizinan;
use frontend\models\PerizinanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * PerizinanController implements the CRUD actions for Perizinan model.
 */
class PerizinanController extends Controller {

    public $layout = 'lay-admin';

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
        ]);
    }

    /**
     * Lists all Izin models.
     * @return mixed
     */
    public function actionSearch() {
        $model = new \frontend\models\SearchIzin();

        if ($model->load(Yii::$app->request->post())) {
            $action = \backend\models\Izin::findOne($model->izin)->action . '/create';
            return $this->redirect([$action, 'id' => $model->izin, 'status' => $model->status]);
        } else {
            return $this->render('search', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single Perizinan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerIzinSiup = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinSiups,
        ]);
        $providerPerizinan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanDokumen = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinanDokumen,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerIzinSiup' => $providerIzinSiup,
                    'providerPerizinan' => $providerPerizinan,
                    'providerPerizinanDokumen' => $providerPerizinanDokumen,
        ]);
    }

    /**
     * Creates a new Perizinan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Perizinan();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
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

    public function actionSchedule($id, $ref = null) {
        $model = $this->findModel($id);

        $model->referrer_id = $ref;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('schedule', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \backend\models\Lokasi::getKecamatanOptions($cat_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
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
                $data = \backend\models\Lokasi::getKelurahanOptions($cat_id, $subcat_id);
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
        $providerIzinSiup = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinSiups,
        ]);
        $providerPerizinan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanDokumen = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinanDokumens,
        ]);
        $providerPerizinanProses = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiup' => $providerIzinSiup,
            'providerPerizinan' => $providerPerizinan,
            'providerPerizinanDokumen' => $providerPerizinanDokumen,
            'providerPerizinanProses' => $providerPerizinanProses,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
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

}
