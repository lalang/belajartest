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
    'formName' => 'IzinTdpKantor',
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
        'izin_tdp_kantor_nama' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_kantor_notdp' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_kantor_alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'izin_tdp_kantor_kota' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_kantor_propinsi' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_kantor_kodepos' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_kantor_tlpn' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_kantor_status' => ['type' => TabularForm::INPUT_TEXT],
        'izin_tdp_kantor_kegiatan_id' => [
            'label' => 'Kbli',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Kbli'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowIzinTdpKantor(' . $key . '); return false;', 'id' => 'izin-tdp-kantor-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Izin Tdp Kantor' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpKantor()']),
        ]
    ]
]);
Pjax::end();
?>