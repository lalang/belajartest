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
    'formName' => 'AnggotaPenelitian',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'nik_peneliti' => [
            'type' => TabularForm::INPUT_TEXT,
            'label' => 'NIK Anggota',
            'options'=>['placeholder' => 'Masukan NIK Anggota (Max 16 Digit)', 'class' => 'form-control anggota_nik anggota_nik1'],
        ],
        'nama_peneliti' => [
            'type' => TabularForm::INPUT_TEXT,
            'label' => 'Nama Anggota',
            'options'=>['placeholder' => 'Masukan Nama Anggota', 'class' => 'form-control anggota_nama anggota_nama1'],
        ],
        'bidang' => [
            'type' => TabularForm::INPUT_TEXT,
            'label' => 'Bidang Anggota',
            'options'=>['placeholder' => 'Masukan Bidang Anggota'],
        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowAnggotaPenelitian(' . $key . '); return false;', 'id' => 'anggota-penelitian-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Anggota Penelitian' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowAnggotaPenelitian()']),
        ]
    ]
]);
Pjax::end();
?>