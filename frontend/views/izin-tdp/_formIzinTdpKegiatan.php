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

if (Yii::$app->user->identity->profile->tipe == "Perusahaan") {
    if ($_SESSION['id_paket']) {
        $dataSiup = \backend\models\IzinSiup::findOne(['perizinan_id' => $_SESSION['id_paket']]);
        $model->izin_siup_id = $dataSiup->id;
    } else {
        if ($_SESSION['izin_siup_id']) {

            $model->izin_siup_id = $_SESSION['izin_siup_id'];
        } else {
            $dataSiup = \backend\models\IzinSiup::find()
                            ->joinWith('perizinan')
                            ->where(['user_id' => Yii::$app->user->identity->id])
                            ->andWhere(['perizinan.status' => 'Selesai'])->one();
        }
    }
} else {
    if ($_SESSION['id_paket']) {
        $dataSiup = \backend\models\IzinSiup::findOne(['perizinan_id' => $_SESSION['id_paket']]);
        $model->izin_siup_id = $dataSiup->id;
    } else {
        if ($_SESSION['izin_siup_id']) {

            $model->izin_siup_id = $_SESSION['izin_siup_id'];
        } else {
            $dataSiup = \backend\models\IzinSiup::findOne(['id' => $_SESSION['SiupID']]);
        }
    }
}

$query = \backend\models\Kbli::find()->joinWith('izinSiupKblis')
                ->where(['izin_siup_kbli.izin_siup_id' => $model->izin_siup_id])
                ->select(['kbli.id as id', 'concat(kbli.kode,concat(" | ",kbli.nama)) as nama'])
                ->orderBy('id')
                ->asArray()->all();

echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinTdpKegiatan',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true]],
        'izin_tdp_id' => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'kbli_id' => [
            'label' => 'Kode KBLI',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map($query, 'id', 'nama'),
                'options' => [
                    'placeholder' => Yii::t('app', 'Pilih Kode KBLI...'),
                    'class' => 'kbli_input kbli_input1',
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ],
        ],
        'produk' => [
            'label' => 'Nama Produk',
            'type' => TabularForm::INPUT_TEXT,
            'options' => ['id' => 'kbli_ket'],
            'placeholder' => Yii::t('app', 'Nama Produk')
        ],
//        'produk' => ['type' => TabularForm::INPUT_TEXT],
//        'flag_utama' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
//                    'options' => [
//                        'items' => [ 'Y' => 'Y', 'N' => 'N', ],
////                        'columnOptions' => ['width' => '185px'],
//                        'options' => ['placeholder' => Yii::t('app', 'Choose Flag Utama')],
//                    ]
//        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' => Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdpKegiatan(' . $key . '); return false;', 'id' => 'izin-tdp-kegiatan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> ' . Yii::t('app', 'Kegiatan Usaha Lainnya') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpKegiatan()']),
        ]
    ]
]);
Pjax::end();
?>
