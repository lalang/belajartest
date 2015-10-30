<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
//AppAsset::register($this);
/* @var $this yii\web\View */
$this->title = 'Hasil pencarian perizinan';
$this->context->layout = 'main-perizinan';
$language = Yii::$app->getRequest()->getCookies()->getValue('language');  Yii::$app->language = $language;?>

<div class="wrapper wrapper-content animated fadeInRight">
    
<div class='main-title-page'><h2><strong><?php echo Yii::t('frontend','Perizinan'); ?></strong></h2></div>
   
    <div class="panel">
    <?php $form = ActiveForm::begin(); ?> 
        <div class="input-group col-md-6">
            <?php		
			echo Select2::widget([
				'name' => 'cari',
			    'value' => '', // initial value
				'options' => ['placeholder' => Yii::t('frontend','Masukkan izin yang dicari...')],                    
				'pluginOptions' => [
					'minimumInputLength' => 3,
					'ajax' => [
						'url' => Url::to(['izin-search']),
						'dataType' => 'json',
						'data' => new JsExpression('function(params) { return {search:params.term}; }'),
						'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
					],
				],
			]);
			?>
            <span class="input-group-btn"> 
            <button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;<?= Yii::t('frontend','Cari') ?> </button> 
            </span>
        </div>


    </div>
    <?php ActiveForm::end(); ?> 
       	
        <div class="ibox float-e-margins">
            <div class="ibox-title">
				 <a href="<?= Url::to('perizinan')?>"><i class="fa fa-backward"></i>
 <?= Yii::t('frontend','Kembali') ?></a>	
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                   
                </div>
            </div>
            <div class="ibox-content">
                <table class="table">
					<h5><?= Yii::t('frontend','Ditemukan data dari hasil pencarian sebanyak') ?>: <b><?php echo"$jml";?></b> data.</h5> 
                     <tbody>   
                           <?php
                                foreach ($rows as $value){?> 
                                    <tr><td>
									<?= Html::a($value['nama'], ['/site/detailperizinan', 'id' => $value['id']]) ?>
									<!--
									<a href="<?= Url::to('detailperizinan')?>"> <?php echo $value['nama']; ?></a>
									-->
									</td></tr>
                                <?php }
                            ?>	

                        </tbody>
                </table>

            </div>
        </div>

   
    
</div>