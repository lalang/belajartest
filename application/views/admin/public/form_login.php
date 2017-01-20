<div class="container">

</div>
<div class="container">

	<?php $attributes = array('name' => 'login_form', 'id' => 'login_form');
		echo form_open('admincp', $attributes);
	?>
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
			<h4>LOGIN ADMIN</h4>
			</div>
			<div class='form_login animated bounce'>
				<p>				
				<div class="form-group">
				  <label for="username">Username:</label>
					<div class="inner-addon left-addon">
						<i class="glyphicon glyphicon-user"></i>
						<input type="text" class="form-control" id="username" placeholder="Enter Username" name='username' value="<?php echo set_value('username');?>">
					</div>
				</div>
				
				</p>
				<?php echo form_error('username', '<p class="field_error">', '</p>');?>
				<p>
				
				<div class="form-group">
				  <label for="pwd">Password:</label>
					<div class="inner-addon left-addon">
						<i class="glyphicon glyphicon-lock"></i>
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name='password' value="<?php echo set_value('password');?>">
					</div>
				</div>
					
				</p>
				<?php echo form_error('password', '<p class="field_error">', '</p>');?>
				<p>
				
				 <div class="form-group">
				 <?php echo $image;?><br>
				  <label for="pwd">Security Code:</label>			 
					<input type='text' size='10' class="form-control" name='secutity_code' />
				</div>
				
				<p>
				<?php echo form_error('secutity_code', '<p class="field_error">', '</p>');?>
				</p>
				
			</div>
			<p><input type="submit" name="submit" class="btn btn-primary" value="Login"/> </p>
			</form>
		</div>	
		<div class="col-sm-4" style="text-align: center">
		<!--kosong-->
		</div>
	</div>
		
</div>
