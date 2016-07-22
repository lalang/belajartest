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
    'formName' => 'IzinSiupKbli',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true]],
        "izin_siup_id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],
        'kbli_id' => [
            'label' => 'Kbli',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Kbli::find()
                        ->where('siup = "Y" OR siup = " "')
                        ->orderBy('id')->all(), 'id', 'KodeNama'),
                'options' => ['placeholder' => Yii::t('app', 'Pilih Kode atau nama KBLI'), 'class' => 'kbli_input kbli_input1'],
            ],
            'columnOptions' => ['width' => '500px']
        ],
        
        'keterangan' => [
            'label' => 'Barang/Jasa Dagangan Utama',
            'type' => TabularForm::INPUT_TEXT,
            'options' => ['class' => 'kbli_ket'],
        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' => Yii::t('app', 'Delete'), 'onClick' => 'delRowIzinSiupKbli(' . $key . '); return false;', 'id' => 'izin-siup-kbli-del-btn']);
            },
                ],
           ],
                  
                    
            'gridSettings' => [
                'panel' => [
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . Yii::t('app', 'Kegiatan Usaha (KBLI 4 Digit)') . '  </h3>',
                    'type' => GridView::TYPE_INFO,
                    'footer' => false,
                    'before' =>  Html::a(Yii::t('user', '<i class="fa fa-download"></i> Unduh Panduan KBLI'), ['/files/Panduan_KBLI.pdf'], 
                            [
                               'class' => 'btn btn-warning',
                               'onclick'=>"window.open(this.href,'_blank');return false;",
                            ]), 
                    'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Row'), 
                    ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinSiupKbli()']),
            
//                      Html::a(Yii::t('user', '<i class="fa fa-download"></i> Bantuan'), ['/files/'.strtolower($model->nama).'.'.$ext], 
//                            [
//                               'class' => 'btn btn-xs btn-primary',
//                               'onclick'=>"window.open(this.href,'_blank');return false;",
//                            ]
                ]
                      
            ]
                    
        ]);
        Pjax::end();

$js = <<< JS
    /*$('.kv-batch-create').click(function(){
        console.log($('.kv-tabform-row').length);
        if($('.kv-tabform-row').length == 5){
            $('.kv-batch-create').prop('disabled', true);
        }
    });*/

JS;
$this->registerJs($js)
?>
