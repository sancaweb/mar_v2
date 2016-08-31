
		<div class="row">	
		<a class="btn btn-app btn-flat" data-toggle="modal" data-target="#myModalExcel">
		<i class="fa fa-file-excel-o"></i> Export To Excel
		</a>
				
		<a class="btn btn-app btn-flat" data-toggle="modal" data-target="#myModalSearch">
		<i class="fa fa-search"></i> Search
		</a>
		<?php if($page=='cari_voucher'){
			?>			
			<a href="<?php echo $this->uri->baseUri;?>index.php/adm_voucher" class="btn btn-app btn-flat" >
			<i class="fa fa-search"></i> View All Data
			</a>
			<?php
		}else{
			
		}?>
		
		</div>


<!-- Modal Search-->
<div class="modal fade" id="myModalSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Pencarian data Penerima Voucher</h4>
	  </div>
	  <div class="modal-body">
	  
		<form method="post" data-toggle="validator" enctype="multipart/form-data" role="form" action="<?php echo $this->uri->baseUri;?>index.php/adm_voucher/cari_voucher">
		 
		  <div class="form-group col-md-12">
			<input type="text" name="kata_kunci" class="form-control input-lg" placeholder="Kata Kunci" required>
		  </div>
		  
	  <div class="modal-footer">
		  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>Search</button>	  
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	  </div>
		</form>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Search -->

<!-- Modal Excel-->
<div class="modal fade" id="myModalExcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Export Data to Excel</h4>
	  </div>
	  <div class="modal-body">
	  <div class="row" >
		<div class="col-md-6">
		<a class="btn btn-app btn-flat" href="<?php echo $this->uri->baseUri;?>index.php/adm_excel/voucher">
		<i class="fa fa-file-excel-o"></i> Export All Data To Excel
		</a>
		</div>
		<div class="col-md-6">
		
		<div class="input-group">
		  <button class="btn btn-default pull-right" id="daterange-btn">
			<i class="fa fa-calendar"></i> Berdasarkan Rentang Waktu
			<i class="fa fa-caret-down"></i>
		  </button>
		</div>
		</div>
		</div>
		<hr>
		<div class="row">
		<div class="col-md-12">
		
		<form class="form-inline" method="post" data-toggle="validator" enctype="multipart/form-data" role="form" action="<?php echo $this->uri->baseUri;?>index.php/adm_excel/voucher">
		  
			  <div class="form-group">
				<label class="sr-only" for="dari_tgl">Dari</label>
				<input type="text" name="dari_tgl" class="form-control" id="dari_tgl" readonly>
			  </div>
			  <div class="form-group">
				<label class="sr-only" for="exampleInputPassword3">Ke</label>
				<input type="text" name="ke_tgl" class="form-control" id="ke_tgl" readonly>
			  </div>
			  <button type="submit" class="btn btn-default"><i class="fa fa-file-excel-o"></i> Export Now</button>
			</form>
		</div>
	  
		  
		
	  </div>
	  <div class="modal-footer">		   
		<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	  </div>
	</div>
  </div>
</div>
<!-- END Modal Excel -->