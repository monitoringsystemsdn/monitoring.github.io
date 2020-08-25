<?php 
class Users extends MY_Controller{
	
	public function doctor(){
		$this->load->view('doctor');
	}

	public function patient(){
		$this->load->view('patient');
	}

	
}



 ?>