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
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinTdpKegiatan',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        "izin_tdp_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'kbli_id' => [
            'label' => 'Kbli',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Kbli')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
//        'produk' => ['type' => TabularForm::INPUT_TEXT],
//        'flag_utama' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
//                    'options' => [
//                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
////                        'columnOptions' => ['width' => '185px'],
//                        'options' => ['placeholder' => Yii::t('app', 'Choose Flag Utama')],
//                    ]
//        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdpKegiatan(' . $key . '); return false;', 'id' => 'izin-tdp-kegiatan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Izin Tdp Kegiatan') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpKegiatan()']),
        ]
    ]
]);
Pjax::end();
?>