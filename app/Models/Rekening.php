<?php
namespace Models;
use Resources, Models;


class Rekening {
    // Data kas -------------------
    //panggil library model terlebih dahulu
    public function __construct() {
        $this->db = new Resources\Database();
		
    }
	
	//awalnya di pengaturan, cek cdi controller yang lain
	public function input_rekening($data_rekening){
        return $this->db->insert('rekening',$data_rekening);
    }
	
	public function edit_rekening($data_rekening,$id){
		return $this->db->update('rekening',$data_rekening,array('id'=>$id));
	}
	
	public function viewall_rekening(){
		return $this->db->results("SELECT * FROM rekening ORDER BY id DESC");
	}
	
	public function rekening_by_id($id){
		return $this->db->row("SELECT * FROM rekening WHERE id='".$id."'");
	}
	
	public function hitung_rekening(){
		return $this->db->getVar("SELECT count(id) FROM rekening");
	}
	
}