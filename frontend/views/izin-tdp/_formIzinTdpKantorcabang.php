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
    'formName' => 'IzinTdpKantorcabang',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        "izin_tdp_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'nama' => ['type' => TabularForm::INPUT_TEXT],
        'no_tdp' => ['type' => TabularForm::INPUT_TEXT],
        'alamat' => ['type' => TabularForm::INPUT_TEXT],
		//'propinsi_id' => ['type' => TabularForm::INPUT_TEXT],
		'propinsi_id' => [
            'label' => 'Propinsi',
            'type' => TabularForm::INPUT_DROPDOWN_LIST,
			'items'=> [ '11' => 'DKI Jakarta'],
            'columnOptions'=>['width'=>'200px']
			
        ],
		//'kabupaten_id' => ['type' => TabularForm::INPUT_TEXT],
		'kabupaten_id' => [
            'label' => 'Kabupaten',
            'type' => TabularForm::INPUT_DROPDOWN_LIST,
			'items'=>\backend\models\Lokasi::getKotaOptions(), 'id', 'kabkota-id',
            'columnOptions' => ['width' => '200px']
        ],
	
        'kodepos' => ['type' => TabularForm::INPUT_TEXT],
        'no_telp' => ['type' => TabularForm::INPUT_TEXT],
        'status_prsh' => ['type' => TabularForm::INPUT_TEXT],
        'kbli_id' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdpKantorcabang(' . $key . '); return false;', 'id' => 'izin-tdp-kantorcabang-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Izin Tdp Kantorcabang') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpKantorcabang()']),
        ]
    ]
]);
Pjax::end();
?>