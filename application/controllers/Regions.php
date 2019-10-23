<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Regions extends Back_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Regions_model');
	}
	public function add()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			  $this->load->view('regions/add');
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	public function addpost()
	{
		if($this->session->userdata('vts_details'))
		{
		$admindetails=$this->session->userdata('vts_details');	
		$post=$this->input->post();	
        $checked=$this->Regions_model->check_region_already_exist($post['region_name']);
		if(count($checked)>0){
		$this->session->set_flashdata('error','ps region already exists. Please use another ps region');
		redirect('regions/add');
		}		
		$add=array(
		'region_name'=>isset($post['region_name'])?$post['region_name']:'',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'status'=>1,
		'created_by'=>isset($admindetails['u_id'])?$admindetails['u_id']:''
		);
		$save=$this->Regions_model->save_regions_details($add);	
		if(count($save)>0){
		$this->session->set_flashdata('success',"ps region successfully added");	
		redirect('regions/lists');	
		}else{
		$this->session->set_flashdata('error',"technical problem occurred. please try again once");
		redirect('regions/add');
		}  
		}else{
		$this->session->set_flashdata('error','Please login to continue');
		redirect('');
		}
	}
	public function lists()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['regions_list']=$this->Regions_model->get_regions_list();
			//echo'<pre>';print_r($data);exit;	
			  $this->load->view('regions/list',$data);
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
			$r_id=base64_decode($this->uri->segment(3));
		    $data['regions_details']=$this->Regions_model->get_regions_details($r_id);
			//echo'<pre>';print_r($data);exit;	
			  $this->load->view('regions/edit',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	public function editpost()
	{
		if($this->session->userdata('vts_details'))
		{
		$admindetails=$this->session->userdata('vts_details');	
		$post=$this->input->post();
		
       $detail=$this->Regions_model->get_regions_details($post['r_id']);
	  if($detail['region_name']!=$post['region_name']){
		$checked=$this->Regions_model->check_region_already_exist($post['region_name']);
		if(count($checked)>0){
		$this->session->set_flashdata('error','ps region already exists. Please use another ps region');
		redirect('regions/edit/'.base64_encode($post['r_id']));
		}
	  }
	
		$update_data=array(
		'region_name'=>isset($post['region_name'])?$post['region_name']:'',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'status'=>1,
		'created_by'=>isset($admindetails['u_id'])?$admindetails['u_id']:''
		);
		$update=$this->Regions_model->update_regions_details($post['r_id'],$update_data);	
		if(count($update)>0){
		$this->session->set_flashdata('success',"ps region successfully updated");	
		redirect('regions/lists');	
		}else{
		$this->session->set_flashdata('error',"technical problem occurred. please try again once");
		redirect('regions/edit/'.base64_encode($post['r_id']));
		}  
		}else{
		$this->session->set_flashdata('error','Please login to continue');
		redirect('');
		}
	}
	
	public function status()
	{
		if($this->session->userdata('vts_details'))
		{	
         $login_details=$this->session->userdata('vts_details');	
	             $r_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					
					if($r_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Regions_model->update_regions_details($r_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"ps region successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"ps region successfully  Activate.");
								}
								redirect('regions/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('regions/lists');
							}
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('regions/lists');
					}	
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
    }
	
	public function delete()
		{
if($this->session->userdata('vts_details'))
		{	
         $login_details=$this->session->userdata('vts_details');	
	             $r_id=base64_decode($this->uri->segment(3));
							$deletedata=$this->Regions_model->delete_regions_details($r_id);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"ps region successfully  deleted.");
								redirect('regions/lists');
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('regions/lists');
							}
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
    }
	
	
	
	
	
	
}
