
	<!-- View data -->
<div class="row">
<div class="col-xs-12 table-responsive">
	<?php if(isset($alert)){
				echo $alert;
			}
			?>
		  <table class="table table-bordered table-hover">
			<tr>
			  <th>No</th>
			  <th>Nama Jamaah</th>
			  <th>Produk</th>
			  <th>Harga</th>
			  <th>Status</th>
			  <th>Action</th>
			</tr>
			<?php if ($viewall_registrasi_user_id){
				$no=$no;
				foreach($viewall_registrasi_user_id as $data){
					$no++;
					$nama_produk=$this->produk->view_nama_produk_by_id($data->id_produk)->nama_produk;
					$status=$this->pembayaran->cek_pembayaran_id_register($data->id_register);
					if($status){
						$status=$status->keterangan;
						$konf='1';
					}else{
						$status='<p style="color:red;">Belum ada konfirmasi pembayaran</p>';
						$konf='0';
					}
					?>
					<tr>
			  <td><?php echo $no;?></td>
			  <td><?php echo $data->nama_jamaah; ?></td>
			  <td><?php echo $nama_produk; ?></td>
			  <td><?php echo 'Rp. '.number_format($data->harga_produk,0,'','.'); ?></td>
			  <td><?php echo $status; ?></td>
			  <td><a class="btn btn-primary" data-toggle="modal" data-target="#myModalview<?php echo $data->id;?>">
				<i class="fa fa-camera"></i> View
				</a>
				<?php if($konf=='1'){
					
				}else{
					?>					
					<a href="<?php echo $this->uri->baseUri;?>index.php/pembayaran/konfirmasi/<?php echo base64_encode($data->id_register);?>" class="btn btn-primary" >
					<i class="fa fa-pencil-square-o"></i> Konfirmasi Pembayaran
					</a>
					<?php
				}?>
				</td>
			</tr>
				
				<!-- Modal View-->
				<div class="modal fade bs-example-modal-lg" id="myModalview<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Detail data registrasi dengan id register : <?php echo $data->id_register;?></h4>
					  </div>
					  <div class="modal-body">
						<!--FORM View-->
						<form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="#">
						<div class="row" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">
						
						<div class="col-md-6">					
						<div class="form-group">
						  <label>Nama Produk:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo $nama_produk;?>" readonly>
						  </div>
						</div>				  
						</div>
						<?php if($data->potongan=='0'){
							?>
							<div class="col-md-6">					
						<div class="form-group">
						  <label>Harga:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo number_format($data->harga_produk,0,'','.');?>" readonly>
						  </div>
						</div>				  
						</div>
						
							<?php
						}else{
							?>
							<div class="col-md-3">					
							<div class="form-group">
							  <label>Harga:</label>
							  <div class="input-group col-xs-12" >
							  <input type="text" class="form-control" value="<?php echo number_format($data->harga_produk,0,'','.');?>" readonly>
							  </div>
							</div>				  
							</div>
							<div class="col-md-3">					
							<div class="form-group">
							  <label>Potongan:</label>
							  <div class="input-group col-xs-12" >
							  <input type="text" class="form-control" value="<?php echo number_format($data->potongan,0,'','.');?>" readonly>
							  </div>
							</div>				  
							</div>
							<?php
						}?>
						
						<div class="col-md-6">					
						<div class="form-group">
						  <label>Total Budget:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo number_format($data->biaya,0,'','.');?>" readonly>
						  </div>
						</div>				  
						</div>
						<div class="col-md-6">					
						<div class="form-group">
						  <label>Pembayaran awal yang harus dilakukan:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo number_format($data->pembayaran,0,'','.');?>" readonly>
						  </div>
						</div>				  
						</div>
						
						<div class="col-md-6">					
						<div class="form-group">
						  <label>Nama Jamaah:</label>
						  <div class="input-group col-xs-12" >
						  <input type="text" class="form-control" value="<?php echo $data->nama_jamaah;?>" readonly>
						  </div>
						</div>				  
						</div>
						<div class="col-md-6 ">					
						<div class="form-group">
						  <label>Alamat:</label>
						  <div class="input-group col-xs-12" >
						  <textarea name="alamat" class="form-control" rows="3" readonly><?php echo $data->alamat;?> </textarea>
						  </div><!-- /.input group -->
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
		<div class="box-footer clearfix">
		  <ul class="pagination pagination-sm no-margin pull-right">
			<?php if ($pageLinks): ?>
					
					<?php foreach ($pageLinks as $paging): ?>
						<?php echo '<li>'.$paging; ?></li>
						
					<?php endforeach; ?>
				
						<?php endif; ?>
		  </ul>
		</div>
  <!-- END View data -->
	</div>
</div>	
