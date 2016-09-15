<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataTujuanWisata */

?>
<div class="izin-pariwisata-tujuan-wisata-view">

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
            'attribute' => 'tujuanWisata.id',
            'label' => Yii::t('app', 'Tujuan Wisata'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>