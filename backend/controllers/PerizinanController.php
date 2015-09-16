<?php

namespace backend\controllers;

use Yii;
use backend\models\Perizinan;
use backend\models\PerizinanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PerizinanDokumen;
use dosamigos\qrcode\QrCode;
//use yii\helpers\Html;

/**
 * PerizinanController implements the CRUD actions for Perizinan model.
 */
class PerizinanController extends Controller {

    public $layout = 'lay-admin';

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
     * Lists all Perizinan models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PerizinanSearch();

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
        $providerDokumenPendukung = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izin->dokumenPendukungs,
        ]);
        $providerPerizinan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerDokumenPendukung' => $providerDokumenPendukung,
                    'providerPerizinan' => $providerPerizinan,
                    'providerPerizinanProses' => $providerPerizinanProses,
        ]);
    }

    public function actionCekBerkas() {

        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = \backend\models\PerizinanProses::findOne($id);

        $providerPerizinanDokumen = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        return $this->render('cek-berkas', [
                    'model' => $model,
                    'providerPerizinanDokumen' => $providerPerizinanDokumen,
        ]);
    }

    public function actionProses() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = \backend\models\PerizinanProses::findOne($id);

        $model->mulai = new \yii\db\Expression('NOW()');

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }


        $providerPerizinanDokumen = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Proses') {
                $next = \backend\models\PerizinanProses::findOne($id + 1);
                $next->isi_dokumen = $model->isi_dokumen;
                $next->active = 1;
                $next->save(false);
            } else if ($model->status == 'Revisi' || $model->status == 'Tolak') {
                $prev = \backend\models\PerizinanProses::findOne($id - 1);
                $prev->isi_dokumen = $model->isi_dokumen;
                $prev->active = 1;
                $prev->save(false);
            }
            \backend\models\Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('proses', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }

    public function actionCekFormulir() {
        $id = Yii::$app->getRequest()->getQueryParam('id');
        $model = \backend\models\PerizinanProses::findOne($id);

        $model->mulai = new \yii\db\Expression('NOW()');

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }


        $providerPerizinanDokumen = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Proses') {
                $next = \backend\models\PerizinanProses::findOne($id + 1);
                $next->isi_dokumen = $model->isi_dokumen;
                $next->active = 1;
                $next->save(false);
            } else if ($model->status == 'Revisi' || $model->status == 'Tolak') {
                $prev = \backend\models\PerizinanProses::findOne($id - 1);
                $prev->isi_dokumen = $model->isi_dokumen;
                $prev->active = 1;
                $prev->save(false);
            }
            \backend\models\Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('cek-formulir', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
            ]);
        }
    }

    public function actionQrcode($data) {
        return QrCode::png(Yii::$app->request->hostInfo.'/site/validate/'.$data);
        // you could also use the following
        // return return QrCode::png($mailTo);
    }

    public function actionApprovalSk() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = \backend\models\PerizinanProses::findOne($id);

        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);

        $model->mulai = new \yii\db\Expression('NOW()');

        $sk_siup = $model->isi_dokumen;

        $no_sk = $siup->izin->fno_surat;
        $no_sk = str_replace('{no_izin}', Perizinan::getNoIzin($model->perizinan->lokasi_id, $model->perizinan->izin_id), $no_sk);
        $no_sk = str_replace('{kode_izin}', $siup->izin->kode, $no_sk);
        $no_sk = str_replace('{kode_wilayah}', substr($model->perizinan->lokasi->kode, 0, strpos($model->perizinan->lokasi->kode, '.0')), $no_sk);
        $no_sk = str_replace('{kode_arsip}', $siup->izin->arsip->kode, $no_sk);
        $no_sk = str_replace('{tahun}', date('Y'), $no_sk);
        
        $kblis = $siup->izinSiupKblis;
        $kode_kbli = '';
        $list_kbli = '<ul>';
        foreach ($kblis as $kbli) {
            $kode_kbli .= $kbli->kbli->kode. ', ';
            $list_kbli .= '<li>'. $kbli->kbli->nama .'</li>';
        }

        $sk_siup = str_replace('{no_sk}', $no_sk, $sk_siup);
        $sk_siup = str_replace('{namawil}', $model->perizinan->lokasi->nama, $sk_siup);
        $sk_siup = str_replace('{nama_perusahaan}', $siup->nama_perusahaan, $sk_siup);
        $sk_siup = str_replace('{nama}', $siup->nama, $sk_siup);
        $sk_siup = str_replace('{alamat}', $siup->alamat, $sk_siup);
        $sk_siup = str_replace('{jabatan_perusahaan}', $siup->jabatan_perusahaan, $sk_siup);
        $sk_siup = str_replace('{telpon_perusahaan}', $siup->telpon_perusahaan, $sk_siup);
        $sk_siup = str_replace('{kekayaan_bersih}', $siup->kekayaan_bersih, $sk_siup);
        $sk_siup = str_replace('{kelembagaan}', $siup->kelembagaan, $sk_siup);
        $sk_siup = str_replace('{nama_perusahaan}', $siup->nama_perusahaan, $sk_siup);
        $sk_siup = str_replace('{kode_kbli}', $kode_kbli, $sk_siup);
        $sk_siup = str_replace('{list_kbli}', $list_kbli, $sk_siup);
        $sk_siup = str_replace('{barang_jasa_dagangan}', $siup->barang_jasa_dagangan, $sk_siup);
        $sk_siup = str_replace('{tanggal_sekarang}', date('d M Y'), $sk_siup);
        $sk_siup = str_replace('{nm_kepala}', Yii::$app->user->identity->profile->name, $sk_siup);
        $sk_siup = str_replace('{nip_kepala}', Yii::$app->user->identity->username, $sk_siup);
        //$sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data'=>'n/a']) . '"/>', $sk_siup);

        $model->isi_dokumen = $sk_siup;

        \Yii::$app->session->set('siup.no_sk', $no_sk);

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut') {
                $next = \backend\models\PerizinanProses::findOne($id + 1);
                $next->isi_dokumen = $model->isi_dokumen;
                $next->active = 1;
                $next->save(false);
                $now = new \DateTime();
                //$qrcode = $now->format('YmdHis') . '.' . $model->perizinan_id . '.' . preg_replace("/[^0-9]/","",\Yii::$app->session->get('siup.no_sk'));
                $qrcode = $model->perizinan->kode_registrasi;
                \backend\models\Perizinan::updateAll(['status' => $model->status, 'tanggal_izin' => $now->format('Y-m-d H:i:s'), 'qr_code' => $qrcode, 'no_izin' => \Yii::$app->session->get('siup.no_sk')], ['id' => $model->perizinan_id]);
            } else if ($model->status == 'Revisi' || $model->status == 'Tolak') {
                $prev = \backend\models\PerizinanProses::findOne($id - 1);
                $prev->isi_dokumen = $model->isi_dokumen;
                $prev->active = 1;
                $prev->save(false);
                \backend\models\Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('approval-sk', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCetakSk() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = \backend\models\PerizinanProses::findOne($id);

//        $siup = \backend\models\IzinSiup::findOne($model->perizinan->referrer_id);

        $model->mulai = new \yii\db\Expression('NOW()');

        $sk_siup = $model->isi_dokumen;

        $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data' => $model->perizinan->qr_code]) . '"/>', $sk_siup);

        $model->isi_dokumen = $sk_siup;

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut') {
                $next = \backend\models\PerizinanProses::findOne($id + 1);
                $next->isi_dokumen = $model->isi_dokumen;
                $next->active = 1;
                $next->save(false);
            } else if ($model->status == 'Revisi' || $model->status == 'Tolak') {
                $prev = \backend\models\PerizinanProses::findOne($id - 1);
                $prev->isi_dokumen = $model->isi_dokumen;
                $prev->active = 1;
                $prev->save(false);
            }
            \backend\models\Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('cetak-sk', [
                        'model' => $model,
            ]);
        }
    }
    
    public function actionCetakSiup() {
        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = \backend\models\PerizinanProses::findOne($id);
        
        $sk_siup = $model->isi_dokumen;

        $sk_siup = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to(['qrcode', 'data' => $model->perizinan->qr_code]) . '"/>', $sk_siup);

        $model->isi_dokumen = $sk_siup;

        $content = $this->renderAjax('_sk', [
            'model' => $model,
        ]);
//        $content = $model->isi_dokumen;

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_UTF8,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
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
        $providerIzinSiup = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinSiups,
        ]);
        $providerPerizinan = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinans,
        ]);
        $providerPerizinanProses = new \yii\data\ArrayDataProvider([
            'allModels' => $model->perizinanProses,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerIzinSiup' => $providerIzinSiup,
            'providerPerizinan' => $providerPerizinan,
            'providerPerizinanProses' => $providerPerizinanProses,
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

}
