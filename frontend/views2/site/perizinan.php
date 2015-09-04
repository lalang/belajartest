<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

AppAsset::register($this);
/* @var $this yii\web\View */
$this->title = 'Perizinan';
?>
<style>
 
    
</style>

<div class="wrapper wrapper-content animated fadeInRight">
    
<div class='main-title-page'><h3><?= Html::encode($this->title) ?></h3></div>

    <div class="panel">
    <?php $form = ActiveForm::begin(); ?> 
        <div class="input-group col-md-6">
            <input type="hidden" name="flag" value='izin'>
            <input type="text" style="" class="form-control" required placeholder="Masukkan izin yang dicari..." name="cari">
            <span class="input-group-btn"> 
            <button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;Cari ! </button> 
            </span>
        </div>  
    </div>

    <?php ActiveForm::end(); ?> 

    <div class="border-list">
            <div class="row">
            <?php
            foreach ($rows as $value){ 
        ?>	

            <div class="col-md-4">	
                    <button class='btn btn-info btn-block' type='button' data-toggle='collapse' data-target='#<?php echo $value['id'];?>' aria-expanded='false' aria-controls='collapseExample' style='text-align:left'>
                        <i class="fa fa-angle-right"></i> <?php  echo $value['nama']; ?>
                    </button>
                    <div class='collapse' id='<?php echo $value['id'];?>'>
                            <div class="well">
                                    <?php
                                $sql = new Query;
                            $sql->select(['id','nama'])
                            ->where('bidang_id=:bidang_id', [':bidang_id' => $value['id']])
                            ->from('izin');
                            $rows_data = $sql->all();
                            $command2 = $sql->createCommand();
                            $rows_data = $command2->queryAll();

                            foreach ($rows_data as $value_data)
                            { ?>
                                <a href="<?= Url::to('detailperizinan/?id='.$value_data['id'].'')?>"> <?php echo $value_data['nama']; ?> </a>
                              <?php  echo"<br>"; 
                            }
                        ?>   	
                            </div>
                    </div>		
            </div>    
        <?php 
            }
        ?>	 </div>     

    </div>	

<?php if(!empty($alert)){ echo"<script>alert('Maaf kata kunci yang anda cari tidak ditemukan!');</script>"; }?>

</div>