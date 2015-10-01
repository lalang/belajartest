<?php 
if (class_exists('yii\debug\Module')) {
 $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}?>

<table width="100%" border="0">
	<tr>	
		<td align="center" colspan="2"><font size="5">SURAT KUASA TANDA TANGAN</font><br><br><br><br></td>
	</tr>
	<tr>
		<td>Saya yang bertanda tangan dibawah ini:<br><br><br><br><br><br><br><br></td>
	</tr>
	<tr>
		<td>Menyatakan dengan benar bahwa <br><br><br><br><br><br><br><br></td>
	</tr>
	<tr>
		<td colspan="2">Demikian surat pernyataan ini saya buat dengan sebenarnya dan tanpa paksaan dari pihak siapapun.
		Demikian agar dipergunakan untuk sebagaimana mestinya.<br><br> <br><br></td>
	</tr>
	<tr>
		<td WIDTH="60%"></td>
		<td WIDTH="40%" align="CENTER">
		Jakarta, 3 Agustus 2015
		<br><br>
		Tanda Tangan***)<br>
		Materai 6.000
		<br><br>
		Marzuki Abdulah Suseno
		</td>
	</tr>
</table>
