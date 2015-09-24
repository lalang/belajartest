<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Berita */

$this->title = Yii::t('app', 'Create Berita');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berita'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">
    
    <div class="body-content animated fadeIn">
		<div class="berita-create">

			<?= $this->render('_form', [
				'model' => $model,
			]) ?>

		</div>
</div><!-- /.body-content -->
    <!--/ End body content -->
</section><!-- /#page-content -->

