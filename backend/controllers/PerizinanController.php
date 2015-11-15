<?php

namespace backend\controllers;

use backend\models\Izin;
use backend\models\IzinSiup;
use backend\models\Perizinan;
use backend\models\PerizinanDokumen;
use backend\models\PerizinanProses;
use backend\models\PerizinanSearch;
use backend\models\Pelaksana;
use DateTime;
use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use dektrium\user\Mailer;
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
//        if(in_array($model->izin_id, array(619,621,622,626))) {
//            $model_izin= IzinSiup::findOne($model->referrer_id);
//        }
     
         $izin = Izin::findOne($model->izin_id);
         switch ($izin->action) {
         case 'izin-siup':
         $model_izin = IzinSiup::findOne($model->referrer_id);
         break;
         case 'tdp':
         $model_izin = IzinSiup::findOne($model->referrer_id);
         break;
         }
        return $this->renderAjax('_lihat',[ 
           'model' => $model_izin,]);
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
                    'varKey'=>'index',
                    'status'=>$status,
        ]);
    }
    
    public function actionApprov($action = null, $status = null) {
        $searchModel = new PerizinanSearch();
        
        $searchModel->action = $action;
        $searchModel->status = $status;

        $dataProvider = $searchModel->searchApprove(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'approv',
                    'status'=>$status,
                    'action'=>$action,
        ]);
    }

    public function actionStatistik($lokasi = NULL) {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->searchPerizinanByLokasi(Yii::$app->request->queryParams, $lokasi);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'statistik',
                    'status'=>'statistik',
                    'lokasi'=>$lokasi,
        ]);
    }
    
    public function actionProses() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInProses(Yii::$app->request->queryParams);
        
        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'proses',
        ]);
    }
    
    public function actionBaru() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInBaru(Yii::$app->request->queryParams);
        
        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'baru',
        ]);
    }
    
    public function actionRevisi() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInRevisi(Yii::$app->request->queryParams);
        
        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'revisi',
        ]);
    }
    
    public function actionSelesai() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInSelesai(Yii::$app->request->queryParams);
        
        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'selesai',
        ]);
    }
    
    public function actionTolakSelesai() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInTolakSelesai(Yii::$app->request->queryParams);
        
        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'tolak-selesai',
        ]);
    }
    
    public function actionTolak() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInTolak(Yii::$app->request->queryParams);
        
        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionBatal() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->getDataInBatal(Yii::$app->request->queryParams);
        
        return $this->render('view-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'batal',
        ]);
    }
    
    public function actionLacak() {
        $searchModel = new PerizinanSearch();

        $dataProvider = $searchModel->searchPerizinanDataByLokasi(Yii::$app->request->queryParams);
        
        return $this->render('lacak', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'lacak',
        ]);
    }
    
    public function actionEta($status=NULL) {
        
        $searchModel = new PerizinanSearch();
        
        switch ($status) {
            case 'Red' :
                $dataProvider = $searchModel->getDataEtaRed(Yii::$app->request->queryParams);
                break;
            case 'Yellow' :
                $dataProvider = $searchModel->getDataEtaYellow(Yii::$app->request->queryParams);
                break;
            case 'Green' :
                $dataProvider = $searchModel->getDataEtaGreen(Yii::$app->request->queryParams);
                break;
        }
        
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'varKey'=>'eta',
                    'status'=>$status,
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

        $model = PerizinanProses::findOne($id);

        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if (\Yii::$app->request->post()) {

            $connection = new Query;
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
                if($model->perizinan->status == 'Verifikasi Tolak'){
                    $model->attributes = \Yii::$app->request->post('PerizinanProses');
                    $model->status = $model->status;
                    $model->selesai = new Expression('NOW()');
                    $model->save();
                    Perizinan::updateAll(['pengambil_nik'=>$model->pengambil_nik, 'pengambil_nama'=>$model->pengambil_nama, 'pengambil_telepon'=>$model->pengambil_telepon,  'status' => $model->status, 'keterangan' => $model->keterangan], ['id' => $model->perizinan_id]);
                    return $this->redirect(['index?status=verifikasi-tolak']);
                } else if($model->perizinan->status == 'Verifikasi') {
                    $model->attributes = \Yii::$app->request->post('PerizinanProses');
                    $model->status = $model->status;
                    $model->selesai = new Expression('NOW()');
                    $model->save();
                    Perizinan::updateAll(['pengambil_nik'=>$model->pengambil_nik, 'pengambil_nama'=>$model->pengambil_nama, 'pengambil_telepon'=>$model->pengambil_telepon,  'status' => $model->status, 'keterangan' => $model->keterangan], ['id' => $model->perizinan_id]);
                    return $this->redirect(['index?status=verifikasi']);
                }
                
            }

            return $this->redirect('verifikasi?id=' . $model->id);
        } else {
            if($model->perizinan->status == 'Verifikasi Tolak'){
                return $this->render('verifikasi-tolak', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
                ]);
            } else if($model->perizinan->status == 'Verifikasi') {
                return $this->render('verifikasi', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
                ]);
            }
            
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

		//START Exp Date
		//Cek apakah izin dirubah
		$model3 = Izin::findOne($model->perizinan->izin_id);
		$model4 = User::findOne(Yii::$app->user->identity->profile->user_id);
		$model5 = Pelaksana::findOne($model4->pelaksana_id);	

		if($model5->flag_ubah_tgl_exp=="Ya"){
			$perizinan_id = $model->perizinan_id;
			$model2 = Perizinan::findOne($perizinan_id);
			$open_form_tgl = 1;
			
			if ($model2->load(Yii::$app->request->post())) {
				Perizinan::updateAll(['tanggal_expired' => $model2->tanggal_expired], ['id' => $model->perizinan_id]);
			}
			
		}else{
			$open_form_tgl = null;
			$model2 = null;
		}	
		//End Exp Date
		
        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $next = PerizinanProses::findOne($id + 1);
            $next->dokumen = $model->dokumen;
            $next->keterangan = $model->keterangan;
            $next->active = 1;
            $next->save(false);
