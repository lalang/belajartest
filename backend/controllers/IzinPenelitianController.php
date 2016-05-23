<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinPenelitian;
use backend\models\Perizinan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * IzinPenelitianController implements the CRUD actions for IzinPenelitian model.
 */
class IzinPenelitianController extends Controller
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
     * Lists all IzinPenelitian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => IzinPenelitian::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinPenelitian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerAnggotaPenelitian = new \yii\data\ArrayDataProvider([
            'allModels' => $model->anggotaPenelitians,
        ]);
        $providerIzinPenelitianLokasi = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPenelitianLokasis,
        ]);
        $providerIzinPenelitianMetode = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPenelitianMetodes,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerAnggotaPenelitian' => $providerAnggotaPenelitian,
            'providerIzinPenelitianLokasi' => $providerIzinPenelitianLokasi,
            'providerIzinPenelitianMetode' => $providerIzinPenelitianMetode,
        ]);
    }

    /**
     * Creates a new IzinPenelitian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinPenelitian();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinPenelitian model.
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
     * Deletes an existing IzinPenelitian model.
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
     * Finds the IzinPenelitian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinPenelitian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinPenelitian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for AnggotaPenelitian
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddAnggotaPenelitian()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('AnggotaPenelitian');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formAnggotaPenelitian', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPenelitianLokasi
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPenelitianLokasi()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPenelitianLokasi');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPenelitianLokasi', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPenelitianMetode
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPenelitianMetode()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPenelitianMetode');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPenelitianMetode', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
	
	//Petugas Melakukan Revisi
	public function actionRevisi()
    {	
		$get_data = Yii::$app->request->post();		
		$perizinan_proses_id = $get_data['IzinPenelitian']['perizinan_proses_id'];
		$kode_registrasi = $get_data['IzinPenelitian']['kode_registrasi'];
		$id = $get_data['IzinPenelitian']['id'];
		$url_back = $get_data['IzinPenelitian']['url_back'];

		$model = $this->findModel($id);		

         if ($model->loadAll(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            $session->set('UpdatePetugas',1);
			$model->update_date = gmdate("Y-m-d", time()+60*60*7); 
			$model->update_by = Yii::$app->user->identity->pelaksana_id;
			$model->save(false);
			
			
		   return $this->redirect(['/perizinan/'.$url_back.'/', 'id' => $perizinan_proses_id,'alert'=>'1']);
        } else {
           return $this->redirect(['/perizinan/'.$url_back.'/', 'id' => $perizinan_proses_id]);
        }
    }
	
	public function actionSubkot() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kot_id = $parents[0];
                $out = \backend\models\Lokasi::getAllKotOptions($kot_id);
                if (!empty($_POST['depdrop_params'])) {
                 $params = $_POST['depdrop_params'];
                 $selected = $params[0];
                 }  else {
                     $selected = '';
                 }
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
    
    public function actionSubkec() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = \backend\models\Lokasi::getAllKecOptions($cat_id, $subcat_id);
                if (!empty($_POST['depdrop_params'])) {
                 $params = $_POST['depdrop_params'];
                 $selected = $params[0];
                 }  else {
                     $selected = '';
                 }
                echo Json::encode(['output' => $data, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
    
    public function actionSubkel() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $prov_id = empty($ids[0]) ? null : $ids[0];
            $subkot_id = empty($ids[1]) ? null : $ids[1];
            $subkec_id = empty($ids[2]) ? null : $ids[2];
            if ($prov_id != null) {
                $data = \backend\models\Lokasi::getAllKelOptions($prov_id, $subkot_id, $subkec_id);
                if (!empty($_POST['depdrop_params'])) {
                 $params = $_POST['depdrop_params'];
                 $selected = $params[0];
                 }  else {
                     $selected = '';
                 }
                echo Json::encode(['output' => $data, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
    
    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \backend\models\Lokasi::getKecOptions($cat_id);
                if (!empty($_POST['depdrop_params'])) {
                 $params = $_POST['depdrop_params'];
                 $selected = $params[0];
                 }  else {
                     $selected = '';
                 }
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
}
