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
    'formName' => 'Perizinan',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'kode_registrasi' => ['type' => TabularForm::INPUT_TEXT],
        'parent_id' => ['type' => TabularForm::INPUT_TEXT],
        'pemohon_id' => ['type' => TabularForm::INPUT_TEXT],
        'referrer_id' => ['type' => TabularForm::INPUT_TEXT],
        'id_groupizin' => ['type' => TabularForm::INPUT_TEXT],
        'izin_id' => ['type' => TabularForm::INPUT_TEXT],
        'pengesah_id' => ['type' => TabularForm::INPUT_TEXT],
        'plh_id' => [
            'label' => 'History plh',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\HistoryPlh::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose History plh')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'status_id' => ['type' => TabularForm::INPUT_TEXT],
        'jumlah_tahap' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_mohon' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DateTimePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Mohon')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'hh:ii:ss dd-M-yyyy'
            ]
        ]
],
        'no_izin' => ['type' => TabularForm::INPUT_TEXT],
        'berkas_noizin' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_izin' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DateTimePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Izin')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'hh:ii:ss dd-M-yyyy'
            ]
        ]
],
        'tanggal_expired' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DateTimePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Expired')],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'hh:ii:ss dd-M-yyyy'
            ]
        ]
],
        'status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Daftar' => 'Daftar', 'Proses' => 'Proses', 'Tolak' => 'Tolak', 'Revisi' => 'Revisi', 'Lanjut' => 'Lanjut', 'Selesai' => 'Selesai', 'Batal' => 'Batal', 'Verifikasi' => 'Verifikasi', 'Berkas Siap' => 'Berkas Siap', 'Tolak Selesai' => 'Tolak Selesai', 'Berkas Tolak Siap' => 'Berkas Tolak Siap', 'Verifikasi Tolak' => 'Verifikasi Tolak', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Status')],
                    ]
        ],
        'aktif' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Aktif')],
                    ]
        ],
        'registrasi_urutan' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Closed' => 'Closed', 'Open' => 'Open', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Registrasi Urutan')],
                    ]
        ],
        'nomor_sp_rt_rw' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_sp_rt_rw' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Sp Rt Rw')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'peruntukan' => ['type' => TabularForm::INPUT_TEXT],
        'nama_perusahaan' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_cek_lapangan' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Cek Lapangan')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'petugas_cek' => ['type' => TabularForm::INPUT_TEXT],
        'petugas_daftar_id' => ['type' => TabularForm::INPUT_TEXT],
        'lokasi_izin_id' => ['type' => TabularForm::INPUT_TEXT],
        'lokasi_pengambilan_id' => ['type' => TabularForm::INPUT_TEXT],
        'keterangan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'qr_code' => ['type' => TabularForm::INPUT_TEXT],
        'tanggal_pertemuan' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pertemuan')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'status_daftar' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Sendiri' => 'Sendiri', 'Petugas' => 'Petugas', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Status Daftar')],
                    ]
        ],
        'pengambilan_tanggal' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Pengambilan Tanggal')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'pengambilan_sesi' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Sesi I' => 'Sesi I', 'Sesi II' => 'Sesi II', 'Sesi III' => 'Sesi III', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Pengambilan Sesi')],
                    ]
        ],
        'pengambil_nik' => ['type' => TabularForm::INPUT_TEXT],
        'pengambil_nama' => ['type' => TabularForm::INPUT_TEXT],
        'pengambil_telepon' => ['type' => TabularForm::INPUT_TEXT],
        'zonasi_id' => ['type' => TabularForm::INPUT_TEXT],
        'zonasi_sesuai' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Zonasi Sesuai')],
                    ]
        ],
        'alasan_penolakan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowPerizinan(' . $key . '); return false;', 'id' => 'perizinan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Perizinan') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowPerizinan()']),
        ]
    ]
]);
Pjax::end();
?>