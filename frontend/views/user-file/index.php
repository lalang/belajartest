<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Brankas Pribadi');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="user-file-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Tambah'), null, ['id'=>'upload_file','class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cari'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'image',
            'format' => 'raw',
            'value' => function ($model) {
                $file = explode(".", $model['filename']);
                if($file[1] == 'png' || $file[1] == 'jpg' || $file[1] == 'jpeg'){
                    $file = '/uploads/'. $model['filename'];
                }elseif($file[1] == 'pdf'){
                    $file = '/images/pdf-icon.png';
                }
                return Html::a(Html::img(Yii::getAlias('@web').$file, ['width' => '70px']),  ['user-file/download?files='.$model['filename']], [ 'alt'=>'some', 'class'=>'thing', 'height'=>'100px', 'width'=>'100px']);

            },
        ],
        'description',
        [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Action',
            'headerOptions' => ['width' => '80'],
            'template' => '{update} {delete}',
        ],
    ]; 
    ?>
    <?= GridView::widget([
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
            ]) ,
        ],
    ]); ?>

</div>
<?php
$js = <<< JS
    $('#upload_file').click(function(){
        $('#m_upload').html('');
        $('#m_upload').load('/user-file/create2');
        $('#m_upload').modal('show');
    });
JS;

$this->registerJs($js);

Modal::begin([
    'id' => 'm_upload',
    'header' => '<h7>Upload Berkas</h7>'
]);
Modal::end();
?>