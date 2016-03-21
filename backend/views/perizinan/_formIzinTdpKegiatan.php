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

$model->izin_siup_id = $_SESSION['izin_siup_id'];

$query1 = \backend\models\Kbli::find()
                ->joinWith('izinSiupKblis')
                ->join('LEFT JOIN', 'kbli kc', 'kc.parent_id = kbli.id')
                ->where(['izin_siup_kbli.izin_siup_id' => $model->izin_siup_id])
                ->andWhere(['kbli.parent_id'=>0])
                ->select(['kc.id as id', 'concat(kc.kode,concat(" | ",kc.nama)) as nama']);

$query = \backend\models\Kbli::find()
                ->joinWith('izinSiupKblis')
                ->where(['izin_siup_kbli.izin_siup_id' => $model->izin_siup_id])
                ->andWhere('kbli.parent_id <> 0')
                ->select(['kbli.id as id', 'concat(kbli.kode,concat(" | ",kbli.nama)) as nama'])
                ->union($query1)
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
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
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
                    'onchange' => '
                        $.post( "' . Yii::$app->urlManager->createUrl('izin-tdp/ket-kbli?kbli=') . '"+$(this).val()+"&izin=' . $model->izin_siup_id . '", function( data ) {							
                            $( "#izintdpkegiatan-0-produk" ).val( data );
                        });
                    '
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ],
        ],
        'produk' => [
            'label' => 'Produk Utama',
            'type' => TabularForm::INPUT_TEXT,
//            'options' => ['class' => 'kbli_ket'],
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
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinTdpKegiatan(' . $key . '); return false;', 'id' => 'izin-tdp-kegiatan-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-list"></i> ' . Yii::t('app', 'Kegiatan Usaha') . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinTdpKegiatan()']),
        ]
    ]
]);
Pjax::end();
?>
