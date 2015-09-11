<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\data\Pagination; 
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Regulasi';
$this->context->layout = 'main-no-landing';
?>

<div class="wrapper wrapper-content animated fadeInRight">
    
<div class='main-title-page'><h3><strong><?= Html::encode($this->title) ?></strong></h3></div>

    <div class="panel">
    <?php $form = ActiveForm::begin(); ?> 
        <div class="input-group col-md-6">
            <input type="hidden" name="flag" value='izin'>
            <input type="text" style="" class="form-control" required placeholder="Masukkan regulasi yang dicari ..." name="cari">
            <span class="input-group-btn"> 
            <button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;Cari ! </button> 
            </span>
        </div>


    </div>
    <?php ActiveForm::end(); ?> 
    
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
                                    <td><?= $value->judul ?></td>

                                    <td>
                                        <a href="<?php echo \Yii::$app->urlManager->createAbsoluteUrl('frontend/web/download/regulasi/'.$value->nama_file); ?>" class="btn btn-info btn-circle">
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