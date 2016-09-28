<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View 					$this
 * @var dektrium\user\models\User 		$user
 * @var dektrium\user\models\Profile 	$profile
 */

?>

<?php $this->beginContent('@backend/views/registrasi/update-cabang.php', ['user' => $user]) ?>

<table class="table">
                <?php
                $form = \kartik\widgets\ActiveForm::begin([
                            'id' => 'profile-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                                'labelOptions' => ['class' => 'col-lg-3 control-label'],
                            ],
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => false,
                            'validateOnBlur' => false,
                ]);
                ?>
                <?= $form->field($profile, 'tipe')->textInput(['maxlength' => 25, 'readonly' => true]) ?>
                <?php // $form->field($profile, 'tipe')->dropDownList([ 'Perorangan' => 'Perorangan', 'Perusahaan' => 'Perusahaan']) ?>
    
                <?= $form->field($profile, 'name') ?>

                <?php // $form->field($model, 'public_email')  ?>

                <?php //  $form->field($model, 'website')  ?>

                <?php // $form->field($model, 'location')  ?>

                <?php // $form->field($model, 'gravatar_email')->hint(\yii\helpers\Html::a(Yii::t('user', 'Change your avatar at Gravatar.com'), 'http://gravatar.com'))  ?>

                <?php //  $form->field($model, 'bio')->textarea()  ?>

                <?php // $form->field($profile, 'no_kk') ?>

                <?= $form->field($profile, 'telepon') ?>

                <?= $form->field($profile, 'alamat')->textarea() ?>

                <?php // $form->field($profile, 'tempat_lahir') ?>

                <?php
//                $form->field($profile, 'tgl_lahir')->widget(DateControl::classname(), [
//                                                        'options' => [
//                                                            'pluginOptions' => [
//                                                                'autoclose' => true,
//                                                            ]
//                                                        ],
//                                                        'type' => DateControl::FORMAT_DATE,
//                ]);
                ?>

                        <?php // $form->field($profile, 'jenkel')->radioList(['L'=>'Laki-Laki','P'=>'Perempuan']); ?>

<!--                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">-->
                <?= \yii\helpers\Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success']) ?><br>
<!--                    </div>
                </div>-->

<?php \kartik\widgets\ActiveForm::end(); ?>
            </table>

<?php $this->endContent() ?>
