<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fungsi */

$this->title = Yii::t('app', 'Create Fungsi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fungsi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">

    <div class="body-content animated fadeIn">
	
		<div class="fungsi-create">

			

			<?= $this->render('_form', [
				'model' => $model,
			]) ?>

		</div>
	
	</div><!-- /.body-content -->
    <!--/ End body content -->
</section><!-- /#page-content -->

	
