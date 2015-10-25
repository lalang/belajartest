
<?php

namespace backend\controllers;

use backend\models\IzinSiup;
use backend\models\Perizinan;
use backend\models\PerizinanDokumen;
use backend\models\PerizinanProses;
use backend\models\PerizinanSearch;
use DateTime;
use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use dosamigos\qrcode\QrCode;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

//use yii\helpers\Html;

/**
 * PerizinanController implements the CRUD actions for Perizinan model.
 */
class PerizinanController extends Controller {

//    public $layout = 'lay-admin';

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
    
    public function actionDashboard() {
        return $this->render('dashboard');
    }
    public function actionStatus($id) {
        $model = $this->findModel($id);
        return $this->renderAjax('_status',['model'=>$model]);
    }
    public function actionLihat($id) {
        $model = $this->findModel($id);
        if(in_array($model->izin_id, array(619,621,622,626))) {
            $model_izin= IzinSiup::findOne($model->referrer_id);
        }
    
        return $this->renderAjax('_lihat',['model'=>$model_izin]);
    }
    /**
     * Lists all Perizinan models.
     * @return mixed
     */
    public function actionIndex($status = null) {
        $searchModel = new PerizinanSearch();
        
        $searchModel->status = $status;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFilter($status) {
        $searchModel = new PerizinanSearch();
        $searchModel->status = $status;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perizinan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerDokumenPendukung = new ArrayDataProvider([
            'allModels' => $model->izin->dokumenPendukungs,
        ]);
        $providerPerizinan = new ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerDokumenPendukung' => $providerDokumenPendukung,
                    'providerPerizinan' => $providerPerizinan,
                    'providerPerizinanProses' => $providerPerizinanProses,
        ]);
    }

     public function actionVerifikasi() {

        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = \backend\models\PerizinanProses::findOne($id);

        $providerPerizinanDokumen = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if (\Yii::$app->request->post()) {

            $connection = new \yii\db\Query;
            if (isset($_POST['selection'])) {
                $connection->createCommand()
                        ->update('perizinan_dokumen', ['check' => '0'], 'perizinan_id = ' . $model->perizinan_id)
                        ->execute();


                for ($i = 0; $i < count($_POST['selection']); $i++) {
                    $connection->createCommand()
                            ->update('perizinan_dokumen', ['check' => '1'], 'id = ' . $_POST['selection'][$i])
                            ->execute();
                }
            }

            if (\Yii::$app->request->post('PerizinanProses') != null) {
                $model->attributes = \Yii::$app->request->post('PerizinanProses');
                $model->status = $model->status;
                $model->selesai = new Expression('NOW()');
                $model->save();
                \backend\models\Perizinan::updateAll(['pengambil_nik'=>$model->pengambil_nik, 'pengambil_nama'=>$model->pengambil_nama, 'pengambil_telepon'=>$model->pengambil_telepon,  'status' => $model->status, 'keterangan' => $model->keterangan], ['id' => $model->perizinan_id]);
                return $this->redirect(['index?status=verifikasi']);
            }

            return $this->redirect('verifikasi?id=' . $model->id);
        } else {
            return $this->render('verifikasi', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }


    public function actionRegistrasi() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');
        
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }


        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            $next = PerizinanProses::findOne($id + 1);
            $next->dokumen = $model->dokumen;
            $next->keterangan = $model->keterangan;
            $next->active = 1;
            $next->save(false);
            Perizinan::updateAll(['status' => 'Proses'], ['id' => $model->perizinan_id]);
            return $this->redirect(['index?status=registrasi']);
        } else {
//            return $this->render('proses', [
            return $this->render('registrasi', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }

    public function actionCekForm() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');
        
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }


        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->zonasi_id = $model->zonasi_id;
                $next->zonasi_sesuai = $model->zonasi_sesuai;
                $next->active = 1;
                $next->save(false);
            } else if ($model->status == 'Revisi') {
                $prev = PerizinanProses::findOne($id - 1);
                $prev->dokumen = $model->dokumen;
                $prev->keterangan = $model->keterangan;
                $prev->zonasi_id = $model->zonasi_id;
                $prev->zonasi_sesuai = $model->zonasi_sesuai;
                $prev->active = 1;
                $prev->save(false);
            }
            Perizinan::updateAll(['status' => $model->status, 'zonasi_id'=>  $model->zonasi_id, 'zonasi_sesuai'=>  $model->zonasi_sesuai], ['id' => $model->perizinan_id]);
            return $this->redirect(['index?status=cek-form']);
        } else {
            return $this->render('cek-form', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }

    public function actionQrcode($data) {
        return QrCode::png(Yii::getAlias('@front').'/site/validate?kode=' . $data, Yii::$app->basePath.'/web/images/qrcode/'.$data.'.png', 0,3,4,true);
//        return QrCode::png('http://portal-ptsp.garudatekno.com/site/validate?kode=' . $data, Yii::$app->basePath.'/images/'.$data.'.png');
        //         // you could also use the following
        // return return QrCode::png($mailTo);
    }

    public function actionApproval() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');

        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        
        $no_sk = $model->perizinan->izin->fno_surat;
        $no_sk = str_replace('{no_izin}', Perizinan::getNoIzin($model->perizinan->izin_id,$model->perizinan->lokasi_izin_id), $no_sk);
        $no_sk = str_replace('{kode_izin}', $model->perizinan->izin->kode, $no_sk);
        $no_sk = str_replace('{status}', $model->perizinan->status_id, $no_sk);
        $no_sk = str_replace('{kode_wilayah}', substr($model->perizinan->lokasiIzin->kode, 0, strpos($model->perizinan->lokasiIzin->kode, '.0')), $no_sk);
        $no_sk = str_replace('{kode_arsip}', $model->perizinan->izin->arsip->kode, $no_sk);
        $no_sk = str_replace('{tahun}', date('Y'), $no_sk);

        $model->dokumen = str_replace('{no_sk}', $no_sk, $model->dokumen);

        $model->dokumen = str_replace('{namawil}', $model->perizinan->lokasiIzin->nama, $model->dokumen);

        $model->no_izin = $no_sk;

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->active = 1;
                $next->save(false);
                $now = new DateTime();
                //$qrcode = $now->format('YmdHis') . '.' . $model->perizinan_id . '.' . preg_replace("/[^0-9]/","",\Yii::$app->session->get('siup.no_sk'));
                $qrcode = $model->perizinan->kode_registrasi;
                $expired = Perizinan::getExpired($now->format('Y-m-d'), $model->perizinan->izin->masa_berlaku, $model->perizinan->izin->masa_berlaku_satuan);
                Perizinan::updateAll([
                    'status' => $model->status, 
                    'tanggal_izin' => $now->format('Y-m-d H:i:s'), 
                   'pengesah_id' => Yii::$app->user->id, 
                    'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                    'qr_code' => $qrcode, 
                    'no_izin' => $model->no_izin], 
    ['id' => $model->perizinan_id]);
            } else if ($model->status == 'Revisi') {
                $prev = PerizinanProses::findOne($id - 1);
                $prev->dokumen = $model->dokumen;
                $prev->keterangan = $model->keterangan;
                $prev->active = 1;
                $prev->save(false);
                Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
            }

            return $this->redirect(['index?status=approval']);
        } else {
            return $this->render('approval', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCetak() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);

//        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);


        $model->selesai = new Expression('NOW()');

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->active = 1;
//                if ($model->perizinan->lokasi_izin_id == $model->perizinan->lokasi_pengambilan_id) {
//                    $status = 'Verifikasi';
//                } else {
//                    $status = 'Berkas Siap';
//                }
                $next->save(false);
            }
            Perizinan::updateAll(['status' => 'Berkas Siap'], ['id' => $model->perizinan_id]);
            return $this->redirect(['index?status=cetak']);
        } else {
            if ($model->perizinan->status == 'Lanjut') {
                $sk_siup = $model->dokumen;
//                $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_siup);
//$sk_siup = str_replace('{qrcode}', \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi), $sk_siup);
                $sk_siup = str_replace('{qrcode}','<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
//$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/logo-dki-small.png', true) . '"/>', $sk_siup);
                $model->dokumen = $sk_siup;

                return $this->render('cetak-sk', [
                            'model' => $model,
                ]);
            } else {
                $model->dokumen = IzinSiup::findOne($model->perizinan->referrer_id)->teks_penolakan;

                $model->dokumen = str_replace('{keterangan}', $model->keterangan, $model->dokumen);

                return $this->render('cetak-penolakan', [
                            'model' => $model,
                ]);
            }
        }
    }

    public function actionPrint() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        $sk_siup = $model->dokumen;

