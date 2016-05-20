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
    'formName' => 'IzinPenelitianLokasi',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'penelitian_id' => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        
        'kota_id' => [
            'label' => 'Kabupaten/Kota',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()
						->andWhere('kabupaten_kota <> 00')
						->andWhere('kecamatan = 00')
                                                ->andWhere('propinsi = 31')
						->orderBy('id')
                        ->asArray()->all(), 'id', 'nama'),
                'options' => ['placeholder' => Yii::t('app', '--Pilih Kota/ Kabupaten--')],
            ],
        ],
//        'kota_id' => ['type' => TabularForm::INPUT_TEXT],
        'kecamatan_id' => [
            'label' => 'kecamatan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()
						->andWhere('kabupaten_kota <> 00')
						->andWhere('kelurahan = 0000')
                                                ->andWhere('propinsi = 31')
						->orderBy('id')
                        ->asArray()->all(), 'id', 'nama'),
                'options' => ['placeholder' => Yii::t('app', '--Pilih kecamatan--')],
            ],
        ],
        'kelurahan_id' => [
            'label' => 'kelurahan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()
						->andWhere('kabupaten_kota <> 00')
						->andWhere('kecamatan <> 00')
                                                ->andWhere('propinsi=31')
						->orderBy('id')
                        ->asArray()->all(), 'id', 'nama'),
                'options' => ['placeholder' => Yii::t('app', '--Pilih kecamatan--')],
            ],
        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowIzinPenelitianLokasi(' . $key . '); return false;', 'id' => 'izin-penelitian-lokasi-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Izin Penelitian Lokasi' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinPenelitianLokasi()']),
        ]
    ]
]);
Pjax::end();
?>