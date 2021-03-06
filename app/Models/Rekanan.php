<?php
namespace Models;
use Resources, Models;


class Rekanan {
    // Data kas -------------------
    //panggil library model terlebih dahulu
    public function __construct() {
        $this->db = new Resources\Database();
		
    }
	public function viewall_nama_and_user_id(){
		return $this->db->results("SELECT nama_rekanan,user_id FROM rekanan order by nama_rekanan ASC");
	}
	
	public function input_rekanan($data_rekanan){
        return $this->db->insert('rekanan',$data_rekanan);
    }
	public function hitung_rekanan(){
		return $this->db->getVar("SELECT count(id) FROM rekanan");
	}
	
	public function viewall_rekanan(){
		return $this->db->results("SELECT * FROM rekanan ORDER BY id DESC");
	}
	public function viewall_rekanan_by_id($id_rekanan){
		return $this->db->row("SELECT * FROM rekanan WHERE id_rekanan='".$id_rekanan."'");
	}
	
	public function view_nama_rekanan_by_id($id_rekanan){
		return $this->db->row("SELECT nama_rekanan FROM rekanan WHERE id_rekanan='".$id_rekanan."'");
	}
		
	public function viewall_rekanan_page($page = 1, $limit = 5){
		$offset = ($limit * $page) - $limit;
		return $this->db->results("SELECT * FROM rekanan ORDER BY id DESC LIMIT $offset,$limit	");
	}
	public function edit_rekanan($data_rekanan,$id){
		return $this->db->update("rekanan",$data_rekanan,array('id'=>$id));
	}	
	
	public function hapus_rekanan($id){
		return $this->db->delete('rekanan', array('id' => $id));
	}
	
	public function jenis_rekanan($id_rekanan){
		return $this->db->row("SELECT jenis FROM rekanan WHERE id_rekanan='".$id_rekanan."'");
	}
	
	public function view_id_rekanan($user_id){
		return $this->db->row("SELECT id_rekanan FROM rekanan WHERE user_id='".$user_id."'");
	}
	
	public function view_by_date_id_rekanan($dari_tgl,$ke_tgl,$id_rekanan){
		return $this->db->row("SELECT * FROM rekanan WHERE id_rekanan='".$id_rekanan."' AND tgl_input BETWEEN '".$dari_tgl."' AND '".$ke_tgl."' ORDER BY id DESC");
	}
	
	public function view_by_date($dari_tgl,$ke_tgl){
		return $this->db->results("SELECT * FROM rekanan WHERE tgl_input BETWEEN '".$dari_tgl."' AND '".$ke_tgl."' ORDER BY id DESC");
	}
	
	
	public function search_rekanan($kata_kunci){
		return $this->db->results("
			SELECT rekanan.id,rekanan.nama_rekanan,rekanan.user_id,rekanan.jenis,rekanan.warna,rekanan.id_rekanan,
			pengguna.no_tlp,pengguna.email,pengguna.alamat,pengguna.user_id 
			FROM rekanan LEFT JOIN pengguna ON
			rekanan.user_id=pengguna.user_id WHERE 
			rekanan.nama_rekanan LIKE '%".$kata_kunci."%' OR
			rekanan.jenis LIKE '%".$kata_kunci."%' OR
			rekanan.id_rekanan LIKE '%".$kata_kunci."%' OR
			pengguna.no_tlp LIKE '%".$kata_kunci."%' OR
			pengguna.email LIKE '%".$kata_kunci."%' OR
			pengguna.alamat LIKE '%".$kata_kunci."%'
		");
	}
	
	public function search_rekanan_id_rekanan($id_rekanan,$kata_kunci){
		return $this->db->results("
			SELECT rekanan.id,rekanan.nama_rekanan,rekanan.user_id,rekanan.jenis,rekanan.warna,rekanan.id_rekanan,
			pengguna.no_tlp,pengguna.email,pengguna.alamat,pengguna.user_id 
			FROM rekanan LEFT JOIN pengguna ON
			rekanan.user_id=pengguna.user_id WHERE 
			rekanan.nama_rekanan LIKE '%".$kata_kunci."%' OR
			rekanan.jenis LIKE '%".$kata_kunci."%' OR
			rekanan.id_rekanan = '".$id_rekanan."' OR
			pengguna.no_tlp LIKE '%".$kata_kunci."%' OR
			pengguna.email LIKE '%".$kata_kunci."%' OR
			pengguna.alamat LIKE '%".$kata_kunci."%'
		");
	}
	
	
	
	
}