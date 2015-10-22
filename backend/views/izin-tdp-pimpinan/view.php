<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPimpinan */

$this->title = $model->izin_tdp_pimpinan;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp Pimpinan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-pimpinan-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Tdp Pimpinan'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinTdp.id',
            'label' => 'Izin Tdp',
        ],
        'izin_tdp_pimpinan_kedudukan',
        'izin_tdp_pimpinan_nama',
        'izin_tdp_pimpinan',
        'izin_tdp_pimpinan_tmpt_lahir',
        'izin_tdp_pimpinan_tgl_lahir',
        'izin_tdp_pimpinan_alamat:ntext',
        'izin_tdp_pimpinan_kodepos',
        'izin_tdp_pimpinan_tlpn',
        'izin_tdp_pimpinan_kewarganegara',
        'izin_tdp_pimpinan_tgl_mulai',
        'izin_tdp_pimpinan_jum_saham',
        'izin_tdp_pimpinan_jum_modal',
        'izin_tdp_pimpinan_kedudukan_lain',
        'izin_tdp_pimpinan_nama_perusahaan',
        'izin_tdp_pimpinan_alamat_perusahaan:ntext',
        'izin_tdp_pimpinan_kodepos_perusahaan',
        'izin_tdp_pimpinan_tlpn_perusahaan',
        'izin_tdp_pimpinan_tgl_mulai_perusahaan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>