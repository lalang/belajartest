<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
]);
//echo "Hellooo";
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinTdpLegal',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        "izin_tdp_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'jenis' => [
            'label' => 'Jenis izin',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\JenisIzin::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Jenis izin')],
                'pluginOptions' => [
                    'allowClear' => true,
                    'width' => '100px'
                ],
            ],            
            'columnOptions' => ['width' => '50px'],
        ],
        'nomor' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '200px']],
        'dikeluarkan_oleh' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '200px']],
        'tanggal_dikeluarkan' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Dikeluarkan')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ],
                'removeButton' => false,
            ]
        ],
        'masa_laku' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Masa Laku (Thn)', 'columnOptions' => ['width' => '200px']],
//        'masa_laku_satuan' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
//                    'options' => [
//                        'items' => [ 'Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Hari' => 'Hari', ],
////                        'columnOptions' => ['width' => '185px'],
//                        'options' => ['placeholder' => Yii::t('app', 'Choose Masa Laku Satuan')],
//                    ]
//        ],
//        'create_by' => ['type' => TabularForm::INPUT_TEXT],
//        'create_date' => ['type' => TabularForm::INPUT_WIDGET,
//            'widgetClass' => \kartik\widgets\DatePicker::classname(),
//            'options' => [
//                'options' => ['placeholder' => Yii::t('app', 'Choose Create Date')],
//                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
//                'pluginOptions' => [
//                    'autoclose' => true,
//                    'format' => 'dd-M-yyyy'
//                ]
//            ]
//        ],
//        'update_by' => ['type' => TabularForm::INPUT_TEXT],
//        'update_date' => ['type' => TabularForm::INPUT_WIDGET,
//            'widgetClass' => \kartik\widgets\DatePicker::classname(),
//            'options' => [
//                'options' => ['placeholder' => Yii::t('app', 'Choose Update Date')],
//                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
//                'pluginOptions' => [
//                    'autoclose' => true,
//                    'format' => 'dd-M-yyyy'
//                ]
//            ]
//        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdpLegal(' . $key . '); return false;', 'id' => 'izin-tdp-legal-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Izin Tdp Legal') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpLegal()']),
        ]
    ]
]);
Pjax::end();
?>