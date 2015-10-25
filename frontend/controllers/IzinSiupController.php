
<?php

namespace frontend\controllers;

use Yii;
use backend\models\IzinSiup;
use frontend\models\IzinSiupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * IzinSiupController implements the CRUD actions for IzinSiup model.
 */
class IzinSiupController extends Controller {

    //public $layout = 'lay-admin';

    public function behaviors() {
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
     * Lists all IzinSiup models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new IzinSiupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IzinSiup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerIzinSiupAkta = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinSiupAktas,
        ]);
        $providerIzinSiupKbli = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinSiupKblis,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerIzinSiupAkta' => $providerIzinSiupAkta,
                    'providerIzinSiupKbli' => $providerIzinSiupKbli,
        ]);
    }

    /**
     * Creates a new IzinSiup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($izin, $status,$tipe) {
//        $id = \Yii::$app->session->get('user.id');
//        $status  = \Yii::$app->session->get('user.status');
//        $tipe = \Yii::$app->session->get('user.tipe');
        $model = new IzinSiup();
//        $model->scenario = 'insert';

        $model->izin_id = $izin;
        $model->status_id = $status;
        $model->user_id = Yii::$app->user->id;
        $model->tipe = $tipe;
        $model->nama = Yii::$app->user->identity->profile->name;
        $model->ktp = Yii::$app->user->identity->username;
        $model->alamat = Yii::$app->user->identity->profile->alamat;
        $model->telepon = Yii::$app->user->identity->profile->telepon;

        $izinmodel = \backend\models\Izin::findOne($izin);
        if (strpos(strtolower($izinmodel->nama), 'besar') !== false)
            $model->kelembagaan = 'Perdagangan Besar';
        else if (strpos(strtolower($izinmodel->nama), 'menengah') !== false)
            $model->kelembagaan = 'Perdagangan Menengah';
        else if (strpos(strtolower($izinmodel->nama), 'kecil') !== false)
            $model->kelembagaan = 'Perdagangan Kecil';
        else
            $model->kelembagaan = 'Usaha Mikro';

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
//             \Yii::$app->session->set('user.pid',$model->perizinan_id);
//            \Yii::$app->session->set('user.ref',$model->id);
            return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinSiup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
      public function actionUpdate($id) {
        $model = $this->findModel($id);
        
//        $model->scenario = 'update';
        
       // $model->setIsNewRecord(false);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            if($model->perizinan->lokasi_pengambilan_id == NULL){
                return $this->redirect(['/perizinan/schedule', 'id' => $id]);
            }
            else{
                return $this->redirect(['/perizinan/active']);
            }
//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing IzinSiup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * 
     * for export pdf at actionView
     *  
     * @param type $id
     * @return type
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerIzinSiupAkta = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinSiupAktas,
        ]);
        $providerIzinSiupKbli = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinSiupKblis,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiupAkta' => $providerIzinSiupAkta,
            'providerIzinSiupKbli' => $providerIzinSiupKbli,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
     * Finds the IzinSiup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinSiup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = IzinSiup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinSiupAkta
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinSiupAkta() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinSiupAkta');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinSiupAkta', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinSiupKbli
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinSiupKbli() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinSiupKbli');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinSiupKbli', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
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

    public function actionSubizin() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $bid = $_POST['depdrop_parents'];
            if ($bid != null) {
                $bid_id = $bid[0];
                $out = \backend\models\Izin::getIzinOptions($bid_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

}