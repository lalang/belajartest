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
    'formName' => 'IzinTdpPemegang',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'izin_tdp_id' => [
            'label' => 'Izin tdp',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\IzinTdp::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Izin tdp'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'izin_tdp_pemegang_nama' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pemegang_alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'izin_tdp_pemegang_kodepos' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pemegang_tlpn' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pemegang_kewarganegaraan' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pemegang_npwp' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pemegang_jum_saham' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pemegang_jum_modal' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowIzinTdpPemegang(' . $key . '); return false;', 'id' => 'izin-tdp-pemegang-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Izin Tdp Pemegang' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpPemegang()']),
        ]
    ]
]);
Pjax::end();
?>