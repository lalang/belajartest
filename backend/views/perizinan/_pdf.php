<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perizinan Proses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perizinan-proses-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Perizinan Proses').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'perizinan.id',
            'label' => Yii::t('app', 'Perizinan'),
        ],
        [
            'attribute' => 'mekanismePelayanan.id',
            'label' => Yii::t('app', 'Mekanisme Pelayanan'),
        ],
        [
            'attribute' => 'pelaksana0.id',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        'urutan',
        'active',
        'tanggal_proses',
//        'dokumen:ntext',
        'pelaksana',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
     echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
      echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
       echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
        echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>