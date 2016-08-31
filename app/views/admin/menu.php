<ul class="sidebar-menu">
<?php
	$registrasi_terbaru=$this->registrasi->hitung_register_terbaru();
	$pembayaran_terbaru=$this->pembayaran->hitung_pembayaran_terbaru();
	$user_terbaru=$this->user->hitung_user_terbaru();
	
	$total_all=$registrasi_terbaru + $pembayaran_terbaru + $user_terbaru;
?>
            <li class="header">MAIN NAVIGATION</li>
			<?php if($this->session->getValue('user_level')==1 || $this->session->getValue('user_level')==2){?>
			<li <?php if($menu=='rekanan'){echo 'class="active"';}?>">
              <a href="<?php echo $this->uri->baseUri;?>index.php/adm_rekanan/">
                <i class="fa fa-user-secret"></i> <span>Rekanan</span> 
              </a>
            </li>
			<?php
			}
			?>
            <li class="treeview <?php if($menu=='voucher' || $menu=='generate_voucher' || $menu=='penerima_voucher'){echo 'active';}?>">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Voucher</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			  <?php 
				if($this->session->getValue('user_level')==1 || $this->session->getValue('user_level')==2){
			  ?>
				<li <?php if($menu=='generate_voucher'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_voucher/generate_voucher"><i class="fa fa-circle-o"></i> Generate Voucher</a></li>
                <?php
				}
				?>
				<li <?php if($menu=='voucher'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_voucher"><i class="fa fa-circle-o"></i> View Voucher</a></li>
                
                <li <?php if($menu=='penerima_voucher'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_voucher/penerima_voucher"><i class="fa fa-circle-o"></i> Penerima Voucher</a></li>
                
              </ul>
            </li>
			<?php 
				if($this->session->getValue('user_level')==1 || $this->session->getValue('user_level')==2){
			?>
            <li class="treeview <?php if($menu=='produk' || $menu=='kategori'){echo 'active';}?>">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Produk</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
			   <li <?php if($menu=='produk'){echo 'class="active"';}?>>
              <a href="<?php echo $this->uri->baseUri;?>index.php/adm_produk/">
                <i class="fa fa-list"></i> <span>List Produk</span> 
              </a>
				</li>
				<li <?php if($menu=='kategori'){echo 'class="active"';}?>>
				  <a href="<?php echo $this->uri->baseUri;?>index.php/adm_produk/kategori">
					<i class="fa fa-list"></i> <span>Kategori Produk</span> 
				  </a>
				</li>
              </ul>
            </li>
				<?php }?>
			
			<li class="treeview <?php if($menu=='register' || $menu=='pembayaran' ){echo 'active';}?>" >
              <a href="#">
                <i class="fa fa-share"></i> <span>Registrasi Umroh</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($menu=='register'){echo 'class="active"';}?>>
				<a href="<?php echo $this->uri->baseUri;?>index.php/adm_registrasi">
				<i class="fa fa-users"></i><span>Data Registrasi</span>
				<?php if($registrasi_terbaru > 0){
				?>
					<span class="label label-primary pull-right" title="<?php echo $user_terbaru;?> Registrasi Umroh terbaru"><?php echo $registrasi_terbaru;?></span>
					<?php
				}else{
					
				}
				?>
				</a>
				</li>
                <li <?php if($menu=='pembayaran'){echo 'class="active"';}?>>
				<a href="<?php echo $this->uri->baseUri;?>index.php/adm_pembayaran">
				<i class="fa fa-money"></i><span>Konfirmasi Pembayaran</span>
				<?php if($pembayaran_terbaru > 0){
				?>
					<span class="label label-primary pull-right" title="<?php echo $user_terbaru;?> Konfirmasi Pembayaran terbaru"><?php echo $pembayaran_terbaru;?></span>
					<?php
				}else{
					
				}
				?>
				</a>
				</li>
              </ul>
            </li>
			<?php 
				if($this->session->getValue('user_level')==1 || $this->session->getValue('user_level')==2){
			?>
			<li <?php if($menu=='pesan'){echo 'class="active"';}?>>
			<a href="<?php echo $this->uri->baseUri;?>index.php/adm_pesan"><i class="fa fa-envelope-o"></i>
			<span>Pesan</span>
			<?php if($total_pesan_belum_terbaca > 0){
				?>
					<span class="label label-primary pull-right"><?php echo $total_pesan_belum_terbaca;?></span>
				<?php
			}else{
				
			}
			?>
			
                
			</a>
			
			</li>
			
			<li class="header">WEB CONTENT</li>
			<li class="treeview <?php if($menu=='kabar' || $menu=='kategori_kabar'){echo 'active';}?>" >
              <a href="#">
                <i class="fa fa-file-text"></i> <span>Kabar</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($menu=='kabar'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_kabar"><i class="fa fa-file-text"></i>Tulis Kabar</a></li>
                <li <?php if($menu=='kategori_kabar'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_kabar/kategori"><i class="fa fa-money"></i>Kategori Kabar</a></li>
              </ul>
            </li>
			<li <?php if($menu=='gallery'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_gallery"><i class="fa fa-picture-o"></i><span>View Gallery</span></a></li>
					
			
			<li class="header">Pengaturan Website</li>
			<li class="treeview <?php if($menu=='about' || $menu=='kantor' || $menu=='rekening'){echo 'active';}?>" >
              <a href="#">
                <i class="fa fa-university"></i> <span>Info Perusahaan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($menu=='kantor'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_about/kantor"><i class="fa fa-university"></i>Data Kantor</a></li>
                <li <?php if($menu=='about'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_about"><i class="fa fa-car"></i>Profile</a></li>
                <li <?php if($menu=='rekening'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_rekening"><i class="fa fa-car"></i>Rekening Bank</a></li>
              </ul>
            </li>
			<li class="treeview <?php if($menu=='slide' || $menu=='header'){echo 'active';}?>" >
              <a href="#">
                <i class="fa fa-link"></i> <span>Pengaturan Style</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li <?php if($menu=='slide'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_pengaturan/slide"><i class="fa fa-list-alt"></i>Home Slider</a></li>
                <li <?php if($menu=='header'){echo 'class="active"';}?>><a href="<?php echo $this->uri->baseUri;?>index.php/adm_pengaturan/img_header"><i class="fa fa-header"></i>Header Image</a></li>
              </ul>
            </li>
			
			
			<li <?php if($menu=='partner'){echo 'class="active"';}?>>
			<a href="<?php echo $this->uri->baseUri;?>index.php/adm_pengaturan/partner">
			<i class="fa fa-usd"></i><span>Data Partner</span></a> 
			</li>
			
			<?php 
				}
			?>
			<li <?php if($menu=='user'){echo 'class="active"';}?>>
			<a href="<?php echo $this->uri->baseUri;?>index.php/adm_user">
			<i class="fa fa-user"></i><span>Data User</span>
			<?php if($user_terbaru > 0){
				?>
					<span class="label label-primary pull-right" title="<?php echo $user_terbaru;?> User terbaru"><?php echo $user_terbaru;?></span>
					<?php
				}else{
					
				}
				?>
			
			</a></li>
			
			
            
          </ul>