<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKbli */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Kbli', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-kbli-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Izin Kbli'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'kbli.id',
            'label' => 'Kbli',
        ],
        [
            'attribute' => 'izin.id',
            'label' => 'Izin',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>