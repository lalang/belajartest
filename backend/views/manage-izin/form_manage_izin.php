<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Manage Izin';
$this->params['breadcrumbs'][] = ['label' => 'Manage Izin'];?>
<p>
<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left" aria-hidden="true"></i> Kembali'), ['manage-izin'], ['class' => 'btn btn-info']) ?></p>
<div class="panel panel-info">
	<div class="panel-heading">
		<b>IZIN: (<?php echo $nm_judul_izin; ?>)</b>
	</div>
</div>
<div class="row">
	<div class="col-md-12">

<?php 
if ($model->perizinan->izin->action == 'izin-tdg') {
	
	$izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
	$izin_model[perizinan_proses_id] = $model->id;
	$izin_model[kode_registrasi] = $model->perizinan->kode_registrasi;
	$izin_model[url_back] = 'form-manage-izin';

	$get_gudang_luas = explode(".", $izin_model->gudang_luas);
	$get_gudang_kapasitas = explode(".", $izin_model->gudang_kapasitas);
	$get_gudang_nilai = explode(".", $izin_model->gudang_nilai);
	$get_gudang_komposisi_nasional = explode(".", $izin_model->gudang_komposisi_nasional);
	$get_gudang_komposisi_asing = explode(".", $izin_model->gudang_komposisi_asing);
	$get_gudang_sarana_listrik = explode(".", $izin_model->gudang_sarana_listrik);
	$get_gudang_sarana_pendingin = explode(".", $izin_model->gudang_sarana_pendingin);

	$get_hs_luas = explode(".", $izin_model->hs_luas);
	$get_hs_kapasitas = explode(".", $izin_model->hs_kapasitas);
	$get_hs_nilai = explode(".", $izin_model->hs_nilai);
	$get_hs_komposisi_nasional = explode(".", $izin_model->hs_komposisi_nasional);
	$get_hs_komposisi_asing = explode(".", $izin_model->hs_komposisi_asing);
	$get_hs_sarana_listrik = explode(".", $izin_model->hs_sarana_listrik);
	$get_hs_sarana_pendingin = explode(".", $izin_model->hs_sarana_pendingin);

	$izin_model->gudang_luas = $get_gudang_luas[0];
	$izin_model->gudang_kapasitas = $get_gudang_kapasitas[0];
	$izin_model->gudang_nilai = $get_gudang_nilai[0];
	$izin_model->gudang_komposisi_nasional = $get_gudang_komposisi_nasional[0];
	$izin_model->gudang_komposisi_asing = $get_gudang_komposisi_asing[0];
	$izin_model->gudang_sarana_listrik = $get_gudang_sarana_listrik[0];
	$izin_model->gudang_sarana_pendingin = $get_gudang_sarana_pendingin[0];

	$izin_model->hs_luas = $get_hs_luas[0];
	$izin_model->hs_kapasitas = $get_hs_kapasitas[0];
	$izin_model->hs_nilai = $get_hs_nilai[0];
	$izin_model->hs_komposisi_nasional = $get_hs_komposisi_nasional[0];
	$izin_model->hs_komposisi_asing = $get_hs_komposisi_asing[0];
	$izin_model->hs_sarana_listrik = $get_hs_sarana_listrik[0];
	$izin_model->hs_sarana_pendingin = $get_hs_sarana_pendingin[0];
	echo"<br>";
	echo $this->render('/' . $model->perizinan->izin->action . '/viewDetail', [
                        'model' => $izin_model
                    ]);
	echo $this->render('/' . $model->perizinan->izin->action . '/view', [
		'model' => $izin_model
	]);

}elseif ($model->perizinan->izin->action == 'izin-kesehatan') {
	$izin_model = backend\models\IzinKesehatan::findOne($model->perizinan->referrer_id);

	$izin_model['url_back'] = 'form-manage-izin';
	$izin_model['perizinan_proses_id'] = $model->id;
	echo $this->render('/' . $model->perizinan->izin->action . '/view', [
		'model' => $izin_model
	]);
}elseif ($model->perizinan->izin->action == 'izin-tdp') {

	$izin_model = \backend\models\IzinTdp::findOne($model->perizinan->referrer_id);
	$edit = 1;
	$izin_model[perizinan_proses_id] = $model->id;
	$izin_model[kode_registrasi] = $model->perizinan->kode_registrasi;
	$izin_model[url_back] = 'form-manage-izin';
	$session = Yii::$app->session;
	$getPerizinanParent = backend\models\Perizinan::findOne($izin_model->perizinan_id)->parent_id;
	$idParent = backend\models\Perizinan::findOne($getPerizinanParent)->referrer_id;
	$izin_model->izin_siup_id = $idParent;
	$session->set('izin_siup_id', $idParent);
	if ($izin_model->izin_id == 601 || $izin_model->izin_id == 602 || $izin_model->izin_id == 603) {
		//Koprasi
		$session->set('pt', '');
		echo $this->render('/' . $model->perizinan->izin->action . '/view-kop', [
			'model' => $izin_model
		]);
	} elseif ($izin_model->izin_id == 491 || $izin_model->izin_id == 598 || $izin_model->izin_id == 599) {
		//PT
		$session->set('pt', 1);
		echo $this->render('/' . $model->perizinan->izin->action . '/view-pt', [
			'model' => $izin_model
		]);
	} elseif ($izin_model->izin_id == 604 || $izin_model->izin_id == 605 || $izin_model->izin_id == 606) {
		//Bul
		$session->set('pt', 1);
		$izin_model->bentuk_perusahaan = 3;
		echo $this->render('/' . $model->perizinan->izin->action . '/view-bul', [
			'model' => $izin_model
		]);
	} elseif ($izin_model->izin_id == 607 || $izin_model->izin_id == 608 || $izin_model->izin_id == 609) {
		//CV
		$session->set('pt', '');
		echo $this->render('/' . $model->perizinan->izin->action . '/view-cv', [
			'model' => $izin_model
		]);
	} elseif ($izin_model->izin_id == 610 || $izin_model->izin_id == 611 || $izin_model->izin_id == 612) {
		//Firma
		$session->set('pt', '');
		echo $this->render('/' . $model->perizinan->izin->action . '/view-fa', [
			'model' => $izin_model
		]);
	} elseif ($izin_model->izin_id == 613 || $izin_model->izin_id == 614 || $izin_model->izin_id == 615) {
		//PO
		$session->set('pt', '');
		echo $this->render('/' . $model->perizinan->izin->action . '/view-po', [
			'model' => $izin_model
		]);
	}
		
}elseif ($model->perizinan->izin->action == 'izin-penelitian') {
	$izin_model = \backend\models\IzinPenelitian::findOne($model->perizinan->referrer_id);

	$model->perizinan->tanggal_expired = $izin_model->tgl_akhir_penelitian;
	$izin_model['url_back'] = 'form-manage-izin';
	$izin_model['perizinan_proses_id'] = $model->id;

	echo $this->render('/' . $model->perizinan->izin->action . '/view', [
		'model' => $izin_model
	]);
}elseif ($model->perizinan->izin->action == 'izin-pm1') {
	$izin_model = \backend\models\IzinPm1::findOne($model->perizinan->referrer_id);
	$edit = 1;
	if ($izin_model->izin_id == 537) {
		echo $this->render('/' . $model->perizinan->izin->action . '/view-skbmr', [
			'model' => $izin_model
		]);
	} elseif ($izin_model->izin_id == 519) {
		echo $this->render('/' . $model->perizinan->izin->action . '/view-skck', [
			'model' => $izin_model
		]);
	} elseif ($izin_model->izin_id == 525) {
		echo $this->render('/' . $model->perizinan->izin->action . '/view-sktm', [
			'model' => $izin_model
		]);
	}
} elseif ($model->perizinan->izin->action == 'izin-skdp') {
	$izin_model = backend\models\IzinSkdp::findOne($model->perizinan->referrer_id);
	echo $this->render('/' . $model->perizinan->izin->action . '/view', [
		'model' => $izin_model
	]);
}elseif ($model->perizinan->izin->action == 'izin-siup') {
	$izin_model = backend\models\IzinSiup::findOne($model->perizinan->referrer_id);
	echo $this->render('/' . $model->perizinan->izin->action . '/view', [
		'model' => $izin_model
	]);
}	

?>

	</div>
</div>