<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Berita',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berita'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> <?= Yii::t('app', 'Berita') ?></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('berita/index') ?>"><?= Yii::t('app', 'Data Berita') ?></a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">View</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">
	
		<div class="berita-update">

			<h1><?= Html::encode($this->title) ?></h1>

			<?= $this->render('_form', [
				'model' => $model,
			]) ?>

		</div>
    </div><!-- /.body-content -->
    <!--/ End body content -->
</section><!-- /#page-content -->

<?php echo $this->render('/shares/_footer_admin'); ?>
