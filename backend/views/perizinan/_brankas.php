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
				<ul>
				<?php foreach($berkas_model as $value){
				$data_berkas1 = BerkasIzin::findOne($value->user_file_id);
				$data_berkas2 = UserFile::findOne($value->user_file_id);
				?>
				<li><?php if($data_berkas1->extension=="png,jpg,jpeg"){ echo"<a href='".Yii::getAlias('@front')."/uploads/".$data_berkas2->user_id."/".$data_berkas2->filename."' target='_blank'>".$data_berkas1->nama."</a>"; }else{ echo"<a href='".Yii::getAlias('@front')."/uploads/".$data_berkas2->user_id."/".$data_berkas2->filename."' target='_blank'>".$data_berkas1->nama."</a>"; }?></li>
				<?php } ?>
				</ul>	
				</div>	
			</div>
		</div>
	</div>		
</div>	