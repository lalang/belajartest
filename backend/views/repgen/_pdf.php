<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bank'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Bank').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>