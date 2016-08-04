<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
//$this->context->layout = 'main-no-landing';
?>
<style>
    .frame-izin {
        padding:15px;
        border:2px solid #676a6c;
        box-shadow:0px 2px 12px 2px #ccc;
    }

    #watermark{
        position: absolute;
        z-index: 0;
        background: transparent;
        text-align: center;
        top: 40%;
        left: 10%;
    }

    #bg-text
    {
        border: 6px solid;
        border-radius: 10px;
        font-family: stencil;
        color: #F00;
        font-size: 80px;
        -webkit-transform: rotate(328deg);
    }

    #isi{
        position: relative;
        z-index:1;
    }

</style>

<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-lg-12 text-center animated fadeInRight">
            <br>
            <div class="col-lg-2"></div>
            <div class="col-lg-8 frame-izin">
                <?php
                    if($model->aktif == 'N'){
                ?>
                <div id="watermark">
                    <p id="bg-text">Tidak Berlaku</p>
                </div>
                <?php
                }
                ?>
                <div id="isi">
                    <?= $validasi; ?>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

    </div>
</div>

