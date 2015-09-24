<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Faq */

$this->title = Yii::t('app', 'Create Faq');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faq'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">
   
    <div class="body-content animated fadeIn">
	
		<div class="faq-create">

			<?= $this->render('_form', [
				'model' => $model,
			]) ?>

		</div>
		
	</div><!-- /.body-content -->
</section><!-- /#page-content -->

	
