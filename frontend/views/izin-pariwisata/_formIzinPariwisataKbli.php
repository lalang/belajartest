<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\web\Session;
$session = Yii::$app->session;
Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinPariwisataKbli',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'kbli_id' => [
            'label' => 'Kbli',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
			
			'options' => [

                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()->leftjoin('kbli_izin','kbli.id = kbli_izin.kbli_id')  
                     //   ->where('siup = "Y" OR siup = " "')
						->where('kbli_izin.izin_id = "'.$_SESSION['izin_id'].'"')
                        ->orderBy('kbli.id')->all(), 'id', 'KodeNama'),
                'options' => ['placeholder' => Yii::t('app', 'Pilih Kode atau nama KBLI'), 'class' => 'kbli_input kbli_input2'],
            ],
            'columnOptions' => ['width' => '500px']
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinPariwisataKbli(' . $key . '); return false;', 'id' => 'izin-pariwisata-kbli-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Yii::t('app', 'Kegiatan Usaha (KBLI 4 digit)'),
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
			'before' =>  Html::a(Yii::t('user', '<i class="fa fa-download"></i> Unduh Panduan KBLI'), ['/files/Panduan_KBLI.pdf'], 
                            [
                               'class' => 'btn btn-warning',
                               'onclick'=>"window.open(this.href,'_blank');return false;",
                            ]), 
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create-kbli', 'onClick' => 'addRowIzinPariwisataKbli()']),
        ]
    ]
]);
Pjax::end();
?>
