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
                'label' => 'Jabatan__________________',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'nama_lengkap' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama Lengkap_________'],
            'tmplahir' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Tempat Lahir'],
            'tgllahir' => ['type' => TabularForm::INPUT_WIDGET, 'label' => 'Tgl. Lahir__________________',
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
            'alamat_lengkap' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat Lengkap_________'],
            'kodepos' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Kode Pos'],
            'telepon' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Telp.__________________'],
            'kewarganegaraan_id' => [
                'label' => 'Kewarganegaraan_________',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'mulai_jabat' => ['type' => TabularForm::INPUT_WIDGET,
                'label' => 'Tgl. Mulai Jabatan_________',
                'widgetClass' => DateControl::classname(),[
                    'options' => [
                        'pluginOptions' => [
                            'autoclose' => true,
                        ],
                    'type' => DateControl::FORMAT_DATE,
                    ]
                ],
            ],
            'jml_lbr_saham' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Jml. Saham (lbr)'],
            'jml_rp_modal' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Jml. Modal (Rp.)_________'],
            'jabatan_lain_id' => [
                'label' => 'Jabatan di Prsh. Lain_________',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'nama_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama Prsh. Lain_________'],
            'alamat_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat Prsh. Lain__________________'],
            'kodepos_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Kode Pos Prsh. Lain'],
            'telepon_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Telp. Prsh. Lain_________'],
            'mulai_jabat_lain' => ['type' => TabularForm::INPUT_WIDGET, 'label' => 'Tgl. Mulai Jabatan_________',
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
                'label' => 'Jabatan__________________',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'nama_lengkap' => ['type' => TabularForm::INPUT_TEXT,
                'label' => 'Nama Lengkap_________',
            ],
            'tmplahir' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Tempat Lahir'],
            'tgllahir' => ['type' => TabularForm::INPUT_WIDGET, 'label' => 'Tgl. Lahir__________________',
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
            'alamat_lengkap' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat Lengkap_________'],
            'kodepos' => ['type' => TabularForm::INPUT_TEXT],
            'telepon' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Telp.__________________'],
            'kewarganegaraan_id' => [
                'label' => 'Kewarganegaraan_________',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'nama_negara'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'mulai_jabat' => ['type' => TabularForm::INPUT_WIDGET,
                'label' => 'Tgl. Mulai Jabatan_________',
                'widgetClass' => DateControl::classname(),[
                    'options' => [
                        'pluginOptions' => [
                            'autoclose' => true,
                        ],
                    'type' => DateControl::FORMAT_DATE,
                    ]
                ],
            ],
            'jabatan_lain_id' => [
                'label' => 'Jabatan di Prsh. Lain_________',
                'type' => TabularForm::INPUT_WIDGET,
                'widgetClass' => \kartik\widgets\Select2::className(),
                'options' => [
                    'data' => \yii\helpers\ArrayHelper::map(\backend\models\Jabatan::find()->orderBy('id')->asArray()->all(), 'id', 'nama_jabatan'),
                    'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                ],
            ],
            'nama_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Nama Perusahaan Lain_________'],
            'alamat_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Alamat Perusahaan Lain_________'],
            'kodepos_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT],
            'telepon_perusahaan_lain' => ['type' => TabularForm::INPUT_TEXT, 'label' => 'Telp.__________________'],
            'mulai_jabat_lain' => ['type' => TabularForm::INPUT_WIDGET, 'label' => 'Tgl. Mulai Jabatan_________',
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
