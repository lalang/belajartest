<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Izin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis')->dropDownList([ 'Perizinan' => 'Perizinan', 'Non Perizinan' => 'Non Perizinan', 'Lain-lain' => 'Lain-lain', ], ['prompt' => '']) ?>
	
    <?= 
        $form->field($model, 'bidang_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\Bidang::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Bidang')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) 
    ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fno_surat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
    
    <?= 
        $form->field($model, 'wewenang_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wewenang::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Wewenang')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) 
    ?>

    <?= $form->field($model, 'cek_lapangan')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cek_sprtrw')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cek_obyek')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'durasi')->textInput() ?>

    <?= $form->field($model, 'durasi_satuan')->dropDownList([ 'Hari' => 'Hari', 'Jam' => 'Jam', 'Menit' => 'Menit', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cek_perusahaan')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'masa_berlaku')->textInput() ?>

    <?= $form->field($model, 'masa_berlaku_satuan')->dropDownList([ 'Tahun' => 'Tahun', 'Bulan' => 'Bulan', 'Hari' => 'Hari', ], ['prompt' => '']) ?>
    
    <?=	 
        $form->field($model, 'latar_belakang')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'persyaratan')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>

    <?=	 
        $form->field($model, 'mekanisme')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'pengaduan')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'dasar_hukum')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'definisi')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?= $form->field($model, 'biaya')->textInput() ?>

    <?=	 
        $form->field($model, 'brosur')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?= 
        $form->field($model, 'arsip_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\Arsip::find()->orderBy('id')->asArray()->all(), 'id', 'nama'),
            'options' => ['placeholder' => Yii::t('app', 'Choose Arsip')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) 
    ?>

    <?php // $form->field($model, 'type')->dropDownList([ 'SIUP' => 'SIUP', 'IMTA' => 'IMTA', 'TDP' => 'TDP', 'RPTKA' => 'RPTKA', ], ['prompt' => '']) ?>

    <?=	 
        $form->field($model, 'template_sk')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'template_penolakan')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'template_valid')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'template_ba_lapangan')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?=	 
        $form->field($model, 'template_ba_teknis')->widget(TinyMce::className(), [
            'options' => ['rows' => 12],
            'language' => 'id',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            ]
        ]);
    ?>
    
    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>