<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">
				<?php echo anchor($btn_data, '<i class="fa fa-list"></i> '.$nm_btn_data, array('class'=>'btn btn-sm btn-info btn-flat pull-left'));?></div>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

		<div class='title_field animated fadeInUp'><?php echo$title_form; ?></div>
		<div class='value_field animated fadeInUp'>
			<form class='form-horizontal' action='<?php echo$form_action; ?>' method='POST' role='form' name='submit'>
			<input type='hidden' name='id_seleb' <?php if(isset($form_value["id_seleb"])){ echo"value='$form_value[id_seleb]'"; } ?>>
			<div class='form-group'><?php
				if(empty($form_value["img_seleb"])){ ?>
	
				<div class='col-sm-12'>		
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='image'>Upload Photo</label>
					<div class='col-sm-10'>
						<div class='input-group'>
							<span class='input-group-btn'>
								<span class='btn btn-primary btn-file'>
									Browse&hellip; <input type='file' name='image' id='file' multiple>
								</span>
							</span>
							<input type='text' class='form-control' readonly>
						</div>
					</div>
				</div>
				</div>
				
				<?php }else{ ?>
				<label class='col-sm-2 control-label'>Upload Photo:</label>
				<div class='col-sm-10'>
				<?php echo"
				<div id='image_preview'>";
		
				echo"<img class='img_responsive' src='"; echo base_url('images/photo/'.$form_value["img_seleb"]); echo"'/>";

				
				echo"</div> <br><br>"; 
				
				echo anchor('admin/deletePhotoSeleb/'.$form_value["id_seleb"].'', 'Hapus',array('class' => 'btn btn-default','onclick' => "return confirm('Anda yakin akan menghapus photo ini?')")); 
				
				echo"<br><br>Untuk mengganti photo Anda harus menghapus photo yang lama terlebih dulu";
				?>
				</div>
				<?php } ?>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label'>Nama</label>
				<div class='col-sm-10'>
					<input class='form-control' type='text' name='nm_seleb' <?php if(isset($form_value["nm_seleb"])){ echo"value='$form_value[nm_seleb]'"; } ?> required placeholder='Enter nama selebritis'>
				</div>
			</div>
			<div class='form-group form-group-sm'>
				<label class='col-sm-2 control-label'>Biography</label>
				<div class='col-sm-10'>
					<textarea class='form-control' rows='5' id='<?php echo$editor; ?>' name='biography_seleb'><?php if(isset($form_value['biography_seleb'])){ echo$form_value['biography_seleb']; }?></textarea>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='username'>Status</label>
				<div class='col-sm-10'>
					<select class='form-control' id='active_seleb' name='active_seleb'><?php
					
					if(isset($form_value['active_seleb'])){
					
						$status=$form_value['active_seleb'];
						
						if($status=="Y"){$selected="selected";}else{$selected2="selected";}
					}else{
					$selected="";
					$selected2="";
					}
					
					echo"<option value='Y' $selected>Aktif</option>";
					echo"<option value='N' $selected2>Tidak Aktif</option>";

					?>
					</select>
				</div>
			</div>
		</div>

		</div><!-- /.box-body -->
		<div class="box-footer">
            <?php echo"<input type='submit' class='btn btn-sm btn-primary' value='$nm_button_form' name='submit'> "; echo anchor($btn_data, $nm_button_form2,array('class' => 'btn btn-sm btn-primary')); echo"
			</form>"; ?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->     
  
