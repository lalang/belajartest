<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpKantor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp Kantor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-kantor-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Tdp Kantor'.' '. Html::encode($this->title) ?></h2>
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
        'izin_tdp_kantor_nama',
        'izin_tdp_kantor_notdp',
        'izin_tdp_kantor_alamat:ntext',
        'izin_tdp_kantor_kota',
        'izin_tdp_kantor_propinsi',
        'izin_tdp_kantor_kodepos',
        'izin_tdp_kantor_tlpn',
        'izin_tdp_kantor_status',
        [
            'attribute' => 'izinTdpKantorKegiatan.id',
            'label' => 'Kbli',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>