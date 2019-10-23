<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Contact extends Back_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->library('session');
		$this->load->model('Vehicles_model');
	}
	public function index()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$data['contact_list']=$this->Vehicles_model->get_contact_list($admindetails['u_id']);
			  //echo'<pre>';print_r($data);exit; 
			  $this->load->view('contact/contact',$data);
			  $this->load->view('html/footer');
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	public function contactpost()
	{
		if($this->session->userdata('vts_details'))
		{
			$admindetails=$this->session->userdata('vts_details');
			$post=$this->input->post(); 
			//echo'<pre>';print_r($post);exit; 
			if(isset($_FILES['document']['name']) && $_FILES['document']['name']!=''){
			$temp = explode(".", $_FILES["document"]["name"]);
			$documents = round(microtime(true)) . '.' . end($temp);
			move_uploaded_file($_FILES['document']['tmp_name'], "assets/documents/" . $documents);
			}else{
			$documents='';
			} 
			$addcontact=array(
			'user_id'=>isset($admindetails['u_id'])?$admindetails['u_id']:'',
			'name'=>isset($post['name'])?$post['name']:'',
			'phone_number'=>isset($post['phone_number'])?$post['phone_number']:'',
			'vehicle_number'=>isset($post['vehicle_number'])?$post['vehicle_number']:'',
			'chasis_number'=>isset($post['chasis_number'])?$post['chasis_number']:'',
			'form_police_station'=>isset($post['form_police_station'])?$post['form_police_station']:'',
			'to_police_station'=>isset($post['to_police_station'])?$post['to_police_station']:'',
			'msg'=>isset($post['msg'])?$post['msg']:'',
			'document'=>isset($documents)?$documents:'',
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>isset($admindetails['u_id'])?$admindetails['u_id']:'',
			);
			//echo'<pre>';print_r($addcontact);exit; 
			$save=$this->Vehicles_model->save_contact_details($addcontact); 
			if(count($save)>0){
			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
			$this->email->to($post['to_police_station']);
			$this->email->from($post['form_police_station']); 
			$this->email->subject('Contact Information');
            $document_path = $_FILES['document']['tmp_name'].'/'.$_FILES['document']['name'];			
			$body='Name:'.$post['name'].'<br> Phone Number :'.$post['phone_number'].'<br> Vehicle Number :'.$post['vehicle_number'].'<br>  Chasis Number :'.$post['chasis_number'].'<br>  Vehicle Number :'.$post['vehicle_number'].'<br>  Message :'.$post['msg'];
			$this->email->message($body);
			$lop=$this->email->attach($document_path);
			$this->email->send();
			$this->session->set_flashdata('success',"Your message sent sucessfully");
			redirect('contact');
			}else{
			$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
			redirect('contact');
			}
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		}
	}
	
	
	
	
	
	
}
