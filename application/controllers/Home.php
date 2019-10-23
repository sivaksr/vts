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
		//echo '<pre>';print_r($post);exit;
		 $data['vehicles_list']=$this->Home_model->get_vehicles_list($post['vehicle_numbers']);
		//echo '<pre>';print_r($data);exit;
		 $this->load->view('html/search',$data);
	     }else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('');
		}
	}
	
	/*
	public function search()
	{	
		if(!$this->session->userdata('vts_details'))
		{	 
	     $this->load->view('html/header'); 
		 $this->load->view('html/search'); 
	     $this->load->view('html/footer'); 
	     }else{
			$this->session->set_flashdata('error',"technical problem occurred. please try again once");
			redirect('');
		}
	}
	
    public function search(){
			$post=$this->input->post();
		   	if(isset($post['vehicle_number']) && $post['vehicle_number']!=''){
           $vehicles_details=array('vehicle_number'=>$post['vehicle_number'],'chasis_number'=>$post['vehicle_number']);
			$vehicles_list=$this->Home_model->get_vehicles_list($vehicles_details);
			echo'<pre>';print_r($vehicles_list);exit;

				/*
				$totals=array_merge($vehicles_list);
				 if(isset($totals) && count($totals)>0){
					$requriment = array();

					foreach($totals as $el) {
					   $requried = $el['r_id'];
					   if(!in_array($requried, $requriment))
					   {
							$deta=$this->Home_model->get_requriement_details($requried);
							//echo'<pre>';print_r($deta);exit;

							if($el['r_id']!=''){
								$data[$el['r_id']]=$el;
								$data[$el['r_id']]['req_id']=$deta;
							}						  
							//echo $requried ;
						   array_push($requriment,$requried);
					   }
					}
					
					$lis['requriments_list']=$data;
					//echo'<pre>';print_r($data);exit;	
					
				
				}
				if(isset($lis) && count($lis)>0){
					$this->load->view('html/serach',$lis);
					$this->load->view('html/footer');
				}else{
					$this->session->set_flashdata('error',"Seach having no data. Please try again.");
					redirect('');
				}
				
				
		}else{
			$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
			redirect('');
		}
		
			

	}
*/


	

}
?>
