<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

AppAsset::register($this);
/* @var $this yii\web\View */
$this->title = 'FAQ';
$this->context->layout = 'main-no-landing';
?>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class='main-title-page'><h3><strong><?= Html::encode($this->title) ?></strong></h3></div>



    <div class="ibox float-e-margins">
        <div class="ibox-title">
             <!--<h5><b>Regulasi</b></h5>--> 
             
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

            <div class="col-md-12" style="padding:2px">
                <button class='btn btn-info btn-block' type='button' data-toggle='collapse' data-target='#<?php echo $value->id;?>' aria-expanded='false' aria-controls='collapseExample' style='text-align:left'>
                    <i class="fa fa-angle-right"></i> <?php  echo $value->tanya; ?>
                </button>
                <div class='collapse' id='<?php echo $value->id;?>'>
                    <div class="well">
                      
                        <?php  echo $value->jawab; ?>        
                           
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