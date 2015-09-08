<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
?>
<div class='main-title-page'><h1>Regulasi</h1></div>
<?php $form = ActiveForm::begin(); ?>
    <input type="text" class="form-control col-sm" required placeholder="Cari Regulasi..." name="cari">

    <div class="form-group">
        <?= Html::submitButton('Cari Regulasi', ['class' => 'btn btn-info']) ?>
    </div>

<?php ActiveForm::end(); ?> 
<p>Ditemukan <b><?php echo"$jml";?></b> data untuk pencarian <b><i>"<?php echo"$keyword";?>"</i></b></p>
<div class="border-list">
<?php foreach ($rows as $value):
?>  <div class="list-data">
		<div class="row">
			<div class="col-sm-10">
				<h3 class='title-news'><?= $value['judul'] ?></h3><br>
			</div>
			<div class="col-sm-2" style="text-align: right">
				<a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('frontend/web/download/regulasi/'.$value['nama_file']); ?>" class="btn btn-info"><i class="fa fa-download"></i>
	 			Download</a>
	 			
			</div>
		</div>
	</div>					
<?php endforeach;  
?>
</div>
<p align='center'><a href="<?= Yii::$app->getUrlManager()->createUrl('regulasi')?>" class="btn btn-info" role="button">Reset</a></p>
