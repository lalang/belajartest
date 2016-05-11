<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use kartik\checkbox\CheckboxX;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
]);
echo CheckboxX::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'IzinPenelitianMetode',
    'checkboxColumn' => true,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions'=>['hidden'=>true]],
        'penelitian_id' => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden' => true], 'value' => $model->id],

        'metode_id' => [
            'label' => 'Metode penelitian',
            'type' => CheckboxX::INPUT_CHECKBOX_LIST,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\MetodePenelitian::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Metode penelitian'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'del' => [
            'type' => TabularForm::INPUT_STATIC,
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowIzinPenelitianMetode(' . $key . '); return false;', 'id' => 'izin-penelitian-metode-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> ' . 'Izin Penelitian Metode' . '  </h3>',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowIzinPenelitianMetode()']),
        ]
    ]
]);
Pjax::end();
?>