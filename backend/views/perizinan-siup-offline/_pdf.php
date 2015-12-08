<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanSiupOffline */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Perizinan Siup Offline', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perizinan-siup-offline-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Perizinan Siup Offline'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'no_izin',
        'pemilik_nama',
        'pemilik_tempat_lahir',
        'pemilik_tanggal_lahir',
        'pemilik_alamat_rumah',
        'pemilik_propinsi',
        'pemilik_kabupaten',
        'pemilik_kecamatan',
        'pemilik_kelurahan',
        'pemilik_no_telpon',
        'pemilik_no_ktp',
        'pemilik_kewarganegaraan',
        'perusahaan_nama',
        'perusahaan_alamat',
        'perusahaan_propinsi',
        'perusahaan_kabupaten',
        'perusahaan_kecamatan',
        'perusahaan_kelurahan',
        'perusahaan_kodepos',
        'perusahaan_no_telpon',
        'perusahaan_no_fax',
        'perusahaan_email:email',
        'created_date',
        'updated_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>