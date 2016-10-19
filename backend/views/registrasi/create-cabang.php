<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Nav;
use yii\helpers\Html;

//use app\assets\admin\CoreAsset;
//
//CoreAsset::register($this);

/**
 * @var yii\web\View 				$this
 * @var dektrium\user\models\User 	$user
 */
$this->title = Yii::t('user', 'Create a user account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->context->layout = 'lay-admin';

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

<?php
$this->render('/_alert', [
    'module' => Yii::$app->getModule('user'),
])
?>

<?= $this->render('_menu-cabang') ?>


<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <?=
                Nav::widget([
                    'options' => [
                        'class' => 'nav-pills nav-stacked',
                    ],
                    'items' => [
                        ['label' => Yii::t('user', 'Account details'), 'url' => ['/registrasi/create-cabang']],
                    ],
                ])
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="alert alert-info">
                    <?= Yii::t('user', 'Kredensial akan dikirim ke pengguna melalui email') ?>.
                    <?= Yii::t('user', 'Password akan dihasilkan secara otomatis jika tidak diisi') ?>.
                </div>
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

                <?= $this->render('_user-cabang', ['form' => $form, 'user' => $user, 'profile' => $profile]) ?>

                <input type="checkbox" id="check-dis" /> Saya Yakin Data Sudah Lengkap
                <div class="form-group">
                    <div class="box text-center" style='padding:20px;'>
                        <?php echo Html::submitButton(Yii::t('user', 'Save'), ['id' => 'btnsub', 'class' => 'btn btn-block btn-success']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
