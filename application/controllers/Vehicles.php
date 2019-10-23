<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Vehicles extends Back_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Vehicles_model');
		$this->load->model('Employees_model');
	}
	public function add()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['regions_list']=$this->Employees_model->get_regions_list();
			  $this->load->view('vehicles/add',$data);
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
		//echo'<pre>';print_r($post);exit;
		
		$check=$this->Vehicles_model->check_vehicle_chasis_number_exist($post['vehicle_number'],$post['chasis_number'],$post['vehicle_type']);
		if(count($check)>0){
		$this->session->set_flashdata('error','Both Vehicle Number and Chasis Number already exists. Please use another Vehicle Number and Chasis Number');
		redirect('vehicles/add');
		}
		$checks=$this->Vehicles_model->check_vehicle_number_exist($post['vehicle_number'],$post['vehicle_type']);
		if(count($checks)>0){
		$this->session->set_flashdata('error','Vehicle Number already exists. Please use another Vehicle Number');
		redirect('vehicles/add');
		}
        $checked=$this->Vehicles_model->check_chasis_number_exist($post['chasis_number'],$post['vehicle_type']);
		if(count($checked)>0){
		$this->session->set_flashdata('error','Chasis Number already exists. Please use another Chasis Number');
		redirect('vehicles/add');
		}	
        
		$add=array(
		'user_id'=>isset($admindetails['u_id'])?$admindetails['u_id']:'',
		'vehicle_number'=>isset($post['vehicle_number'])?$post['vehicle_number']:'',
		'owner_name'=>isset($post['owner_name'])?$post['owner_name']:'',
		'chasis_number'=>isset($post['chasis_number'])?$post['chasis_number']:'',
		'city'=>isset($post['city'])?$post['city']:'',
		'ps_region'=>isset($admindetails['region'])?$admindetails['region']:'',
		'vehicle_type'=>isset($post['vehicle_type'])?$post['vehicle_type']:'',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'status'=>1,
		'created_by'=>isset($admindetails['u_id'])?$admindetails['u_id']:''
		);
		$save=$this->Vehicles_model->save_vehicles_details($add);	
		if(count($save)>0){
		$this->session->set_flashdata('success',"vehicles details successfully added");	
		redirect('vehicles/lists');	
		}else{
		$this->session->set_flashdata('error',"technical problem occurred. please try again once");
		redirect('vehicles/add');
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
			$data['vehicles_list']=$this->Vehicles_model->get_vehicles_list();
		$data['user_details']=$this->Vehicles_model->get_user_details($admindetails['u_id']);
			//echo'<pre>';print_r($data);exit;	
			  $this->load->view('vehicles/list',$data);
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
			$v_id=base64_decode($this->uri->segment(3));
		    $data['vehicles_details']=$this->Vehicles_model->get_vehicles_details($v_id);
			//echo'<pre>';print_r($data);exit;	
			  $this->load->view('vehicles/edit',$data);
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
		
        $detail=$this->Vehicles_model->get_vehicles_details($post['v_id']);
		if($detail['vehicle_number']!=$post['vehicle_number'] || $detail['chasis_number']!=$post['chasis_number'] || $detail['vehicle_type']!=$post['vehicle_type']){
		$check=$this->Vehicles_model->check_vehicle_chasis_number_exist($post['vehicle_number'],$post['chasis_number'],$post['vehicle_type']);
		if(count($check)>0){
		$this->session->set_flashdata('error','Both Vehicle Number and Chasis Number already exists. Please use another Vehicle Number and Chasis Number');
		redirect('vehicles/edit/'.base64_encode($post['v_id']));
		}
	  }
      if($detail['vehicle_number']!=$post['vehicle_number'] || $detail['vehicle_type']!=$post['vehicle_type']){
		$checks=$this->Vehicles_model->check_vehicle_number_exist($post['vehicle_number'],$post['vehicle_type']);
		if(count($checks)>0){
		$this->session->set_flashdata('error','Vehicle Number already exists. Please use another Vehicle Number');
		redirect('vehicles/edit/'.base64_encode($post['v_id']));
		}
	  }
	  if($detail['chasis_number']!=$post['chasis_number'] || $detail['vehicle_type']!=$post['vehicle_type'] ){
		 $checked=$this->Vehicles_model->check_chasis_number_exist($post['chasis_number'],$post['vehicle_type']);
		if(count($checked)>0){
		$this->session->set_flashdata('error','Chasis Number already exists. Please use another Chasis Number');
		redirect('vehicles/edit/'.base64_encode($post['v_id']));
		}
	  }
	  
		$update_data=array(
		'user_id'=>isset($admindetails['u_id'])?$admindetails['u_id']:'',
		'vehicle_number'=>isset($post['vehicle_number'])?$post['vehicle_number']:'',
		'owner_name'=>isset($post['owner_name'])?$post['owner_name']:'',
		'chasis_number'=>isset($post['chasis_number'])?$post['chasis_number']:'',
		'city'=>isset($post['city'])?$post['city']:'',
		'ps_region'=>isset($admindetails['region'])?$admindetails['region']:'',
		'vehicle_type'=>isset($post['vehicle_type'])?$post['vehicle_type']:'',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'status'=>1,
		'created_by'=>isset($admindetails['u_id'])?$admindetails['u_id']:''
		);
		$update=$this->Vehicles_model->update_vehicles_details($post['v_id'],$update_data);	
		if(count($update)>0){
		$this->session->set_flashdata('success',"vehicles details successfully updated");	
		redirect('vehicles/lists');	
		}else{
		$this->session->set_flashdata('error',"technical problem occurred. please try again once");
		redirect('vehicles/edit/'.base64_encode($post['v_id']));
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
	             $v_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					
					if($v_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Vehicles_model->update_vehicles_details($v_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"vehicles details successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"vehicles details successfully  Activate.");
								}
								redirect('vehicles/lists');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('vehicles/lists');
							}
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('vehicles/lists');
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
	             $v_id=base64_decode($this->uri->segment(3));
							$deletedata=$this->Vehicles_model->delete_vehicles_details($v_id);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"vehicles details successfully  deleted.");
								redirect('vehicles/lists');
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('vehicles/lists');
							}
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
    }
	
	public function foundlist()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['found_vehicles_list']=$this->Vehicles_model->get_found_vehicles_list();
			  $this->load->view('vehicles/found_vehicles_list',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	public function lostlist()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['lost_vehicles_list']=$this->Vehicles_model->get_lost_vehicles_list();
			  $this->load->view('vehicles/lost_vehicles_list',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	
	public function alllist()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['vehicles_list']=$this->Vehicles_model->get_vehicles_list();
		$data['user_details']=$this->Vehicles_model->get_user_details($admindetails['u_id']);
			//echo'<pre>';print_r($data);exit;	
			  $this->load->view('vehicles/vehicles-alllist',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	public function sloved()
		{
if($this->session->userdata('vts_details'))
		{	
         $login_details=$this->session->userdata('vts_details');	
	             $v_id=base64_decode($this->uri->segment(3));
					if($status==2){
					}
					if($v_id!=''){
						$stusdetails=array(
							'status'=>2,
							'sloved_date'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Vehicles_model->update_vehicles_details($v_id,$stusdetails);
							if(count($statusdata)>0){
								$this->session->set_flashdata('success',"vehicles  successfully  sloved.");
								redirect('vehicles/solvedlist');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('vehicles/alllist');
							}
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('vehicles/alllist');
					}	
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
    }
	public function solvedlist()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['vehicles_list']=$this->Vehicles_model->get_sloved_vehicles_list();
			//echo'<pre>';print_r($data);exit;	
			  $this->load->view('vehicles/slove-vehicles-list',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	
	
	public function regionwiselist()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['vehicles_list']=$this->Vehicles_model->get_regionwise_vehicles_list($admindetails['region']);
			  				//echo'<pre>';print_r($data);exit;	
			  $this->load->view('vehicles/regionwise-vehicles-list',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	
	
	
	
	
}
