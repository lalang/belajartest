<?php
use yii\helpers\Html;
use \yii\db\Query;
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

<!-- <div class="row">
	<div class="col-sm-6">
		<?php $form = ActiveForm::begin(); ?>
			<input type="hidden" name="flag" value='bidang'>
		    <input type="text" class="form-control col-sm" required placeholder="Cari Kategori Perizinan..." name="cari">

		    <div class="form-group">
		        <?= Html::submitButton('Cari Kategori', ['class' => 'btn btn-info']) ?>
		    </div>

		<?php ActiveForm::end(); ?> 
	</div>
	<div class="col-sm-6">
		<?php $form = ActiveForm::begin(); ?>
			<input type="hidden" name="flag" value='izin'>
		    <input type="text" class="form-control col-sm" required placeholder="Cari Perizinan..." name="cari">

		    <div class="form-group">
		        <?= Html::submitButton('Cari Izin', ['class' => 'btn btn-info']) ?>
		    </div>

		<?php ActiveForm::end(); ?> 
	</div>	
</div> -->

<?php $form = ActiveForm::begin(); ?>
	<input type="hidden" name="flag" value='izin'>
    <input type="text" class="form-control col-sm" required placeholder="Cari Perizinan..." name="cari">

    <div class="form-group">
        <?= Html::submitButton('Cari Izin', ['class' => 'btn btn-info']) ?>
    </div>

<?php ActiveForm::end(); ?> 

<div class="border-list">
	<div class="row">
	<?php
        foreach ($rows as $value){ 
    ?>	

        <div class="col-md-6">	
	    	<button class='btn btn-primary btn-block' type='button' data-toggle='collapse' data-target='#<?php echo $value['id'];?>' aria-expanded='false' aria-controls='collapseExample' style='text-align:left'>
	            <i class="fa fa-hand-o-right"></i> <?php  echo $value['nama']; ?>
	        </button>
	        <div class='collapse' id='<?php echo $value['id'];?>'>
	        	<div class='well'>
	        		<?php
	                    $sql = new Query;
                        $sql->select(['id','nama'])
                        ->where('bidang_id=:bidang_id', [':bidang_id' => $value['id']])
                        ->from('izin');
                        $rows_data = $sql->all();
                        $command2 = $sql->createCommand();
                        $rows_data = $command2->queryAll();

                        foreach ($rows_data as $value_data)
                        { ?>
                            <a href="<?= Yii::$app->getUrlManager()->createUrl(['/site/detailperizinan', 'id'=>$value_data['id']])?>"> <?php echo $value_data['nama']; ?> </a>
                          <?php  echo"<br>"; 
                        }
                    ?>   	
	        	</div>
        	</div>		
        </div>    
    <?php 
    	}
    ?>	 </div>     

</div>	

<?php if(!empty($alert)){ echo"<script>alert('Maaf kata kunci yang anda cari tidak ditemukan!');</script>"; }?>