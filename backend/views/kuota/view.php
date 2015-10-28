<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kuota */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Kuota',
]) . ' ' . backend\models\Lokasi::findOne($_SESSION['id_induk'])->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kuota'), 'url' => ['index','id'=>$_SESSION['id_induk']]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">
    <div class="col-md-12">
        <div class="col-sm-8">

        </div>
        <div class="col-sm-4" style="margin-top: 15px">               
            <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
            <?= Html::a(Yii::t('app', '<i class="fa fa-arrow-circle-left"></i> Kembali'), ['index', 'id'=>$_SESSION['id_induk']], ['class' => 'btn btn-warning']) ?>
        </div>
    </div>
	<div class="row">
		<div class="col-md-12">
   
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'lokasi.nama',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'sesi_1_kuota',
        'sesi_1_mulai',
        'sesi_1_selesai',
        'sesi_2_kuota',
        'sesi_2_mulai',
        'sesi_2_selesai',
        'sesi_3_kuota',
        'sesi_3_mulai',
        'sesi_3_selesai',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>		</div>
	</div>	
</div>