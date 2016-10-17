<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinPariwisata;
use backend\models\IzinPariwisataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Perizinan;
use backend\models\PerizinanProses;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * IzinPariwisataController implements the CRUD actions for IzinPariwisata model.
 */
class IzinPariwisataController extends Controller
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
     * Lists all IzinPariwisata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinPariwisataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinPariwisata model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerIzinPariwisataAkta = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataAktas,
        ]);
        $providerIzinPariwisataFasilitas = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataFasilitas,
        ]);
        $providerIzinPariwisataJenisManum = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataJenisManums,
        ]);
        $providerIzinPariwisataKapasitasAkomodasi = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataKapasitasAkomodasis,
        ]);
        $providerIzinPariwisataKapasitasTransport = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataKapasitasTransports,
        ]);
        $providerIzinPariwisataKbli = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataKblis,
        ]);
        $providerIzinPariwisataTeknis = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataTeknis,
        ]);
        $providerIzinPariwisataTujuanWisata = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPariwisataTujuanWisatas,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerIzinPariwisataAkta' => $providerIzinPariwisataAkta,
            'providerIzinPariwisataFasilitas' => $providerIzinPariwisataFasilitas,
            'providerIzinPariwisataJenisManum' => $providerIzinPariwisataJenisManum,
            'providerIzinPariwisataKapasitasAkomodasi' => $providerIzinPariwisataKapasitasAkomodasi,
            'providerIzinPariwisataKapasitasTransport' => $providerIzinPariwisataKapasitasTransport,
            'providerIzinPariwisataKbli' => $providerIzinPariwisataKbli,
            'providerIzinPariwisataTeknis' => $providerIzinPariwisataTeknis,
            'providerIzinPariwisataTujuanWisata' => $providerIzinPariwisataTujuanWisata,
        ]);
    }

    /**
     * Creates a new IzinPariwisata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinPariwisata();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinPariwisata model.
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
     * Deletes an existing IzinPariwisata model.
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
     * Finds the IzinPariwisata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinPariwisata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinPariwisata::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataAkta
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataAkta()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataAkta');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataAkta', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataFasilitas
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataFasilitas()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataFasilitas');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataFasilitas', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataJenisManum
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataJenisManum()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataJenisManum');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataJenisManum', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataKapasitasAkomodasi
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataKapasitasAkomodasi()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataKapasitasAkomodasi');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataKapasitasAkomodasi', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataKapasitasTransport
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataKapasitasTransport()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataKapasitasTransport');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataKapasitasTransport', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataKbli
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataKbli()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataKbli');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataKbli', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataTeknis
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataTeknis()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataTeknis');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataTeknis', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinPariwisataTujuanWisata
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinPariwisataTujuanWisata()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPariwisataTujuanWisata');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPariwisataTujuanWisata', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
	
	//Petugas Melakukan Revisi
	public function actionUpdatePetugas($id)
    {
        //$id = Yii::$app->getRequest()->getQueryParam('id');
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {

            $session = Yii::$app->session;
            $session->set('UpdatePetugas',1);
            
            $model->saveAll();
            
            $idCurPros = PerizinanProses::findOne(['perizinan_id'=>$model->perizinan_id, 'active'=>1, 'pelaksana_id'=>Yii::$app->user->identity->pelaksana_id])->id;
            //update Update_by dan Upate_date
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            PerizinanProses::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $idCurPros]);
			
            $a= $_SERVER["HTTP_REFERER"];
            $get_url = explode('?',$_SERVER["HTTP_REFERER"]);
         
           if($find = strpos(strtoupper($a), strtoupper("cek-form"))){
            header('Location: ' . $_SERVER["HTTP_REFERER"].'&alert=1');
           }elseif($find = strpos(strtoupper($a), strtoupper("form-manage-izin"))){
            header('Location: ' . $_SERVER["HTTP_REFERER"].'&alert=1');
           }
            else {
               header('Location: ' . $get_url[0].'?alert=1');
          }
            exit;
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
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
                } else {
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
                } else {
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
                } else {
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
                } else {
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
                } else {
                    $selected = '';
                }
                echo Json::encode(['output' => $data, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
}
