<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\KbliIzin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kbli Izin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kbli-izin-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Kbli Izin'.' '. Html::encode($this->title) ?></h2>
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