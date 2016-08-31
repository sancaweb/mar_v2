<?php if(isset($alert)){
	echo $alert;
}?>
<?php $this->output('admin/form/input_rekening');?>

  <!-- View data -->
  <div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">List data Rekening Bank Perusahaan</h3>
		</div><!-- /.box-header -->
		<div class="box-body table-responsive">
		  <table class="table table-bordered table-hover">
			<tr>
			  <th >No</th>
			  <th >Nama Bank</th>
			  <th >Nama Pemilik</th>
			  <th >No. Rekening</th>
			  <th >Action</th>
			</tr>
			<?php if ($viewall_rekening){
				$no=0;
				foreach($viewall_rekening as $data){
					$no++;
					?>
			<tr>
			  <td><?php echo $no;?></td>
			  <td><?php echo $data->nama_bank; ?></td>
			  <td><?php echo $data->nama_pemilik; ?></td>
			  <td><?php echo $data->norek; ?></td>
			  <td><a class="btn btn-app" data-toggle="modal" data-target="#myModalview<?php echo $data->id;?>">
				<i class="fa fa-tv"></i> View
				</a><a class="btn btn-app" data-toggle="modal" data-target="#myModal<?php echo $data->id;?>">
				<i class="fa fa-edit"></i> Edit
				</a>				
				<a class="btn btn-app" data-toggle="modal" data-target="#myModalconfirm<?php echo $data->id;?>">
				<i class="fa fa-trash"></i> Hapus
				</a>
				</td>
			</tr>

				<!-- Modal Confirm -->
				<div class="modal fade" id="myModalconfirm<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog " role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Alert Hapus rekening</h4>
					  </div>
					  <div class="modal-body">
					<div class="callout callout-danger">
                    <h4>Menghapus data <?php echo $data->nama_bank.':'.$data->nama_pemilik;?></h4>
                    <p>Apakah anda yakin ingin menghapus data <strong><?php echo $data->nama_bank.':'.$data->nama_pemilik;?></strong> ?</p>
                  </div>					  
					  <div class="modal-footer">					
						<a href="<?php echo $this->uri->baseUri;?>index.php/adm_rekening/hapus_rekening/<?php echo base64_encode($data->id);?>" type="button" class="btn btn-danger">Hapus</a>	
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					  </div>
					  </div>
					</div>
				  </div>
				</div>
				 <!-- END Modal confirm -->
				
				<!-- Modal View-->
				<div class="modal fade bs-example-modal-lg" id="myModalview<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">View Data Rekening</h4>
					  </div>
					  <div class="modal-body">
						<!--FORM View-->
						<form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="#">
						<div class="row" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">
						<input type="hidden" name="id" value="<?php echo $data->id;?>">
						
						<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Bank:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo $data->nama_bank;?>" readonly>
						  </div>
						</div>				  
						</div>
						
						<div class="col-md-6">
						<div class="form-group">
						  <label>Nama Pemilik Rekening:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo $data->nama_pemilik;?>" readonly>
						  </div>
						</div>				  
						</div>
						
						<div class="col-md-6">
						<div class="form-group">
						  <label>Nomer Rekening:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo $data->norek;?>" readonly>
						  </div>
						</div>				  
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
						<h4 class="modal-title" id="myModalLabel">Edit Data Rekening</h4>
					  </div>
					  <div class="modal-body">
						<!--FORM Edit-->						
						<form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_rekening/pro_edit_rekening">
						<div class="row" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">
						<input type="hidden" name="id" value="<?php echo $data->id;?>">
						
						<div class="col-md-6">					
						<div class="form-group">
						  <label>Nama Bank:</label>
						  <div class="input-group col-xs-12" >
						  <input name="nama_bank" type="text" class="form-control" value="<?php echo $data->nama_bank;?>" required>
						  </div>
						</div>				  
						</div>
						
						<div class="col-md-6">					
						<div class="form-group">
						  <label>Nama Pemilik Rekening:</label>
						  <div class="input-group col-xs-12" >
						  <input name="nama_pemilik" type="text" class="form-control" value="<?php echo $data->nama_pemilik;?>" required>
						  </div>
						</div>				  
						</div>
						
						<div class="col-md-6">					
						<div class="form-group">
						  <label>Nomer Rekening:</label>
						  <div class="input-group col-xs-12" >
						  <input name="norek" type="text" class="form-control" value="<?php echo $data->norek;?>" required>
						  </div>
						</div>				  
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
		</div><!-- /.box-body -->
		<div class="box-footer clearfix">
		Jumlah Akun Rekening : <?php echo $total_rekening;?>
		</div>
	  </div><!-- /.box -->
	</div>
  </div>
  <!-- END View data -->