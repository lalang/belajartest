<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = Yii::t('app', 'Create Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">
    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> Page Statis</h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('page/index') ?>">Data Page Statis</a>
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

		<div class="page-create">

		    <h1><?= Html::encode($this->title) ?></h1>

		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
		
	</div><!-- /.body-content -->
</section><!-- /#page-content -->
<?php echo $this->render('/shares/_footer_admin'); ?>