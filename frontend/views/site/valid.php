<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->context->layout = 'main-no-landing';
?>
<style>
.frame-izin {
    padding:15px;
    border:2px solid #676a6c;
    box-shadow:0px 2px 12px 2px #ccc;
}    
    
</style>

<div class="wrapper wrapper-content">
    <div class="row">
      
            <div class="col-lg-12 text-center animated fadeInRight">
                <br>
                <div class="col-lg-2"></div>
                <div class="col-lg-8 frame-izin">    
                    <?= $validasi; ?>
                </div>
                <div class="col-lg-2"></div>
            </div>
             
    </div>
 </div>

