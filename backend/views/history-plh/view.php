<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\HistoryPlh */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'History Plh'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
            <?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index'], ['class' => 'btn btn-warning']) ?>
        </div>
        <div class="col-sm-3">
                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row" style="margin-top: 15px">
        <div class="col-md-12">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'user_id',
        'user_lokasi',
        'user_plh_id',
        'user_plh_lokasi',
        'tanggal_mulai',
        'tanggal_akhir',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
        </div>
    </div>
    
    
</div>