<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('/_alert', [
    'module' => Yii::$app->getModule('user'),
]);

$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="box" style="padding:10px 4px;">

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?= $this->render('_searchPerizinan', ['model' => $searchModel, 'varLink' => $varKey]
    ); //,['id'=>'cari','onclick'=>'getval(this)']
    ?>
    <br/>

    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
//            'attribute' => 'izin_id',
            'value' => 'izin.nama',
            'label' => Yii::t('app', 'Nama Izin'),
        ],
        [
//            'attribute' => 'pemohon_id',
            'value' => 'pemohonProfile.name',
            'label' => Yii::t('app', 'Nama Pemohon'),
        ],
        [
//            'attribute' => 'pemohon_id',
            'value' => 'kode_registrasi',
            'label' => Yii::t('app', 'Kode Registrasi'),
        ],
        [
//            'attribute' => 'pemohon_id',
            'value' => 'no_izin',
            'label' => Yii::t('app', 'No. SK'),
        ],
        [
//            'attribute' => 'pemohon_id',
            'value' => 'tanggal_expired',
            'label' => Yii::t('app', 'Tanggal Expired'),
        ],
        [
            'attribute' => '',
            'value' => function ($model) {

                return Html::a(Yii::t('user', 'Edit Tanggal Exp.'), ['/perizinan/update-tanggal', 'id' => $model->id], [
                            'class' => 'btn btn-xs btn-primary',
                            'data-method' => 'post',
                ]);
            },
            'format' => 'raw',
        ],
    ];
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
        ],
        // set a label for default menu
        'export' => [
            'label' => 'Page',
            'fontAwesome' => true,
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]),
        ],
    ]);
    ?>

</div>
