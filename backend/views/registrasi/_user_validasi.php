<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\datecontrol\DateControl;

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\widgets\ActiveForm    $form
 * @var dektrium\user\models\User $user
 */
$search = "$(document).ready(function(){
    
     $('#tipePemohon').change(function () {
        if ($('#tipePemohon').val() == 'Perorangan'){
            $('#pilPerorangan').show();
            $('#pilPerusahaan').hide();
            $('#LabelUsername').text('NIK');
         } else if($('#tipePemohon').val() == 'Perusahaan') {
            $('#pilPerorangan').hide();
            $('#pilPerusahaan').show();
            $('#LabelUsername').text('NPWP');
         }
     });
   
});";
$this->registerJs($search);
?>
<?php
    
    if($profile->tipe == ''){
        
        $profile->tipe = 'Perorangan';
        $hidePemohon = block;
        $label = 'NIK';
    } 
    if ($profile->tipe == 'Perusahaan') {
        $hidePemohon = none;
        $label = 'NPWP';
    }
?>
<?= $form->field($profile, 'tipe')->dropDownList([ 'Perorangan' => 'Perorangan', 'Perusahaan' => 'Perusahaan'],['id' => 'tipePemohon']) ?>

<?= $form->field($user, 'username')->textInput(['maxlength' => 25])->label($label,['id'=>'LabelUsername']) ?>

<div id="pilPerorangan" style="display: <?php echo $hidePemohon; ?>">
    <?= $form->field($profile, 'no_kk') ?>
</div>

<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput() ?>

<?= $form->field($profile, 'name') ?>

<?= $form->field($profile, 'telepon') ?>

<!--</div>
</div>-->