<?php 

class M_login extends CI_Model{	
	function __construct(){
		parent::__construct();						
		$this->load->library('session');
		$this->load->database();
	}
	
	function cek_login($username,$pass){	
		$this->db->where('id_pendaftaran',$username);
		$this->db->where('password',$pass);
		$query = $this->db->get('siswa');
		if($query->num_rows() > 0){
			$status = "success";
			$admin = $query->row_array();
			$_SESSION['id_pendaftaran'] = $admin['id_pendaftaran'];
		}else{
			$status = "error";
		}
		return $status;
	}
}