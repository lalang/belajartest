<?php

namespace backend\controllers;

use Yii;
use backend\models\Download;
use backend\models\DownloadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DownloadController implements the CRUD actions for Download model.
 */
class DownloadController extends Controller
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
     * Lists all Download models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		$session = Yii::$app->session;
		$session->set('id_induk',$id);
		
        $searchModel = new DownloadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Download model.
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
     * Creates a new Download model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Download();

        if ($model->loadAll(Yii::$app->request->post())) {
			$path = Yii::getAlias('@frontend') .'/web/download/regulasi';
			$nm_dl = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs($path .'/'.$nm_dl.'.'.$model->file->extension);

            //save path
            $model->nama_file= $nm_dl.'.'.$model->file->extension;
			$model->jenis_file= $model->file->extension;
            $model->tanggal = date ('Y-m-d');  
            $model->saveAll();
		
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Download model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
		
			$cek_file = UploadedFile::getInstance($model, 'file');
            if($cek_file){
				$path = Yii::getAlias('@frontend') .'/web/download/regulasi';	
				if($model->nama_file){					
					unlink($path.'/'.$model->nama_file);
				}
                $nm_dl = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs($path.'/'.$nm_dl.'.'.$model->file->extension);

                //save path
                $model->nama_file= $nm_dl.'.'.$model->file->extension;
				$model->jenis_file= $model->file->extension;

            }
			
            $model->tanggal = date ('Y-m-d');  
            $model->saveAll();
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Download model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $path = Yii::getAlias('@frontend') .'/web/download/regulasi';	
		$model = $this->findModel($id);
		if($model->nama_file){
			unlink($path.'/'.$model->nama_file);
		}
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
	
	public function actionDeletefile($id)
    {	
		$path = Yii::getAlias('@frontend') .'/web/download/regulasi';	
		$model = $this->findModel($id);
		if($model->nama_file){
			unlink($path.'/'.$model->nama_file);
		}

		$model->nama_file= '';
		$model->save(false);
		
		return $this->redirect(['update', 'id' => $model->id]);
    }
    
    /**
     * Finds the Download model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Download the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Download::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
