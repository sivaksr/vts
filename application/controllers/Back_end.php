<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_end extends CI_Controller {

	
	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->model('Vehicles_model');
	
			if($this->session->userdata('vts_details'))
			{
			$userdetails=$this->session->userdata('vts_details');
			$data['user_details']=$this->Vehicles_model->get_user_details($userdetails['u_id']);
					//echo'<pre>';print_r($data);exit;	

			$this->load->view('html/header-1',$data);
			$this->load->view('html/script');
			
			}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		    }
	}
	
	
}
