<?php

namespace frontend\controllers;

use Yii;
use backend\models\Izin;
use backend\models\Perizinan;
use backend\models\IzinKesehatan;
use frontend\models\IzinKesehatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * IzinKesehatanController implements the CRUD actions for IzinKesehatan model.
 */
class IzinKesehatanController extends Controller
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
     * Lists all IzinKesehatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinKesehatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinKesehatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerIzinKesehatanJadwal = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinKesehatanJadwals,
        ]);
        $providerIzinKesehatanJadwalDua = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinKesehatanJadwalDuas,
        ]);
        $providerIzinKesehatanJadwalSatu = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinKesehatanJadwalSatus,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerIzinKesehatanJadwal' => $providerIzinKesehatanJadwal,
            'providerIzinKesehatanJadwalDua' => $providerIzinKesehatanJadwalDua,
            'providerIzinKesehatanJadwalSatu' => $providerIzinKesehatanJadwalSatu,
        ]);
    }

    /**
     * Creates a new IzinKesehatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IzinKesehatan();
        $izin = Izin::findOne($id);
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $izin->tipe;
        if($model->tipe == "Perorangan") {
             if(Yii::$app->user->identity->status == 'DKI'){
                $arrAlamat = explode(" RW ",Yii::$app->user->identity->profile->alamat);
                $RW = $arrAlamat[1];
                $arrAlamat = explode(" RT ",$arrAlamat[0]);
                $RT = $arrAlamat[1];
                $model->alamat = $arrAlamat[0];
                $model->rw = $RW;
                $model->rt = $RT;
                $model->propinsi_id = Yii::$app->user->identity->kdprop;
                $model->wilayah_id = Yii::$app->user->identity->kdwil;
                $model->kecamatan_id = Yii::$app->user->identity->kdkec;
                $model->kelurahan_id = Yii::$app->user->identity->kdkel;
            } else {
                $model->alamat = Yii::$app->user->identity->profile->alamat;
            }
            $model->nama = Yii::$app->user->identity->profile->name;
            $model->nik = Yii::$app->user->identity->username;
            $model->telepon = Yii::$app->user->identity->profile->telepon;
            $model->tempat_lahir = Yii::$app->user->identity->profile->tempat_lahir;
            $model->tanggal_lahir = Yii::$app->user->identity->profile->tgl_lahir;
        }
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinKesehatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing IzinKesehatan model.
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
     * Finds the IzinKesehatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinKesehatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IzinKesehatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
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
    * Action to load a tabular form grid
    * for IzinKesehatanJadwal
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinKesehatanJadwal()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwal');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinKesehatanJadwal', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinKesehatanJadwalDua
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinKesehatanJadwalDua()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwalDua');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinKesehatanJadwalDua', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for IzinKesehatanJadwalSatu
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIzinKesehatanJadwalSatu()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinKesehatanJadwalSatu');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinKesehatanJadwalSatu', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
