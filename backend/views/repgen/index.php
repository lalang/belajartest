<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\repgenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Generator';
$this->params['breadcrumbs'][] = $this->title;
$search = "";
$this->registerJs($search);
?>
<?php Pjax::begin(); ?>

<div class="row">

<?php //= Html::beginForm([''], 'post', ['data-pjax' => '']); ?>
<?= Html::beginForm(); ?>

    <div class="col-md-12">
        <div class="box box-warning collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">View</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
                <?php
                /* <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div> */
                ?>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label">Perizinan</label>
                            <?php
                            if (!$vJenisIzin) {
                                $vJenisIzin = 'siup';
                            }
                            ?>
                            <?= Html::dropDownList(
                              'jenisizin',
                              $vJenisIzin,
                              $vlistIzin,
                              ['id'=>'jenisizin', 'class'=>'form-control select2']
                            )?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <input type="submit" value="Apply" class="btn btn-warning" />
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Column</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php
                    $count = count($vlistColumns);
                    $a = 0;
                    foreach ($vlistColumns as $key => $column) {
                        if ($a < 1) {
                            $firstcolumn = $column;
                        }
                        ++$a;
                    }
                    if (!$vselect_columns) {
                        $vselect_columns = $firstcolumn;
                    }
                    ?>
                    <label class="control-label">Select</label>
                    <?php 
                    echo Select2::widget([
                        'name' => 'select_columns',
                        'value' => $vselect_columns,
                        'data' => $vlistColumns,
                        'size' => Select2::SMALL,
                        'maintainOrder' => true,
                        'options' => [
                            'placeholder' => '...', 
                            'multiple' => true,
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>
                    <label class="control-label">Group</label>
                    <?php 
                    $listGroup = array_slice($vlistColumns, 1);
                    echo Select2::widget([
                        'name' => 'select_group',
                        'value' => $vselect_group,
                        'data' => $listGroup,
                        'size' => Select2::SMALL,
                        'maintainOrder' => true,
                        'options' => ['placeholder' => '...', 'multiple' => true],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>
                    <label class="control-label">Sort</label>
                    <?php 
                    echo Select2::widget([
                        'name' => 'select_order',
                        'value' => $vselect_order,
                        'data' => $vlistOrderColumns,
                        'size' => Select2::SMALL,
                        'maintainOrder' => true,
                        'options' => ['placeholder' => '...', 'multiple' => true],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>
                </div>
                <div class="box-footer">
                    <input type="submit" value="Apply" class="btn btn-success" /><span class="pull-right">Column selected: <code><?= count($vselect_columns) ?></code></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Condition</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                    <?php
                    /* <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div> */
                    ?>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label">Status Permohonan</label>
                                <?php
                                if (!$vselect_status) {
                                    $vselect_status = array();
                                }

                                ?>
                                <?php 
                                echo Select2::widget([
                                    'name' => 'select_status',
                                    'value' => $vselect_status,
                                    'data' => $vlistStatus,
                                    'size' => Select2::SMALL,
                                    'maintainOrder' => true,
                                    'options' => ['placeholder' => '...', 'multiple' => true],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ]);
                                ?>
                            </div>
                            <div class="col-md-8">
                                <label class="control-label">Tanggal terbit SK</label>
                                <?php 
                                if (!$vdatepicker_from) {
                                    $vdatepicker_from = date('Y-m-d');
                                    $vdatepicker_to = date('Y-m-d');
                                }
                                echo DatePicker::widget([
                                    'name' => 'datepicker_from',
                                    'value' => $vdatepicker_from,
                                    'type' => DatePicker::TYPE_RANGE,
                                    'name2' => 'datepicker_to',
                                    'value2' => $vdatepicker_to,
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
                            <div class="col-md-12">
                                <label class="control-label">Lokasi Perizinan (DKI Jakarta)</label>
                                <?php
                                if (!$vselect_lokasi) {
                                    $vselect_lokasi = array();
                                }

                                ?>
                                <?php 
                                echo Select2::widget([
                                    'name' => 'select_lokasi',
                                    'value' => $vselect_lokasi,
                                    'data' => $vlistLokasi,
                                    'size' => Select2::SMALL,
                                    'maintainOrder' => true,
                                    'options' => ['placeholder' => '...', 'multiple' => true],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <input type="submit" value="Apply" class="btn btn-success" />
                </div>
            </div>
        </div>
    </div>

<?= Html::endForm() ?>
        
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Result</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        $gridColumns = [['class' => 'yii\grid\SerialColumn']];
                        foreach($vselect_columns as $value) {
                            array_push($gridColumns, $value);
                        }
                        
                        if (isset($_POST['$vselect_columns'])) { // basically detect using a hidden input or similar if you are posting data from your custom form
                            $exportColumns = $vselect_columns;
                        } else {
                            $exportColumns = $gridColumns;
                        }

                        // Renders a export dropdown menu
                        /*
                        echo ExportMenu::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => $gridColumns,
                            'target' => ExportMenu::TARGET_BLANK,
                            'fontAwesome' => true,
                            'initProvider' => true,
                        ]);
                        */
//echo '<pre>';
//echo print_r($dataProvider);
//die();
                        
                        echo GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => $gridColumns,
                            'showOnEmpty' => false,
                            'hover' => true,
                            'condensed' => true,
                            'perfectScrollbar' => true,
                            'pjax' => true,
                            'pjaxSettings'=>[
                                'neverTimeout' => true,
                                'beforeGrid' => '',
                                'afterGrid' => '',
                            ],
                            // your toolbar can include the additional full export menu
                            'panel' => [
                                'type' => GridView::TYPE_DEFAULT,
                            ],
                            'toolbar' => [
                                '{export}',
                            ],
                            'export' => [
                                'target' => '_blank',
                            ],
                        ]); 
                        ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <span>Record count: <code><?= $dataProvider->getTotalCount() ?></code></span>
            </div>
        </div>
    </div>
</div>

<?php Pjax::end()?>
