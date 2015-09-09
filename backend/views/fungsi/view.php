<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Fungsi */

$this->title = $model->id;
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
                    <a href="#">View</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">
	
		<div class="fungsi-view">

			<div class="row">
				<div class="col-sm-9">
					<h2><?= Yii::t('app', 'Fungsi').' '. Html::encode($this->title) ?></h2>
				</div>
				<div class="col-sm-3" style="margin-top: 15px">
					<?=             
					 Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
						['pdf', 'id' => $model['id']], 
						[
							'class' => 'btn btn-danger',
							'target' => '_blank',
							'data-toggle' => 'tooltip',
							'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
						]
					)?>                        
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
				'no_urut',
				'nama',
				'nama_en',
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

<?php echo $this->render('/shares/_footer_admin'); ?>   		