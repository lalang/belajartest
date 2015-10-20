<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
//$this->context->layout = 'main-no-landing';
$this->context->layout = 'main-perizinan';
?>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language'); 
Yii::$app->language = $language;
?>
<div class="wrapper wrapper-content animated fadeInRight">
    
<div class='main-title-page'><h3><strong><?php echo Yii::t('frontend','Regulasi'); ?></strong></h3></div>

    <div class="panel">
    <?php $form = ActiveForm::begin(); ?> 
        <div class="input-group col-md-6">
		
		<?php

			echo Select2::widget([
				'name' => 'cari',
			    'value' => '', // initial value
				//'data' => $data_izin,
				'options' => ['placeholder' => Yii::t('frontend','Masukkan regulasi yang dicari...')],
				'pluginOptions' => [
					'tags' => $data_regulasi,
					'tokenSeparators' => [',', ' '],
					'maximumInputLength' => 10
				],
			]);
			?>
		
		
          <!--  <input type="hidden" name="flag" value='izin'>
            <input type="text" style="" class="form-control" required placeholder="<?php echo Yii::t('frontend','Masukkan regulasi yang dicari...'); ?>" name="cari">-->
            <span class="input-group-btn"> 
            <button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;<?php echo Yii::t('frontend','Cari'); ?> </button> 
            </span>
        </div>


    </div>
    <?php ActiveForm::end(); ?> 
    
    <div class="ibox float-e-margins">
        <div class="ibox-title">
             <a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-backward"></i>
 Kembali Ke Dashboard</a>
             
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
        <div class="ibox-content">
            <table class="table">
                 <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Action</th>  
                        </tr>
                        </thead>
                 <tbody>   
                       <?php
                            foreach ($models as $value){?> 
                                <tr>
                                    <td style='font-size:12px'><?= $value->judul ?></td>

                                    <td>
                                        <a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('download/regulasi/'.$value->nama_file); ?>" class="btn btn-info btn-circle">
                                            <i class="fa fa-download "></i></a>
                                    </td>
                                </tr>
                            <?php }
                        ?>	

                    </tbody>

            </table>
             <?= LinkPager::widget(['pagination' => $pagination]) ?>

        </div>
    </div>

</div>