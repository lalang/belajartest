<div class="container">
	<p align="center">Jika Anda lupa password silakan masukan username login Anda pada form dibawah ini lalu klik button proses.</p>
	<form role="form" method="post" action="<?php echo"$form_action"; ?>" name='login'>
	<input type="hidden" name='code_reset_pass' value="<?php echo $code_reset_pass;?>">
    <!-- pesan start -->
	
	<div class="row">
		<div class="col-sm-4">
		<!--kosong-->
		</div>
		<div class="col-sm-4">
			<!-- pesan flash message start -->
			<?php $flash_pesan = $this->session->flashdata('pesan')?>
			<?php if (! empty($flash_pesan)) : ?>			   
			<?php echo $flash_pesan; ?>
			<?php endif ?>
			<!-- pesan flash message end -->
			<div class='title_login animated bounce'>
			<h4><span class="glyphicon glyphicon-lock"></span> LOSE PASSWORD</h4>
			</div>
			<div class='form_login animated bounce'>
			
				<p>
				<div class="form-group">
				  <label for="username">Username:</label>
					<input type="text" class="form-control" id="username" placeholder="Enter Username" name='username' value="<?php echo set_value('username');?>">
				</div>
				
				</p>
				<?php echo form_error('username', '<p class="field_error">', '</p>');?>
				<p>
				
			</div>
			<p><input type="submit" name="submit" class="btn btn-info" value="Proses"/> <?php echo anchor($btn_cancel, 'Cancel', array('class'=>'btn btn-info'));?></p>
			</form>
		</div>	
		<div class="col-sm-4" style="text-align: center">
		<!--kosong-->
		</div>
	</div>
		
</div>
