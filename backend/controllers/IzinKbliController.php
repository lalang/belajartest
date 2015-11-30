<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinKbli;
use backend\models\IzinKbliSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * IzinKbliController implements the CRUD actions for IzinKbli model.
 */
class IzinKbliController extends Controller
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
     * Lists all IzinKbli models.
     * @return mixed
     */
    public function actionIndex($id)
    {	

		$session = Yii::$app->session;
		$session->set('id_induk',$id);
		$data = \backend\models\Izin::find()->where(['id'=>$id])->orderBy('id')->asArray()->all();
		
        $searchModel = new IzinKbliSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'judul' => $data[0]['nama'],
        ]);
    }

    /**
     * Displays a single IzinKbli model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {	
		$data = \backend\models\Izin::find()->where(['id'=>$_SESSION['id_induk']])->orderBy('id')->asArray()->all();
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
			'judul' => $data[0]['nama'],
        ]);
    }

    /**
     * Creates a new IzinKbli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinKbli();
		$data = \backend\models\Izin::find()->where(['id'=>$id])->orderBy('id')->asArray()->all();
        if ($model->loadAll(Yii::$app->request->post())) {
			$cekdata = count(\backend\models\KbliIzin::find()->where(['and',['izin_id'=>[$model->izin_id]],['kbli_id'=>$model->kbli_id]])->one());

			if($cekdata){
				return $this->render('create', [
					'model' => $model,'id_induk'=>$_SESSION['id_induk'], 'judul' => $data[0]['nama'], 'flag' => '2'
				]);
			}else{
			
				$model->saveAll();
				return $this->render('create', [
					'model' => $model,'id_induk'=>$_SESSION['id_induk'], 'judul' => $data[0]['nama'], 'flag' => '1'
				]);
			
			}
			
        } else {
            return $this->render('create', [
                'model' => $model,'id_induk'=>$_SESSION['id_induk'], 'judul' => $data[0]['nama'],'flag' => '0'
            ]);
        }
    }

    /**
     * Updates an existing IzinKbli model.
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
     * Deletes an existing IzinKbli model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index','id'=>$_SESSION['id_induk']]);
    }
    
    /**
     * Finds the IzinKbli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinKbli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinKbli::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
