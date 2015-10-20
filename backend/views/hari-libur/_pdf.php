<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\HariLibur */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hari Libur'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hari-libur-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Hari Libur').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'tanggal',
        'keterangan',
        'keterangan_en',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>