<?php

namespace backend\controllers;

use Yii;
use backend\models\Berita;
use backend\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
class BeritaController extends Controller
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
     * Lists all Berita models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Berita model.
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
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Berita();

        if ($model->loadAll(Yii::$app->request->post())) {

            $imageName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('images/news/'.$imageName.'.'.$model->file->extension);

            //save path
            $model->gambar= $imageName.'.'.$model->file->extension;
            $model->hari = $this->getDays(date('w'));
            $model->jam = date('H:i:s');    
            $model->tanggal = date ('Y-m-d');  
            $model->judul_seo = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
            $model->judul_seo_en = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul_en));
            $model->saveAll();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Berita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {

            $cek_image = UploadedFile::getInstance($model, 'file');
            if($cek_image){

                unlink('images/news/'.$model->gambar);
                $imageName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('images/news/'.$imageName.'.'.$model->file->extension);

                //save path
                $model->gambar= $imageName.'.'.$model->file->extension;

            }

            $model->hari = $this->getDays(date('w'));
            $model->jam = date('H:i:s');    
            $model->tanggal = date ('Y-m-d');  
            $model->judul_seo = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
            $model->judul_seo_en = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul_en));
            $model->saveAll();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Berita model.
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
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    function getDays($day){

        switch($day){      
            case 1 : {
                        $hari='Senin';
                    }break;
            case 2 : {
                        $hari='Selasa';
                    }break;
            case 3 : {
                        $hari='Rabu';
                    }break;
            case 4 : {
                        $hari='Kamis';
                    }break;
            case 5 : {
                        $hari="Jumat";
                    }break;
            case 6 : {
                        $hari='Sabtu';
                    }break;
            default: {
                        $hari='Minggu';
                    }break;
            }

            return $hari;
    }
}
