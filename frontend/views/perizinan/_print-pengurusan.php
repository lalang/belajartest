<?php if (class_exists('yii\debug\Module')) {
 $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<p style="text-align: center;"><strong><u>SURAT KUASA</u></strong><strong><u> PENGURUSAN</u></strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p>Saya yang bertanda tangan di bawah ini :</p>
<table>
<tbody>
<tr>
<td width="158">
<p>NIK</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="158">
<p>Nama</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="158">
<p>Jabatan</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="158">
<p>Nama Perusahaan</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="158">
<p>Alamat Perusahaan</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>dengan ini memberi kuasa kepada :</p>
<table>
<tbody>
<tr>
<td width="158">
<p>NIK</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="158">
<p>Nama</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="158">
<p>Jabatan</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="158">
<p>Alamat Rumah</p>
</td>
<td width="38">
<p>:</p>
</td>
<td width="442">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>Demikian surat pernyataan ini saya buat dengan sebenarnya dan tanpa paksaan dari pihak siapapun. Demikian agar dipergunakan untuk sebagaimana mestinya.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table style="height: 220px;" width="667">
<tbody>
<tr>
<td width="379">
<p>&nbsp;</p>
</td>
<td width="319"><center>Jakarta,&nbsp;<?= Yii::$app->formatter->asDate($model->perizinan->tanggal_mohon, 'php: d F Y');?><br>
        Yang Memberi Kuasa<br><br><br><br><br><br><br>
    <?= $model->nama; ?></center>
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
