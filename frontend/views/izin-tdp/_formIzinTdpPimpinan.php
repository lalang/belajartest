<?php
use kartik\grid\GridView;
use kartik\grid\SerialColumn
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\datecontrol\DateControl;

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
        "izin_tdp_id" => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'jabatan_id' => [
            'label' => 'Kedudukan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'columnOptions' => ['width' => '20%'],
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                'options' => ['placeholder' => Yii::t('app', 'Choose...')],
            ],
        ],
        'nama_lengkap' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '20%']],
        'tmplahir' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Tempat Lahir', 'columnOptions' => ['width' => '20%']],
        'tgllahir' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => DateControl::classname(),[
            	'options' => [
                	'pluginOptions' => [
                    	'autoclose' => true,
						'endDate' => '0d',
						]
					],
                'type' => DateControl::FORMAT_DATE,
            ]
        ],
        'alamat_lengkap' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '20%']],
        'kodepos' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '15%']],
        'telepon' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '15%']],
        'kewarganegaraan_id' => [
            'label' => 'Kewarganegaraan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'columnOptions' => ['width' => '20%'],
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                'options' => ['placeholder' => Yii::t('app', 'Choose...')],
            ],
        ],
        'mulai_jabat' => ['type' => TabularForm::INPUT_WIDGET,
            'label' => 'Tgl. Mulai Jabatan',
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'columnOptions' => ['width' => '20%'],
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'jabatan_lain_id' => [
            'label' => 'Jabatan di Prsh. Lain',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'columnOptions' => ['width' => '20%'],
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                'options' => ['placeholder' => Yii::t('app', 'Choose...')],
            ],
        ],
        'nama_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama Perusahaan', 'columnOptions' => ['width' => '20%']],
        'alamat_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat Perusahaan', 'columnOptions' => ['width' => '20%']],
        'kodepos_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '15%']],
        'telepon_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'columnOptions' => ['width' => '15%']],
		'mulai_jabat_lain' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => DateControl::classname(),[
            	'options' => [
                	'pluginOptions' => [
                    	'autoclose' => true,
						'endDate' => '0d',
						]
					],
                'type' => DateControl::FORMAT_DATE,
            ]
        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdpPimpinan(' . $key . '); return false;', 'id' => 'izin-tdp-pimpinan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' . Yii::t('app', 'Daftar Pimpinan') . '  </h3>',
            'type' => SerialColumn::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpPimpinan()']),
        ]
    ]
]);
Pjax::end();
?>
