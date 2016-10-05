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
    'formName' => 'Izin',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'jenis' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Perizinan' => 'Perizinan', 'Non Perizinan' => 'Non Perizinan', 'Lain-lain' => 'Lain-lain', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Jenis')],
                    ]
        ],
        'bidang_id' => [
            'label' => 'Bidang',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Bidang::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bidang')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'rumpun_id' => [
            'label' => 'Rumpun',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Rumpun::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Rumpun')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'tipe' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Perorangan' => 'Perorangan', 'Perusahaan' => 'Perusahaan', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Tipe')],
                    ]
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
        'nama' => ['type' => TabularForm::INPUT_TEXT],
        'alias' => ['type' => TabularForm::INPUT_TEXT],
        'kode' => ['type' => TabularForm::INPUT_TEXT],
        'fno_surat' => ['type' => TabularForm::INPUT_TEXT],
        'aktif' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Aktif')],
                    ]
        ],
        'wewenang_id' => [
            'label' => 'Wewenang',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wewenang::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Wewenang')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'cek_lapangan' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Cek Lapangan')],
                    ]
        ],
        'cek_sprtrw' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Cek Sprtrw')],
                    ]
        ],
        'cek_obyek' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Cek Obyek')],
                    ]
        ],
        'durasi' => ['type' => TabularForm::INPUT_TEXT],
        'durasi_satuan' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Hari' => 'Hari', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Durasi Satuan')],
                    ]
        ],
        'cek_perusahaan' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Cek Perusahaan')],
                    ]
        ],
        'masa_berlaku' => ['type' => TabularForm::INPUT_TEXT],
        'masa_berlaku_satuan' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Hari' => 'Hari', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Masa Berlaku Satuan')],
                    ]
        ],
        'latar_belakang' => ['type' => TabularForm::INPUT_TEXTAREA],
        'persyaratan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'mekanisme' => ['type' => TabularForm::INPUT_TEXTAREA],
        'pengaduan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'dasar_hukum' => ['type' => TabularForm::INPUT_TEXTAREA],
        'definisi' => ['type' => TabularForm::INPUT_TEXTAREA],
        'biaya' => ['type' => TabularForm::INPUT_TEXT],
        'brosur' => ['type' => TabularForm::INPUT_TEXTAREA],
        'arsip_id' => [
            'label' => 'Arsip',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Arsip::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Arsip')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'type' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'SIUP' => 'SIUP', 'IMTA' => 'IMTA', 'TDP' => 'TDP', 'RPTKA' => 'RPTKA', 'PM1' => 'PM1', 'TDG' => 'TDG', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Type')],
                    ]
        ],
        'preview_data' => ['type' => TabularForm::INPUT_TEXTAREA],
        'template_sk' => ['type' => TabularForm::INPUT_TEXTAREA],
        'template_penolakan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'template_preview' => ['type' => TabularForm::INPUT_TEXTAREA],
        'template_valid' => ['type' => TabularForm::INPUT_TEXTAREA],
        'template_batal' => ['type' => TabularForm::INPUT_TEXTAREA],
        'template_ba_lapangan' => ['type' => TabularForm::INPUT_TEXTAREA],
        'template_ba_teknis' => ['type' => TabularForm::INPUT_TEXTAREA],
        'action' => ['type' => TabularForm::INPUT_TEXT],
        'min' => ['type' => TabularForm::INPUT_TEXT],
        'max' => ['type' => TabularForm::INPUT_TEXT],
        'zonasi' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Zonasi')],
                    ]
        ],
        'mulai_perpanjangan' => ['type' => TabularForm::INPUT_TEXT],
        'mulai_perpanjangan_satuan' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'options' => [
                        'items' => [ 'Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Hari' => 'Hari', ],
                        'columnOptions => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Mulai Perpanjangan Satuan')],
                    ]
        ],
        'bidang_izin_id' => [
            'label' => 'Bidang izin usaha',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\BidangIzinUsaha::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Bidang izin usaha')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'jenis_usaha_id' => [
            'label' => 'Jenis usaha',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\JenisUsaha::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Jenis usaha')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzin(' . $key . '); return false;', 'id' => 'izin-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Izin'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzin()']),
        ]
    ]
]);
Pjax::end();
?>
