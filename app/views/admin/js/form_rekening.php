<script type="text/javascript">
	//color picker with addon
        $(".my-colorpicker").colorpicker();
		
		
		var rowNum = 0;
			
		$('#add_item').on( "click", function(e){
			e.preventDefault();
//			console.log( $( this ).text() );
			var i = ++rowNum;
			 $('#itemRows').append('<div class="row" id="rowNum'+i+'" style="border-bottom:2px solid #B8B8B8; border-top:2px solid #B8B8B8; margin-bottom:10px;border-bottom-right-radius: 15em 1em; border-bottom-left-radius: 1em 3em;border-top-left-radius: 1em 3em; border-top-right-radius: 1em 3em;">\
			 <input type="hidden" name="pengulang[]" value="'+i+'">\
			 <div class="col-md-6">\
				<div class="form-group">\
				  <label>Nama Bank:</label>\
				  <div class="input-group col-xs-12" >\
				  <input name="nama_bank[]" type="text" class="form-control" value="" required>\
				  </div>\
				</div>\
				</div>\
				<div class="col-md-6">\
				<div class="form-group">\
				  <label>Nama Pemilik Rekening:</label>\
				  <div class="input-group col-xs-12" >\
				  <input name="nama_pemilik[]" type="text" class="form-control" value="" required>\
				  </div>\
				</div>\
				</div>\
				<div class="col-md-6">\
				<div class="form-group">\
				  <label>Nomer Rekening:</label>\
				  <div class="input-group col-xs-12" >\
				  <input name="norek[]" type="text" class="form-control" value="" required>\
				  </div>\
				</div>\
				</div>\
			<div class="col-md-2">\
			<div class="form-group">\
			  <div class="input-group">\
				<a class="btn btn-app" onclick="removeRow('+i+');">\
					<i class="fa fa-minus"></i> Hapus\
				</a>\
			  </div>\
			</div>\
			</div></div>');
					
			$(".my-colorpicker"+i).colorpicker();
		});
		
		
		
		function removeRow(i) {
			jQuery('#rowNum'+i).remove();
		}
	</script>