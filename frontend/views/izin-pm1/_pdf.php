<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPm1 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pm1'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pm1-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Izin Pm1').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
        [
            'attribute' => 'status.id',
            'label' => Yii::t('app', 'Status'),
        ],
        'nik',
        'no_kk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat:ntext',
        'kodepos',
        'pekerjaan',
        'telepon',
        'no_surat_pengantar',
        'tanggal_surat',
        'instansi_tujuan',
        'tujuan',
        'keperluan_administrasi:ntext',
        'nik_orang_lain',
        'no_kk_orang_lain',
        'nama_orang_lain',
        'tempat_lahir_orang_lain',
        'tanggal_lahir_orang_lain',
        'alamat_orang_lain:ntext',
        'kodepos_orang_lain',
        'pekerjaan_orang_lain',
        'telepon_orang_lain',
        'nik_saksi1',
        'no_kk_saksi1',
        'nama_saksi1',
        'tempat_lahir_saksi1',
        'tanggal_lahir_saksi1',
        'alamat_saksi1:ntext',
        'kodepos_saksi1',
        'pekerjaan_saksi1',
        'telepon_saksi1',
        'nik_saksi2',
        'no_kk_saksi2',
        'nama_saksi2',
        'tempat_lahir_saksi2',
        'tanggal_lahir_saksi2',
        'alamat_saksi2:ntext',
        'kodepos_saksi2',
        'pekerjaan_saksi2',
        'telepon_saksi2',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>