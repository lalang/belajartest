<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
//$this->context->layout = 'main-no-landing';
?>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class='main-title-page'><h2><strong><?= $title ?></strong></h2></div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
             <a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-backward"></i>
 Kembali Ke Dashboard</a>
             
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
        <div class="ibox-content">
			<?php if($image){?>
				<img src="<?= Yii::getAlias('@test') ?>/images/pages/<?= $image ?>" alt="Image not found" style="float: left; margin: 0px 10px 10px 0px"/>
			<?php } ?>
			<?= $description ?>
		</div>
	</div>
</div>		

