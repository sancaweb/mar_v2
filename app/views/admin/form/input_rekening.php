<div class="row">
	<div class="col-md-12">
	  <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title">Input Data Rekening</h3>
		  <div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			
			<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		  </div>
		</div><!-- /.box-header -->
		<div class="box-body">
		  <form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_rekening/pro_input_rekening">
		  <div id="itemRows">
			<div class="row" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">
							
			<input type="hidden" name="pengulang[]" value="0">
			
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Nama Bank:</label>
			  <div class="input-group col-xs-12" >
			  <input name="nama_bank[]" type="text" class="form-control" value="" required>
			  </div>
			</div>				  
			</div>
			
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Nama Pemilik Rekening:</label>
			  <div class="input-group col-xs-12" >
			  <input name="nama_pemilik[]" type="text" class="form-control" value="" required>
			  </div>
			</div>				  
			</div>
			
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Nomer Rekening:</label>
			  <div class="input-group col-xs-12" >
			  <input name="norek[]" type="text" class="form-control" value="" required>
			  </div>
			</div>				  
			</div>
			
		  </div>
			</div> <!-- ItemRows -->
		  
		</div><!-- ./box-body -->
		<div class="box-footer">
		  <div class="row">			
			<div class="col-md-12 ">					
			<div class="form-group">
			  <div class="input-group col-xs-12" >
			  <a class="btn btn-success" id="add_item" ><i class="fa fa-plus"></i>&nbsp;Tambah Row</a>&nbsp;||&nbsp;
				<input type="submit" class="btn btn btn-primary" value="Input">
			  </div><!-- /.input group -->
			</div>					
			</div>
		</div> <!--- row -->
		</div><!-- /.box-footer -->
		</form>
	  </div><!-- /.box -->
	</div><!-- /.col -->
  </div>