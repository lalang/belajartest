<?php

namespace frontend\controllers;

use backend\models\Izin;
use backend\models\IzinSiup;
use backend\models\IzinTdp;
use backend\models\Lokasi;
use backend\models\BentukPerusahaan;
use backend\models\StatusPerusahaan;
use frontend\models\IzinSiupSearch;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

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
	
	public function actionProd() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = \backend\models\Lokasi::getLurahOptions($cat_id, $subcat_id);
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


    /**
     * Displays a single IzinTdp model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id) {
      //  $model = $this->findModel($id);
        $providerIzinSiupAkta = new ArrayDataProvider([
            'allModels' => $model->izinSiupAktas,
        ]);
        $providerIzinSiupKbli = new ArrayDataProvider([
            'allModels' => $model->izinSiupKblis,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerIzinSiupAkta' => $providerIzinSiupAkta,
                    'providerIzinSiupKbli' => $providerIzinSiupKbli,
        ]);
    }*/
//
    /**
     * Creates a new IzinTdp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $model = new IzinTdp();
        $izin = Izin::findOne($id); 
		$izinsiup = IzinSiup::find()->where(['user_id'=>Yii::$app->user->id])->one(); 

	//	echo $izinsiup->nama; die();
		$model->nama = $izinsiup->nama;
        $model->alamat = $izinsiup->alamat;
        $model->tempat_lahir = $izinsiup->tempat_lahir;
		$model->tanggal_lahir = $izinsiup->tanggal_lahir;
		
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;
		
		//echo $model->perizinan->referrer_id; echo $izinsiup->nama; die();
		//$model = Perizinan::find()->where(['pemohon_id'=>Yii::$app->user->identity->id])->one();
		//$model = \yii\helpers\ArrayHelper::map(izinSiup::find()->joinWith(['perizinan'])->where(['perizinan.pemohon_id'=>Yii::$app->user->identity->id])->asArray()->all(), 'id', 'nama_perusahaan');
		
		//echo"<pre>"; print_r($model); die();
        if ($model->loadAll(Yii::$app->request->post())) {
			
			return $this->render('create_next', [
                'model' => $model,
         ]);
			
			//$model->saveAll(); 
		die();
            //return $this->redirect(['view', 'id' => $model->id]);
        } else { 
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        
//        $model = new IzinTdp();
//
//        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
    }
//
//    /**
//     * Updates an existing IzinTdp model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//
//    /**
//     * Deletes an existing IzinTdp model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->deleteWithRelated();
//
//        return $this->redirect(['index']);
//    }
//    
//    /**
//     * Finds the IzinTdp model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return IzinTdp the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = IzinTdp::findOne($id)) !== null) {
//            return $model;
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
//    
//    /**
//    * Action to load a tabular form grid
//    * for IzinTdpKantor
//    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
//    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
//    *
//    * @return mixed
//    */
//    public function actionAddIzinTdpKantor()
//    {
//        if (Yii::$app->request->isAjax) {
//            $row = Yii::$app->request->post('IzinTdpKantor');
//            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
//                $row[] = [];
//            return $this->renderAjax('_formIzinTdpKantor', ['row' => $row]);
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
//    
//    /**
//    * Action to load a tabular form grid
//    * for IzinTdpKegiatan
//    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
//    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
//    *
//    * @return mixed
//    */
//    public function actionAddIzinTdpKegiatan()
//    {
//        if (Yii::$app->request->isAjax) {
//            $row = Yii::$app->request->post('IzinTdpKegiatan');
//            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
//                $row[] = [];
//            return $this->renderAjax('_formIzinTdpKegiatan', ['row' => $row]);
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
//    
//    /**
//    * Action to load a tabular form grid
//    * for IzinTdpLeglain
//    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
//    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
//    *
//    * @return mixed
//    */
//    public function actionAddIzinTdpLeglain()
//    {
//        if (Yii::$app->request->isAjax) {
//            $row = Yii::$app->request->post('IzinTdpLeglain');
//            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
//                $row[] = [];
//            return $this->renderAjax('_formIzinTdpLeglain', ['row' => $row]);
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
//    
//    /**
//    * Action to load a tabular form grid
//    * for IzinTdpPemegang
//    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
//    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
//    *
//    * @return mixed
//    */
//    public function actionAddIzinTdpPemegang()
//    {
//        if (Yii::$app->request->isAjax) {
//            $row = Yii::$app->request->post('IzinTdpPemegang');
//            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
//                $row[] = [];
//            return $this->renderAjax('_formIzinTdpPemegang', ['row' => $row]);
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
//    
//    /**
//    * Action to load a tabular form grid
//    * for IzinTdpPimpinan
//    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
//    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
//    *
//    * @return mixed
//    */
//    public function actionAddIzinTdpPimpinan()
//    {
//        if (Yii::$app->request->isAjax) {
//            $row = Yii::$app->request->post('IzinTdpPimpinan');
//            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
//                $row[] = [];
//            return $this->renderAjax('_formIzinTdpPimpinan', ['row' => $row]);
//        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
//        }
//    }
}
