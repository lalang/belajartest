<?php

namespace frontend\controllers;

use kartik\helpers\Html;
use Yii;
use backend\models\UserFile;
use backend\models\UserFileSearch;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserFileController implements the CRUD actions for UserFile model.
 */
class UserFileController extends Controller
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
     * Lists all UserFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = UserFile::findAll(['user_id' => Yii::$app->user->identity->id]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model
        ]);
    }

    /**
     * Displays a single UserFile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerPerizinanBerkas = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinanBerkas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerPerizinanBerkas' => $providerPerizinanBerkas,
        ]);
    }

    /**
     * Creates a new UserFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id, $ref)
    {
        $model = new UserFile();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
			if($id == 'index' && $ref == 'index'){
				return $this->redirect(['index']);
			}else{
				return $this->redirect(['perizinan/upload', 'id'=>$id, 'ref'=>$ref]);
			}
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing UserFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserFile model.
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
     */
    public function actionDownload($files, $user_id) {
        $yourImage = $files;
        $file = Yii::getAlias("@webroot/uploads/{$user_id}/{$yourImage}");

        $type = FileHelper::getMimeType($file);
        $response = Yii::$app->getResponse();
        $response->format = \yii\web\Response::FORMAT_RAW;
        $response->getHeaders()->add('content-type', $type);
        return file_get_contents($file);
    }
    
    /**
     * Finds the UserFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserFile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for PerizinanBerkas
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddPerizinanBerkas()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PerizinanBerkas');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinanBerkas', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
