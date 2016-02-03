<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinTdp;
use backend\models\IzinTdpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \backend\models\PerizinanProses;
use \backend\models\Perizinan;

/**
 * IzinTdpController implements the CRUD actions for IzinTdp model.
 */
class IzinTdpController extends Controller
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
     * Lists all IzinTdp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinTdpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinTdp model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerIzinTdpKantorcabang = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpKantorcabangs,
        ]);
        $providerIzinTdpKegiatan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpKegiatans,
        ]);
        $providerIzinTdpLegal = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpLegals,
        ]);
        $providerIzinTdpPimpinan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpPimpinans,
        ]);
        $providerIzinTdpSaham = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinTdpSahams,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerIzinTdpKantorcabang' => $providerIzinTdpKantorcabang,
            'providerIzinTdpKegiatan' => $providerIzinTdpKegiatan,
            'providerIzinTdpLegal' => $providerIzinTdpLegal,
            'providerIzinTdpPimpinan' => $providerIzinTdpPimpinan,
            'providerIzinTdpSaham' => $providerIzinTdpSaham,
        ]);
    }

    /**
     * Creates a new IzinTdp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinTdp();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinTdp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
     * Deletes an existing IzinTdp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the IzinTdp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return IzinTdp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinTdp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpKantorcabang
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpKantorcabang()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpKantorcabang');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpKantorcabang', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpKegiatan
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpKegiatan()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpKegiatan');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpKegiatan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpLegal
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpLegal()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpLegal');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpLegal', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpPimpinan
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpPimpinan()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpPimpinan');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpPimpinan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinTdpSaham
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinTdpSaham()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinTdpSaham');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinTdpSaham', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
	
	//Petugas Melakukan Revisi
	public function actionRevisi()
    {	
		$get_data = Yii::$app->request->post();		
		echo"<pre>";print_r(count($get_data['IzinTdpLegal'])); 
		$limit = count($get_data['IzinTdpLegal']);
		$n=0;
		while($n<$limit){
		//	echo"<br>".$get_data['IzinTdpLegal'][$n];
			echo"<pre>";print_r($get_data['IzinTdpLegal'][$n]); 
			$n++;
		}
		
		echo"<pre>";print_r($get_data); die();
		
		$perizinan_proses_id = $get_data['IzinTdp']['perizinan_proses_id'];
		$kode_registrasi = $get_data['IzinTdp']['kode_registrasi'];
		$id = $get_data['IzinTdp']['id'];
		$url_back = $get_data['IzinTdp']['url_back'];
		$model = $this->findModel($id);		

         if ($model->loadAll(Yii::$app->request->post())) {		  		
			$model->update_date = strftime("%Y-%m-%d");
            $idCurPros = PerizinanProses::findOne(['perizinan_id'=>$model->perizinan_id, 'active'=>1, 'pelaksana_id'=>Yii::$app->user->identity->pelaksana_id])->id;
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            PerizinanProses::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $idCurPros]);
			$model->save(false);
		   return $this->redirect(['/perizinan/'.$url_back.'/', 'id' => $perizinan_proses_id,'alert'=>'1']);
        } else {
           return $this->redirect(['/perizinan/'.$url_back.'/', 'id' => $perizinan_proses_id]);
        }
    }
}
