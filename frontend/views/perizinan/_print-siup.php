<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<p><strong><em>&nbsp;</em></strong></p>
<p style="text-align: center;"><strong>FORM PENDAFTARAN SIUP</strong></p>
<p style="text-align: center;">&nbsp;</p>
<p><strong>I. Identitas Pemilik/ Pengurus/ Penanggung Jawab</strong></p>
<table>
    <tbody>
        <tr>
            <td width="320">
                <p>NIK</p>
            </td>
            <td width="2">:</td>
            <td width="307">
                <p><?= $model->ktp; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Nama</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->nama; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                Alamat
            </td>
            <td valign="top">:</td>
            <td>
                <p><?= $model->alamat; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Tempat,Tanggal Lahir</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->tempat_lahir; ?>, <?= Yii::$app->formatter->asDate($model->tanggal_lahir, 'php: d F Y'); ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Nomor Telp/ Fax </p>
            </td>
            <td ></td>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Telp</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->telepon; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Fax</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->fax; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Nomor KTP/ Paspor </p>
            </td>
            <td ></td>
            <td>
                <p></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>KTP</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->ktp; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Paspor</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->passport; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Kewarganegaraan</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->kewarganegaraan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Jabatan Dalam Perusahaan</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->jabatan_perusahaan; ?></p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong>II. Identitas Perusahaan</strong></p>
<table>
    <tbody>
        <tr>
            <td width="320">
                <p>NPWP</p>
            </td>
            <td width="2">:</td>
            <td width="308">
                <p><?= $model->npwp_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Nama Perusahaan</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->nama_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Bentuk Perusahaan</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->bentuk_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                Alamat Perusahaan
            </td>
            <td valign="top">:</td>
            <td>
                <p><?= $model->alamat_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Propinsi</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->propinsi; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Kabupaten/ Kota/ Kotamadya </p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->nama_kabkota; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Kecamatan</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->nama_kecamatan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Kelurahan</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->nama_kelurahan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Kode Pos</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->kode_pos; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Nomor Telp/Fax </p>
            </td>
            <td ></td>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Telp</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->telpon_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Fax</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->fax_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Status</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->status_perusahaan; ?></p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong>III. Legalitas Perusahaan</strong></p>
<table>
    <tbody>
        <tr>
            <td width="320">
                <p>Nomor Akta Pendirian</p>
            </td>
            <td width="2">:</td>
            <td width="308">
                <p><?= $model->akta_pendirian_no; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Tanggal Akta Pendirian</p>
            </td>
            <td >:</td>
            <td>
                <p><?= Yii::$app->formatter->asDate($model->akta_pendirian_tanggal, 'php: d F Y'); ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Pengesahan Badan Hukum Kemenkumham RI </p>
            </td>
        </tr>
        <tr>
            <td >
                <p>Nomor SK</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->no_sk; ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Tanggal Pengesahan</p>
            </td>
            <td >:</td>
            <td>
                <p><?= Yii::$app->formatter->asDate($model->tanggal_pengesahan, 'php: d F Y'); ?></p>
            </td>
        </tr>
    </tbody>
</table>
 <?php
      $akt = \backend\models\IzinSiupAkta::findOne($model->id)->nomor_akta;
        if( $akt <> ''){
?>
<table>
    <tbody>
        <tr>
            <td colspan="2">
                <p>Akta Perubahan</p>
            </td>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <?php
        $i = 1;
        $aktas = $model->izinSiupAktas;
        foreach ($aktas as $akta) {
            ?>
            <tr>
                <td width="34" valign="top">
                    <?= $i . '.'; ?>
                </td>
                <td width="286">
                    <p>Nomor Akta</p>
                </td>
                <td width="2">:</td>
                <td width="293">
                    <p><?= $akta->nomor_akta; ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >
                    <p>Tanggal akta</p>
                </td>
                <td >:</td>
                <td >
                    <p><?= Yii::$app->formatter->asDate($akta->tanggal_akta, 'php: d F Y'); ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <p>Nomor pengesahan</p>
                </td>
                <td >:</td>
                <td>
                    <p><?= $akta->nomor_pengesahan; ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td >
                    <p>Tanggal Pengesahan</p>
                </td>
                <td >:</td>
                <td>
                    <?= Yii::$app->formatter->asDate($akta->tanggal_pengesahan, 'php: d F Y'); ?>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>   
    </tbody>
</table>
<?php
}
?>
<!--        <tr>
<td>
<p>Nomor Daftar</p>
</td>
<td>
<p><?= $model->no_daftar; ?></p>
</td>
</tr>-->

</tbody>
</table>
<p>&nbsp;</p>
<p><strong>IV.&nbsp;Modal Dan Saham</strong></p>
<table>
    <tbody>
        <tr>
            <td width="320">
                <p>Modal Dan Nilai Kekayaan Bersih Perusahaan</p>
            </td>
            <td width="2">:</td>
            <td width="308">
                <p>Rp.&nbsp;<?= number_format($model->modal, 2, ',', '.'); ?></p>
            </td>
        </tr>
        <tr>
            <td >
                <p>Saham (Khusus untuk penanam modal asing)</p>
            </td>
            <td>
                <p></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Total Nilai Saham</p>
            </td>
            <td >:</td>
            <td>
                <p>Rp.&nbsp;<?= number_format($model->nilai_saham_pma, 2, ',', '.'); ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Komposisi Pemilik Saham</p>
            </td>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Saham Nasional</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->saham_nasional; ?>&nbsp;%</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Saham Asing</p>
            </td>
            <td >:</td>
            <td>
                <p><?= $model->saham_asing; ?>&nbsp;%</p>
            </td>
        </tr>
    </tbody>
</table>
<p><em>&nbsp;</em></p>
<p><strong>V. Kegiatan Usaha</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2">
                <p>Kelembagaan</p>
            </td>
            <td width="2">:</td>
            <td width="308">
                <p><?= $model->kelembagaan; ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Kegiatan Usaha KBLI</p>
            </td>
            <td></td>
            <td >
                <p><em></em></p>
            </td>
        </tr>       
        <?php
        $a = 1;
        $kblis = $model->izinSiupKblis;
        foreach ($kblis as $kbli) {
            ?>

            <tr>
                <td  width="34" valign="top">
                    <?= $a . '.'; ?>
                </td>
                <td width="286">
                    <p>Kode KBLI</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="293">
                    <p><?= $kbli->kbli->kode; ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Nama KBLI
                </td>
                <td valign="top">:</td>
                <td>
                    <p><?= $kbli->kbli->nama; ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    Keterangan
                </td>
                <td valign="top">:</td>
                <td>
                    <?= $kbli->keterangan; ?>
                </td>
            </tr>

            <?php
            $a++;
        }
        ?>	
    </tbody>
</table>
<p><em>&nbsp;</em></p>
<p align="justify">Demikin surat permohonan SIUP ini, kami buat dengan sebenarnya dan apabila dikemudian hari ternyata data atau informasi dan keterangan tersebut tidak benar, maka kami menyatakan bersedia untuk dibatalkan SIUP yang telah kami miliki dan dituntut sesuai dengan peraturan perundang - undangan.</p>
<p>&nbsp;</p>
<table style="height: 220px;" width="667">
    <tbody>
        <tr>
            <td width="379">
                <p>&nbsp;</p>
            </td>
            <td width="319"><center>Jakarta, <?= Yii::$app->formatter->asDate($model->perizinan->tanggal_mohon, 'php: d F Y') ?><br>
        <br><br><br><br><br><br><br>
        <?= $model->nama; ?></center>
    <p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>

