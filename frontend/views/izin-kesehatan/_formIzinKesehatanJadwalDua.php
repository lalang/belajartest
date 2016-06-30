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
    'formName' => 'IzinKesehatanJadwalDua',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'hari_praktik' => ['type' => TabularForm::INPUT_TEXT,'options' => ['class' => 'hari_praktik2','placeholder' => Yii::t('app', 'Cth: Senin-Rabu')],],
        'jam_praktik' => ['type' => TabularForm::INPUT_TEXT,'options' => ['class' => 'jam_praktik2','placeholder' => Yii::t('app', 'Cth: 09:00 WIB-12:00 WIB')],],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinKesehatanJadwalDua(' . $key . '); return false;', 'id' => 'izin-kesehatan-jadwal-dua-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Izin Kesehatan Jadwal Dua'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinKesehatanJadwalDua()']),
        ]
    ]
]);
Pjax::end();
?>
