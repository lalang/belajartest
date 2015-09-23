<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = Yii::t('app', 'Create Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">
   
    <div class="body-content animated fadeIn">

		<div class="page-create">

		    <h1><?= Html::encode($this->title) ?></h1>

		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
		
	</div><!-- /.body-content -->
</section><!-- /#page-content -->
