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
     * @param string $id
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
		
			$imageName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
			$cek_image = UploadedFile::getInstance($model, 'file');
			if($cek_image){
				$model->file = UploadedFile::getInstance($model, 'file');
				$model->file->saveAs('images/pages/'.$imageName.'.'.$model->file->extension);

				//save path
				$model->gambar= $imageName.'.'.$model->file->extension;
			}
            $model->judul_seo = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
            $model->judul_seo_en = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul_en));

            $model->tanggal = date('Y-m-d');
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
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
		
			$cek_image = UploadedFile::getInstance($model, 'file');
            if($cek_image){
				if($model->gambar){
					unlink('images/pages/'.$model->gambar);
				}
                $imageName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->judul));
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('images/pages/'.$imageName.'.'.$model->file->extension);

                //save path
                $model->gambar= $imageName.'.'.$model->file->extension;

            }

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
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {	
		$model = $this->findModel($id);
		if($model->gambar){
			unlink('images/pages/'.$model->gambar);
		}
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
	
	public function actionDeleteimage($id)
    {	

		$model = $this->findModel($id);
		if($model->gambar){
			unlink('images/pages/'.$model->gambar);
		}
		$model->gambar= '';
		$model->saveAll();
		
		return $this->redirect(['update', 'id' => $model->id]);
    }
    
    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
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