//        $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
        $sk_siup = str_replace('{qrcode}', '<img src="' . Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_siup);

        $model->dokumen = $sk_siup;

        $content = $this->renderAjax('_sk', [
            'model' => $model,
        ]);
//        $content = $model->dokumen;

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LEGAL,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new Perizinan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Perizinan();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Perizinan model.
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
     * Deletes an existing Perizinan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    public function actionBerkasSiap($id) {
        Perizinan::updateAll(['status' => 'Verifikasi'], ['id' => $id]);
        return $this->redirect(['index']);
    }
    public function actionMulai($id) {
        $current_action = \backend\models\PerizinanProses::findOne(['active' => 1, 'id' => $id])->action;
        PerizinanProses::updateAll(['mulai' => new Expression('NOW()')], ['id' => $id]);   
            return $this->redirect(['index?status='. $current_action]);
    }

    public function actionCheck($id) {
        PerizinanDokumen::updateAll(['check' => 1], 'id=' . $id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUncheck($id) {
        PerizinanDokumen::updateAll(['check' => 0], 'id=' . $id);

        return $this->redirect(Yii::$app->request->referrer);
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
        $providerIzinSiup = new ArrayDataProvider([
            'allModels' => $model->izinSiups,
        ]);
        $providerPerizinan = new ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiup' => $providerIzinSiup,
            'providerPerizinan' => $providerPerizinan,
            'providerPerizinanProses' => $providerPerizinanProses,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
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
     * Finds the Perizinan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perizinan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Perizinan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinSiup
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinSiup() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinSiup');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinSiup', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for Perizinan
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPerizinan() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Perizinan');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for PerizinanProses
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPerizinanProses() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PerizinanProses');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinanProses', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    public function actionConfirmPemohon() {
//        Url::remember('', 'actions-redirect');
        $searchModel  = Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->searchPemohon(Yii::$app->request->get());
            
        return $this->render('confirm-pemohon', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }
    
    public function actionConfirm($id)
    {
        $this->findModelUser($id)->confirm();
        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been confirmed'));

        return $this->redirect('/perizinan/confirm-pemohon');
    }
    
     protected function findModelUser($id)
    {
        $user = User::findIdentity($id);
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }

        return $user;
    }
     
}
=======
<?php

namespace backend\controllers;

use backend\models\IzinSiup;
use backend\models\Perizinan;
use backend\models\PerizinanDokumen;
use backend\models\PerizinanProses;
use backend\models\PerizinanSearch;
use DateTime;
use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use dosamigos\qrcode\QrCode;
use kartik\mpdf\Pdf;
use Yii;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

//use yii\helpers\Html;

/**
 * PerizinanController implements the CRUD actions for Perizinan model.
 */
class PerizinanController extends Controller {

//    public $layout = 'lay-admin';

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
    
    public function actionDashboard() {
        return $this->render('dashboard');
    }
    public function actionStatus($id) {
        $model = $this->findModel($id);
        return $this->renderAjax('_status',['model'=>$model]);
    }
    public function actionLihat($id) {
        $model = $this->findModel($id);
        if(in_array($model->izin_id, array(619,621,622,626))) {
            $model_izin= IzinSiup::findOne($model->referrer_id);
        }
    
        return $this->renderAjax('_lihat',['model'=>$model_izin]);
    }
    /**
     * Lists all Perizinan models.
     * @return mixed
     */
    public function actionIndex($status = null) {
        $searchModel = new PerizinanSearch();
        
        $searchModel->status = $status;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFilter($status) {
        $searchModel = new PerizinanSearch();
        $searchModel->status = $status;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perizinan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerDokumenPendukung = new ArrayDataProvider([
            'allModels' => $model->izin->dokumenPendukungs,
        ]);
        $providerPerizinan = new ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerDokumenPendukung' => $providerDokumenPendukung,
                    'providerPerizinan' => $providerPerizinan,
                    'providerPerizinanProses' => $providerPerizinanProses,
        ]);
    }

    public function actionVerifikasi() {

        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = \backend\models\PerizinanProses::findOne($id);

        $providerPerizinanDokumen = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if (\Yii::$app->request->post()) {

            $connection = new \yii\db\Query;
            if (isset($_POST['selection'])) {
                $connection->createCommand()
                        ->update('perizinan_dokumen', ['check' => '0'], 'perizinan_id = ' . $model->perizinan_id)
                        ->execute();


                for ($i = 0; $i < count($_POST['selection']); $i++) {
                    $connection->createCommand()
                            ->update('perizinan_dokumen', ['check' => '1'], 'id = ' . $_POST['selection'][$i])
                            ->execute();
                }
            }

            if (\Yii::$app->request->post('PerizinanProses') != null) {
                $model->attributes = \Yii::$app->request->post('PerizinanProses');
                $model->status = $model->status;
                $model->selesai = new Expression('NOW()');
                $model->save();
                \backend\models\Perizinan::updateAll(['pengambil_nik'=>$model->pengambil_nik, 'pengambil_nama'=>$model->pengambil_nama, 'pengambil_telepon'=>$model->pengambil_telepon,  'status' => $model->status, 'keterangan' => $model->keterangan], ['id' => $model->perizinan_id]);
                return $this->redirect(['index?status=verifikasi']);
            }

            return $this->redirect('verifikasi?id=' . $model->id);
        } else {
            return $this->render('verifikasi', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }

    public function actionRegistrasi() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');
        
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }


        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            $next = PerizinanProses::findOne($id + 1);
            $next->dokumen = $model->dokumen;
            $next->keterangan = $model->keterangan;
            $next->active = 1;
            $next->save(false);
            Perizinan::updateAll(['status' => 'Proses'], ['id' => $model->perizinan_id]);
            return $this->redirect(['index?status=registrasi']);
        } else {
//            return $this->render('proses', [
            return $this->render('registrasi', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }

    public function actionCekForm() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = PerizinanProses::findOne($id);

        $model->selesai = new Expression('NOW()');
        
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }


        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->zonasi_id = $model->zonasi_id;
                $next->zonasi_sesuai = $model->zonasi_sesuai;
                $next->active = 1;
                $next->save(false);
            } else if ($model->status == 'Revisi') {
                $prev = PerizinanProses::findOne($id - 1);
                $prev->dokumen = $model->dokumen;
                $prev->keterangan = $model->keterangan;
                $prev->zonasi_id = $model->zonasi_id;
                $prev->zonasi_sesuai = $model->zonasi_sesuai;
                $prev->active = 1;
                $prev->save(false);
            }
            Perizinan::updateAll(['status' => $model->status, 'zonasi_id'=>  $model->zonasi_id, 'zonasi_sesuai'=>  $model->zonasi_sesuai], ['id' => $model->perizinan_id]);
            return $this->redirect(['index?status=cek-form']);
        } else {
            return $this->render('cek-form', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }

    public function actionQrcode($data) {
        return QrCode::png(Yii::getAlias('@front').'/site/validate?kode=' . $data, Yii::$app->basePath.'/web/images/qrcode/'.$data.'.png', 0,3,4,true);
//        return QrCode::png('http://portal-ptsp.garudatekno.com/site/validate?kode=' . $data, Yii::$app->basePath.'/images/'.$data.'.png');
        //         // you could also use the following
        // return return QrCode::png($mailTo);
    }

    public function actionApproval() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);


        $model->mulai = new Expression('NOW()');

        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        
        $no_sk = $model->perizinan->izin->fno_surat;
        $no_sk = str_replace('{no_izin}', Perizinan::getNoIzin($model->perizinan->izin_id,$model->perizinan->lokasi_izin_id), $no_sk);
        $no_sk = str_replace('{kode_izin}', $model->perizinan->izin->kode, $no_sk);
        $no_sk = str_replace('{kode_wilayah}', substr($model->perizinan->lokasiIzin->kode, 0, strpos($model->perizinan->lokasiIzin->kode, '.0')), $no_sk);
        $no_sk = str_replace('{kode_arsip}', $model->perizinan->izin->arsip->kode, $no_sk);
        $no_sk = str_replace('{tahun}', date('Y'), $no_sk);

        $model->dokumen = str_replace('{no_sk}', $no_sk, $model->dokumen);

        $model->dokumen = str_replace('{namawil}', $model->perizinan->lokasiIzin->nama, $model->dokumen);

        $model->no_izin = $no_sk;

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->active = 1;
                $next->save(false);
                $now = new DateTime();
                //$qrcode = $now->format('YmdHis') . '.' . $model->perizinan_id . '.' . preg_replace("/[^0-9]/","",\Yii::$app->session->get('siup.no_sk'));
                $qrcode = $model->perizinan->kode_registrasi;
                $expired = Perizinan::getExpired($now->format('Y-m-d'), $model->perizinan->izin->masa_berlaku, $model->perizinan->izin->masa_berlaku_satuan);
                Perizinan::updateAll([
                    'status' => $model->status, 
                    'tanggal_izin' => $now->format('Y-m-d H:i:s'), 
                   'pengesah_id' => Yii::$app->user->id, 
                    'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                    'qr_code' => $qrcode, 
                    'no_izin' => $model->no_izin], 
    ['id' => $model->perizinan_id]);
            } else if ($model->status == 'Revisi') {
                $prev = PerizinanProses::findOne($id - 1);
                $prev->dokumen = $model->dokumen;
                $prev->keterangan = $model->keterangan;
                $prev->active = 1;
                $prev->save(false);
                Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
            }

            return $this->redirect(['index?status=approval']);
        } else {
            return $this->render('approval', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCetak() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);

//        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);


        $model->selesai = new Expression('NOW()');

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->keterangan = $model->keterangan;
                $next->active = 1;
//                if ($model->perizinan->lokasi_izin_id == $model->perizinan->lokasi_pengambilan_id) {
//                    $status = 'Verifikasi';
//                } else {
//                    $status = 'Berkas Siap';
//                }
                $next->save(false);
            }
            Perizinan::updateAll(['status' => 'Berkas Siap'], ['id' => $model->perizinan_id]);
            return $this->redirect(['index?status=cetak']);
        } else {
            if ($model->perizinan->status == 'Lanjut') {
                $sk_siup = $model->dokumen;
//                $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_siup);
//$sk_siup = str_replace('{qrcode}', \yii\helpers\Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi), $sk_siup);
                $sk_siup = str_replace('{qrcode}','<img src="' . Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
//$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@web/images/logo-dki-small.png', true) . '"/>', $sk_siup);
                $model->dokumen = $sk_siup;

                return $this->render('cetak-sk', [
                            'model' => $model,
                ]);
            } else {
                $model->dokumen = IzinSiup::findOne($model->perizinan->referrer_id)->teks_penolakan;

                $model->dokumen = str_replace('{keterangan}', $model->keterangan, $model->dokumen);

                return $this->render('cetak-penolakan', [
                            'model' => $model,
                ]);
            }
        }
    }

    public function actionPrint() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = PerizinanProses::findOne($id);
        $model->dokumen = Perizinan::getTemplateSK($model->perizinan->izin_id, $model->perizinan->referrer_id);

        $sk_siup = $model->dokumen;

