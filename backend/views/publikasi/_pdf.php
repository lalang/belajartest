<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Publikasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Publikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publikasi-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Publikasi'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        'nama_en',
        'urutan',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>