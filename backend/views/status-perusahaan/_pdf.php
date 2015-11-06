<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\StatusPerusahaan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Status Perusahaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-perusahaan-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Status Perusahaan'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
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