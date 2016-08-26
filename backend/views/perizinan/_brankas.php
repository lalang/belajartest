<?php
use backend\models\UserFile;
use backend\models\BerkasIzin;
use backend\models\PerizinanBerkas;
?>
<div class="col-md-12">
    <div class="panel panel-tab rounded shadow">
        <!-- Start tabs heading -->
        <div class="panel-heading no-padding">

			<ul class="nav nav-tabs">
			  <li class="active"><a href='#'><i class="fa fa-briefcase"></i> Brankas</a></li>
			</ul>
		</div><!-- /.panel-heading -->
        <!--/ End tabs heading -->

        <!-- Start tabs content -->
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1-1">
				Dibawah ini adalah brankas pemohon, untuk melihat detail silakan di click.
				<?php
//				$data_berkas = BerkasIzin::find()->where(['izin_id' => $model->perizinan->izin_id])->all();
//				foreach($data_berkas as $value){
//                                    echo"<br>";
//                                    $dat_berkas[] = $value->nama; 
//				}
                                
				?>
				<ul>
				<?php
                                $model_berkas = PerizinanBerkas::find()
                                    ->joinWith('berkasIzin')
                                    ->joinWith('userFile')
                                    ->andWhere(['perizinan_berkas.perizinan_id'=>$model->perizinan_id])
                                    ->select(['berkas_izin.nama as nama', 'user_file.filename as file', 'user_file.user_id as userID', 'user_file.path as path'])
                                    ->asArray()->all();
                                
				foreach($model_berkas as $value){
                                    
				?>			
				<li><?php  echo"<a href='".Yii::getAlias('@front')."/uploads/".$value['path']."/".$value['userID']."/".$value['file']."' target='_blank'>".$value['nama']."</a>"; ?></li>
				<?php 
                                }
                               ?>

				</ul>	
				</div>	
			</div>
		</div>
	</div>		
</div>	