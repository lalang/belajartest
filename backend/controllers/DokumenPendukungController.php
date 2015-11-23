<?php

namespace backend\controllers;

use Yii;
use backend\models\DokumenPendukung;
use backend\models\DokumenPendukungSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\web\UploadedFile;
/**
 * DokumenPendukungController implements the CRUD actions for DokumenPendukung model.
 */
class DokumenPendukungController extends Controller
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
     * Lists all DokumenPendukung models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		$session = Yii::$app->session;
		$session->set('id_induk',$id);
		
        $searchModel = new DokumenPendukungSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DokumenPendukung model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),'id_induk'=>$_SESSION['id_induk']
        ]);
    }

    /**
     * Creates a new DokumenPendukung model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {	
        $model = new DokumenPendukung();

        if ($model->loadAll(Yii::$app->request->post())) {
		//print_r($model->file.'helloo'); die();
            
                $path = Yii::getAlias('@frontend') .'/web/download/dok_perizinan';
                $model->file = UploadedFile::getInstance($model, 'nm_file');
            if($model->file){
                $model->file->saveAs($path .'/'.$model->file);

                //save path
                $model->file= $model->file;
                $model->tipe= $model->file->extension;
            }
            
            
            $model->saveAll();
		
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,'id_induk'=>$_SESSION['id_induk']
            ]);
        }
    }

    /**
     * Updates an existing DokumenPendukung model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
		
			$cek_file = UploadedFile::getInstance($model, 'nm_file');
            if($cek_file){
				$path = Yii::getAlias('@frontend') .'/web/download/dok_perizinan';
				if($model->file){					
					unlink($path.'/'.$model->file);	
				}	
				$model->file = UploadedFile::getInstance($model, 'nm_file');
				$model->file->saveAs($path .'/'.$model->file);

                $model->file= $model->file;
				$model->tipe= $model->file->extension;

            }

            $model->saveAll();
		
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,'id_induk'=>$_SESSION['id_induk']
            ]);
        }
    }

    /**
     * Deletes an existing DokumenPendukung model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		if($model->file){
			$path = Yii::getAlias('@frontend') .'/web/download/dok_perizinan';	
			unlink($path.'/'.$model->file);
		}
		
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index','id'=>$_SESSION['id_induk']]);
    }
    
	public function actionDeletefile($id)
    {	
		$path = Yii::getAlias('@frontend') .'/web/download/dok_perizinan';	
		$model = $this->findModel($id);
		if($model->file){
			unlink($path.'/'.$model->file);
		}
		$model->file= '';
		$model->saveAll();
		
		return $this->redirect(['update', 'id' => $model->id]);
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
     * Finds the DokumenPendukung model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DokumenPendukung the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DokumenPendukung::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
