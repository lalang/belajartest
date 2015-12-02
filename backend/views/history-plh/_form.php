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
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?php
//        $query  = new Query;
//        $query->select('user_id')
//                ->from('history_plh')                               
//                ->where(['statuss' => 'Y'])
//                ->andWhere(['between','date(now())','tanggal_mulai','tanggal_akhir']);
//        $rows = $query->all();
//        $ActifRecord = $connection->createCommand("SELECT user_id FROM history_plh 
//            WHERE date(now()) BETWEEN ('tanggal_mulai' AND 'tanggal_akhir') AND status ='Y'");
//        $Result = $ActifRecord->queryAll();
//        var_dump($Result);
//        foreach ($Result as $value){
//            var_dump($value); 
//        }
        //die();
        
        //$ActifRecord = "SELECT `user_id` FROM `history_plh` WHERE date(now()) BETWEEN ('tanggal_mulai' AND 'tanggal_akhir') AND `statuss`='Y'";
        
        $ActifRecord = \backend\models\HistoryPlh::find()->where('CURDATE() <= tanggal_akhir')->select('user_id');
        $query = \backend\models\User::find()->andWhere(['not in','id',$ActifRecord])->andWhere(['pelaksana_id'=>5])->orderBy('id')->asArray()->all();
    ?>
    
    <?= 
        $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map($query, 'id', 'username'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Username Kepala')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) 
    ?>
    
    <?=
        $form->field($model, 'user_plh_id')->widget(DepDrop::classname(), [
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'depends'=>['historyplh-user_id'],
                'url' => Url::to(['child-account']),
                'loadingText' => 'Loading child level 1 ...',
            ]
        ]);
    
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

</div>
