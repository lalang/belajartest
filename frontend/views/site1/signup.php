<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="middle-box text-center loginscreen   animated fadeInDown">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div>
            <div>
               <img class="" src="<?= Yii::getAlias('@web') ?>/images/logo-ptsp-icon.png">
               
            </div>
            <p>Daftar menjadi user PTSP DKI</p>
            
                 <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <p class="text-muted text-center"><small>Sudah memiliki akun?</small></p>
                <a class="btn btn-white btn-block" href="login.html">Login</a>
             
            <?php ActiveForm::end(); ?>
            <p class="m-t"> <small>BPTSP DKI &copy; 2015</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

