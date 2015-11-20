<?php

use backend\models\PerizinanSearch;
use backend\models\UserFile;
use backend\models\BerkasIzin;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\View;
use kartik\slider\Slider;

/* @var $this View */
/* @var $searchModel PerizinanSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('app', 'Perizinan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Upload')];
$this->params['breadcrumbs'][] = $this->title;



?>
<br>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
<?= $this->render('_step', ['value' => 3]) ?>
    </div>
    <div class="col-sm-1"></div>
</div>
<br><br><br><br><br>
<div class="row">
    <div class="col-md-12">
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Upload Berkas</h3>
            </div>
            <div class="box-body">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Mohon diperhatikan!</h4>
                    <p>Silahkan upload berkas persyaratan sesuai syarat berkas di bawah, semua yang anda upload akan otomatis masuk ke dalam brankas pribadi anda.</p>
                </div>
                
              <table class="table table-bordered">
                <tbody><tr bgcolor="#fff">
                  <th style="width: 10px">#</th>
                  <th style="width: 200px">Jenis Berkas</th>
                  <th>File</th>
                  <th></th>
                </tr>
                 <?php
                $form = ActiveForm::begin();
                foreach ($perizinan_berkas as $value) {
				
				$model_bi = BerkasIzin::findOne(['id' => $value->berkasIzin->id]);				
				$pecah_exten = explode(',',$model_bi->extension);
				$jml_exten = count($pecah_exten);
				$max_exten = count($pecah_exten)-1;
				$n=0;
	
				$filter= null;
				while($jml_exten>$n){
					$filter.='filename like \'%'.$pecah_exten[$n].'%\'';
					if($max_exten!=0){$filter.=' or ';}
				$n++;
				$max_exten--;
				}

                    ?>
                <tr bgcolor="#fff">
                  <td><?= $value->urutan ?></td>
                  <td><?= $value->berkasIzin->nama ?> Format: (<?= $model_bi->extension ?>)</td>
                  <td>
                    <?= Html::dropDownList('user_file[]', $value->user_file_id, ArrayHelper::map(UserFile::find()->where('user_id=' . Yii::$app->user->id)->andFilterWhere(['or',$filter])->all(), 'id', 'description'), ['prompt' => '--Pilih--', 'class' => 'form-control InputFile','id'=>'fileForm2', 'onchange'=>'submitChange2()']) ?>
                  </td>
                  <td>  <?= Html::a('<i class="fa fa-folder-open"></i>Unggah Berkas', null, ['id' => 'upload_file', 'class' => 'btn btn-info upload_file']) ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody></table>
            
            <div class="box-footer">
                <?php
                $PilBerkas =  \backend\models\PerizinanBerkas::findOne(['perizinan_id'=>$model->id])->user_file_id;
                    if($PilBerkas != NULL){
                        
//                        echo $PilBerkas;
                        echo Html::submitButton('Simpan', ['class' => 'btn btn-info', 'id' => 'submitBtn2', 'style'=>'display: block']);
                    } elseif($PilBerkas == NULL) {
//                        echo $PilBerkas;
                        echo Html::submitButton('Simpan', ['class' => 'btn btn-info', 'id' => 'submitBtn2', 'style'=>'display: none']);
                    }
                    
                    
                ActiveForm::end();
                ?>
            </div>
                </div>
        </div>
    </div>
</div>
<?php
$js = <<< JS
    $('.upload_file').click(function(){
        $('#m_upload').html('');
        $('#m_upload').load('/user-file/upload?id={$_GET['id']}&ref={$_GET['ref']}');
        $('#m_upload').modal('show'); 
    });
JS;

$this->registerJs($js);

Modal::begin([
    'id' => 'm_upload',
    'header' => '<h7>Upload Berkas</h7>'
]);
Modal::end();

if($alert){
	echo"<script>alert('Upload gagal dikarenakan tidak sesuai dengan format file yang dibutuhkan');</script>";
}
?>
<script type="text/javascript">
    
    function submitChange2()
    {
        var inputFile2 = document.getElementsByClassName("InputFile");
        inputSubmit2 = document.getElementById("submitBtn2");
        
//        alert(inputFile2.length);
        for( i = 0; i < inputFile2.length; i++) {
//            alert(inputFile2[i].value);
            if(inputFile2[i].value == '' )
            {
              inputSubmit2.style.display = "none";
              break;
            }
            else
            {
              inputSubmit2.style.display = "block";
            }
        }
    }

</script>

