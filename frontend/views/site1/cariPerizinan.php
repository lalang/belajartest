<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Perizinan';
?>
<div class='main-title-page'><h1><?= Html::encode($this->title) ?></h1></div>
<!-- <div class="row">
	<div class="col-sm-5">
		<input type="text" class="form-control col-sm" placeholder="Cari Perizinan..." name="filter">
	</div>
</div>			
<button type="button" class="btn btn-info">Cari</button>  -->

<?php $form = ActiveForm::begin(); ?>

    <input type="text" class="form-control col-sm" required placeholder="Cari Perizinan..." name="cari">

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-info']) ?>
    </div>

<?php ActiveForm::end(); ?> 
<p>Ditemukan <b><?php echo"$jml";?></b> data untuk pencarian <b><i>"<?php echo"$keyword";?>"</i></b></p> 	
<div class="border-list">
	<?php
        foreach ($rows as $value){?> 
            <div class='list-data'><a href="<?= Yii::$app->getUrlManager()->createUrl('detailperizinan')?>"> <?php echo $value['nama']; ?></a></div>
    	<?php }
    ?>	 </div>     

</div>	
<p align='center'><a href="<?= Yii::$app->getUrlManager()->createUrl('perizinan')?>" class="btn btn-info" role="button">Reset</a></p>
