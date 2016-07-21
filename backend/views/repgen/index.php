<?php

use yii\helpers\Html;
use kartik\widgets\DatePicker;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use backend\models\JenisIzin;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Report Generator');
$this->params['breadcrumbs'][] = $this->title;
$search = "";
$this->registerJs($search);
?>
<div class="box box-default">
    <form method="post" action="repgen\apply">
        <div class="box-header with-border">
            <h3 class="box-title">Parameter</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label class="control-label">Pilih Perizinan</label>
                        <?php
                        $jenisizin = JenisIzin::find()->all();
                        $listData = ArrayHelper::map($jenisizin, 'id', 'nama');
                        ?>
                        <?= Html::dropDownList(
                          'jenisizin',
                          '1',
                          $listData,
                          ['id'=>'jenisizin', 'class'=>'form-control select2 select2-hidden-accessible']
                        )?>
                    </div>
                    <div class="col-md-8">
                        <label class="control-label">Rentang Tanggal</label>
                        <?php 
                        echo DatePicker::widget([
                            'name' => 'from_date',
                            'value' => date('Y-m-d'),
                            'type' => DatePicker::TYPE_RANGE,
                            'name2' => 'to_date',
                            'value2' => date('Y-m-d'),
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label class="control-label">...</label>
                    </div>
                    <div class="col-md-8">
                        <label class="control-label">Wilayah</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <input type="submit" class="btn btn-success">Submit</input>
    <?php echo print_r($dataProvider); ?>
        </div>
    </form>

    <?php
    /*
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'nama',
        [
            'class' => 'yii\grid\ActionColumn',
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
    ]); 
    */ 
    ?>

</div>
