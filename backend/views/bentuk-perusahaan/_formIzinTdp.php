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
    'formName' => 'IzinTdp',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'bentuk_perusahaan' => [
            'label' => 'Bentuk perusahaan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\BentukPerusahaan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bentuk perusahaan')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
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
        'perpanjangan_ke' => ['type' => TabularForm::INPUT_TEXT],
        'no_pembukuan' => ['type' => TabularForm::INPUT_TEXT],
        'i_1_pemilik_nama' => ['type' => TabularForm::INPUT_TEXT],
        'i_2_pemilik_tpt_lahir' => ['type' => TabularForm::INPUT_TEXT],
        'i_2_pemilik_tgl_lahir' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose I 2 Pemilik Tgl Lahir')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'i_3_pemilik_alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'i_3_pemilik_propinsi' => ['type' => TabularForm::INPUT_TEXT],
        'i_3_pemilik_kabupaten' => ['type' => TabularForm::INPUT_TEXT],
        'i_3_pemilik_kecamatan' => ['type' => TabularForm::INPUT_TEXT],
        'i_3_pemilik_kelurahan' => ['type' => TabularForm::INPUT_TEXT],
        'i_4_pemilik_telepon' => ['type' => TabularForm::INPUT_TEXT],
        'i_5_pemilik_no_ktp' => ['type' => TabularForm::INPUT_TEXT],
        'i_6_pemilik_kewarganegaraan' => ['type' => TabularForm::INPUT_TEXT],
        'ii_1_perusahaan_nama' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'ii_2_perusahaan_propinsi' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_kabupaten' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_kecamatan' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_kelurahan' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_kodepos' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_no_telp' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_no_fax' => ['type' => TabularForm::INPUT_TEXT],
        'ii_2_perusahaan_email' => ['type' => TabularForm::INPUT_TEXT],
        'iii_1_nama_kelompok' => ['type' => TabularForm::INPUT_TEXT],
        'iii_2_status_prsh' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Kantor Tunggal' => 'Kantor Tunggal', 'Kantor Pusat' => 'Kantor Pusat', 'Kantor Cabang' => 'Kantor Cabang', 'Kantor Pembantu' => 'Kantor Pembantu', 'Perwakilan' => 'Perwakilan', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Iii 2 Status Prsh')],
                    ]
        ],
        'iii_2_induk_nama_prsh' => ['type' => TabularForm::INPUT_TEXT],
        'iii_2_induk_nomor_tdp' => ['type' => TabularForm::INPUT_TEXT],
        'iii_2_induk_alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'iii_2_induk_propinsi' => ['type' => TabularForm::INPUT_TEXT],
        'iii_2_induk_kabupaten' => ['type' => TabularForm::INPUT_TEXT],
        'iii_2_induk_kecamatan' => ['type' => TabularForm::INPUT_TEXT],
        'iii_2_induk_kelurahan' => ['type' => TabularForm::INPUT_TEXT],
        'iii_3_lokasi_unit_produksi' => ['type' => TabularForm::INPUT_TEXT],
        'iii_3_lokasi_unit_produksi_propinsi' => ['type' => TabularForm::INPUT_TEXT],
        'iii_3_lokasi_unit_produksi_kabupaten' => ['type' => TabularForm::INPUT_TEXT],
        'iii_4_bank_utama_1' => ['type' => TabularForm::INPUT_TEXT],
        'iii_4_bank_utama_2' => ['type' => TabularForm::INPUT_TEXT],
        'iii_4_jumlah_bank' => ['type' => TabularForm::INPUT_TEXT],
        'iii_5_npwp' => ['type' => TabularForm::INPUT_TEXT],
        'no_sk_siup' => ['type' => TabularForm::INPUT_TEXT],
        'iii_6_status_perusahaan_id' => [
            'label' => 'Status perusahaan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\StatusPerusahaan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Status perusahaan')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'iii_7a_tgl_pendirian' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iii 7a Tgl Pendirian')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'iii_7b_tgl_mulai_kegiatan' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iii 7b Tgl Mulai Kegiatan')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'iii_8_bentuk_kerjasama_pihak3' => ['type' => TabularForm::INPUT_TEXT],
        'iii_9a_merek_dagang_nama' => ['type' => TabularForm::INPUT_TEXT],
        'iii_9a_merek_dagang_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iii_9b_hak_paten_nama' => ['type' => TabularForm::INPUT_TEXT],
        'iii_9b_hak_paten_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iii_9c_hak_cipta_nama' => ['type' => TabularForm::INPUT_TEXT],
        'iii_9c_hak_cipta_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a1_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a1_tanggal' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iv A1 Tanggal')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'iv_a1_notaris_nama' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a1_notaris_alamat' => ['type' => TabularForm::INPUT_TEXTAREA],
        'iv_a1_telpon' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a2_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a2_tanggal' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iv A2 Tanggal')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'iv_a2_notaris' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a3_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a3_tanggal' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iv A3 Tanggal')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'iv_a4_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a4_tanggal' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iv A4 Tanggal')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'iv_a5_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a5_tanggal' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iv A5 Tanggal')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'iv_a6_nomor' => ['type' => TabularForm::INPUT_TEXT],
        'iv_a6_tanggal' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Iv A6 Tanggal')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'v_jumlah_dirut' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_direktur' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_komisaris' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_pengurus' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_pengawas' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_sekutu_aktif' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_sekutu_pasif' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_sekutu_aktif_baru' => ['type' => TabularForm::INPUT_TEXT],
        'v_jumlah_sekutu_pasif_baru' => ['type' => TabularForm::INPUT_TEXT],
        'vi_jumlah_pemegang_saham' => ['type' => TabularForm::INPUT_TEXT],
        'vi_a_kegiatan_utama' => [
            'label' => 'Kbli',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Kbli')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'vi_a_produk_utama' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_1a' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_1b' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_1c' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_1d' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_2a' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_2b' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_2c' => ['type' => TabularForm::INPUT_TEXT],
        'vi_c_modal_2d' => ['type' => TabularForm::INPUT_TEXT],
        'vii_b_omset' => ['type' => TabularForm::INPUT_TEXT],
        'vii_b_terbilang' => ['type' => TabularForm::INPUT_TEXT],
        'vii_c1_dasar' => ['type' => TabularForm::INPUT_TEXT],
        'vii_c2_ditempatkan' => ['type' => TabularForm::INPUT_TEXT],
        'vii_c3_disetor' => ['type' => TabularForm::INPUT_TEXT],
        'vii_c4_saham' => ['type' => TabularForm::INPUT_TEXT],
        'vii_c5_nominal' => ['type' => TabularForm::INPUT_TEXT],
        'vii_c6_aktif' => ['type' => TabularForm::INPUT_TEXT],
        'vii_c7_pasif' => ['type' => TabularForm::INPUT_TEXT],
        'vii_d_totalaset' => ['type' => TabularForm::INPUT_TEXT],
        'vii_e_wni' => ['type' => TabularForm::INPUT_TEXT],
        'vii_e_wna' => ['type' => TabularForm::INPUT_TEXT],
        'vii_f_matarantai' => ['type' => TabularForm::INPUT_TEXT],
        'vii_fa_jumlah' => ['type' => TabularForm::INPUT_TEXT],
        'vii_fa_satuan' => [
            'label' => 'Satuan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Satuan::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Satuan')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'vii_fb_jumlah' => ['type' => TabularForm::INPUT_TEXT],
        'vii_fb_satuan' => ['type' => TabularForm::INPUT_TEXT],
        'vii_fc_lokal' => ['type' => TabularForm::INPUT_TEXT],
        'vii_fc_impor' => ['type' => TabularForm::INPUT_TEXT],
        'vii_f_pengecer' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Swalayan /Supermarket' => 'Swalayan /Supermarket', 'Toserba /Dept. Store' => 'Toserba /Dept. Store', 'Toko /Kios' => 'Toko /Kios', 'Lainnya' => 'Lainnya', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Vii F Pengecer')],
                    ]
        ],
        'vii_1_koperasi_bentuk' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Primer' => 'Primer', 'Sekunder' => 'Sekunder', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Vii 1 Koperasi Bentuk')],
                    ]
        ],
        'vii_2_koperasi_jenis' => ['type' => TabularForm::INPUT_TEXT],
        'vii_3_koperasi_anggota' => ['type' => TabularForm::INPUT_TEXT],
        'viii_jenis_perusahaan' => ['type' => TabularForm::INPUT_TEXT],
        'create_by' => ['type' => TabularForm::INPUT_TEXT],
        'create_date' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Create Date')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'update_by' => ['type' => TabularForm::INPUT_TEXT],
        'update_date' => ['type' => TabularForm::INPUT_WIDGET,
        'widgetClass' => \kartik\widgets\DatePicker::classname(),
        'options' => [
            'options' => ['placeholder' => Yii::t('app', 'Choose Update Date')],
            'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]
],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdp(' . $key . '); return false;', 'id' => 'izin-tdp-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Izin Tdp') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdp()']),
        ]
    ]
]);
Pjax::end();
?>