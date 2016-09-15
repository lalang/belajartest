<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataKapasitasAkomodasi */

?>
<div class="izin-pariwisata-kapasitas-akomodasi-view">

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
            'attribute' => 'izinPariwisata.id',
            'label' => Yii::t('app', 'Izin Pariwisata'),
        ],
        [
            'attribute' => 'tipeKamar.id',
            'label' => Yii::t('app', 'Tipe Kamar'),
        ],
        'jumlah_kapasitas',
        'jumlah_unit',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>