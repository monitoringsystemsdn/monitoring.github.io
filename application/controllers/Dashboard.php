<?php 
class Dashboard extends MY_Controller{
	public function index(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Email_ID','username','required');
		$this->form_validation->set_rules('Password','password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run()){
			$Email_ID=$this->input->post('Email_ID');
			$Password=$this->input->post('Password');
			$this->load->model('loginmodel');
			$Email_ID=$this->loginmodel->isvalidate($Email_ID,$Password);
			if($Email_ID){
				$this->load->library('session');
				$this->session->set_userdata('Email_ID',$Email_ID);
				return redirect('Dashboard/search');
				return redirect('Dashboard/welcome');
				return redirect('Dashboard/userdashboard');
				


			}
			else{
					$this->load->view('login');
				  echo '
                    <script>
                    alert("Username and Password not matched !");
                    window.location.href = "http://127.0.0.1/ci";
                    </script>
                    ';
                   //return redirect('');

                    
			}
		}
		else{
			$this->load->view('login');
		}
		
	}



	public function registration(){
		$this->load->view('registration');
	}

	public function previous(){
		$this->load->view('previous');
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('previous',['d'=>$d]);
	}
	

	public function userdashboard(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('user',['d'=>$d]);
	}

	public function search(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('search',['d'=>$d]);
	}
	public function bt(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('bt',['d'=>$d]);
	}
	public function spo2(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('spo2',['d'=>$d]);
	}
	public function bp(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('bp',['d'=>$d]);
	}
	public function calender(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('calender',['d'=>$d]);
	}
	
	public function welcome(){
	
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('dashboard',['d'=>$d]);

	}

}


 ?>