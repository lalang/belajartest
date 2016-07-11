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
    'formName' => 'IzinKesehatan',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'perizinan_id' => [
            'label' => 'Perizinan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Perizinan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Perizinan')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'izin_id' => [
            'label' => 'Izin',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Izin::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Izin')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'user_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose User')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'status_id' => [
            'label' => 'Status',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Status::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Status')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'lokasi_id' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'tipe' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Perusahaan' => 'Perusahaan', 'Perorangan' => 'Perorangan', ],
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Tipe')],
                    ]
        ],
        'nik' => ['type' => TabularForm::INPUT_TEXT],
        'nama' => ['type' => TabularForm::INPUT_TEXT],
        'tempat_lahir' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_lahir' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lahir')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'jenkel' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'L' => 'L', 'P' => 'P', ],
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Jenkel')],
                    ]
        ],
        'agama' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Kong Hu Cu' => 'Kong Hu Cu', ],
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Agama')],
                    ]
        ],
        'alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'rt' => ['type' => TabularForm::INPUT_TEXT],
        'rw' => ['type' => TabularForm::INPUT_TEXT],
        'propinsi_id' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'wilayah_id' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kecamatan_id' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kelurahan_id' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kodepos' => ['type' => TabularForm::INPUT_TEXT],
        'telepon' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'kitas' => ['type' => TabularForm::INPUT_TEXT],
        'kewarganegaraan_id' => [
            'label' => 'Negara',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Negara::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Negara')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'nomor_str' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_berlaku_str' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Str')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'perguruan_tinggi' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_lulus' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Lulus')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'nomor_rekomendasi' => ['type' => TabularForm::INPUT_TEXT],
        'nomor_fasilitas_kesehatan' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_fasilitas_kesehatan' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Fasilitas Kesehatan')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'nomor_pimpinan' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_pimpinan' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pimpinan')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'npwp_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'nama_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'titik_koordinat' => ['type' => TabularForm::INPUT_TEXT],
        'latitude' => ['type' => TabularForm::INPUT_TEXT],
        'longtitude' => ['type' => TabularForm::INPUT_TEXT],
        'nama_gedung_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'blok_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'alamat_tempat_praktik' => ['type' => TabularForm::INPUT_TEXTAREA],
        'rt_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'rw_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'wilayah_id_tempat_praktik' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kecamatan_id_tempat_praktik' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kelurahan_id_tempat_praktik' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kodepos_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'telpon_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'fax_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'email_tempat_praktik' => ['type' => TabularForm::INPUT_TEXT],
        'nomor_izin_kesehatan' => ['type' => TabularForm::INPUT_TEXT],
        'jenis_praktik_i' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan', ],
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Jenis Praktik I')],
                    ]
        ],
        'nama_tempat_praktik_i' => ['type' => TabularForm::INPUT_TEXT],
        'nomor_sip_i' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_berlaku_sip_i' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Sip I')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'nama_gedung_praktik_i' => ['type' => TabularForm::INPUT_TEXT],
        'blok_tempat_praktik_i' => ['type' => TabularForm::INPUT_TEXT],
        'alamat_tempat_praktik_i' => ['type' => TabularForm::INPUT_TEXTAREA],
        'rt_tempat_praktik_i' => ['type' => TabularForm::INPUT_TEXT],
        'rw_tempat_praktik_i' => ['type' => TabularForm::INPUT_TEXT],
        'propinsi_id_tempat_praktik_i' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'wilayah_id_tempat_praktik_i' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kecamatan_id_tempat_praktik_i' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kelurahan_id_tempat_praktik_i' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'telpon_tempat_praktik_i' => ['type' => TabularForm::INPUT_TEXT],
        'jenis_praktik_ii' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Praktik Perorangan' => 'Praktik Perorangan', 'Fasilitas Kesehatan' => 'Fasilitas Kesehatan', ],
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Jenis Praktik Ii')],
                    ]
        ],
        'nama_tempat_praktik_ii' => ['type' => TabularForm::INPUT_TEXT],
        'nomor_sip_ii' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_berlaku_sip_ii' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Berlaku Sip Ii')],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'nama_gedung_praktik_ii' => ['type' => TabularForm::INPUT_TEXT],
        'blok_tempat_praktik_ii' => ['type' => TabularForm::INPUT_TEXT],
        'alamat_tempat_praktik_ii' => ['type' => TabularForm::INPUT_TEXTAREA],
        'rt_tempat_praktik_ii' => ['type' => TabularForm::INPUT_TEXT],
        'rw_tempat_praktik_ii' => ['type' => TabularForm::INPUT_TEXT],
        'propinsi_id_tempat_praktik_ii' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'wilayah_id_tempat_praktik_ii' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kecamatan_id_tempat_praktik_ii' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kelurahan_id_tempat_praktik_ii' => [
            'label' => 'Lokasi',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Lokasi::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Lokasi')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'telpon_tempat_praktik_ii' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinKesehatan(' . $key . '); return false;', 'id' => 'izin-kesehatan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Izin Kesehatan'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinKesehatan()']),
        ]
    ]
]);
Pjax::end();
?>
