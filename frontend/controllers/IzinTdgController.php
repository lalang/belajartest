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
     * Creates a new IzinTdg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {	
        $model = new IzinTdg();
        $izin = Izin::findOne($id); 
		
		$izintdp = IzinTdp::find()
                        ->joinWith('perizinan')
                        ->where(['user_id'=>Yii::$app->user->identity->id])
                        ->andWhere(['perizinan.status'=>'Selesai'])
                        ->orderBy(['id' => SORT_DESC])
                        ->one();

		$user = User::find()->where(['id'=>Yii::$app->user->id])->one(); 
		
		if($izintdp->i_3_pemilik_alamat){$model->pemilik_alamat = $izintdp->i_3_pemilik_alamat;}else{
			 $model->pemilik_alamat = Yii::$app->user->identity->profile->alamat;
		}
		if($izintdp->i_3_pemilik_propinsi){$model->pemilik_propinsi = $izintdp->i_3_pemilik_propinsi;}
		if($izintdp->i_3_pemilik_kabupaten){$model->pemilik_kabupaten = $izintdp->i_3_pemilik_kabupaten;}
		if($izintdp->i_3_pemilik_kecamatan){$model->pemilik_kecamatan = $izintdp->i_3_pemilik_kecamatan;}
		if($izintdp->i_3_pemilik_kelurahan){$model->pemilik_kelurahan = $izintdp->i_3_pemilik_kelurahan;}
		if($izintdp->i_4_pemilik_telepon){$model->pemilik_telepon = $izintdp->i_4_pemilik_telepon;}else{
			$model->pemilik_telepon = Yii::$app->user->identity->profile->telepon;
		}

		if($izintdp->ii_2_perusahaan_no_telp){$model->perusahaan_telepon = $izintdp->ii_2_perusahaan_no_telp;}
		if($izintdp->ii_2_perusahaan_no_fax){$model->perusahaan_fax = $izintdp->ii_2_perusahaan_no_fax;}
		
		if($izintdp->ii_2_perusahaan_kabupaten){$model->perusahaan_kabupaten = $izintdp->ii_2_perusahaan_kabupaten;}
		if($izintdp->ii_2_perusahaan_kecamatan){$model->perusahaan_kecamatan = $izintdp->ii_2_perusahaan_kecamatan;}
		if($izintdp->ii_2_perusahaan_kelurahan){$model->perusahaan_kelurahan = $izintdp->ii_2_perusahaan_kelurahan;}
		
        $model->izin_id = $izin->id;
        $model->status_id = $izin->status_id;
        $model->user_id = Yii::$app->user->id;
		
		if("Perusahaan" == Yii::$app->user->identity->profile->tipe){
			$model->pemilik_email = "";
			if($izintdp->i_5_pemilik_no_ktp){
				$model->pemilik_nik = $izintdp->i_5_pemilik_no_ktp;
			}else{
				$model->pemilik_nik = "";
			}
			
			if($izintdp->ii_2_perusahaan_email){
				$model->perusahaan_email = $izintdp->ii_2_perusahaan_email;
			}else{
				$model->perusahaan_email = $user->email;
			}
			
			if($izintdp->ii_2_perusahaan_alamat){
				$model->perusahaan_namajalan = $izintdp->ii_2_perusahaan_alamat;
			}else{
				$model->perusahaan_namajalan = '';
			}
			
			if($izintdp->ii_2_perusahaan_kodepos){
				$model->perusahaan_kodepos = $izintdp->ii_2_perusahaan_kodepos;
			}else{
				$model->perusahaan_kodepos = '';
			}
			
			if($izintdp->i_1_pemilik_nama){
				$model->pemilik_nama = $izintdp->i_1_pemilik_nama;
			}else{
				$model->pemilik_nama ="";
			}	
			
			$model->perusahaan_npwp = $user->username;
			if($izintdp->ii_1_perusahaan_nama){
				$model->perusahaan_nama = $izintdp->ii_1_perusahaan_nama;
			}else{
				$model->perusahaan_nama = Yii::$app->user->identity->profile->name;
			}
			
			if($izintdp->ii_2_perusahaan_propinsi){
				$model->perusahaan_propinsi = $izintdp->ii_2_perusahaan_propinsi;
			}else{
				$model->perusahaan_propinsi = "";
			}
		
		}else{
			
			if($izintdp->ii_2_perusahaan_propinsi){
				$model->perusahaan_propinsi = $izintdp->ii_2_perusahaan_propinsi;
			}else{
				$model->perusahaan_propinsi = "";
			}
			
			if($izintdp->i_5_pemilik_no_ktp){
				$model->pemilik_nik = $izintdp->i_5_pemilik_no_ktp;
			}else{
				$model->pemilik_nik = Yii::$app->user->identity->username;
			}
			
			if($izintdp->i_1_pemilik_nama){
				$model->pemilik_nama = $izintdp->i_1_pemilik_nama;
			}else{
				$model->pemilik_nama = Yii::$app->user->identity->profile->name;
			}

			$model->pemilik_email = $user->email;

			$izintdp = \backend\models\IzinTdp::findOne(['id'=>$_SESSION['SiupID']]);
			
			if($izintdp->ii_1_perusahaan_nama){$model->perusahaan_nama = $izintdp->ii_1_perusahaan_nama;}
		}
        $model->tipe = $izin->tipe;

		if ($model->loadAll(Yii::$app->request->post())) {
		
			$model->create_by = Yii::$app->user->id;
			$model->create_date = date('Y-m-d');
			
			$model->gudang_luas = str_replace('.', '', $model->gudang_luas);
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
			$model->hs_jenis = $model->gudang_jenis;
			
			$model->save(false);
		//	$model->saveAll();
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
			$model->gudang_luas = str_replace('.', '', $model->gudang_luas);
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
			$model->hs_jenis = $model->gudang_jenis;
			
			$model->save(false);
			
			return $this->redirect(['/perizinan/upload', 'id'=>$model->perizinan_id, 'ref'=>$model->id]);
			
        } else {
			$get_gudang_luas = explode(".",$model->gudang_luas); 
			$get_gudang_kapasitas = explode(".",$model->gudang_kapasitas); 
			$get_gudang_nilai = explode(".",$model->gudang_nilai);
			$get_gudang_komposisi_nasional = explode(".",$model->gudang_komposisi_nasional); 
			$get_gudang_komposisi_asing = explode(".",$model->gudang_komposisi_asing); 
			$get_gudang_sarana_listrik = explode(".",$model->gudang_sarana_listrik); 
			$get_gudang_sarana_pendingin = explode(".",$model->gudang_sarana_pendingin); 
			
			$model->gudang_luas = $get_gudang_luas[0];
			$model->gudang_kapasitas = $get_gudang_kapasitas[0];
			$model->gudang_nilai = $get_gudang_nilai[0];
			$model->gudang_komposisi_nasional = $get_gudang_komposisi_nasional[0];
			$model->gudang_komposisi_asing = $get_gudang_komposisi_asing[0];
			$model->gudang_sarana_listrik = $get_gudang_sarana_listrik[0];
			$model->gudang_sarana_pendingin = $get_gudang_sarana_pendingin[0];
			
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
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
}
