<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->library('user_agent');
		$this->load->library('session');
	    if($this->session->userdata('vts_details'))
			{
			$admindetails=$this->session->userdata('vts_details');
			}
	}

	public function index()
	{	
		if(!$this->session->userdata('vts_details'))
		{	 
	     $post=$this->input->post();
		if(isset($post['signup'])&& $post['signup']=='submit'){
		$data['vehicles_list']=$this->Home_model->get_vehicles_list($post['vehicle_numbers']);	
		 //echo'<pre>';print_r($data);exit;
		 $this->load->view('html/header'); 
		 $this->load->view('html/vehicle_data',$data); 
		 $this->load->view('html/script'); 
	     $this->load->view('html/footer'); 
		}else{
	     $this->load->view('html/header'); 
		 $this->load->view('html/index'); 
		 $this->load->view('html/script'); 
	     $this->load->view('html/footer'); 
		}
	     }else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('');
		}
	}
	
	public function serach()
	{	
		if(!$this->session->userdata('vts_details'))
		{	 
	     $post=$this->input->post();
		 $data['vehicles_list']=$this->Home_model->get_vehicles_list($post['vehicle_numbers']);
		//echo '<pre>';print_r($data);exit;
		 $this->load->view('html/search',$data);
	     }else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('');
		}
	}
	
	
	
	public function forgotpassword()
	{	
		if(!$this->session->userdata('vts_details'))
		{	 
	     $post=$this->input->post();
		 $this->load->view('html/header-2'); 
		 $this->load->view('html/forgot-password'); 
		 $this->load->view('html/script'); 
	     $this->load->view('html/footer'); 
	     }else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('');
		}
	}
	public function forgotpasswordpost(){
		if(!$this->session->userdata('vts_details'))
		{
		$post=$this->input->post();
		$check_email=$this->Home_model->check_email_already_exit($post['email']);
			if(count($check_email)>0){
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->to($check_email['email']);
				$this->email->from('vts@gmail.com', 'VTS'); 
				$this->email->subject('Forgot Password'); 
				$body = "<b> Your Account login Password is </b> : ".$check_email['org_password'];
				$this->email->message($body);
			    $this->email->send();
				$this->session->set_flashdata('success',"Password sent to your registered email address. Please Check your registered email address");
				redirect('');
				}else{
					$this->session->set_flashdata('error',"The email you entered is not a registered email. Please try again.");
					redirect('');
				}
			}else{
				$this->session->set_flashdata('error','technical problem occurred. please try again once');
				redirect('');	
			}

	}

}
?>
