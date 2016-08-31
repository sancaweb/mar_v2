<table class="table table-bordered table-hover">
<tr>
  <th>No</th>
  <th>ID Rekanan</th>
  <th>Nama Rekanan</th>
  <th>Jenis</th>
  <th>Alamat</th>
  <th>Action</th>
</tr>
<?php if ($viewall_rekanan){
	$no=0;
	foreach($viewall_rekanan as $data){
		$data_pengguna=$this->user->viewall_pengguna_by_user_id($data->user_id);
		$cek_id_rekanan=$this->voucher->view_id_rekanan_by_id_rekanan($data->id_rekanan);
		if($data_pengguna){	
			$alamat=$data_pengguna->alamat;
			$no_tlp=$data_pengguna->no_tlp;
			$email=$data_pengguna->email;
		}else{
			$alamat='Alamat belum ada';
			$no_tlp='No Telpon belum ada';
			$email='Email belum ada';
		}
		$no++;
		?>
		<tr>
  <td><?php echo $no;?></td>
  <td><?php echo $data->id_rekanan; ?></td>
  <td><?php echo $data->nama_rekanan; ?></td>
  <td><?php echo ucwords($data->jenis); ?></td>
  <td><?php echo $alamat; ?></td>
  <td><a class="btn btn-app" data-toggle="modal" data-target="#myModalview<?php echo $data->id;?>">
	<i class="fa fa-tv"></i> View
	</a><a class="btn btn-app" data-toggle="modal" data-target="#myModal<?php echo $data->id;?>">
	<i class="fa fa-edit"></i> Edit
	</a>
	
	<a class="btn btn-app" data-toggle="modal" data-target="#myModalconfirm<?php echo $data->id;?>">
	<i class="fa fa-trash"></i> Hapus
	</a>				</td>
</tr>

	<!-- Modal Confirm -->
	<div class="modal fade" id="myModalconfirm<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog " role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Alert Hapus Rekanan : <?php echo $data->id_rekanan;?></h4>
		  </div>
		  <div class="modal-body">
		  <?php if($cek_id_rekanan){
			  $clas="disabled";
			  ?>
			  <div class="callout callout-danger">
				<h4>Maaf anda tidak bisa menghapus data Rekanan dengan nama: <?php echo $data->nama_rekanan;?> dan ID: <strong><?php echo $data->id_rekanan;?></strong></h4>
				<p>Karena Rekanan tersebut memiliki voucher yang sudah di generate.?</p>
			  </div>
			  <?php
		  }else{
			  $class='';
			  ?>
			  <div class="callout callout-danger">
				<h4>Anda akan menghapus data <?php echo $data->nama_rekanan;?> dengan ID: <strong><?php echo $data->id_rekanan;?></strong></h4>
				<p>Apakah anda yakin ingin menghapus data <strong><?php echo $data->nama_rekanan;?></strong> dengan ID <strong><?php echo $data->id_rekanan;?></strong> ?</p>
			  </div>
			  <?php
		  }?>
		
		
		  <div class="modal-footer">					
			<a href="<?php echo $this->uri->baseUri;?>index.php/admin/rekanan/hapus_rekanan/<?php echo base64_encode($data->id);?>" type="button" class="btn btn-danger <?php echo $class;?>">Hapus</a>	
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		  </div>
		</div>
	  </div>
	</div>
	 <!--END Modal confirm -->
	
	<!-- Modal View-->
	<div class="modal fade bs-example-modal-lg" id="myModalview<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">View Rekanan. ID Rekanan : <?php echo $data->id_rekanan;?></h4>
		  </div>
		  <div class="modal-body">
			<!--FORM View-->
			<form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="#">
			<div class="row" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">
			<input type="hidden" name="id" value="<?php echo $data->id;?>">
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Nama rekanan:</label>
			  <div class="input-group col-xs-12" >
			  <input type="text" class="form-control" value="<?php echo $data->nama_rekanan;?>" readonly>
			  </div>
			</div>				  
			</div>
			<div class="col-md-6">					
			<div class="form-group">
			  <label>No Telpon / HP:</label>
			  <div class="input-group col-xs-12" >
			  <input type="text" class="form-control" value="<?php echo $no_tlp;?>" readonly>
			  </div>
			</div>				  
			</div>
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Email:</label>
			  <div class="input-group col-xs-12" >
			  <input type="text" class="form-control" value="<?php echo $email;?>" readonly>
			  </div>
			</div>				  
			</div>
			<div class="col-md-6 ">					
			<div class="form-group">
			  <label>Alamat:</label>
			  <div class="input-group col-xs-12" >
			  <textarea class="form-control" rows="3" readonly><?php echo $alamat;?> </textarea>
			  </div><!-- /.input group -->
			</div>					
			</div>
			<div class="col-md-6 ">					
			<div class="form-group">
			  <label>Warna rekanan (untuk keperluan report graph):</label>
			  
			  <div class="input-group my-colorpicker">
			  <input type="text" name="warna" value="<?php echo $data->warna;?>" class="form-control" readonly />
			</div>
			  </div><!-- /.input group -->
			</div>
			<div class="col-md-6 ">					
			<div class="form-group">
			  <label>Jenis</label>
			  
			  <div class="input-group">
			  <input type="text" value="<?php echo ucwords($data->jenis);?>" class="form-control" readonly />
			</div>
			  </div><!-- /.input group -->
			</div>
			</div>
			
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
			</form>
			<!-- end form View-->
		  </div>
		</div>
	  </div>
	</div>
	<!-- END Modal View-->
	
	<!-- Modal Edit-->
	<div class="modal fade bs-example-modal-lg" id="myModal<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Edit Rekanan</h4>
		  </div>
		  <div class="modal-body">
			<!--FORM Edit-->
			<?php if($cek_id_rekanan){
				?>							
			<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> PERHATIAN ...!</h4>
			<p>Jenis Rekanan tidak dapat dirubah karena sudah ada voucher yang sudah di generate untuk rekanan ini (<?php echo $data->id_rekanan;?>)</p>
			<p>Silahkan ganti Nama Rekanan, Alamat dan Warna Rekanan saja.</p>
			<p>Untuk Rincian Voucher, silahkan cek di <a href="<?php echo $this->uri->baseUri;?>index.php/adm_voucher">Halaman Voucher</a> dan cari voucher untuk ID Rekanan ini: <strong><?php echo $data->id_rekanan;?></strong></p>
			</div>
				<?php
			}?>
			
			<form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_rekanan/pro_edit_rekanan">
			<div class="row" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">
			<input type="hidden" name="id" value="<?php echo $data->id;?>">
			<input type="hidden" name="user_id" value="<?php echo $data->user_id;?>">
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Nama rekanan:</label>
			  <div class="input-group col-xs-12" >
			  <input name="rekanan" type="text" class="form-control" value="<?php echo $data->nama_rekanan;?>" required>
			  </div>
			</div>				  
			</div>						<div class="col-md-6">					
			<div class="form-group">
			  <label>No Telpon / HP:</label>
			  <div class="input-group col-xs-12" >
			  <input name="no_tlp" type="text" class="form-control" value="<?php echo $no_tlp;?>" required>
			  </div>
			</div>				  
			</div>
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Email:</label>
			  <div class="input-group col-xs-12" >
			  <input name="email" type="text" class="form-control" value="<?php echo $email;?>" required>
			  </div>
			</div>				  
			</div>

			<div class="col-md-6 ">					
			<div class="form-group">
			  <label>Alamat:</label>
			  <div class="input-group col-xs-12" >
			  <textarea name="alamat" class="form-control" rows="3" ><?php echo $alamat;?> </textarea>
			  </div><!-- /.input group -->
			</div>					
			</div>
			<div class="col-md-6 ">					
			<div class="form-group">
			  <label>Warna rekanan (untuk keperluan report graph):</label>
			  
			  <div class="input-group my-colorpicker">
			  <input type="text" name="warna" value="<?php echo $data->warna;?>" class="form-control" required/>                      
			  
			  <div class="input-group-addon">
				<i></i>
			  </div>
			</div>
			  </div><!-- /.input group -->
			</div>
			
				<div class="col-md-6 ">					
				<div class="form-group">
				  <label>Jenis:</label>
				  
				  <div class="input-group col-xs-12">
					<?php
						
						if($cek_id_rekanan){
							?>
							<input type="hidden" name="jenis" value="<?php echo $data->jenis;?>">
					<select class="form-control" disabled>
					<option value="umum" <?php if($data->jenis=='umum'){echo 'selected';}?>>Umum</option>
					<option value="rekanan" <?php if($data->jenis=='rekanan'){echo 'selected';}?>>Rekanan</option>								
					</select>
					<span id="helpBlock" class="help-block">Maaf jenis rekanan tidak dapat dirubah karena sudah ada voucher yang di generate.</span>
							<?php
						}else{
							?>
							
					<select name="jenis" class="form-control">
					<option value="umum" <?php if($data->jenis=='umum'){echo 'selected';}?>>Umum</option>
					<option value="rekanan" <?php if($data->jenis=='rekanan'){echo 'selected';}?>>Rekanan</option>								
					</select>
							<?php
						}
					?>
				</div>
				  </div><!-- /.input group -->
				</div>
			
			</div>
			
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" class="btn btn btn-primary" value="Save changes">
		  </div>
			</form>
			<!-- end form EDIT-->
		  </div>
		</div>
	  </div>
	</div>
	<!-- END Modal -->
		<?php
	}
}else{
	?>
	<tr>
  <td colspan="5">Data tidak ada</td>
</tr>
	
	<?php
}?>
</table>