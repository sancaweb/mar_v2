<!-- MODAL INPUT partner-->
<div class="modal fade bs-example-modal-lg" id="myModalinput" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Input Gallery</h4>
	  </div>
	  <div class="modal-body">
	  <form data-toggle="validator" enctype="multipart/form-data" role="form" method="POST" action="<?php echo $this->uri->baseUri;?>index.php/adm_pengaturan/input_partner">
		
		<div class="row" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">
			<div id="itemRows_partner">
			<div class="col-md-12">					
			<div class="form-group">
			  <label>Image:</label>
			  <div class="input-group col-xs-12" >
			  <input name="image" type="file" required>
			  </div>
			</div>				  
			</div>
			
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Nama Partner:</label>
			  <div class="input-group col-xs-12" >
			  <input name="nama_partner" type="text" class="form-control" required>
			  </div>
			</div>				  
			</div>
			
			<div class="col-md-6">					
			<div class="form-group">
			  <label>Url:</label>
			  <div class="input-group col-xs-12" >
			  <input name="url" type="text" placeholder="contoh: http://www.domain.com" class="form-control" required>
			  </div>
			</div>				  
			</div>
			
			
			</div>
			
		</div>
		
	  <div class="modal-footer">
	  
		<input type="submit" class="btn btn btn-primary" value="Submit">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	  </div>
		
		</form>
		
		
	  </div>
	</div>
  </div>
</div>
<!-- END Modal INPUT partner-->