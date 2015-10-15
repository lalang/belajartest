<?php if (class_exists('yii\debug\Module')) {
 $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
use backend\models\Params;
?>
<table width="100%" border="0">
	<tr>	
		<td  colspan="2"><font size="5">BADAN PELAYANAN TERPADU SATU PINTU<br>
			Jl. Kebon Sirih Nomor 18 Blok H Lantai 18<br>
			Jakarta Pusat</font><br><br><br><br>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><font size="5">TANDA TERIMA PERMOHONAN</font><br><br><br><br></td>
	</tr>
        <tr>
                        <td valign="top">Kode Registrasi </td>
                        <td ><b><?= $model->perizinan->kode_registrasi; ?></b></td>
        </tr>
        <tr>
                        <td valign="top" valign="top">Nama Izin </td>
                        <td ><?= $model->izin->nama; ?></td>
        </tr>
	<tr>
		<td WIDTH="16%" valign="top">NPWP Perusahaan </td>
		<td WIDTH="74%"><?= $model->npwp_perusahaan; ?></td>
	</tr>
	<tr>
		<td valign="top">Nama Perusahaan </td>
		<td ><?= $model->nama_perusahaan; ?></td>
	</tr>
	<tr>
		<td >Diminta hadir pada : </td>
		<td > </td>
	</tr>
	 <tr>
                        <td valign="top">Tanggal </td>
                        <td ><b><?= Yii::$app->formatter->asDate($model->perizinan->pengambilan_tanggal, 'php: l, d F Y'); ?></b></font> </td>
                    </tr>
                    <tr>
                        <td valign="top">Sesi</td>
                        <td ><b><?= $model->perizinan->pengambilan_sesi; ?>, <?= Params::findOne($model->perizinan->pengambilan_sesi)->value;?> </b></font></td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat </td>
                        <td ><?= $model->lokasi->nama; ?></td>
                    </tr>
</table>
<br><br>
Catatan :
<ol >
<li>Pemohon diwajibkan membawa dokumen persyaratan asli dan tanda terima permohonan internet ini, termasuk: </li>
	<ol type="a">
	<li>Hasil Cetak Formulir Pendaftaran yang sudah ditandatangani</li>
	<li>Hasil Cetak Surat Kuasa yang sudah ditandatangani, jika dikuasakan.</li>
	</ol>
<li>Pemohon yang datang diluar tanggal yang ditentukan, maka permohonan lewat internet yang sudah dilakukan tidak dapat dilanjutkan. Oleh karenanya pemohon diharuskan memilih waktu kedatangan kembali.</li>
</ol>
