<?php
use backend\models\UserFile;
use backend\models\BerkasIzin;
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
				$data_berkas = BerkasIzin::find()->where(['izin_id' => $model->perizinan->izin_id])->all();
				foreach($data_berkas as $value){echo"<br>";
					$dat_berkas[] = $value->nama; 
				}
				?>
				<ul>
				<?php 
				$n=0;
				foreach($berkas_model as $value){
				$data_berkas2 = UserFile::findOne($value->user_file_id);
				?>			
				<li><?php echo"<a href='".Yii::getAlias('@front')."/uploads/".$data_berkas2->user_id."/".$data_berkas2->filename."' target='_blank'>".$dat_berkas[$n]."</a>"; ?></li>
				<?php $n++; } ?>

				</ul>	
				</div>	
			</div>
		</div>
	</div>		
</div>	