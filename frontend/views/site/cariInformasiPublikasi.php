<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
//$this->context->layout = 'main-no-landing';
/* @var $this yii\web\View */
$this->context->layout = 'main-perizinan';
$language = Yii::$app->getRequest()->getCookies()->getValue('language'); Yii::$app->language = $language;?>
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
            <a href="<?= Url::to('/site/informasi-publikasi')?>"><i class="fa fa-backward"></i>
 <?= Yii::t('frontend','Kembali') ?></a>	
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
        <div class="ibox-content">
		<h5><?= Yii::t('frontend','Ditemukan data dari hasil pencarian sebanyak') ?>: <b><?php echo"$jml";?></b> data.</h5> 
		<tbody>
            <table class="table">
                 <thead>
                        <tr>
                            <th><?php echo Yii::t('frontend','Judul'); ?></th>
                            <th style='text-align: center'><?php echo Yii::t('frontend','Action'); ?></th>  
                        </tr>
                        </thead>
                 <tbody>   
                       <?php
                            foreach ($rows as $value){							
							if($language=="en"){ 
								$judul = $value['judul_eng'];
							}else{
								$judul = $value['judul'];
							}
						?> 
                                <tr>
                                    <td style='font-size:12px'><?php echo$judul; ?></td>

                                    <td style='text-align: center'>
                                       <a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('download/publikasi/'.$value['nama_file']); ?>" class="btn btn-info" target="_blank"><i class="fa fa-download"></i> Download
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        ?>	

                    </tbody>

            </table>
			</tbody>
        </div>
    </div>

</div>