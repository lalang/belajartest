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
    'formName' => 'IzinTdpSaham',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        "izin_tdp_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'nama_lengkap' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama Lengkap_______________'],
        'alamat' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat__________________'],
        'kodepos' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Kode Pos'],
        'no_telp' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Telp.__________________'],	
        'kewarganegaraan' => [
            'label' => 'Kewarganegaraan_________',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                'options' => ['placeholder' => Yii::t('app', 'Choose...')],
            ],
        ],
        'npwp' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'NPWP_______________'],
        'jumlah_saham' => ['type' => TabularForm::INPUT_TEXT, 'options' => ['placeholder' => '0'], 'label' => 'Jml. Saham (lbr)'],
        'jumlah_modal' => ['type' => TabularForm::INPUT_TEXT, 'options' => ['placeholder' => '0'], 'label' => 'Jml. Modal (Rp.)_________'],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdpSaham(' . $key . '); return false;', 'id' => 'izin-tdp-saham-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Saham') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpSaham()']),
        ]
    ]
]);
Pjax::end();
?>