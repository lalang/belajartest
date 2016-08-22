<?php

namespace backend\controllers;

use Yii;
use backend\models\repgen;
use backend\models\repgenSearch;
use backend\models\Lokasi;
use backend\models\JenisIzin;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * RepgenController implements the CRUD actions for repgen model.
 */
class RepgenController extends Controller {

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
     * Lists all repgen models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new repgenSearch();

        $jenisizin = (Yii::$app->request->post('jenisizin') === NULL) ?'SIUP' :Yii::$app->request->post('jenisizin');
        $datepicker_from = Yii::$app->request->post('datepicker_from');
        $datepicker_to = Yii::$app->request->post('datepicker_to');
        $select_lokasi = Yii::$app->request->post('select_lokasi');
        $select_status = Yii::$app->request->post('select_status');
        $select_group = Yii::$app->request->post('select_group');
        $select_order = Yii::$app->request->post('select_order');
        $select_columns = (Yii::$app->request->post('select_columns') === NULL) ?['NoReg' => 'NoReg'] :Yii::$app->request->post('select_columns');

        $view = 'v_repgen_'.strtolower($jenisizin);
        $from = 'FROM '.$view.' ';

        $listColumns = repgen::getFields($jenisizin);
        $listOrderColumns = repgen::getOrderFields($jenisizin);
        $listLokasi = Lokasi::getAll();
        $listIzin = ArrayHelper::map(JenisIzin::find()->all(), 'nama', 'nama');
        $listStatus = repgen::getStatusMohon();
        
        switch ($jenisizin) {
            case 'SIUP':
                $fieldTime = 'tanggal_sk';
                $fieldStatus = 'status_permohonan';
                $fieldLokasi = 'kode_lokasi';
                $select = 'SELECT * ';
                $whereTime = $this->buildWhereClauseTime($fieldTime, $datepicker_from, $datepicker_to);
                $whereStatus = $this->buildWhereClauseStatus($fieldStatus, $select_status);
                $whereLokasi = $this->buildWhereClauseLokasi($fieldLokasi, $select_lokasi);
                break;
            case 'TDP':
                $fieldTime = 'tanggal_sk';
                $fieldStatus = 'status_permohonan';
                $fieldLokasi = 'kode_lokasi';
                $select = 'SELECT * ';
                $whereTime = $this->buildWhereClauseTime($fieldTime, $datepicker_from, $datepicker_to);
                $whereStatus = $this->buildWhereClauseStatus($fieldStatus, $select_status);
                $whereLokasi = $this->buildWhereClauseLokasi($fieldLokasi, $select_lokasi);
                break;
            default:
                $select = 'SELECT \'Nothing to display\' ';
                $from = NULL;
                $where = NULL;
                break;
        }

        $whereTime = (!empty($whereTime)) ?$whereTime :'';
        $whereStatus = (!empty($whereStatus)) ?' AND '.$whereStatus :'';
        $whereLokasi = (!empty($whereLokasi)) ?' AND '.$whereLokasi :'';
        $where = $whereTime.$whereStatus.$whereLokasi;
        $where = (empty($where)) ?'NoReg IS NULL' :$where;
        $group = implode(',',$select_group);
        $order = implode(',',$select_order);

        $sqlsyntax = $select.$from.$where;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $view, $select_columns, $where, $group, $order);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'vJenisIzin' => $jenisizin,
            'vlistStatus' => $listStatus,
            'vlistIzin' => $listIzin,
            'vlistLokasi' => $listLokasi,
            'vlistColumns' => $listColumns,
            'vlistOrderColumns' => $listOrderColumns,
            'vdatepicker_from' => $datepicker_from,
            'vdatepicker_to' => $datepicker_to,
            'vselect_lokasi' => $select_lokasi,
            'vselect_status' => $select_status,
            'vselect_columns' => $select_columns,
            'vselect_group' => $select_group,
            'vselect_order' => $select_order,
        ]);
    }

    /**
     * Displays a single repgen model.
     *
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new repgen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new repgen();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view',]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing repgen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view',]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing repgen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
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

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
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
     * Finds the repgen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @return repgen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = repgen::findOne([])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function buildWhereClauseTime($fieldTime, $datepicker_from = NULL, $datepicker_to = NULL) {
        $datepicker_from = (empty($datepicker_from)) ?(empty($datepicker_to)) ?NULL :$datepicker_to :$datepicker_from;
        $datepicker_to = (empty($datepicker_to)) ?(empty($datepicker_from)) ?NULL :$datepicker_from :$datepicker_to;
        $cond = (empty($datepicker_from) && empty($datepicker_to)) ?NULL :'('.$fieldTime.' BETWEEN \''.$datepicker_from.'\' AND \''.$datepicker_to.'\')';
        return $cond;
    }

    protected function buildWhereClauseStatus($fieldStatus, $select_status) {
        if (!empty($select_status)) {
            $a = 0;
            foreach($select_status as $item) {
                $concat = ($a > 0) ?',' :'';
                $status = $status.$concat.'\''.$item.'\'';
                $a = $a + 1;
            }
            $cond = $fieldStatus.' IN ('.$status.') ';
        } else {
            $cond = '';
        }
        return $cond;
    }

    protected function buildWhereClauseLokasi($fieldLokasi, $select_lokasi) {
        if (!empty($select_lokasi)) {
            $a = 0;
            foreach($select_lokasi as $item) {
                $concat = ($a > 0) ?',' :'';
                $lokasi = $lokasi.$concat.'\''.$item.'\'';
                $a = $a + 1;
            }
            $cond = $fieldLokasi.' IN ('.$lokasi.') ';
        } else {
            $cond = '';
        }
        return $cond;
    }
    
}
