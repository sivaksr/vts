<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Profile extends Back_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Profile_model');
		$this->load->model('Employees_model');
	}
	public function index()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['user_details']=$this->Vehicles_model->get_user_details($admindetails['u_id']);

			  $this->load->view('html/profile',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	
	public function edit()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			  $data['user_details']=$this->Vehicles_model->get_user_details($admindetails['u_id']);
			   $data['regions_list']=$this->Employees_model->get_regions_list();
			  $this->load->view('html/edit-profile',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	
	
	
	
	
}
