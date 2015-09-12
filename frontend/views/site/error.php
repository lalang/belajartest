<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
$this->context->layout = 'main-no-landing';
?>


<!DOCTYPE html>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PTSP DKI</title>



<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1 style="font-size:60px" >404</h1>

        <div class="error-desc">
            <h3 class="font-bold"><?= nl2br(Html::encode($message)) ?></h3>
            <form class="form-inline m-t" role="form">
                <div class="form-group">
                    <a href="javascript:history.back();"><button type="submit" value="" class="btn btn-primary">Kembali</button> 
                    </a>
                </div>
                
            </form>
        </div>
    </div>

 

</body>