//        $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data' => $model->perizinan->kode_registrasi]) . '"/>', $sk_siup);
        $sk_siup = str_replace('{qrcode}', '<img src="' . Url::to('@web/images/qrcode/'.$model->perizinan->kode_registrasi.'.png', true) . '"/>', $sk_siup);

        $model->dokumen = $sk_siup;

        $content = $this->renderAjax('_sk', [
            'model' => $model,
        ]);
//        $content = $model->dokumen;

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_LEGAL,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
        ]);

        return $pdf->render();
    }

    /**
     * Creates a new Perizinan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Perizinan();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Perizinan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Perizinan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    public function actionBerkasSiap($id) {
        Perizinan::updateAll(['status' => 'Verifikasi'], ['id' => $id]);
        return $this->redirect(['index']);
    }
    public function actionMulai($id) {
         PerizinanProses::updateAll(['mulai' => new Expression('NOW()')], ['id' => $id]);
            
            return $this->redirect(['index']);
    }

    public function actionCheck($id) {
        PerizinanDokumen::updateAll(['check' => 1], 'id=' . $id);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUncheck($id) {
        PerizinanDokumen::updateAll(['check' => 0], 'id=' . $id);

        return $this->redirect(Yii::$app->request->referrer);
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
        $providerIzinSiup = new ArrayDataProvider([
            'allModels' => $model->izinSiups,
        ]);
        $providerPerizinan = new ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiup' => $providerIzinSiup,
            'providerPerizinan' => $providerPerizinan,
            'providerPerizinanProses' => $providerPerizinanProses,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
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
     * Finds the Perizinan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perizinan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Perizinan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinSiup
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinSiup() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinSiup');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinSiup', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for Perizinan
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPerizinan() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Perizinan');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinan', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for PerizinanProses
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddPerizinanProses() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('PerizinanProses');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formPerizinanProses', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    public function actionConfirmPemohon() {
//        Url::remember('', 'actions-redirect');
        $searchModel  = Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->searchPemohon(Yii::$app->request->get());
            
        return $this->render('confirm-pemohon', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }
    
    public function actionConfirm($id)
    {
        $this->findModelUser($id)->confirm();
        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been confirmed'));

        return $this->redirect('/admin/perizinan/confirm-pemohon');
    }
    
     protected function findModelUser($id)
    {
        $user = User::findIdentity($id);
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }

        return $user;
    }
     
}
>>>>>>> origin/master
