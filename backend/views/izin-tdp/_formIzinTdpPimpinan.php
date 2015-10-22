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
    'formName' => 'IzinTdpPimpinan',
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
        'izin_tdp_pimpinan_kedudukan' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_nama' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_tmpt_lahir' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_tgl_lahir' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => 'Choose Izin Tdp Pimpinan Tgl Lahir'],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'izin_tdp_pimpinan_alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'izin_tdp_pimpinan_kodepos' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_tlpn' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_kewarganegara' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_tgl_mulai' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => 'Choose Izin Tdp Pimpinan Tgl Mulai'],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'izin_tdp_pimpinan_jum_saham' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_jum_modal' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_kedudukan_lain' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_nama_perusahaan' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_alamat_perusahaan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'izin_tdp_pimpinan_kodepos_perusahaan' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_tlpn_perusahaan' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_pimpinan_tgl_mulai_perusahaan' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => 'Choose Izin Tdp Pimpinan Tgl Mulai Perusahaan'],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowIzinTdpPimpinan(' . $key . '); return false;', 'id' => 'izin-tdp-pimpinan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Izin Tdp Pimpinan' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpPimpinan()']),
        ]
    ]
]);
Pjax::end();
?>