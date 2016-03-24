<?php

namespace frontend\controllers;

use backend\models\Perizinan;
use backend\models\Izin;
use backend\models\IzinSiup;
use backend\models\User;
use backend\models\IzinTdg;
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
 * IzinTdgController implements the CRUD actions for IzinTdg model.
 */
class IzinTdgController extends Controller
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
     * Lists all IzinTdg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IzinTdgSearch();
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
     * Displays a single IzinTdg model.
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
     * Creates a new IzinTdg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {	


	
        $model = new IzinTdg();
        $izin = Izin::findOne($id); 
		
		$izintdp = IzinTdp::find()->where(['user_id'=>Yii::$app->user->id])->one(); 
		$user = User::find()->where(['id'=>Yii::$app->user->id])->one(); 

		$model->pemilik_nama = Yii::$app->user->identity->profile->name;
        $model->pemilik_alamat = Yii::$app->user->identity->profile->alamat;
		$model->pemilik_telepon = Yii::$app->user->identity->profile->telepon;
		$model->pemilik_email = $user->email;
		
		if($izinsiup->ii_2_perusahaan_no_telp){$model->perusahaan_telepon = $izinsiup->ii_2_perusahaan_no_telp;}
		if($izinsiup->ii_2_perusahaan_no_fax){$model->perusahaan_fax = $izinsiup->ii_2_perusahaan_no_fax;}
		
		if($izinsiup->ii_2_perusahaan_kabupaten){$model->perusahaan_kabupaten = $izinsiup->ii_2_perusahaan_kabupaten;}
		if($izinsiup->ii_2_perusahaan_kecamatan){$model->perusahaan_kecamatan = $izinsiup->ii_2_perusahaan_kecamatan;}
		if($izinsiup->ii_2_perusahaan_kelurahan){$model->perusahaan_kelurahan = $izinsiup->ii_2_perusahaan_kelurahan;}
		
		
		/*$izinsiup = IzinSiup::find()->where(['user_id'=>Yii::$app->user->id])->one(); 
		$user = User::find()->where(['id'=>Yii::$app->user->id])->one(); 

		if($izinsiup->nama){$model->pemilik_nama = $izinsiup->nama;}
        if($izinsiup->alamat){$model->pemilik_alamat = $izinsiup->alamat;}
		if($izinsiup->telepon){$model->pemilik_telepon = $izinsiup->telepon;}
        if($izinsiup->fax){$model->pemilik_fax = $izinsiup->fax;}
		
		if($user->email){$model->pemilik_email = $user->email;}
		if($izinsiup->telpon_perusahaan){$model->perusahaan_telepon = $izinsiup->telpon_perusahaan;}
		if($izinsiup->fax_perusahaan){$model->perusahaan_fax = $izinsiup->fax_perusahaan;}
		
		if($izinsiup->wilayah_id){$model->perusahaan_kabupaten = $izinsiup->wilayah_id;}
		if($izinsiup->kecamatan_id){$model->perusahaan_kecamatan = $izinsiup->kecamatan_id;}
		if($izinsiup->kelurahan_id){$model->perusahaan_kelurahan = $izinsiup->kelurahan_id;}
*/
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
		if("Perusahaan" == Yii::$app->user->identity->profile->tipe){
			$model->pemilik_nik = "";
			//if($izintdp->npwp_perusahaan){$model->perusahaan_npwp = $izinsiup->npwp_perusahaan;}
			//else{
				$model->perusahaan_npwp = $user->username;
			//}
			//if($izinsiup->nama_perusahaan){$model->perusahaan_nama = $izinsiup->nama_perusahaan;}
				$model->perusahaan_npwp = $user->name;
			//else{
				$model->perusahaan_nama = Yii::$app->user->identity->profile->name;
		//	}
		}else{
			$izinsiup = \backend\models\IzinSiup::findOne(['id'=>$_SESSION['SiupID']]);
			$model->pemilik_nik = Yii::$app->user->identity->username;
			//if($izinsiup->npwp_perusahaan){$model->perusahaan_npwp = $izinsiup->npwp_perusahaan;}
			if($izintdp->ii_1_perusahaan_nama){$model->perusahaan_nama = $izinsiup->ii_1_perusahaan_nama;}
		}
        $model->tipe = $izin->tipe;
		
		
        if ($model->loadAll(Yii::$app->request->post())) {
		
			$model->create_by = Yii::$app->user->id;
			$model->create_date = date('Y-m-d');
			$model->gudang_nilai = str_replace('.', '', $model->gudang_nilai);
			$model->gudang_sarana_listrik = str_replace('.', '', $model->gudang_sarana_listrik);
			$model->gudang_kapasitas_satuan = str_replace('.', '', $model->gudang_kapasitas_satuan);
			$model->gudang_sarana_pendingin = str_replace('.', '', $model->gudang_sarana_pendingin);
			$model->gudang_sarana_komputer = str_replace('.', '', $model->gudang_sarana_komputer);
			$model->gudang_kapasitas = str_replace('.', '', $model->gudang_kapasitas);
			$model->gudang_sarana_forklif = str_replace('.', '', $model->gudang_sarana_forklif);
			
			//copy perusahaan
			$model->hs_per_namagedung = $model->perusahaan_namagedung;
			$model->hs_per_blok_lantai = $model->perusahaan_blok_lantai;	
			$model->hs_per_namajalan = $model->perusahaan_namajalan;
			$model->hs_per_propinsi = $model->perusahaan_propinsi;
			$model->hs_per_kabupaten = $model->perusahaan_kabupaten;
			$model->hs_per_kecamatan = $model->perusahaan_kecamatan;
			$model->hs_per_kelurahan = $model->perusahaan_kelurahan;
			$model->hs_per_kodepos = $model->perusahaan_kodepos;
			
			//copy gedung
			$model->hs_koordinat_1 = $model->gudang_koordinat_1;
			$model->hs_koordinat_2 = $model->gudang_koordinat_2;
			$model->hs_namagedung = $model->gudang_namagedung;
			$model->hs_blok_lantai = $model->gudang_blok_lantai;	
			$model->hs_namajalan = $model->gudang_namajalan;
			$model->hs_rt = $model->gudang_rt;
			$model->hs_rw = $model->gudang_rw;				
			$model->hs_propinsi = $model->gudang_propinsi;
			$model->hs_kabupaten = $model->gudang_kabupaten;
			$model->hs_kecamatan = $model->gudang_kecamatan;
			$model->hs_kelurahan = $model->gudang_kelurahan;
			$model->hs_kodepos = $model->gudang_kodepos;
			$model->hs_telepon = $model->gudang_telepon;
			$model->hs_fax = $model->gudang_fax;
			$model->hs_email = $model->gudang_email;
			$model->hs_luas = $model->gudang_luas;
			$model->hs_kapasitas = $model->gudang_kapasitas;
			$model->hs_kapasitas_satuan = $model->gudang_kapasitas_satuan;
			$model->hs_nilai = $model->gudang_nilai;			
			$model->hs_komposisi_nasional = $model->gudang_komposisi_nasional;
			$model->hs_komposisi_asing = $model->gudang_komposisi_asing;
			$model->hs_kelengkapan = $model->gudang_kelengkapan;
			$model->hs_sarana_listrik = $model->gudang_sarana_listrik;
			$model->hs_sarana_air = $model->gudang_sarana_air;
			$model->hs_sarana_pendingin = $model->gudang_sarana_pendingin;
			$model->hs_sarana_forklif = $model->gudang_sarana_forklif;
			$model->hs_sarana_komputer = $model->gudang_sarana_komputer;
			$model->hs_kepemilikan = $model->gudang_kepemilikan;	
			$model->hs_imb_nomor = $model->gudang_imb_nomor;
			$model->hs_imb_tanggal = $model->gudang_imb_tanggal;
			$model->hs_uug_nomor = $model->gudang_uug_nomor;
			$model->hs_uug_tanggal = $model->gudang_uug_tanggal;
			$model->hs_uug_berlaku = $model->gudang_uug_berlaku;
			$model->hs_isi = $model->gudang_isi;
			
			$model->save(false);
			//$model->saveAll();
			return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
        } else { 
            return $this->render('create', [
                'model' => $model,
            ]);
        }
       
    }
	
	public function actionCompleted($id)
    {	
		$model = $this->findModelPerizinan($id);
		$izin = IzinTdg::findOne($model->referrer_id);
		return $this->render('_completed', [
                    'model' => $model,
                    'izin' => $izin
        ]);
	}
	
	protected function findModelPerizinan($id) {
		
        if (($model = Perizinan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
	
/*	public function actionPreview($id)
    {	
		$tanggal_mohon = date("d-m-Y");
		$model = IzinTdg::findOne($id); 
		$izin = Izin::findOne($model->izin_id);	
		$temp = str_replace('{pemilik_nm}', $model->pemilik_nama, $izin->preview_data);
		$temp = str_replace('{pemilik_ktp_paspor_kitas}', $model->pemilik_nik, $temp);
		$temp = str_replace('{pemilik_alamat}', $model->pemilik_alamat, $temp);
		$temp = str_replace('{pemilik_telepon_fax_email}', $model->pemilik_telepon.', '.$model->pemilik_fax.', '.$model->pemilik_email, $temp);
		$temp = str_replace('{alamat_gudang}', $model->gudang_blok_lantai.', '.$model->gudang_namajalan, $temp);
		$temp = str_replace('{titik_koordinat}', $model->gudang_koordinat_1, $temp);		
		$temp = str_replace('{telepon_fax_email}', $model->gudang_telepon.', '.$model->gudang_fax.', '.$model->gudang_email, $temp);
		$temp = str_replace('{luas}', $model->gudang_luas, $temp);
		$temp = str_replace('{luas_huruf}', 'lalang', $temp);
		$temp = str_replace('{kapasitas}', $model->gudang_kapasitas, $temp);
		$temp = str_replace('{satuan_kapasitas}', $model->gudang_kapasitas_satuan, $temp);		
		$temp = str_replace('{kapasitas_huruf}', '', $temp);
		$temp = str_replace('{golongan}', $model->gudang_kelengkapan, $temp);
		$temp = str_replace('{tanggal_mohon}', $tanggal_mohon, $temp);
		
		$model->preview_data = 	$temp;
		
		
		
		return $this->render('preview', [
			'model' => $model, 'tmp' => $tmp
		]);
	}*/
//
//    /**
//     * Updates an existing IzinTdg model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
			$model->update_by = Yii::$app->user->id;
			$model->update_date = date('Y-m-d');
			$model->gudang_nilai = str_replace('.', '', $model->gudang_nilai);
			$model->gudang_sarana_listrik = str_replace('.', '', $model->gudang_sarana_listrik);
			$model->gudang_kapasitas_satuan = str_replace('.', '', $model->gudang_kapasitas_satuan);
			$model->gudang_sarana_pendingin = str_replace('.', '', $model->gudang_sarana_pendingin);
			$model->gudang_sarana_komputer = str_replace('.', '', $model->gudang_sarana_komputer);
			$model->gudang_kapasitas = str_replace('.', '', $model->gudang_kapasitas);
			$model->gudang_sarana_forklif = str_replace('.', '', $model->gudang_sarana_forklif);
			
			//copy perusahaan
			$model->hs_per_namagedung = $model->perusahaan_namagedung;
			$model->hs_per_blok_lantai = $model->perusahaan_blok_lantai;	
			$model->hs_per_namajalan = $model->perusahaan_namajalan;
			$model->hs_per_propinsi = $model->perusahaan_propinsi;
			$model->hs_per_kabupaten = $model->perusahaan_kabupaten;
			$model->hs_per_kecamatan = $model->perusahaan_kecamatan;
			$model->hs_per_kelurahan = $model->perusahaan_kelurahan;
			$model->hs_per_kodepos = $model->perusahaan_kodepos;
			
			//copy gedung
			$model->hs_koordinat_1 = $model->gudang_koordinat_1;
			$model->hs_koordinat_2 = $model->gudang_koordinat_2;
			$model->hs_namagedung = $model->gudang_namagedung;
			$model->hs_blok_lantai = $model->gudang_blok_lantai;	
			$model->hs_namajalan = $model->gudang_namajalan;
			$model->hs_rt = $model->gudang_rt;
			$model->hs_rw = $model->gudang_rw;				
			$model->hs_propinsi = $model->gudang_propinsi;
			$model->hs_kabupaten = $model->gudang_kabupaten;
			$model->hs_kecamatan = $model->gudang_kecamatan;
			$model->hs_kelurahan = $model->gudang_kelurahan;
			$model->hs_kodepos = $model->gudang_kodepos;
			$model->hs_telepon = $model->gudang_telepon;
			$model->hs_fax = $model->gudang_fax;
			$model->hs_email = $model->gudang_email;
			$model->hs_luas = $model->gudang_luas;
			$model->hs_kapasitas = $model->gudang_kapasitas;
			$model->hs_kapasitas_satuan = $model->gudang_kapasitas_satuan;
			$model->hs_nilai = $model->gudang_nilai;			
			$model->hs_komposisi_nasional = $model->gudang_komposisi_nasional;
			$model->hs_komposisi_asing = $model->gudang_komposisi_asing;
			$model->hs_kelengkapan = $model->gudang_kelengkapan;
			$model->hs_sarana_listrik = $model->gudang_sarana_listrik;
			$model->hs_sarana_air = $model->gudang_sarana_air;
			$model->hs_sarana_pendingin = $model->gudang_sarana_pendingin;
			$model->hs_sarana_forklif = $model->gudang_sarana_forklif;
			$model->hs_sarana_komputer = $model->gudang_sarana_komputer;
			$model->hs_kepemilikan = $model->gudang_kepemilikan;	
			$model->hs_imb_nomor = $model->gudang_imb_nomor;
			$model->hs_imb_tanggal = $model->gudang_imb_tanggal;
			$model->hs_uug_nomor = $model->gudang_uug_nomor;
			$model->hs_uug_tanggal = $model->gudang_uug_tanggal;
			$model->hs_uug_berlaku = $model->gudang_uug_berlaku;
			$model->hs_isi = $model->gudang_isi;
			
			$model->save(false);
			
			return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
			
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
//
//    /**
//     * Deletes an existing IzinTdg model.
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
//     * Finds the IzinTdg model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return IzinTdg the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
    protected function findModel($id)
    {
        if (($model = IzinTdg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
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
