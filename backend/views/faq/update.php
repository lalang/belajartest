<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Faq',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faq'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<section id="page-content">
   
    <div class="body-content animated fadeIn">
	
		<div class="faq-update">

			<h1><?= Html::encode($this->title) ?></h1>

			<?= $this->render('_form', [
				'model' => $model,
			]) ?>

		</div>
    </div><!-- /.body-content -->
    <!--/ End body content -->
</section><!-- /#page-content -->

		
