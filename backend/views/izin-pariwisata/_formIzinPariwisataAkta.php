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
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinPariwisataAkta',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'nomor_akta' => ['type' => TabularForm::INPUT_TEXT],
		'tanggal_akta' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => DateControl::classname(),[
            	'options' => [
                	'pluginOptions' => [
						'autoclose' => true,
						'endDate' => '0d',
                	]
				],
                'type' => DateControl::FORMAT_DATE,
            ]
        ],
		
        'nama_notaris' => ['type' => TabularForm::INPUT_TEXT],
        'nomor_pengesahan' => ['type' => TabularForm::INPUT_TEXT],
		'tanggal_pengesahan' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => DateControl::classname(),[
            	'options' => [
                	'pluginOptions' => [
						'autoclose' => true,
						'endDate' => '0d',
                	]
				],
                'type' => DateControl::FORMAT_DATE,
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinPariwisataAkta(' . $key . '); return false;', 'id' => 'izin-pariwisata-akta-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Izin Pariwisata Akta'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinPariwisataAkta()']),
        ]
    ]
]);
Pjax::end();
?>
