<?php
/*
use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
AppAsset::register($this);*/

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

$this->title = 'Hasil semua pencarian';
$this->context->layout = 'main-no-landing';
?>
<div class="wrapper wrapper-content animated fadeInRight">
    
<div class='main-title-page'><h3><?= Html::encode($this->title) ?></h3></div>
    
    <div class="panel">
    <?php $form = ActiveForm::begin(); ?> 
        <div class="input-group col-md-6">
            <input type="hidden" name="flag" value='izin'>
            <input type="text" style="" class="form-control" required placeholder="Masukkan pencarian baru..." name="cari">
            <span class="input-group-btn"> 
            <button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;Cari ! </button> 
            </span>
        </div>
	<?php ActiveForm::end(); ?> 
    </div>
  
       	
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                 <h5>Ditemukan <b><?php echo"$jml";?></b> data untuk pencarian <b><i>"<?php echo"$keyword";?>"</i></b></h5> 
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                   
                </div>
            </div>
            <div class="ibox-content">
                <table class="table">
                   
                     <tbody>   
                           <?php $n=0;
                                while ($n < $jml){?> 
                                    <tr><td>
									<?php if($id[$n]){?>
									<?= Html::a($judul[$n], [$link[$n], 'id'=>$id[$n]]) ?>
									<?php }else{ ?>
									<?= Html::a($judul[$n], [$link[$n]]) ?>
									<?php } ?>
									</td></tr>
                                <?php $n++;}
                            ?>	
                        </tbody>
                </table>

            </div>
        </div>
    
</div>