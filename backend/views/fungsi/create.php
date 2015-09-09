<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fungsi */

$this->title = Yii::t('app', 'Create Fungsi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fungsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> <?= Yii::t('app', 'Fungsi') ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('fungsi/index') ?>"><?= Yii::t('app', 'Data Fungsi') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Create</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">
	
		<div class="fungsi-create">

			<h1><?= Html::encode($this->title) ?></h1>

			<?= $this->render('_form', [
				'model' => $model,
			]) ?>

		</div>
	
	</div><!-- /.body-content -->
    <!--/ End body content -->
</section><!-- /#page-content -->

<?php echo $this->render('/shares/_footer_admin'); ?>	
