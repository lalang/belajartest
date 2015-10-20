<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Fungsi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fungsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fungsi-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Fungsi').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'no_urut',
        'nama',
        'nama_en',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>