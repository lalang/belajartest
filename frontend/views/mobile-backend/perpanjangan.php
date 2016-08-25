<?php
use yii\helpers\Html;
?>
<?= $this->render('_sidebar', ['active' => $active]) ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Perpanjangan
    </h1>
    <ol class="breadcrumb">
        <li><?php echo Html::a(Yii::t('frontend', '<i class="fa fa-dashboard"></i> Home'), ['/mobile-backend/index/']) ?></li>
        <li class="active">Perpanjangan</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
					Halaman perpanjangan
				</div>
			</div>
		</div>
	</div>	
</section>
