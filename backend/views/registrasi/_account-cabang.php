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

/*
 * @var yii\web\View $this
 * @var dektrium\user\models\User $user
 */

$search = "$(document).ready(function(){
    
    $('#btnsub').attr('disabled', 'disabled');
    $('#check-dis').change(function(){
        if(!$('#profile-name').val()) {
            alert('Nama tidak boleh kosong');
            $('#profile-name').focus();
            $('input[type=checkbox]').attr('checked',false);
            return false;
        }
        if(!$('#profile-telepon').val()) {
            alert('Telepon tidak boleh kosong');
            $('#profile-telepon').focus();
            $('input[type=checkbox]').attr('checked',false);
            return false;
        }
        if(!$('#user-email').val()) {
            alert('Email tidak boleh kosong');
            $('#user-email').focus();
            $('input[type=checkbox]').attr('checked',false);
            return false;
        }
        if(!$('#profile-alamat').val()) {
            alert('Alamat tidak boleh kosong');
            $('#profile-alamat').focus();
            $('input[type=checkbox]').attr('checked',false);
            return false;
        }
        if(!$('#kabkota-id').val()) {
            alert('Wilayah tidak boleh kosong');
            $('#kabkota-id').focus();
            $('input[type=checkbox]').attr('checked',false);
            return false;
        }
        if(!$('#kec-id').val()) {
            alert('Kecamatan tidak boleh kosong');
            $('#kec-id').focus();
            $('input[type=checkbox]').attr('checked',false);
            return false;
        }
        if(!$('#user-kdkel').val()) {
            alert('Kelurahan tidak boleh kosong');
            $('#user-kdkel').focus();
            $('input[type=checkbox]').attr('checked',false);
            return false;
        }
        
        if($(this).is(':checked')){
            $('#btnsub').removeAttr('disabled');
        }else{
            $('#btnsub').attr('disabled', 'disabled');
        }
    });
});";
$this->registerJs($search);
?>

<?php $this->beginContent('@backend/views/registrasi/update-cabang.php', ['user' => $user]) ?>

<?php
$form = ActiveForm::begin([
            'layout' => 'horizontal',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-sm-9',
                ],
            ],
        ]);
?>

<?php echo $this->render('_user-cabang', ['form' => $form, 'user' => $user, 'profile' => $profile]); ?>

<input type="checkbox" id="check-dis" /> Saya Yakin Data Sudah Lengkap
<div class="form-group">
    <div class="box text-center" style='padding:20px;'>
        <?php echo Html::submitButton(Yii::t('user', 'Update'), ['id' => 'btnsub', 'class' => 'btn btn-block btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
