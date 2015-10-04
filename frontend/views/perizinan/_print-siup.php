<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<!--<center><h1>FORM PENDAFTARAN SIUP</h1></center></br></br>
        <h2>I. Identitas Pemilik/ Pengurus/ Penanggung Jawab</h2>
        <div class="row">
            <div class="col-sm-3">
                NIK
            </div>
            <div class="col-sm-7">
                <i><?= $model->ktp; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Nama
            </div>
            <div class="col-sm-9">
                <i><?= $model->nama; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Alamat
            </div>
            <div class="col-sm-9">
                <i><?= $model->alamat; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Tempat/ Tanggal Lahir
            </div>
            <div class="col-sm-9">
                <i><?= $model->tempat_lahir; ?>, <?= $model->tanggal_lahir; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Nomor Telp/ Fax
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-1">
                        Telp:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->telepon; ?></i>
                    </div>
                    <div class="col-sm-2">
                        Fax:
                    </div>
                    <div class="col-sm-6">
                        <i><?= $model->fax; ?></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Nomor KTP/ Paspor
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-1">
                        KTP:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->ktp; ?></i>
                    </div>
                    <div class="col-sm-2">
                        Paspor:
                    </div>
                    <div class="col-sm-6">
                        <i><?= $model->passport; ?></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Kewarganegaraan
            </div>
            <div class="col-sm-6">
                <i><?= $model->kewarganegaraan; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Jabatan Dalam Perusahaan
            </div>
            <div class="col-sm-6">
                <i><?= $model->jabatan_perusahaan; ?></i>
            </div>
        </div>
        <br>
        <h2>II. Identitas Perusahaan</h2>
        <div class="row">
            <div class="col-sm-3">
                NPWP
            </div>
            <div class="col-sm-9">
                <i><?= $model->npwp_perusahaan; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Nama Perusahaan
            </div>
            <div class="col-sm-9">
                <i><?= $model->nama_perusahaan; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Bentuk Perusahaan
            </div>
            <div class="col-sm-9">
                <i><?= $model->bentuk_perusahaan; ?></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                Alamat Perusahaan
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-3">
                        Propinsi:
                    </div>
                    <div class="col-sm-9">
                        <i><?= $model->propinsi; ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Kabupaten/ Kota/ Kotamadya
                    </div>
                    <div class="col-sm-9">
                        <i><?= $model->nama_kabkota; ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Kecamatan
                    </div>
                    <div class="col-sm-9">
                        <i><?= $model->nama_kecamatan; ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Kelurahan
                    </div>
                    <div class="col-sm-9">
                        <i><?= $model->nama_kelurahan; ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Kodepos
                    </div>
                    <div class="col-sm-9">
                        <i><?= $model->kode_pos; ?></i>
                    </div>
                </div>		
            </div>
        </div>	

        <div class="row">
            <div class="col-sm-3">
                Nomor Telp/ Fax
            </div>
            <div class="col-sm-9">	
                <div class="row">
                    <div class="col-sm-1">
                        Telp:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->telpon_perusahaan; ?></i>
                    </div>
                    <div class="col-sm-2">
                        Fax:
                    </div>
                    <div class="col-sm-6">
                        <i><?= $model->fax_perusahaan; ?></i>
                    </div>
                </div>
            </div>
        </div>	
        <div class="row">
            <div class="col-sm-3">
                Status
            </div>
            <div class="col-sm-9">
                <i><?= $model->status_perusahaan; ?></i>
            </div>
        </div>	
        <br>	

        <h3>III. Legalitas Perusahaan</h3>
        <div class="row">
            <div class="col-sm-3">
                Akta Pendirian
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-1">
                        Nomor:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->akta_pendirian_no; ?></i>
                    </div>
                    <div class="col-sm-2">
                        Tgl Akta:
                    </div>
                    <div class="col-sm-6">
                        <i><?= $model->akta_pendirian_tanggal; ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        Nomor:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->akta_pengesahan_no; ?></i>
                    </div>
                    <div class="col-sm-2">
                        Tgl Pengesahan:
                    </div>
                    <div class="col-sm-6">
                        <i><?= $model->akta_pengesahan_tanggal; ?></i>
                    </div>
                </div>		
            </div>
            <div class="col-sm-3">
                Akta Perubahan
            </div>
            <div class="col-sm-9">
                <div class="row">
                    
