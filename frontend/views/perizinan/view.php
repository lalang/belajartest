<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use backend\models\Params;

/* @var $this yii\web\View */
/* @var $izin backend\models\Perizinan */

$this->title = 'Lihat Permohonan';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perizinan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>
<div class="perizinan-view">

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>	<i class="icon fa fa-check"></i> Permohonan Sukses!</h4>
                Permohonan izin sukses didaftarkan, silahkan pantau melalui menu akun anda untuk melihat status permohonan.
            </div>

            <div class="row">
                <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a class="btn btn-block btn-center btn-bitbucket">
                            Tanda Registrasi
                        </a>
                    </div>
                    <div class="box-body">
                        
                <table width="100%" border="0">
                    
                    <tr>
                        <td >Kode Registrasi </td>
                        <td ><b><?= $model->kode_registrasi; ?></b></td>
                    </tr>
                    <tr>
                        <td valign="top">Nama Izin </td>
                        <td ><?= $model->izin->nama; ?></td>
                    </tr>
                    <tr>
                        <td WIDTH="30%">NPWP Perusahaan </td>
                        <td WIDTH="70%"><?= $izin->npwp_perusahaan; ?></td>
                    </tr>
                    <tr>
                        <td >Nama Perusahaan </td>
                        <td ><?= $izin->nama_perusahaan; ?></td>
                    </tr>
                    
                    <tr>
                        <td >Diminta hadir pada : </td>
                        <td > </td>
                    </tr>
                    <tr>
                        <td valign="top">Kantor PTSP</td>
                        <td ><?= $model->lokasiPengambilan->nama; ?></td>
                    </tr>
                    <tr>
                        <td valign="top">Tanggal </td>
                        <td ><font size="3"><b><?= Yii::$app->formatter->asDate($model->pengambilan_tanggal, 'php: l, d F Y'); ?></b></font> </td>
                    </tr>
                    <tr>
                        <td valign="top">Sesi</td>
                        <td ><font size="3"><b><?= $model->pengambilan_sesi; ?>, <?= Params::findOne($model->pengambilan_sesi)->value;?> </b></font></td>
                    </tr>
                    <tr>
                        <td valign="top">Alamat </td>
                        <td ><?= $izin->lokasi->nama; ?></td>
                    </tr>
                </table>
                        <hr>
                        <p>Pada saat verifikasi dan pengambilan SK, agar membawa dokumen cetak yang sudah ditandatangani sebagai berikut :</p>
                <p><?= $this->render('_print', ['model' => $model]) ?></p>
                       
                </div>
                </div>
                
                </div>
             
               
                <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <a class="btn btn-block btn-center btn-linkedin">
                            Persyaratan
                        </a>   
                    </div>
                    <div class="box-body">
                
                <p>Disertai dengan dokumen asli kelengkapan persyaratan sebagai berikut :</p>
                <?php $docs = \backend\models\Perizinan::getDocs($model->izin_id); ?>
                <ol>
                    <?php foreach ($docs as $doc) { ?>
                        <li><?= $doc['isi']; ?></li>
                    <?php } ?>
                </ol> 
                </div>
                </div>
                </div>
                    
            </div>

        </div>
    </div>

</div>

</div>