<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model backend\models\HistoryPlh */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Perizinan', 
        'relID' => 'perizinan', 
        'value' => \yii\helpers\Json::encode($model->perizinans),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="history-plh-form">

    <?= Html::button(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['class' => 'btn btn-warning', 'onclick' => 'javascript:history.go(-1);']) ?><br><br>
    <?php
        if($model->tanggal_mulai>date("Y-m-d")){
    ?>
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <?= 
        $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->andWhere(['pelaksana_id'=>5])->orderBy('id')->asArray()->all(), 'id', 'username'),
            'disabled' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) 
    ?>
    
    <?=
        $form->field($model, 'user_plh_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->andWhere(['pelaksana_id'=>5])->orderBy('id')->asArray()->all(), 'id', 'username'),
            'disabled' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])    
    ?>
    
    <?=
        $form->field($model, 'tanggal_mulai',[
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-4',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'startDate' => '0d',
                ]
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>
    
    <?=
        $form->field($model, 'tanggal_akhir',[
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-4',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'startDate' => '0d',
                ]
            ],
            'type' => DateControl::FORMAT_DATE,
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <div class="form-group" id="add-perizinan"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php
        } else {
    ?>
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    
    <?= 
        $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->andWhere(['pelaksana_id'=>5])->orderBy('id')->asArray()->all(), 'id', 'username'),
            'disabled' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) 
    ?>
    
    <?=
        $form->field($model, 'user_plh_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\User::find()->andWhere(['pelaksana_id'=>5])->orderBy('id')->asArray()->all(), 'id', 'username'),
            'disabled' => true,
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])    
    ?>
    
    <?=
        $form->field($model, 'tanggal_mulai',[
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-4',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'startDate' => '0d',
                ]
            ],
            'type' => DateControl::FORMAT_DATE,
            'disabled'=>true
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>
    
    <?=
        $form->field($model, 'tanggal_akhir',[
            'horizontalCssClasses' => [
                'wrapper' => 'col-sm-4',
            ]
        ])->widget(DateControl::classname(), [
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true,
                    'startDate' => '0d',
                ]
            ],
            'type' => DateControl::FORMAT_DATE,
            'disabled'=>true
        ])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
    ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ]) ?>

    <div class="form-group" id="add-perizinan"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php
        }
    ?>

</div>