<?php
$aktas = $model->izinSiupAktas;
foreach ($aktas as $akta) {
    ?>
                                                <div class="col-sm-1">
                                                Nomor:
                                                </div>
                                                <div class="col-sm-3">
    <?= $akta->nomor_akta; ?>
                                                </div>
                                                <div class="col-sm-2">
                                                Tgl Akta:
                                                </div>
                                                <div class="col-sm-3">
    <?= $akta->tanggal_pengesahan; ?>
                                                </div>
<?php } ?>
                </div>
            </div>
            <div class="col-sm-4">
                Pengesahan Badan Hukum Kemenkumham RI
            </div>
            <div class="col-sm-7">
                <div class="row">
                    <div class="col-sm-3">
                        Nomor SK:
                    </div>
                    <div class="col-sm-3">
                        <i>007</i>
                    </div>
                    <div class="col-sm-3">
                        Nomor Daftar:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->no_daftar; ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Tgl Pengesahaan:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->tanggal_pengesahan; ?></i>
                    </div>
                </div>		
            </div>
        </div>
        <br>
        <h3>IV. Modal Dan Saham</h3>
        <div class="row">
            <div class="col-sm-3">
                Modal Dan Nilai Kekayaan Bersih Perusahaan:
            </div>
            <div class="col-sm-9">
                <i><?= $model->modal; ?></i>
            </div>
        </div>		
        <div class="row">
            <div class="col-sm-3">
                Saham (Khusus untuk penanam modal asing)
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-3">
                        Total Nilai Saham:
                    </div>
                    <div class="col-sm-3">
                        <i><?= $model->nilai_saham_pma; ?></i>
                    </div>
                </div>	
                <div class="row">
                    <div class="col-sm-12">
                        Komposisi Pemilik Saham
                    </div>
                </div>
                <div class="row">	
                    <div class="col-sm-3">
                        Saham Nasional:
                    </div>
                    <div class="col-sm-9">
                        <i><?= $model->saham_nasional; ?></i>
                    </div>
                </div>
                <div class="row">	
                    <div class="col-sm-3">
                        Saham Asing:
                    </div>
                    <div class="col-sm-9">
                        <i><?= $model->saham_asing; ?></i>
                    </div>
                </div>		
            </div>
        </div>	
        <br>
        <h3>V. Kegiatan Usaha</h3>
        <div class="row">
            <div class="col-sm-3">
                Kelembagaan:
            </div>
            <div class="col-sm-9">
                <i>Perdagangan Besar</i>
            </div>
        </div>	
        <div class="row">
            <div class="col-sm-3">
                Kegiatan Usaha KBLI:
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-2">
                        Kode KBLI
                    </div>
                    <div class="col-sm-4">
                        Nama KBLI
                    </div>
                    <div class="col-sm-4">
                        Keterangan
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <i>927892</i>
                    </div>
                    <div class="col-sm-4">
                        <i>Sinar Mas</i>
                    </div>
                    <div class="col-sm-4">
                        <i>Baru mengajukan</i>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                Barang/ Jasa Dagang Utama:
            </div>
            <div class="col-sm-9">
                <i>Barang Apalah</i>
            </div>
        </div>	

        <hr size="1" color="blue">
        <p>
            Demikin surat permohonan SIUP ini, kami buat dengan sebenarnya dan apabila dikemudian hari ternyata data atau informasi dan keterangan tersebut tidak benar, maka kami menyatakan bersedia untuk dibatalkan SIUP yang telah kami miliki dan dituntut sesuai dengan peraturan perundang - undangan.
        </p><br>
        <div class="row">
            <div class="col-sm-9">

            </div>
            <div class="col-sm-3" style="text-align: center">
                <p>Jakarta, 3 Agustus 2015</p>
                <p>
                    Tanda Tangan***)<br>
                    Materai 6.000
                </p>
                <p>Marzuki Abdulah Suseno</p>
            </div>
        </div>	-->

