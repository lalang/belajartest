<?php

namespace backend\controllers;

use Yii;
use backend\models\Page;
use backend\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
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
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();

        if ($model->loadAll(Yii::$app->request->post())) {


            $imageName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->page_title));
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('images/pages/'.$imageName.'.'.$model->file->extension);

            //save path
            $model->page_image= $imageName.'.'.$model->file->extension;

            $model->page_title_seo = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->page_title));
            $model->page_title_seo_en = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->page_title_en));

            $model->page_date = date('Y-m-d');
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Page model.
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

                unlink('images/pages/'.$model->page_image);
                $imageName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->page_image));
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('images/pages/'.$imageName.'.'.$model->file->extension);

                //save path
                $model->page_image= $imageName.'.'.$model->file->extension;

            }

            $model->page_title_seo = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->page_title));
            $model->page_title_seo_en = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->page_title_en));
            $model->saveAll();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Page model.
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
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
