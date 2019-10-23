<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
		public function __construct() 
		{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$this->load->model('Home_model');
	
		}
	public function loginpost()
	{
		if(!$this->session->userdata('vts_details'))
		{
			$post=$this->input->post();
			$login_data=array('email'=>$post['email'],'password'=>md5($post['password']));
			$check_login=$this->Home_model->login_details($login_data);
			if(count($check_login)>0){
				$login_details=$this->Home_model->get_admin_details($check_login['u_id']);
				if($login_details['role_id']==3){
				$this->session->set_userdata('vts_details',$login_details);
				redirect('vehicles/add');
				}else{
				$this->session->set_userdata('vts_details',$login_details);
				redirect('employees/adds');	
				}
			}else{
				$this->session->set_flashdata('error',"Invalid Email Address or Password!");
				redirect('');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('');
		}
	}
	public  function logout(){
		$admindetails=$this->session->userdata('vts_details');
		$userinfo = $this->session->userdata('vts_details');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('vts_details');
		$this->session->unset_userdata('vts_details');
        redirect('');
	}
	
	
	
	
	
	
	
	
}
