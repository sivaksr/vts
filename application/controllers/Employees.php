<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Employees extends Back_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Employees_model');
		$this->load->model('Home_model');
	}
	public function adds()
	{	
		if($this->session->userdata('vts_details'))
		{	 
		$admindetails=$this->session->userdata('vts_details');
	     if($admindetails['role_id']==1){
		 $data['roles_list']=$this->Employees_model->get_roles_list();
		 $data['regions_list']=$this->Employees_model->get_regions_list();
	     $this->load->view('employees/add',$data); 
	     $this->load->view('html/footer'); 
	     }else if($admindetails['role_id']==2){
		$data['roles_list']=$this->Employees_model->get_roles_details();
		$data['regions_list']=$this->Employees_model->get_regions_list();
	     $this->load->view('employees/add',$data); 
	     $this->load->view('html/footer');  	 
		 }
		 }else{
		$this->session->set_flashdata('error','Please login to continue');
		redirect('');
		}
	}
    public function post()
	{	
		if($this->session->userdata('vts_details'))
		{	 
	   $admindetails=$this->session->userdata('vts_details');
		 $post=$this->input->post();	
		//echo'<pre>';print_r($post);exit;
		 $check=$this->Home_model->check_email_already_exit($post['email']);
		if(count($check)>0){
		$this->session->set_flashdata('error',"Email address already exists. Please another email address.");
		redirect('employees/adds');
		}	
		if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
		$temp = explode(".", $_FILES["profile_pic"]["name"]);
		$profile_pics = round(microtime(true)) . '.' . end($temp);
		move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/profile_pics/" . $profile_pics);
		}else{
		$profile_pics='';
		}
	    $save_data=array(
		'role_id'=>isset($post['role_id'])?$post['role_id']:'',
		'name'=>isset($post['name'])?$post['name']:'',
		'email'=>isset($post['email'])?$post['email']:'',
		'mobile_number'=>isset($post['mobile_number'])?$post['mobile_number']:'',
		'org_password'=>isset($post['org_password'])?$post['org_password']:'',
		'password'=>isset($post['password'])?md5($post['password']):'',
		'address'=>isset($post['address'])?$post['address']:'',
		'region'=>isset($post['region'])?$post['region']:'',
		'profile_pic'=>isset($profile_pics)?$profile_pics:'',
		'status'=>1,
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'created_by'=>isset($admindetails['u_id'])?$admindetails['u_id']:''
		 );
		$save=$this->Home_model->save_register_details($save_data);	
		if(count($save)>0){
		$this->session->set_flashdata('success',"employee details sucessfully added");	
		redirect('employees/all');	
		}else{
		$this->session->set_flashdata('error',"technical problem occurred. please try again once");
		redirect('employees/adds');
		}  
		 }else{
		$this->session->set_flashdata('error','Please login to continue');
		redirect('');
		}
	}
	public function all()
	{	
		if($this->session->userdata('vts_details'))
		{	 
		$admindetails=$this->session->userdata('vts_details');
	     if($admindetails['role_id']==1){
		 $data['employees_list']=$this->Employees_model->get_employees_list();
	     $this->load->view('employees/list',$data); 
	     $this->load->view('html/footer'); 
	     }else if($admindetails['role_id']==2){
		$data['employees_list']=$this->Employees_model->get_employees_list_not_admin();
	     $this->load->view('employees/list',$data); 
	     $this->load->view('html/footer');  	 
		 }
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
		$u_id=base64_decode($this->uri->segment(3));
	     if($admindetails['role_id']==2){
		 $data['employee_details']=$this->Employees_model->get_employee_details($u_id);
		 $data['regions_list']=$this->Employees_model->get_regions_list();
	     $this->load->view('employees/edit',$data); 
	     $this->load->view('html/footer');  	 
		 }else if($admindetails['role_id']==1){
		 $data['employee_details']=$this->Employees_model->get_employee_details($u_id);
		 $data['regions_list']=$this->Employees_model->get_regions_list();
	     $this->load->view('employees/edit',$data); 
	     $this->load->view('html/footer');  	 	 
		 }
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
					$this->session->set_flashdata('success',"employees details successfully updated");	
					redirect('employees/all');	
					  }else{
						$this->session->set_flashdata('error',"technical problem occurred. Please try again");
						redirect('employees/edit/'.base64_encode($post['u_id']));
					  }    
					}else{
					$this->session->set_flashdata('error',"Please login to continue");
					redirect('');
				}
	}
	public function status()
	{
		if($this->session->userdata('vts_details'))
		{	
         $login_details=$this->session->userdata('vts_details');	
	             $u_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$statu=0;
					}else{
						$statu=1;
					}
					
					if($u_id!=''){
						$stusdetails=array(
							'status'=>$statu,
							'updated_at'=>date('Y-m-d H:i:s')
							);
							$statusdata=$this->Employees_model->update_employee_details($u_id,$stusdetails);
							if(count($statusdata)>0){
								if($status==1){
								$this->session->set_flashdata('success',"employees details successfully  Deactivate.");
								}else{
									$this->session->set_flashdata('success',"employees details successfully  Activate.");
								}
								redirect('employees/all');
							}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('employees/all');
							}
						}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('employees/all');
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
	             $u_id=base64_decode($this->uri->segment(3));
							$deletedata=$this->Employees_model->delete_employee_details($u_id);
							if(count($deletedata)>0){
								$this->session->set_flashdata('success',"employees details successfully  deleted.");
								redirect('employees/all');
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('employees/all');
							}
	
        }else{
		 $this->session->set_flashdata('error',"Please login and continue");
		 redirect('');  
	   }
    }
	



	

}
?>
