<?php 
class Graphs extends MY_Controller{
	
	public function bt(){
		$this->load->view('bt');
	}

	public function spo2(){
		$this->load->view('spo2');
	}

	
	public function bp(){
		$this->load->view('bp');
	}
}



 ?>