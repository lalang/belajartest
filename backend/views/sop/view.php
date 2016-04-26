<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sop */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Sop',
]) . ' ' . $model->nama_sop;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sop'), 'url' => ['index', 'id'=>$id_induk]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['index', 'id'=>$id_induk], ['class' => 'btn btn-warning']) ?>
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
        </div>
    </div>

    <div class="row">
		<div class="col-md-12">
<?php 
    $gridColumn = [
        [
            'attribute' => 'izin.nama',
            'label' => Yii::t('app', 'Izin'),
        ],
        [
            'attribute' => 'status.nama',
            'label' => Yii::t('app', 'Status'),
        ],
        'nama_sop',
        'deskripsi_sop:ntext',
        [
            'attribute' => 'pelaksana.nama',
            'label' => Yii::t('app', 'Pelaksana'),
        ],
        'durasi',
        'durasi_satuan',
        'urutan',
        'aktif',
        'upload_bapl',
        ['attribute' => 'action_id', 'label' => 'Nama Wewenang'],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
		</div>
    </div>
    
    
</div>