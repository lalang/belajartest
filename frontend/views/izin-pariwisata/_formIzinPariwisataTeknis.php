<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinPariwisataTeknis',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'jenis_izin_id' => [
            'label' => 'Jenis izin',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\JenisIzin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Jenis izin')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'no_izin' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_izin' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Izin')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'tanggal_masa_berlaku' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Masa Berlaku')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinPariwisataTeknis(' . $key . '); return false;', 'id' => 'izin-pariwisata-teknis-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Izin Pariwisata Teknis'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinPariwisataTeknis()']),
        ]
    ]
]);
Pjax::end();
?>