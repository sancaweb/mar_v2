<?php
namespace Controllers;
use Resources, Libraries, Models;

class Adm_rekening extends Resources\Controller
{
    public function __construct(){
        
        parent::__construct();
		$this->session = new Resources\Session;
		$this->home = new Models\Home;
		$this->user = new Models\User;
		$this->pesan = new Models\Pesan;
		$this->request=new Resources\Request;
		$this->rekening=new Models\Rekening;
		$this->voucher=new Models\Voucher;
		$this->pembayaran=new Models\Pembayaran;
		$this->registrasi=new Models\Registrasi;
		$this->randomstring = new Libraries\Randomstring;
		$this->readmore = new Libraries\Readmore;		
		$this->rekanan=new Models\Rekanan;
    }
	
	public function index($page=1)
    {
		if($this->session->getValue('user_level')==1 || $this->session->getValue('user_level')==2){
        		
		$total_rekening=$this->rekening->hitung_rekening();
		$data['viewall_rekening']=$this->rekening->viewall_rekening();
		$data['total_rekening'] = $total_rekening;
		
		$data['title'] = 'Data Rekening';
		$data['subtitle']= 'List data Rekening';
		$data['konten']='admin/konten/rekening';
		$data['menu']='rekening';
		$data['page']='rekening';
		//Wajib for notif		
		$penerima=$this->session->getValue('user_id');
		$data['total_pesan_belum_terbaca']=$this->pesan->hitung_pesan_status_by_penerima($penerima);
		$data['loader_pesan']=$this->pesan->viewall_pesan_by_penerima($penerima);
		//END Wajib
        $this->output('admin/index', $data);
		}else{
			$this->redirect('login');
		}
    }
	
	public function pro_input_rekening()
    {
		if($this->session->getValue('user_level')==1 || $this->session->getValue('user_level')==2){
        if($_POST){
		$nama_bank=$this->request->post('nama_bank');
        $nama_pemilik=$this->request->post('nama_pemilik');
        $norek=$this->request->post('norek');
		$pengulang=$this->request->post('pengulang');
		
		
		$i=0;
		foreach($pengulang as $pengulang){
			
			//input rekening
			$data_rekening=array(
				'nama_bank'=>ucwords($nama_bank[$i]),
				'nama_pemilik'=>ucwords($nama_pemilik[$i]),
				'norek'=>$norek[$i],
				'tgl_input'=>date("Y-m-d"),					
			);
			
			$this->rekening->input_rekening($data_rekening);
			
			$i++;
		}
		
		$total_rekening=$this->rekening->hitung_rekening();
		$data['viewall_rekening']=$this->rekening->viewall_rekening();
		$data['total_rekening'] = $total_rekening;
		
		$data['title'] = 'Data Rekening';
		$data['subtitle']= 'List data Rekening';
		$data['konten']='admin/konten/rekening';
		$data['menu']='rekening';
		$data['page']='rekening';
		//Wajib for notif		
		$penerima=$this->session->getValue('user_id');
		$data['total_pesan_belum_terbaca']=$this->pesan->hitung_pesan_status_by_penerima($penerima);
		$data['loader_pesan']=$this->pesan->viewall_pesan_by_penerima($penerima);
		//END Wajib
        
		$data['alert']='
			<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>	<i class="icon fa fa-check"></i> Sukses..!</h4>
			Anda berhasil input Data Rekening.
			</div>
		';		

        $this->output('admin/index', $data);
		}else{
			$data['alert']='
			<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Error ...!</h4>
			<p>Halaman yang anda tuju tidak ada</p>
			</div>';
			$data['title'] = 'Error';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='error';
			$data['konten']='admin/konten/error';
			$penerima=$this->session->getValue('user_id');
			$data['total_pesan_belum_terbaca']=$this->pesan->hitung_pesan_status_by_penerima($penerima);
			$data['loader_pesan']=$this->pesan->viewall_pesan_by_penerima($penerima);
			$data['menu']='about';
			$this->output('admin/index', $data);
		}
		}else{
			$this->redirect('login');
		}
    }
	