//            Perizinan::updateAll(['status' => 'Proses'], ['id' => $model->perizinan_id]);
            return $this->redirect(['index?status=registrasi']);

        } else {
            Perizinan::updateAll(['status' => 'Proses'], ['id' => $model->perizinan_id]);
//            return $this->render('proses', [
            return $this->render('registrasi', [
                        'model' => $model,
                        'providerPerizinanDokumen' => $providerPerizinanDokumen,
						'model2' => $model2,
						'open_form_tgl' => $open_form_tgl,
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

		//START Exp Date
		//Cek apakah izin dirubah
		$model3 = Izin::findOne($model->perizinan->izin_id);
		$model4 = User::findOne(Yii::$app->user->identity->profile->user_id);
		$model5 = Pelaksana::findOne($model4->pelaksana_id);	

		if($model5->flag_ubah_tgl_exp=="Ya"){
			$perizinan_id = $model->perizinan_id;
			$model2 = Perizinan::findOne($perizinan_id);
			$open_form_tgl = 1;
			
			if ($model2->load(Yii::$app->request->post())) {
				Perizinan::updateAll(['tanggal_expired' => $model2->tanggal_expired], ['id' => $model->perizinan_id]);
			}
			
		}else{
			$open_form_tgl = null;
			$model2 = null;
		}	
		//End Exp Date

        $providerPerizinanDokumen = new ArrayDataProvider([
            'allModels' => $model->perizinan->perizinanDokumen,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->status = $model->status;
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
						'model2' => $model2,
						'open_form_tgl' => $open_form_tgl,
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
        $no_sk = str_replace('{no_izin}', Perizinan::getNoIzin($model->perizinan->izin_id,$model->perizinan->lokasi_izin_id,$model->perizinan->status), $no_sk);
        $no_sk = str_replace('{kode_izin}', $model->perizinan->izin->kode, $no_sk);
        $no_sk = str_replace('{status}', $model->perizinan->status_id, $no_sk);
        $no_sk = str_replace('{kode_wilayah}', substr($model->perizinan->lokasiIzin->kode, 0, strpos($model->perizinan->lokasiIzin->kode, '.0')), $no_sk);
        $no_sk = str_replace('{kode_arsip}', $model->perizinan->izin->arsip->kode, $no_sk);
        $no_sk = str_replace('{tahun}', date('Y'), $no_sk);

        $model->dokumen = str_replace('{no_sk}', $no_sk, $model->dokumen);

        $model->dokumen = str_replace('{namawil}', $model->perizinan->lokasiIzin->nama, $model->dokumen);

        $model->no_izin = $no_sk;
        //-------NO Penolakan-------------------
        $no = Perizinan::getNoIzin($model->perizinan->izin_id,$model->perizinan->lokasi_izin_id,$model->perizinan->status);
        $wil =  substr($model->perizinan->lokasiIzin->kode, 0, strpos($model->perizinan->lokasiIzin->kode, '.0'));
        $arsip = $model->perizinan->izin->arsip->kode;
        $thn = date('Y');
        $no_penolakan="$no/$wil/$arsip/e/$thn";

        if ($model->urutan < $model->perizinan->jumlah_tahap) {
            $model->active = 0;
        }

		//START Exp Date
		//Cek apakah izin dirubah
		$model3 = Izin::findOne($model->perizinan->izin_id);
		$model4 = User::findOne(Yii::$app->user->identity->profile->user_id);
		$model5 = Pelaksana::findOne($model4->pelaksana_id);	

		if($model5->flag_ubah_tgl_exp=="Ya"){
			$perizinan_id = $model->perizinan_id;
			$model2 = Perizinan::findOne($perizinan_id);
			$open_form_tgl = 1;
			
			if ($model2->load(Yii::$app->request->post())) {
				$get_expired = $model2->tanggal_expired; 
				Perizinan::updateAll(['tanggal_expired' => $model2->tanggal_expired], ['id' => $model->perizinan_id]);
			}
			
		}else{
			$open_form_tgl = null;
			$model2 = null;
		}	
		//End Exp Date
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->status == 'Lanjut' || $model->status == 'Tolak') {
                $next = PerizinanProses::findOne($id + 1);
                $next->dokumen = $model->dokumen;
                $next->status = $model->status;
                $next->keterangan = $model->keterangan;
                $next->active = 1;
                $next->save(false);
                $now = new DateTime();
                
                //save to no_izin
//                $maxi = \backend\models\NoIzin::find()->orderBy('id DESC')->one();;
//                $maxp = \backend\models\NoPenolakan::find()->orderBy('id DESC')->one();
                $findLokasi = Perizinan::findOne(['id'=>$model->perizinan_id])->lokasi_izin_id;
                $findIzinID = Perizinan::findOne(['id'=>$model->perizinan_id])->izin_id;
                $perizinan= Perizinan::findOne($model->perizinan_id);
                switch ($model->status){ 
                case 'Lanjut':
                    \backend\models\NoIzin::updateAll([
                        'tahun' => date('Y'),
                        'no_izin' => $model->no_izin], 
                   ['lokasi_id' => $findLokasi, 'izin_id' => $findIzinID]);
//                $no_izin = new \backend\models\NoIzin();
//                $no_izin->id= $maxi + 1;
//                $no_izin->tahun= date('Y');
//                $no_izin->izin_id=$perizinan->izin_id;
//                $no_izin->lokasi_id=$perizinan->lokasi_izin_id;
//                $no_izin->no_izin=$model->no_izin;
//                $no_izin->save(false);
                break;
                case 'Tolak':
                    \backend\models\NoPenolakan::updateAll([
                        'tahun' => date('Y'),
                        'no_izin' => $model->no_izin], 
                   ['lokasi_id' => Perizinan::findOne(['id'=>$model->perizinan_id])->lokasi_izin_id]);
//                $no_tolak = new \backend\models\NoPenolakan();
//                $no_tolak->id= $maxp + 1;
//                $no_tolak->tahun= date('Y');
//                $no_tolak->lokasi_id=$perizinan->lokasi_izin_id;
//                $no_tolak->no_izin=$model->no_izin;
//                $no_tolak->save(false);
                break;
                }
                //$qrcode = $now->format('YmdHis') . '.' . $model->perizinan_id . '.' . preg_replace("/[^0-9]/","",\Yii::$app->session->get('siup.no_sk'));
                $qrcode = $model->perizinan->kode_registrasi;
			
				if($model2->tanggal_expired){
					$get_expired = $model2->tanggal_expired; 
				}else{
					$expired = Perizinan::getExpired($now->format('Y-m-d'), $model->perizinan->izin->masa_berlaku, $model->perizinan->izin->masa_berlaku_satuan);
					//$get_expired = $expired->format('Y-m-d H:i:s');
					$get_expired = $expired->format('Y-m-d');
				}
				
               if($model->status == "Tolak"){
                Perizinan::updateAll([
                    'alasan_penolakan' => $model->alasan_penolakan,
                    'status' => $model->status, 
                    'tanggal_izin' => $now->format('Y-m-d H:i:s'), 
                    'pengesah_id' => Yii::$app->user->id, 
                    //'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                    'tanggal_expired' => $get_expired,
                    'qr_code' => $qrcode, 
                    'no_izin' => $no_penolakan
                ], 
                [
                    'id' => $model->perizinan_id
                ]);
                
                    return $this->redirect(['approv?action=approval&status=Tolak']);
                }else{
                    Perizinan::updateAll([
                        'status' => $model->status, 
                        'tanggal_izin' => $now->format('Y-m-d H:i:s'), 
                        'pengesah_id' => Yii::$app->user->id, 
                   // 'tanggal_expired' => $expired->format('Y-m-d H:i:s'),
                        'tanggal_expired' => $get_expired,
                        'qr_code' => $qrcode, 
                        'no_izin' => $model->no_izin
                    ], 
                    [
                        'id' => $model->perizinan_id
                    ]);
                    
                    return $this->redirect(['approv?action=approval&status=Lanjut']);
                }
                
            } else if ($model->status == 'Revisi') {
                $prev = PerizinanProses::findOne($id - 1);
                $prev->dokumen = $model->dokumen;
                $prev->keterangan = $model->keterangan;
                $prev->active = 1;
                $prev->save(false);
                Perizinan::updateAll(['status' => $model->status], ['id' => $model->perizinan_id]);
            }

            return $this->redirect(['approv']);
        } else {
            return $this->render('approval', [
                        'model' => $model,
						'model2' => $model2,
						'open_form_tgl' => $open_form_tgl,
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

		//START Exp Date
		//Cek apakah izin dirubah
		$model3 = Izin::findOne($model->perizinan->izin_id);
		$model4 = User::findOne(Yii::$app->user->identity->profile->user_id);
		$model5 = Pelaksana::findOne($model4->pelaksana_id);	

		if($model5->flag_ubah_tgl_exp=="Ya"){
			$perizinan_id = $model->perizinan_id;
			$model2 = Perizinan::findOne($perizinan_id);
			$open_form_tgl = 1;
			
			if ($model2->load(Yii::$app->request->post())) {
				Perizinan::updateAll(['tanggal_expired' => $model2->tanggal_expired], ['id' => $model->perizinan_id]);
			}
			
		}else{
			$open_form_tgl = null;
			$model2 = null;
		}	
		//End Exp Date

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
                Perizinan::updateAll(['status' => 'Berkas Siap'], ['id' => $model->perizinan_id]);
                return $this->redirect(['index?status=cetak']);
            } else if($model->status == 'Tolak'){
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
                Perizinan::updateAll(['status' => 'Berkas Tolak Siap'], ['id' => $model->perizinan_id]);
                return $this->redirect(['index?status=tolak']);
            }
            
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
							'model2' => $model2,
							'open_form_tgl' => $open_form_tgl,
                ]);
            } else {
                $model->dokumen = IzinSiup::findOne($model->perizinan->referrer_id)->teks_penolakan;

                $model->dokumen = str_replace('{keterangan}', $model->keterangan, $model->dokumen);

                return $this->render('cetak-penolakan', [
                            'model' => $model,
							'model2' => $model2,
							'open_form_tgl' => $open_form_tgl,							
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
    
    public function actionBerkasSiap($id,$cid) {
        $current_action = PerizinanProses::findOne(['active' => 1, 'id' => $cid])->action;
        $pemohon = Perizinan::findOne(['id' =>$id])->pemohon_id;
        $noRegis = Perizinan::findOne(['id' =>$id])->kode_registrasi;
        $email = \backend\models\User::findOne(['id' =>$pemohon])->email;
        Perizinan::updateAll(['status' => 'Verifikasi'], ['id' => $id]);
        //Kirim Email
        $this->mailer->sendBerkasMessage($email, $noRegis, $salam, $id_izin);
        return $this->redirect(['index?status='. $current_action]);
    }
    
    public function actionBerkasTolak($id,$cid) {
        $current_action = PerizinanProses::findOne(['active' => 1, 'id' => $cid])->action;
        $pemohon = Perizinan::findOne(['id' =>$id])->pemohon_id;
        $noRegis = Perizinan::findOne(['id' =>$id])->kode_registrasi;
        $email = \backend\models\User::findOne(['id' =>$pemohon])->email;
        Perizinan::updateAll(['status' => 'Verifikasi Tolak'], ['id' => $id]);
        //Kirim Email
        $this->mailer->sendBerkasMessage($email, $noRegis, $salam, $id_izin);
        return $this->redirect(['index?status='. $current_action.'-tolak']);
    }
    
    public function actionMulai($id) {
        $current_action = PerizinanProses::findOne(['active' => 1, 'id' => $id])->action;
        $current_perizinanID = PerizinanProses::findOne(['active' => 1, 'id' => $id])->perizinan_id;
        $status = PerizinanProses::findOne(['id' => $id-1])->status;
        $statTolak = Perizinan::findOne(['id' => $current_perizinanID])->status;
        
        PerizinanProses::updateAll(['mulai' => new Expression('NOW()')], ['id' => $id]);   
        
        if($current_action=='cetak' && $status=='Tolak'){
            return $this->redirect(['index?status=tolak']);
        } else if($current_action == 'verifikasi' && $statTolak == 'Verifikasi Tolak' ){
            return $this->redirect(['index?status='. $current_action.'-tolak']);
        } else if($current_action == 'approval' && $statTolak == 'Tolak' ){
            return $this->redirect(['approv','action'=>$current_action,'status'=>$statTolak]);
        } else if($current_action == 'approval' && $statTolak == 'Lanjut' ){
            return $this->redirect(['approv','action'=>$current_action,'status'=>$statTolak]);
        } else {    
            return $this->redirect(['index?status='. $current_action]);
        }
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
