<?php
use yii\helpers\Html;
use backend\models\Perizinan;
?>
<?= $this->render('_sidebar', ['active' => $active]) ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><?php echo Html::a(Yii::t('frontend', '<i class="fa fa-dashboard"></i> Home'), ['/mobile-backend/index/']) ?></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
					Selamat datang di PTSP DKI Mobile
				</div>
			</div>
		</div>
	</div>	

	<div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= Perizinan::getPencabutanPerUser(Yii::$app->user->id); ?></h3>
                    <p>Pencabutan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                </div>
				<?php
					echo Html::a(Yii::t(
						'app',
						'Lihat Detail <i class="fa fa-arrow-circle-right"></i>'),
						['pencabutan'],['class' => 'small-box-footer']
					);
				?>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= Perizinan::getExpiredPerUser(Yii::$app->user->id); ?></h3>
                    <p>Perpanjangan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-random" aria-hidden="true"></i>
                </div>
				<?php
					echo Html::a(Yii::t(
						'app',
						'Lihat Detail <i class="fa fa-arrow-circle-right"></i>'),
						['perpanjangan'],['class' => 'small-box-footer']
					);
				?>
            </div>
        </div><!-- ./col -->
	</div>
	
</section>
