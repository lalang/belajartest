<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Wewenang */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wewenang'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <div class="col-md-12">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Wewenang').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">                       
            <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['index'], ['class' => 'btn btn-warning']) ?>
        </div>
    </div>

<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        'aktif',
        [
            'attribute' => 'wewenangs.id',
            'label' => Yii::t('app', 'Wewenang'),
        ],
        'kode',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
   
<?php
    $gridColumnWewenang = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        'aktif',
        [
            'attribute' => 'wewenangs.id',
            'label' => Yii::t('app', 'Wewenang'),
        ],
        'kode',
    ];
?>
    
</div>