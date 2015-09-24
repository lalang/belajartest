<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Faq */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faq'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="page-content">
    
    <div class="body-content animated fadeIn">
	
		<div class="faq-view">

			<div class="row">
				<div class="col-sm-9">
					<h2>Bahasa Indonesia</h2>
				</div>
				<div class="col-sm-3" style="margin-top: 15px">
								
					<?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
					<?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
						'class' => 'btn btn-danger',
						'data' => [
							'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
							'method' => 'post',
						],
					])
					?>
				</div>
			</div>

			<div class="row">
				<?php 
					$gridColumn = [
						['attribute' => 'id', 'hidden' => true],
						'tanya:ntext',
						'jawab:ntext',
						'aktif',
					];
					echo DetailView::widget([
						'model' => $model,
						'attributes' => $gridColumn
					]); 
				?>
			</div>
			
			<div class="row" style="margin: 15px 0px 15px 0px">
				<div class="col-sm-12">
					<h2>Bahasa Inggris</h2>
				</div>
			</div>
			
			<div class="row">
				<?php 
					$gridColumn = [
						'tanya_en:ntext',
						'jawab_en:ntext',
					];
					echo DetailView::widget([
						'model' => $model,
						'attributes' => $gridColumn
					]); 
				?>
			</div>
			
		</div>
	</div><!-- /.body-content -->
</section><!-- /#page-content -->

   	