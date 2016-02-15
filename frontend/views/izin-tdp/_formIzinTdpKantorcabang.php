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
        'nama' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama kantor cab.____________'],
        'alamat' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat___________________________'],
        'propinsi_id' => [
            'label' => 'Propinsi____________',
            'type' => TabularForm::INPUT_DROPDOWN_LIST,
            'items'=> [ '11' => 'DKI Jakarta'],
        ],
        'kabupaten_id' => [
            'label' => 'Kabupaten_________________________________',
            'type' => TabularForm::INPUT_DROPDOWN_LIST,
            'items'=>\backend\models\Lokasi::getKotaOptions(), 'id', 'kabkota-id',
            'options'=>[
                'prompt'=>'--Pilih Kota--',
            ]
            
        ],
        'kodepos' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Kode Pos___'],
        'no_telp' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Telp.__________________'],
        'status_prsh' => [
            'label' => 'Status Prsh._________________________________',
            'type' => TabularForm::INPUT_DROPDOWN_LIST,
            'items'=> yii\helpers\ArrayHelper::map(\backend\models\StatusPerusahaan::find()->orderBy('urutan')->asArray()->all(), 'id', 'nama'),
        ],
        'kbli_id' => [
            'label' => 'KBLI__________________________________________',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()
                        ->where('siup = "Y" OR siup = " "')
                        ->orderBy('kode')->all(), 'id', 'KodeNama'),
                'options' => ['placeholder' => Yii::t('app', 'Pilih Kode atau nama KBLI'), 'class' => 'kbli_input kbli_input1'],
            ],
        ],
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
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-home"></i> ' . Yii::t('app', 'Kantor Cabang') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpKantorcabang()']),
        ]
    ]
]);
Pjax::end();
?>