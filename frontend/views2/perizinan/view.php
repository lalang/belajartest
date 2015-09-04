<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->id;
?>
<style>
    .panel-default {border:none}
</style>
<div class="breadcrumb-wrapper hidden-xs">
            
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan/view', ['id'=>$model->id]) ?>">Perizinan</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Data</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
   
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= Html::encode($this->title) ?></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinans.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'pemohon.id',
            'label' => Yii::t('app', 'User'),
        ],
        'id_groupizin',
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        'jumlah_tahap',
        'no_urut',
        'tanggal_mohon',
        'no_izin',
        'berkas_noizin',
        'tanggal_izin',
        'tanggal_expired',
        'status',
        'aktif',
        'registrasi_urutan',
        'nomor_sp_rt_rw',
        'tanggal_sp_rt_rw',
        'peruntukan',
        'nama_perusahaan',
        'tanggal_cek_lapangan',
        'petugas_cek',
        'status_daftar',
        [
            'attribute' => 'petugasDaftar.id',
            'label' => Yii::t('app', 'User'),
        ],
        'lokasi_id',
        'keterangan:ntext',
        'qr_code',
        'tanggal_pertemuan',
        'pengambilan_tanggal',
        'pengambilan_jam',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnIzinSiup = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        [
            'attribute' => 'user.id',
            'label' => Yii::t('app', 'User'),
        ],
        'ktp',
        'nama',
        'alamat:ntext',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'fax',
        'passport',
        'kewarganegaraan',
        'jabatan_perusahaan',
        'npwp_perusahaan',
        'nama_perusahaan',
        'alamat_perusahaan:ntext',
        'telpon_perusahaan',
        'fax_perusahaan',
        'kelurahan_id',
        'status_perusahaan',
        'kode_pos',
        'bentuk_perusahaan',
        'akta_pendirian_no',
        'akta_pendirian_tanggal',
        'akta_pengesahan_no',
        'akta_pengesahan_tanggal',
        'no_sk',
        'no_daftar',
        'tanggal_pengesahan',
        'modal',
        'nilai_saham_pma',
        'saham_nasional',
        'saham_asing',
        'barang_jasa_dagangan',
        'tanggal_neraca',
        'aktiva_lancar_kas',
        'aktiva_lancar_bank',
        'aktiva_lancar_piutang',
        'aktiva_lancar_barang',
        'aktiva_lancar_pekerjaan',
        'aktiva_tetap_peralatan',
        'aktiva_tetap_investasi',
        'aktiva_lainnya',
        'pasiva_hutang_dagang',
        'pasiva_hutang_pajak',
        'pasiva_hutang_lainnya',
        'hutang_jangka_panjang',
        'kekayaan_bersih',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerIzinSiup,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Izin Siup').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnIzinSiup
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPerizinan = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinans.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'pemohon.id',
            'label' => Yii::t('app', 'User'),
        ],
        'id_groupizin',
        [
            'attribute' => 'izin.id',
            'label' => Yii::t('app', 'Izin'),
        ],
        'jumlah_tahap',
        'no_urut',
        'tanggal_mohon',
        'no_izin',
        'berkas_noizin',
        'tanggal_izin',
        'tanggal_expired',
        'status',
        'aktif',
        'registrasi_urutan',
        'nomor_sp_rt_rw',
        'tanggal_sp_rt_rw',
        'peruntukan',
        'nama_perusahaan',
        'tanggal_cek_lapangan',
        'petugas_cek',
        'status_daftar',
        [
            'attribute' => 'petugasDaftar.id',
            'label' => Yii::t('app', 'User'),
        ],
        'lokasi_id',
        'keterangan:ntext',
        'qr_code',
        'tanggal_pertemuan',
        'pengambilan_tanggal',
        'pengambilan_jam',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinan
    ]);
?>
    </div>
    
    <div class="row">
<?php
    $gridColumnPerizinanDokumen = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'dokumenPendukung.id',
            'label' => Yii::t('app', 'Dokumen Pendukung'),
        ],
        'urutan',
        'isi:ntext',
        'file',
        'check',
        'keterangan:ntext',
        [
            'attribute' => 'userCheck.id',
            'label' => Yii::t('app', 'User'),
        ],
        'time_check',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPerizinanDokumen,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode(Yii::t('app', 'Perizinan Dokumen').' '. $this->title) . ' </h3>',
        ],
        'columns' => $gridColumnPerizinanDokumen
    ]);
?>
            </div>
        </div>
    
</div>
