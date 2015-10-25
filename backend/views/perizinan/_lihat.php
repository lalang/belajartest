
<p><strong><em>&nbsp;</em></strong></p>
<p style="text-align: center;"><strong>FORM PENDAFTARAN SIUP</strong></p>
<p style="text-align: center;">&nbsp;</p>
<p><strong>I. Identitas Pemilik/ Pengurus/ Penanggung Jawab</strong></p>
<table>
    <tbody>
        <tr>
            <td width="300" valign="top">
                <p>NIK</p>
            </td>
            <td width="2" valign="top">:</td>
            <td width="" valign="top">
                <p><?= $model->ktp; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Nama</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->nama; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                Alamat
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->alamat; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Tempat,Tanggal Lahir</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->tempat_lahir; ?>, <?= Yii::$app->formatter->asDate($model->tanggal_lahir, 'php: d F Y'); ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Nomor Telp/ Fax </p>
            </td>
            <td ></td>
            <td>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Telp</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->telepon; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Fax</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->fax; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Nomor KTP/ Paspor </p>
            </td>
            <td ></td>
            <td>
                <p></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>KTP</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->ktp; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Paspor</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->passport; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Kewarganegaraan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->kewarganegaraan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Jabatan Dalam Perusahaan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
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
            <td width="300" valign="top">
                <p>NPWP</p>
            </td>
            <td width="2" valign="top">:</td>
            <td width="" valign="top">
                <p><?= $model->npwp_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Nama Perusahaan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->nama_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Bentuk Perusahaan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->bentuk_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                Alamat Perusahaan
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->alamat_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Propinsi</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->propinsi; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Kabupaten/ Kota/ Kotamadya </p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->nama_kabkota; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Kecamatan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->nama_kecamatan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Kelurahan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->nama_kelurahan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Kode Pos</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->kode_pos; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Nomor Telp/Fax </p>
            </td>
            <td valign="top"></td>
            <td valign="top">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Telp</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->telpon_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Fax</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->fax_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Status</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
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
            <td width="300" valign="top">
                <p>Nomor Akta Pendirian</p>
            </td>
            <td width="2" valign="top">:</td>
            <td width="" valign="top">
                <p><?= $model->akta_pendirian_no; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Tanggal Akta Pendirian</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= Yii::$app->formatter->asDate($model->akta_pendirian_tanggal, 'php: d F Y'); ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" valign="top">
                <p>Pengesahan Badan Hukum Kemenkumham RI </p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Nomor SK</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->no_sk; ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Tanggal Pengesahan</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
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
            <td colspan="2" valign="top">
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
                <td width="266" valign="top">
                    <p>Nomor Akta</p>
                </td>
                <td width="2" valign="top">:</td>
                <td width="" valign="top">
                    <p><?= $akta->nomor_akta; ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    <p>Tanggal akta</p>
                </td>
                <td valign="top">:</td>
                <td valign="top">
                    <p><?= Yii::$app->formatter->asDate($akta->tanggal_akta, 'php: d F Y'); ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    <p>Nomor pengesahan</p>
                </td>
                <td valign="top">:</td>
                <td valign="top">
                    <p><?= $akta->nomor_pengesahan; ?></p>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="top">
                    <p>Tanggal Pengesahan</p>
                </td>
                <td valign="top">:</td>
                <td valign="top">
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
            <td width="300" valign="top">
                <p>Modal Dan Nilai Kekayaan Bersih Perusahaan</p>
            </td>
            <td width="2" valign="top">:</td>
            <td width="" valign="top">
                <p>Rp.&nbsp;<?= number_format($model->modal, 2, ',', '.'); ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Saham (Khusus untuk penanam modal asing)</p>
            </td>
            <td>
                <p></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Total Nilai Saham</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p>Rp.&nbsp;<?= number_format($model->nilai_saham_pma, 2, ',', '.'); ?></p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Komposisi Pemilik Saham</p>
            </td>
            <td valign="top">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Saham Nasional</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
                <p><?= $model->saham_nasional; ?>&nbsp;%</p>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <p>Saham Asing</p>
            </td>
            <td valign="top">:</td>
            <td valign="top">
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
            <td colspan="2" valign="top">
                <p>Kelembagaan</p>
            </td>
            <td width="2" valign="top">:</td>
            <td width="" valign="top">
                <p><?= $model->kelembagaan; ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" valign="top">
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
            $kd = \backend\models\Kbli::findOne(['kode' => $kbli->kbli->kode])->parent_id;
             if($kd == ''){
                 $kode=$kbli->kbli->kode;
             } else{
             $kode = \backend\models\Kbli::findOne(['id' => $kd])->kode;
             }
            ?>

            <tr>
                <td  width="34" valign="top">
                    <?= $a . '.'; ?>
                </td>
                <td width="266" valign="top">
                    <p>Kode KBLI</p>
                </td>
                <td valign="top" width="2">:</td>
                <td width="" valign="top">
                    <p><?= $kode; ?></p>
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


