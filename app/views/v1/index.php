<?php $this->output(TEMPLATE.'header');?>
    <body>
	<!--
	<img alt="Fork me on GitHub" src="//sancaweb.com/beta_version.png" style="z-index:9999; position: absolute; top: 0pt; right: 0pt; border: 0pt none;">
        -->
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
<?php $this->output(TEMPLATE.'top_menu');?>

<!-- /.flexslider -->
	<?php if($page=='home'){
		 $this->output(TEMPLATE.'slider');
	}else{
		?>
		<div class="page-top" id="templatemo_header">
        </div>
		<?php
	}?>
        
        
        <?php
		$this->output(TEMPLATE.$konten);
			?>
			
        <?php $this->output(TEMPLATE.'partner');?> <!-- /.partner-list -->
		

        <div class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="<?php echo $this->uri->baseUri.STYLE;?>images/logo.png" alt="">
                            </a>
                        </div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="copyright">
                            <span>
                            	
                                Copyright &copy; <?php echo DATE('Y');?> <a href="<?php echo $this->uri->baseUri;?>">Mariumroh.com</a>
                            
                            
                            <!--
                            | Design: <a rel="nofollow" href="http://www.templatemo.com" target="_parent">templatemo</a>
                            -->
                            
                            </span>
                        </div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <ul class="social-icons">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                            <li><a href="#" class="fa fa-flickr"></a></li>
                            <li><a href="#" class="fa fa-rss"></a></li>
                        </ul>
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-footer -->

        <script src="<?php echo $this->uri->baseUri.STYLE;?>js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $this->uri->baseUri.STYLE;?>js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="<?php echo $this->uri->baseUri.STYLE;?>js/bootstrap.js"></script>
		
        <script src="<?php echo $this->uri->baseUri.STYLE;?>js/plugins.js"></script>
        <script src="<?php echo $this->uri->baseUri.STYLE;?>js/main.js"></script>
		<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>plugins/priceformat/jquery.price_format.min.js" type="text/javascript" ></script>
		<!-- lightbox -->
		<script src="<?php echo $this->uri->baseUri.STYLE;?>lightbox/js/lightbox.min.js" type="text/javascript"></script>	
	
		<script>
		$('#pembayaran').on('keyup', "input[id^='pembayaran']", function() {
		$("input[id^='pembayaran']").priceFormat({
			prefix: "",
			thousandsSeparator: ",",
			centsLimit: 0
		});
		});
		</script>
		<?php if(isset($page)){
			if($page=='inbox' || $page=='sentitems' || $page == 'contact'){
				?>
				<script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>dist/js/chosen.jquery.min.js" type="text/javascript"></script>
				  <script src="<?php echo $this->uri->baseUri.ADM_STYLE;?>dist/js/prism.js" type="text/javascript" charset="utf-8"></script>
				  <script type="text/javascript">
				  $("#dropdown-ajax").chosen({
					no_results_text: "Oops, nothing found!",
					width: "100%"
				  });
				  </script>
				<?php
			}
			
			if($page=='home'){
				$jumlah_produk=$this->produk->hitung_produk();
				for ($x = 1; $x <= $jumlah_produk; $x++) {
						?>
				
				<script>
				$('#pembayaran_awal<?php echo $x;?>').on('keyup', "input[id^='pembayaran_awal<?php echo $x;?>']", function() {
				$("input[id^='pembayaran_awal<?php echo $x;?>']").priceFormat({
					prefix: "",
					thousandsSeparator: ",",
					centsLimit: 0
				});
				});
				</script>
				<?php
				}
				
			}
		} //END ISSET $PAGE
		?>
    </body>
</html>