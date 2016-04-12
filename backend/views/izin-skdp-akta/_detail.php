<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSkdpAkta */

?>
<div class="izin-skdp-akta-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'izinSkdp.id',
            'label' => Yii::t('app', 'Izin Skdp'),
        ],
        'nomor_akta',
        'tanggal_akta',
        'nama_notaris',
        'nomor_pengesahan',
        'tanggal_pengesahan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>