<p><strong><em>&nbsp;</em></strong></p>
<p style="text-align: center;"><strong>FORM PENDAFTARAN SIUP</strong></p>
<p style="text-align: center;">&nbsp;</p>
<p><strong>I. Identitas Pemilik/ Pengurus/ Penanggung Jawab</strong></p>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="274">
                <p>NIK</p>
            </td>
            <td width="307">
                <p><em><?= $model->ktp; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Nama</p>
            </td>
            <td width="307">
                <p><em><?= $model->nama; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Alamat</p>
            </td>
            <td width="307">
                <p><em><?= $model->alamat; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Tempat/Tanggal Lahir</p>
            </td>
            <td width="307">
                <p><em><?= $model->tempat_lahir; ?>, <?= $model->tanggal_lahir; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Nomor Telp/ Fax</p>
            </td>
            <td width="307">
                <p><em>&nbsp;</em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Telp</p>
            </td>
            <td width="307">
                <p><em><?= $model->telepon; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Fax</p>
            </td>
            <td width="307">
                <p><em><?= $model->fax; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Nomor KTP/ Paspor</p>
            </td>
            <td width="307">
                <p><em>&nbsp;</em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>KTP</p>
            </td>
            <td width="307">
                <p><em><?= $model->ktp; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Paspor</p>
            </td>
            <td width="307">
                <p><em><?= $model->passport; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Kewarganegaraan</p>
            </td>
            <td width="307">
                <p><em><?= $model->kewarganegaraan; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="274">
                <p>Jabatan Dalam Perusahaan</p>
            </td>
            <td width="307">
                <p><em><?= $model->jabatan_perusahaan; ?></em></p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong>II. Identitas Perusahaan</strong></p>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="272">
                <p>NPWP</p>
            </td>
            <td width="308">
                <p><?= $model->npwp_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Nama Perusahaan</p>
            </td>
            <td width="308">
                <p><?= $model->nama_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Bentuk Perusahaan</p>
            </td>
            <td width="308">
                <p><?= $model->bentuk_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Alamat Perusahaan</p>
            </td>
            <td width="308">
                <p><?= $model->alamat_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Propinsi</p>
            </td>
            <td width="308">
                <p><?= $model->propinsi; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Kabupaten/ Kota/ Kotamadya</p>
            </td>
            <td width="308">
                <p><?= $model->nama_kabkota; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Kecamatan</p>
            </td>
            <td width="308">
                <p><?= $model->nama_kecamatan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Kelurahan</p>
            </td>
            <td width="308">
                <p><?= $model->nama_kelurahan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Kode Pos</p>
            </td>
            <td width="308">
                <p><?= $model->kode_pos; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Nomor Telp/Fax</p>
            </td>
            <td width="308">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Telp</p>
            </td>
            <td width="308">
                <p><?= $model->telpon_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Fax</p>
            </td>
            <td width="308">
                <p><?= $model->fax_perusahaan; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Status</p>
            </td>
            <td width="308">
                <p><?= $model->status_perusahaan; ?></p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong>III. Legalitas Perusahaan</strong></p>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="272">
                <p>Akta Pendirian Nomor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            </td>
            <td width="308">
                <p><em><?= $model->akta_pendirian_no; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Tgl Akta</p>
            </td>
            <td width="308">
                <p><em><?= $model->akta_pendirian_tanggal; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Nomor</p>
            </td>
            <td width="308">
                <p><em><?= $model->akta_pengesahan_no; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Tgl Pengesahan</p>
            </td>
            <td width="308">
                <p><em><?= $model->akta_pengesahan_tanggal; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Akta Perubahan &nbsp;&nbsp;&nbsp;&nbsp;</p>
            </td>
            <td width="308">
                <p><em></em></p>
            </td>
        </tr>

        <?php
        $aktas = $model->izinSiupAktas;
        foreach ($aktas as $akta) {
            ?>
            <tr>
                <td width="272">
                    <p>Nomor:</p>
                </td>
                <td width="308">
                    <p><em><?= $akta->nomor_akta; ?></em></p>
                </td>
            </tr>
            <tr>
                <td width="272">
                    <p>Tgl Akta</p>
                </td>
                <td width="308">
                    <p><em><?= $akta->tanggal_pengesahan; ?></em></p>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td width="272">
                <p>Pengesahan Badan Hukum Kemenkumham RI &nbsp;&nbsp;&nbsp;&nbsp;</p>
            </td>
            <td width="308">
                <p><em></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Nomor SK</p>
            </td>
            <td width="308">
                <p><em><?= $model->no_sk; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Nomor Daftar</p>
            </td>
            <td width="308">
                <p><em><?= $model->no_daftar; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Tgl Pengesahan</p>
            </td>
            <td width="308">
                <p><em><?= $model->tanggal_pengesahan; ?></em></p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong>IV.&nbsp;Modal Dan Saham</strong></p>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="272">
                <p>Modal Dan Nilai Kekayaan Bersih Perusahaan:</p>
            </td>
            <td width="308">
                <p><em><?= $model->modal; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Saham (Khusus untuk penanam modal asing)</p>
            </td>
            <td width="308">
                <p><em></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Total Nilai Saham</p>
            </td>
            <td width="308">
                <p><em><?= $model->nilai_saham_pma; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Komposisi Pemilik Saham</p>
            </td>
            <td width="308">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Saham Nasional:</p>
            </td>
            <td width="308">
                <p><?= $model->saham_nasional; ?></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Saham Asing:</p>
            </td>
            <td width="308">
                <p><?= $model->saham_asing; ?></p>
            </td>
        </tr>
    </tbody>
</table>
<p><em>&nbsp;</em></p>
<p><strong>V. Kegiatan Usaha</strong></p>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="272">
                <p>Kelembagaan</p>
            </td>
            <td width="308">
                <p><em><?= $model->kelembagaan; ?></em></p>
            </td>
        </tr>
        <tr>
            <td width="272">
                <p>Kegiatan Usaha KBLI:</p>
            </td>
            <td width="308">
                <p><em></em></p>
            </td>
        </tr>
        <?php
        $kblis = $model->izinSiupKblis;
        foreach ($kblis as $kbli) {
            ?>
            <tr>
                <td width="272">
                    <p>Kode KBLI</p>
                </td>
                <td width="308">
                    <p><em><?= $kbli->kbli->kode; ?></em></p>
                </td>
            </tr>
            <tr>
                <td width="272">
                    <p>Nama KBLI</p>
                </td>
                <td width="308">
                    <p><em><?= $kbli->kbli->nama; ?></em></p>
                </td>
            </tr>
            <tr>
                <td width="272">
                    <p>Keterangan</p>
                </td>
                <td width="308">
                    <p><em><?= $kbli->keterangan; ?></em></p>
                </td>
            </tr>
        <?php } ?>	

        <tr>
            <td width="272">
                <p>Barang/ Jasa Dagang Utama</p>
            </td>
            <td width="308">
                <p><em>Barang Apalah</em></p>
            </td>
        </tr>
    </tbody>
</table>
<p><em>&nbsp;</em></p>
<p>Demikin surat permohonan SIUP ini, kami buat dengan sebenarnya dan apabila dikemudian hari ternyata data atau informasi dan keterangan tersebut tidak benar, maka kami menyatakan bersedia untuk dibatalkan SIUP yang telah kami miliki dan dituntut sesuai dengan peraturan perundang - undangan.</p>
<p>&nbsp;</p>
<table>
    <tbody>
        <tr>
            <td width="800">
                <p>&nbsp;</p>
            </td>
            <td width="221">
                <p style="text-align: center;">Jakarta, 3 Agustus 2015</p>
                <p style="text-align: center;">&nbsp;</p>
                <p style="text-align: center;">Tanda Tangan***)</p>
                <p style="text-align: center;">Materai 6.000</p>
                <p style="text-align: center;">&nbsp;</p>
                <p style="text-align: center;">Marzuki Abdulah Suseno</p>
                <p>&nbsp;</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>

