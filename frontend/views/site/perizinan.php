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
$this->context->layout = 'main-perizinan';

$this->title = Yii::t('app', 'Perizinan');
?>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
?>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class='main-title-page'><h3><strong><?php echo Yii::t('frontend','Perizinan'); ?></strong></h3></div>

    <div class="panel">
	
    <?php $form = ActiveForm::begin(); ?> 
        <div class="input-group col-md-6">
		
	<?php		
		echo Select2::widget([
				'name' => 'cari',
			    'value' => '', // initial value
				//'data' => $data_izin,
				'options' => ['placeholder' => Yii::t('frontend','Masukkan izin yang dicari...')],
				/*'pluginOptions' => [
					'tags' => $data_izin,
					'tokenSeparators' => [',', ' '],
					'maximumInputLength' => 10
				],*/
                      
				'pluginOptions' => [
					   
				   // 'allowClear' => false,
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
         <!--
            <input type="text" style="" class="form-control" required placeholder="<?php echo Yii::t('frontend','Masukkan izin yang dicari...'); ?>" name="cari">-->
            <span class="input-group-btn"> 
            <button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;<?php echo Yii::t('frontend','Cari'); ?> </button> 
            </span>
        </div>  
    </div>

    <?php ActiveForm::end(); ?> 
    <div class="ibox float-e-margins">
        <div class="ibox-title"><a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-backward"></i> <?= Yii::t('frontend','Kembali Ke Beranda') ?></a>
             
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
        ?>	

            <div class="col-md-4" style="padding:2px">
                <span class='btn btn-info btn-block' data-toggle='collapse' data-target='#<?php echo $value['id'];?>' aria-expanded='false' aria-controls='collapseExample' style='text-align:left; overflow: auto;'>
                    <i class="fa fa-angle-right"></i> <?php  echo $value['nama']; ?>
                </span>
                <div class='collapse' id='<?php echo $value['id'];?>'>
                    <div class="well">
                        <?php
                            $sql = new Query;
                            $sql->select(['id','nama'])
                            ->where('bidang_id=:bidang_id', [':bidang_id' => $value['id']])
							->andWhere(['aktif' => 'Y'])
                            ->from('izin');
                            $rows_data = $sql->all();
                            $command2 = $sql->createCommand();
                            $rows_data = $command2->queryAll();

                            foreach ($rows_data as $value_data)
                            { ?>
                                <!--<a href="<?= Url::to('detailperizinan/?id='.$value_data['id'].'')?>"> <?php echo $value_data['nama']; ?> </a>-->
                                <?= Html::a($value_data['nama'], ['/site/detailperizinan', 'id' => $value_data['id']]) ?>
                              <?php  echo"<br>"; 
                            }
                        ?>   	
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
    
<?php if(!empty($alert)){ echo"<script>alert('Maaf kata kunci yang anda cari tidak ditemukan!');</script>"; }?>

</div>