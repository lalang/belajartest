<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">
				<?php echo anchor($btn_form, '<i class="fa fa-plus-circle"></i> '.$nm_btn_form, array('class'=>'btn btn-sm btn-info btn-flat pull-left'));?></div>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">test

		<!-- pesan flash message start -->
		<?php $flash_pesan = $this->session->flashdata('pesan')?>
		<?php if (! empty($flash_pesan)) : ?>			   
		<?php echo $flash_pesan; ?>
		<?php endif ?>
		<!-- pesan flash message end -->

		    <div class="row animated fadeInUp"  style='width: 100%; margin:0 auto;'>
		        <div id="no-more-tables">
		            <table class="table table-bordered table-striped table-responsive dataTables-example" width="100%">
						<thead>
		        			<tr>
		        				<th>No</th>
								<th>Photo</th>	
								<th>Group</th>	
		        				<th>Username</th>
		        				<th>Nama</th>
		        				<th>Email</th>
								<th>Handphone</th>
								<th>Aktif</th>
		        				<th>Ubah</th>
		        				<th>Hapus</th>
		        			</tr>
		        		</thead>
		        		<tbody>
						
							<?php
							$no = 1;
							foreach ($hasil as $data):
							?>
							<tr>
								<td data-title="No"> <?php echo $no; ?> </td>
								<td data-title="Photo"> 
									<?php if(!empty($data->photo_user)){?>
									<img src="<?php echo base_url('images/photo_user/'.$data->photo_user) ?>" width='80'/>		
									<?php }else{ ?>
									<img src='<?php echo base_url('images/general/empty_photo.png');?>' border='0' width='80'/>
									<?php }?>
								</td>
								<td data-title="Group"> <?php echo $data->nm_user_group; ?></td>	
								<td data-title="Username"> <?php echo $data->username; ?> </td>
								<td data-title="Nama"> <?php echo $data->nm_user; ?> </td>
								<td data-title="Email"> <?php echo $data->email_user; ?> </td>
								<td data-title="Handphone"> <?php echo $data->hp_user; ?> </td>
								<td data-title="Publish"> <?php if($data->active_user=="Y"){echo"Iya";}else{echo"Tidak";} ?> </td>
								<td data-title="Rubah"><?php echo anchor('admin/editUsers/'.$data->id_user.'', '<button type="button" class="btn btn-default btn-sm"><span class=\'glyphicon glyphicon-pencil\'></span> Ubah</button>');?></td>
								<td data-title="Hapus"><?php 
								if($data->id_user_group=='1'){
								
									echo anchor('#', '<button type="button" class="btn btn-default btn-sm"><span class=\'glyphicon glyphicon-ban-circle\'></span> Hapus</button>', array('onclick' => "return false"));
								
								}else{
									echo anchor('admin/deleteUsers/'.$data->id_user.'', '<button type="button" class="btn btn-default btn-sm"><span class=\'glyphicon glyphicon-trash\'></span> Hapus</button>', array('onclick' => "return confirm('Anda yakin akan menghapus data ini?')"));
								}?></td>
							</tr>
							<?php
							$no++;
							endforeach;
							?>
						
			
		        		</tbody>
		        	</table>
		        </div>
		    </div>
    
 		</div><!-- /.box-footer-->
    </div><!-- /.box -->
</section><!-- /.content -->
      
