<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnggotaPenelitian */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anggota Penelitian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-penelitian-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Anggota Penelitian'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'penelitian.id',
            'label' => 'Izin Penelitian',
        ],
        'nik_peneliti',
        'nama_peneliti',
        'bidang',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>