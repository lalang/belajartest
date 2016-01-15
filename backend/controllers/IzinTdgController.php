<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinTdg;
use backend\models\IzinTdgSearch;
use backend\models\Perizinan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * IzinTdgController implements the CRUD actions for IzinTdg model.
 */
class IzinTdgController extends Controller
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
     * Lists all IzinTdg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinTdgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinTdg model.
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
     * Creates a new IzinTdg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinTdg();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinTdg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            //update Update_by dan Upate_date
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinTdg model.
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
     * Finds the IzinTdg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinTdg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinTdg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	//Petugas Melakukan Revisi
	public function actionRevisi()
    {	
		$get_data = Yii::$app->request->post();
		$perizinan_proses_id = $get_data['IzinTdg']['perizinan_proses_id'];
		$kode_registrasi = $get_data['IzinTdg']['kode_registrasi'];
		$id = $get_data['IzinTdg']['id'];
		$url_back = $get_data['IzinTdg']['url_back'];

		$model = $this->findModel($id);		

         if ($model->loadAll(Yii::$app->request->post())) {
	
				$cek_image = UploadedFile::getInstance($model, 'file');
				if($cek_image){
					if($model->bapl_file){
						unlink('upload_tdg/'.$model->bapl_file);
					}

					$model->file = UploadedFile::getInstance($model, 'file');
					$model->file->saveAs('upload_tdg/'.$kode_registrasi.'.'.$model->file->extension);
					$model->bapl_file= $kode_registrasi.'.'.$model->file->extension;

				}			  
				
				$model->update_date = strftime("%Y-%m-%d");
				$model->update_by = Yii::$app->user->identity->pelaksana_id;
				$model->save(false);
			
			
		   return $this->redirect(['/perizinan/'.$url_back.'/', 'id' => $perizinan_proses_id,'alert'=>'1']);
        } else {
           return $this->redirect(['/perizinan/'.$url_back.'/', 'id' => $perizinan_proses_id]);
        }
    }
	
	public function actionDeletebapl($id, $url, $proses_id)
    {	
		$model = $this->findModel($id);		
		if($model->bapl_file){
			unlink('upload_tdg/'.$model->bapl_file);
		}
		$model->bapl_file = null; 
		$model->save(false);
		return $this->redirect(['/perizinan/'.$url.'/', 'id' => $proses_id]);
    }	
	
}
