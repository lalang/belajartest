<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\datecontrol\DateControl;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
]);

if($_SESSION['pt']==1){
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
            "izin_tdp_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
            'jabatan_id' => [
                'label' => 'Jabatan',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Pilih...')],
                ],
            ],
            'nama_lengkap' => ['type' => TabularForm::INPUT_TEXT,
                'label' => 'Nama Lengkap',
                'columnOptions' => ['width' => '100px'],
            ],
            'tmplahir' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Tempat Lahir'],
            'tgllahir' => ['type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => DateControl::classname(),[
                    'options' => [
                        'pluginOptions' => [
                            'autoclose' => true,
                            'endDate' => '0d',
                        ],
                    'type' => DateControl::FORMAT_DATE,
                    ]
                ],
            ],
            'alamat_lengkap' => ['type' => TabularForm::INPUT_TEXT],
            'kodepos' => ['type' => TabularForm::INPUT_TEXT],
            'telepon' => ['type' => TabularForm::INPUT_TEXT],
            'kewarganegaraan_id' => [
                'label' => 'Kewarganegaraan',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'mulai_jabat' => ['type' => TabularForm::INPUT_WIDGET,
                'label' => 'Tgl. Mulai Jabatan',
                'widgetClass' => \kartik\widgets\DatePicker::classname(),
                'options' => [
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                    'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-M-yyyy'
                    ]
                ]
            ],
            'jml_lbr_saham' => ['type' => TabularForm::INPUT_TEXT],
            'jml_rp_modal' => ['type' => TabularForm::INPUT_TEXT],
            'jabatan_lain_id' => [
                'label' => 'Jabatan di Prsh. Lain',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'nama_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama Perusahaan'],
            'alamat_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat Perusahaan'],
            'kodepos_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT],
            'telepon_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT],
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' . Yii::t('app', 'Daftar Pimpinan'.$apa) . '  </h3>',
                'type' => GridView::TYPE_INFO,
                'before' => false,
                'footer' => false,
                'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpPimpinan()']),
            ]
        ]
    ]);

} else {
	
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
            "izin_tdp_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
            'jabatan_id' => [
                'label' => 'Jabatan',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'nama_lengkap' => ['type' => TabularForm::INPUT_TEXT],
            'tmplahir' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Tempat Lahir'],
            'tgllahir' => ['type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => DateControl::classname(),[
                    'options' => [
                        'pluginOptions' => [
                            'autoclose' => true,
                            'endDate' => '0d',
                        ],
                    'type' => DateControl::FORMAT_DATE,
                    ]
                ],
            ],
            'alamat_lengkap' => ['type' => TabularForm::INPUT_TEXT],
            'kodepos' => ['type' => TabularForm::INPUT_TEXT],
            'telepon' => ['type' => TabularForm::INPUT_TEXT],
            'kewarganegaraan_id' => [
                'label' => 'Kewarganegaraan',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'mulai_jabat' => ['type' => TabularForm::INPUT_WIDGET,
                'label' => 'Tgl. Mulai Jabatan',
                'widgetClass' => \kartik\widgets\DatePicker::classname(),
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
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'nama_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama Perusahaan'],
            'alamat_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat Perusahaan'],
            'kodepos_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT],
            'telepon_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT],
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> ' . Yii::t('app', 'Daftar Pimpinan'.$apa) . '  </h3>',
                'type' => GridView::TYPE_INFO,
                'before' => false,
                'footer' => false,
                'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpPimpinan()']),
            ]
        ]
    ]);

}

Pjax::end();
?>