	public function pro_edit_rekening()
    {
		if($this->session->getValue('user_level')==1 || $this->session->getValue('user_level')==2){
        if($_POST){
		$nama_bank=$this->request->post('nama_bank');
        $nama_pemilik=$this->request->post('nama_pemilik');
        $norek=$this->request->post('norek');
		$id=$this->request->post('id');
			//edit rekening
			$data_rekening=array(
				'nama_bank'=>ucwords($nama_bank),
				'nama_pemilik'=>ucwords($nama_pemilik),
				'norek'=>$norek,
				'tgl_input'=>date("Y-m-d"),					
			);
			
			$this->rekening->edit_rekening($data_rekening,$id);

		
		$total_rekening=$this->rekening->hitung_rekening();
		$data['viewall_rekening']=$this->rekening->viewall_rekening();
		$data['total_rekening'] = $total_rekening;
		
		$data['title'] = 'Data Rekening';
		$data['subtitle']= 'List data Rekening';
		$data['konten']='admin/konten/rekening';
		$data['menu']='rekening';
		$data['page']='rekening';
		//Wajib for notif		
		$penerima=$this->session->getValue('user_id');
		$data['total_pesan_belum_terbaca']=$this->pesan->hitung_pesan_status_by_penerima($penerima);
		$data['loader_pesan']=$this->pesan->viewall_pesan_by_penerima($penerima);
		//END Wajib
        
		$data['alert']='
			<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>	<i class="icon fa fa-check"></i> Sukses..!</h4>
			Anda berhasil Edit Data Rekening.
			</div>
		';		

        $this->output('admin/index', $data);
		}else{
			$data['alert']='
			<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-check"></i> Error ...!</h4>
			<p>Halaman yang anda tuju tidak ada</p>
			</div>';
			$data['title'] = 'Error';
			$data['subtitle']= 'Halaman utama';
			$data["page"]='error';
			$data['konten']='admin/konten/error';
			$penerima=$this->session->getValue('user_id');
			$data['total_pesan_belum_terbaca']=$this->pesan->hitung_pesan_status_by_penerima($penerima);
			$data['loader_pesan']=$this->pesan->viewall_pesan_by_penerima($penerima);
			$data['menu']='about';
			$this->output('admin/index', $data);
		}
		}else{
			$this->redirect('login');
		}
    }
	
	
	// public function hapus_rekening($id='')
    // {
		// if($id==''){
			// $data['alert']='
				// <div class="alert alert-danger alert-dismissable">
				// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				// <h4><i class="icon fa fa-check"></i> Error ...!1</h4>
				// Halaman yang anda tuju salah.		
				// </div>
				// <a href="'.$this->uri->baseUri.'index.php/admin/" type="button" class="btn btn-primary btn-lg btn-block">Back to Home</a>
				// ';
			
			// $this->output('admin/index', $data);
		// }else{
			// $id=base64_decode($id);
			// $this->rekening->hapus_rekening($id);
				
				// pagination //
				// $this->pagination = new Resources\Pagination();
				// $page = (int) $page;
				// $limit = 10;
				// $total_rekening=$this->rekening->hitung_rekening();
				
						
				// $data['viewall_rekening']=$this->rekening->viewall_rekening_page($page, $limit);
				// $data['total_rekening'] = $total_rekening;
				// $data['pageLinks'] = $this->pagination->setOption(
				// array(
					// 'limit' => $limit,
					// 'base' => $this->uri->baseUri.'index.php/admin/rekening/index/%#%/',
					// 'total' => $total_rekening,	
					// 'current' => $page,
					// )
							// )->getUrl(); 
				
				// $data['no'] = ($page * $this->pagination->limit) - $this->pagination->limit;
				// end pagination//
				
			// $data['title'] = 'Data rekening';
			// $data['subtitle']= 'List data rekening';
			// $data['konten']='admin/konten/rekening';
			// $data['menu']='rekening';
			// $data['page']='rekening';
			

			// $this->output('admin/index', $data);
		// }
		
    // }
}
