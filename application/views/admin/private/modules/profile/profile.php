<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">

		<!-- pesan flash message start -->
		<?php $flash_pesan = $this->session->flashdata('pesan')?>
		<?php if (! empty($flash_pesan)) : ?>			   
		<?php echo $flash_pesan; ?>
		<?php endif ?>
		<!-- pesan flash message end -->
		<?php 
		echo"
		<div class='title_field animated fadeInUp'>Data Login To Adminarea</div>
		<div class='value_field animated fadeInUp'>
			<form class='form-horizontal' action='$form_action' enctype='multipart/form-data' method='POST' role='form' name='submit'>
			<input type='hidden' name='id_user' value='$form_value[id_user]'>
			<div class='form-group'>";
				if(empty($form_value["photo_user"])){ 
				
				echo"	
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
				</div>";
				
				}else{ ?>
				<label class='col-sm-2 control-label'>Upload Photo:</label>
				<div class='col-sm-10'>
				<?php echo"
				<div id='image_preview'>";
		
				echo"<img class='img_responsive' src='"; echo base_url('images/photo_user/'.$form_value["photo_user"]); echo"'/>";

				
				echo"</div> <br><br>"; 
				
				echo anchor('admin/deletePhotoUser/'.$form_value["username"].'', 'Hapus',array('class' => 'btn btn-default','onclick' => "return confirm('Anda yakin akan menghapus photo ini?')")); 
				
				echo"<br><br>Untuk mengganti photo Anda harus menghapus photo yang lama terlebih dulu";
				?>
				</div>
				<?php } echo"
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='username'>Username</label>
				<div class='col-sm-10'>
					<input class='form-control' id='username' type='text' name='username' value='$form_value[username]' disabled>
				</div>
			</div>
			<div class='form-group'>
				<label for='pwd' class='col-sm-2 control-label'>Password</label>
				<div class='col-sm-10'>
					<input type='password' class='form-control' id='pwd' name='password' placeholder='Enter password jika password yang lama ingin diubah'>
				</div>
			</div>
			<div class='form-group form-group-sm'>
				<label class='col-sm-2 control-label' for='nama'>Nama</label>
				<div class='col-sm-10'>
					<input class='form-control' type='text' id='nama' name='nm_user' value='$form_value[nm_user]'>
				</div>
			</div>
			<div class='form-group form-group-sm'>
				<label class='col-sm-2 control-label'>Email</label>
				<div class='col-sm-10'>
					<input class='form-control' type='email' name='email_user' value='$form_value[email_user]'>
				</div>
			</div>
			<div class='form-group form-group-sm'>
				<label class='col-sm-2 control-label'>Handphone</label>
				<div class='col-sm-10'>
					<input class='form-control' type='text' name='hp_user' value='$form_value[hp_user]'>
				</div>
			</div>
		</div>
		";
		?>

		</div><!-- /.box-body -->
		<div class="box-footer">
            <input type='submit' class='btn btn-primary' value='Update' name='submit'>
			</form>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->     
