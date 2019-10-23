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
	
	public function editpost()
	{
	if($this->session->userdata('vts_details'))
		{
		 $login_details=$this->session->userdata('vts_details');
	     $post=$this->input->post();	
			 $details=$this->Employees_model->get_employee_details($post['u_id']);
				if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
				unlink('assets/profile_pics/'.$details['profile_pic']);
				$temp = explode(".", $_FILES["profile_pic"]["name"]);
				$profile_pic = round(microtime(true)) . '.' . end($temp);
				$org_image=$_FILES["profile_pic"]["name"];
				move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/profile_pics/" . $image);
				}else{
				$profile_pic=$details['profile_pic'];
				$org_image=$details['org_image'];
				}
				$add=array(
				'name'=>isset($post['name'])?$post['name']:'',
				'email'=>isset($post['email'])?$post['email']:'',
				'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
				'address'=>isset($post['address'])?$post['address']:'',
				'region'=>isset($post['region'])?$post['region']:'',
				'profile_pic'=>isset($profile_pic)?$profile_pic:'',
				'org_image'=>isset($org_image)?$org_image:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>isset($admindetails['u_id'])?$admindetails['u_id']:''
				);
                $update=$this->Employees_model->update_employee_details($post['u_id'],$add);	
		       if(count($update)>0){
					$this->session->set_flashdata('success',"profile  successfully updated");	
					redirect('profile');	
					  }else{
						$this->session->set_flashdata('error',"technical problem occurred. Please try again");
						redirect('profile/edit/'.base64_encode($post['u_id']));
					  }    
					}else{
					$this->session->set_flashdata('error',"Please login to continue");
					redirect('');
				}
	}
	
	public function changepassword()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
				$this->load->view('html/change_password');
				$this->load->view('html/footer');

			
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	public function changepasswordpost(){
	 
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$post=$this->input->post();
			$admin_details = $this->Employees_model->get_employee_details($admindetails['u_id']);
			if($admin_details['password']== md5($post['oldpassword'])){
				if(md5($post['password'])== md5($post['confirmpassword'])){
						$updateuserdata=array(
						'password'=>md5($post['confirmpassword']),
						'org_password'=>$post['confirmpassword'],
						'updated_at'=>date('Y-m-d H:i:s'),
						);
						//echo '<pre>';print_r($updateuserdata);exit;
						$upddateuser = $this->Employees_model->update_employee_details($admindetails['u_id'],$updateuserdata);
						if(count($upddateuser)>0){
							$this->session->set_flashdata('success',"password successfully updated");
							redirect('profile');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('profile/changepassword');
						}
					
				}else{
					$this->session->set_flashdata('error',"Password and Confirm password are not matched");
					redirect('profile/changepassword');
				}
				
			}else{
				$this->session->set_flashdata('error',"Old password are not matched");
				redirect('profile/changepassword');
			}
				
			
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		} 
	 
	}
	
	
	
	
	
	
	
}
