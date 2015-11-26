<?php

namespace backend\controllers;

use Yii;
use backend\models\DocUserMan;
use backend\models\DocUserManSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DocUserManController implements the CRUD actions for DocUserMan model.
 */
class DocUserManController extends Controller
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
     * Lists all DocUserMan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocUserManSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DocUserMan model.
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
     * Creates a new DocUserMan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { 
        $model = new DocUserMan();
        
       if ($model->loadAll(Yii::$app->request->post())) {
          
       for($i=0;$i<2;$i++)
        { 
             if($i==0) 
                {   
                  $path = Yii::getAlias('@backend') .'/web/dokumen';
                    $fileName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->nama));
                    $model->file = UploadedFile::getInstance($model, 'file');
                    $model->file->saveAs($path .'/'.$fileName.'.'.$model->file->extension,$deleteTempFile = false); 
                } 
                elseif ($i==1) {
                    if($model->id_access =='Pemohon')
                    {
                        $path = Yii::getAlias('@frontend') .'/web/dokumen';
                        $fileName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->nama));
                        $model->file = UploadedFile::getInstance($model, 'file');
                        $model->file->saveAs($path .'/'.$fileName.'.'.$model->file->extension); 
                    }
                                   
                }
                           
        }        
       $model->docs='/web/dokumen/'.$fileName.'.'.$model->file->extension;
         $model->saveAll();
        return $this->redirect(['view', 'id' => $model->id]);
            
            
            
            
            
            //$model->file = UploadedFile::getInstance($model, 'file');
            
            //save path
             
//            $fileName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->nama));
//           $model->file = UploadedFile::getInstance($model, 'file');
//            //$model->file->saveAs(Yii::getAlias('@front').'web/user_manual/'.$fileName.'.'.$model->file->extension);
//             $model->file->saveAs('../web/user_manual/'.$fileName.'.'.$model->file->extension);
//     
//             $model->docs= '../web/user_manual/'.$fileName.'.'.$model->file->extension;
//            //save path
//            $model->file= $fileName.'.'.$model->file->extension;
          
         
            
        }  else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }  
    }

    /**
     * Updates an existing DocUserMan model.
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
     * Deletes an existing DocUserMan model.
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
     * Finds the DocUserMan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DocUserMan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DocUserMan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
