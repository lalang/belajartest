<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
AppAsset::register($this);
/* @var $this yii\web\View */
$this->title = 'Hasil pencarian perizinan';
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


    </div>
    <?php ActiveForm::end(); ?> 
       	
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
                           <?php
                                foreach ($rows as $value){?> 
                                    <tr><td><a href="<?= Url::to('detailperizinan')?>"> <?php echo $value['nama']; ?></a></td></tr>
                                <?php }
                            ?>	

                        </tbody>
                </table>

            </div>
        </div>

    <p align='center'><a href="<?= Url::to('perizinan')?>" class="btn btn-info" role="button">Kembali</a></p>
    
</div>