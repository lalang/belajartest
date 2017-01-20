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
        <div class="box-body">

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
		        			<tr bgcolor="lightskyblue">
		        				<th>No</th>
								<th>Nama Group</th>	
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
								<td data-title="Nama Group"> <?php echo $data->nm_user_group; ?></td>	
								<td data-title="Rubah"><?php echo anchor('admin/editGroup/'.$data->id_user_group.'', '<button type="button" class="btn btn-default btn-sm"><span class=\'glyphicon glyphicon-pencil\'></span> Ubah</button>');?></td>
								<td data-title="Hapus"><?php 
								if($data->id_user_group=='1'){
								
									echo anchor('#', '<button type="button" class="btn btn-default btn-sm"><span class=\'glyphicon glyphicon-ban-circle\'></span> Hapus</button>', array('onclick' => "return false"));
								
								}else{
									
									echo anchor('admin/deleteGroup/'.$data->id_user_group.'', '<button type="button" class="btn btn-default btn-sm"><span class=\'glyphicon glyphicon-trash\'></span> Hapus</button>', array('onclick' => "return confirm('Anda yakin akan menghapus data ini?')"));
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
