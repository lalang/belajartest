<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinTdpPemegang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Tdp Pemegang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-tdp-pemegang-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Tdp Pemegang'.' '. Html::encode($this->title) ?></h2>
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
        'izin_tdp_pemegang_nama',
        'izin_tdp_pemegang_alamat:ntext',
        'izin_tdp_pemegang_kodepos',
        'izin_tdp_pemegang_tlpn',
        'izin_tdp_pemegang_kewarganegaraan',
        'izin_tdp_pemegang_npwp',
        'izin_tdp_pemegang_jum_saham',
        'izin_tdp_pemegang_jum_modal',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>