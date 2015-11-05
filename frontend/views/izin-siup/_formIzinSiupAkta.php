<?php

use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\datecontrol\DateControl;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
        ]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinSiupAkta',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true]],
        "izin_siup_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'nomor_akta' => ['type' => TabularForm::INPUT_TEXT],
       /* 'tanggal_akta' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => DateControl::classname(),[
            	'options' => [

                	'pluginOptions' => [
                    		'autoclose' => true,
                	]
		],
                'type' => DateControl::FORMAT_DATE,
            ]
        ],*/
		
		'tanggal_akta' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
//                'placeholder' => Yii::t('app', 'Format: dd-mm-yyyy'),
                'pluginOptions' => [
                    'autoclose' => true,
					'format' => 'dd-mm-yyyy'
                ],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_PREPEND,
            ]
        ],
		
        'nomor_pengesahan' => ['type' => TabularForm::INPUT_TEXT],
        /*'tanggal_pengesahan' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => DateControl::classname(),
            'options' => [
//                'placeholder' => Yii::t('app', 'Format: dd-mm-yyyy'),
                'pluginOptions' => [
                    'autoclose' => true,
                ],
                'type' => DateControl::FORMAT_DATE,
            ]
        ],*/
		
		'tanggal_pengesahan' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
//                'placeholder' => Yii::t('app', 'Format: dd-mm-yyyy'),
                'pluginOptions' => [
                    'autoclose' => true,
					'format' => 'dd-mm-yyyy'
                ],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_PREPEND,
            ]
        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' => Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinSiupAkta(' . $key . '); return false;', 'id' => 'izin-siup-akta-del-btn']);
            },
                ],
            ],
            'gridSettings' => [
                'panel' => [
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Akta Perubahan Terakhir') . '  </h3>',
                    'type' => GridView::TYPE_INFO,
                    'before' => false,
                    'footer' => false,
                    'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-akta', 'onClick' => 'addRowIzinSiupAkta()']),
                ]
            ]
        ]);
        Pjax::end();
?>