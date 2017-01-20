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

		<?php 
		echo"
		<div class='title_field animated fadeInUp'>Data Login To Adminarea</div>
		<div class='value_field animated fadeInUp'>
			<form class='form-horizontal' action='$form_action' method='POST' role='form' name='submit'>
			<input type='hidden' name='id_user'"; if(isset($form_value["id_user"])){ echo"value='$form_value[id_user]'"; } echo">
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='username'>Group</label>
				<div class='col-sm-10'>
					<select class='form-control' id='id_user_group' name='id_user_group' placeholder='Enter username'>";
					
					$no = 1;
					foreach ($hasil as $data):
					if($data->id_user_group==$form_value[id_user_group]){
					echo"<option value='".$data->id_user_group."' selected>".$data->nm_user_group."</option>";
					}else{
					echo"<option value='".$data->id_user_group."'>".$data->nm_user_group."</option>";
					}
					$no++;
					endforeach;	
					
					echo"
					</select>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='username'>Username</label>
				<div class='col-sm-10'>
					<input class='form-control' id='username' type='text' name='username' "; 
		if(isset($form_value["username"])){ echo"value='$form_value[username]'"; } echo"required placeholder='Enter username'>
				</div>
			</div>
			<div class='form-group'>
				<label for='pwd' class='col-sm-2 control-label'>Password</label>
				<div class='col-sm-10'>
					<input type='password' class='form-control' id='pwd' name='pass_user'"; if(isset($form_value["pass_user"])){ echo"placeholder='Biarkan password kosong jika tidak ingin dirubah'"; }else{ echo"placeholder='Enter password'"; } echo">
				</div>
			</div>
			<div class='form-group form-group-sm'>
				<label class='col-sm-2 control-label' for='nama'>Nama</label>
				<div class='col-sm-10'>
					<input class='form-control' type='text' id='nama' name='nm_user' "; 
		if(isset($form_value["nm_user"])){ echo"value='$form_value[nm_user]'"; } echo"required placeholder='Enter nama'>
				</div>
			</div>
			<div class='form-group form-group-sm'>
				<label class='col-sm-2 control-label'>Email</label>
				<div class='col-sm-10'>
					<input class='form-control' type='email' name='email_user' "; 
		if(isset($form_value["email_user"])){ echo"value='$form_value[email_user]'"; } echo"required placeholder='Enter email'>
				</div>
			</div>
			<div class='form-group form-group-sm'>
				<label class='col-sm-2 control-label'>Handphone</label>
				<div class='col-sm-10'>
					<input class='form-control' type='text' name='hp_user' "; 
		if(isset($form_value["hp_user"])){ echo"value='$form_value[hp_user]'"; } echo"required placeholder='Enter handphone'>
				</div>
			</div>
			<div class='form-group'>
				<label class='col-sm-2 control-label' for='username'>Status</label>
				<div class='col-sm-10'>
					<select class='form-control' id='active_user' name='active_user'>";
					
					if(isset($form_value[active_user])){
					
						$status="$form_value[active_user]";
						
						if($status=="Y"){$selected="selected";}else{$selected2="selected";}
					}else{
					$selected="";
					$selected2="";
					}
					
					echo"<option value='Y' $selected>Aktif</option>";
					echo"<option value='N' $selected2>Tidak Aktif</option>";

					echo"
					</select>
				</div>
			</div>
		</div>
		";
		?>

		</div><!-- /.box-body -->
		<div class="box-footer">
            <?php echo"<input type='submit' class='btn btn-sm btn-primary' value='$nm_button_form' name='submit'> "; echo anchor($btn_data, $nm_button_form2,array('class' => 'btn btn-sm btn-primary')); echo"
			</form>"; ?>
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->     
  
