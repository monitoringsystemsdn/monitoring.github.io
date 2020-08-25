<?php 

class loginmodel extends CI_Model{
	public function isvalidate($Email_ID,$Password){
		$q=$this->db->where(['Email_ID'=>$Email_ID,'Password'=>$Password])
					->get('patient');


				if($q->num_rows())
				{
					return $q->row()->Email_ID;
				}
				else{
					return False;
				}

	}

	public function userdata(){
		$Email_ID=$this->session->userdata('Email_ID');
		$q=$this->db->select()
				->from('patient')
				->where(['Email_ID'=>$Email_ID])
				->get();
				return $q->result();
				
	}
}




 ?>