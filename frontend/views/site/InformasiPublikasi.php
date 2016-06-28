<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use \yii\db\Query;
use yii\web\JsExpression;

/* @var $this yii\web\View */
//$this->context->layout = 'main-no-landing';
$this->context->layout = 'main-perizinan';
?>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    
<div class='main-title-page'><h2><strong><?php echo $judul_page; ?></strong></h2></div>

    <div class="panel">
    <?php $form = ActiveForm::begin(); ?> 
        <div class="input-group col-md-6">
		
		<?php

			echo Select2::widget([
				'name' => 'cari',
			    'value' => '', // initial value
				//'data' => $data_izin,
				'options' => ['placeholder' => Yii::t('frontend','Masukkan publikasi yang dicari...')],
				'pluginOptions' => [
					   
				   // 'allowClear' => false,
					'minimumInputLength' => 3,
					'ajax' => [
						'url' => Url::to(['publikasi-search']),
						'dataType' => 'json',
						'data' => new JsExpression('function(params) { return {search:params.term}; }'),
						'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
					],
				],
			]);
			?>
		
		
          <!--  <input type="hidden" name="flag" value='izin'>
            <input type="text" style="" class="form-control" required placeholder="<?php echo Yii::t('frontend','Masukkan publikasi yang dicari...'); ?>" name="cari">-->
            <span class="input-group-btn"> 
            <button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;<?php echo Yii::t('frontend','Cari'); ?> </button> 
            </span>
        </div>


    </div>
    <?php ActiveForm::end(); ?> 
    
    <div class="ibox float-e-margins">
        <div class="ibox-title">
             <a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-backward"></i> <?= Yii::t('frontend','Kembali Ke Beranda') ?></a>
             
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
		
		
		<div class="ibox-content">
            <table class="table">
                 <tbody>   
                    <?php
					foreach ($data_kategori as $value){ 
						if($language=="en"){ 
							$judul = $value->nama_en;
						}else{
							$judul = $value->nama;
						}
					?>	

						<div class="col-md-12" style="padding:2px">
							<span class='btn btn-info btn-block' data-toggle='collapse' data-target='#<?php echo $value->id;?>' aria-expanded='false' aria-controls='collapseExample' style='text-align:left; overflow: auto;'>
								<i class="fa fa-angle-right"></i> <?php  echo $judul; ?>
							</span>
							<div class='collapse' id='<?php echo $value->id;?>'>
								<div class="well">
								<?php
									$sql = new Query;
									$sql->select(['id','judul','judul_eng','nama_file','publish'])
									->where(['publish'=>'Y'])
									->andWhere('publikasi_id=:publikasi_id',[':publikasi_id' => $value->id])
									->from('download_publikasi');
									$rows_data = $sql->all();
									$command2 = $sql->createCommand();
									$rows_data = $command2->queryAll();

									foreach ($rows_data as $value){
									?> 
									<div class="row" style="background: #eceaea; border-radius:5px; padding:10px 0px 5px 0px; margin-bottom:5px;">	
										<div class="col-md-10" style='font-size:12px'>
											<?= $value['judul'] ?>
										</div>
										<div class="col-md-2" style="text-align: right;">
											<?php if($value['nama_file']){?>
											<a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('download/publikasi/'.$value['nama_file']); ?>" class="btn btn-info" target="_blank"><i class="fa fa-download "></i> Download</a>
											<?php } ?>
										</div>
									</div>
									<?php }	?>	
								</div>
							</div>		
						</div>    
					<?php 
						}
					?>		

                    </tbody>

            </table>
           

        </div>
		
    </div>

</div>