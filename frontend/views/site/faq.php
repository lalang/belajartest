<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

//AppAsset::register($this);

$this->title = 'FAQ';
////$this->context->layout = 'main-no-landing';
$language = Yii::$app->getRequest()->getCookies()->getValue('language'); Yii::$app->language = $language;?>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class='main-title-page'><h2><strong><?= Html::encode($this->title) ?></strong></h2></div>

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
					foreach ($rows as $value){ 
						if($language=="en"){ 
							$tanya = $value->tanya_en;
							$jawab = $value->jawab_en;
						}else{
							$tanya = $value->tanya;
							$jawab = $value->jawab;
						}
					?>	

            <div class="col-md-12" style="padding:2px">
                <button class='btn btn-info btn-block' type='button' data-toggle='collapse' data-target='#<?php echo $value->id;?>' aria-expanded='false' aria-controls='collapseExample' style='text-align:left'>
                    <i class="fa fa-angle-right"></i> <?php  echo $tanya; ?>
                </button>
                <div class='collapse' id='<?php echo $value->id;?>'>
                    <div class="well">
                      
                        <?php  echo $jawab; ?>        
                           
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
