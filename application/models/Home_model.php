<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model 

{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function get_user_details($u_id){
	$this->db->select('users.*')->from('users');		
	$this->db->where('users.u_id',$u_id);
	$this->db->where('users.status',1);
    return $this->db->get()->row_array();
	}
	/* register */
	public function save_register_details($data){
	$this->db->insert('users',$data);
	return $this->db->insert_id();
	}
	public function check_email_already_exit($email){
		$this->db->select('*')->from('users');
		$this->db->where('users.email',$email);
		$this->db->where('users.status',1);
		return $this->db->get()->row_array();
	 }
	/* login */
	public  function login_details($data){
		$this->db->select('*')->from('users');		
		$this->db->where('email', $data['email']);
		$this->db->where('password',$data['password']);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();
	}
	public  function get_admin_details($u_id){
		$this->db->select('*')->from('users');		
		$this->db->where('u_id',$u_id);
		$this->db->where('status',1);
        return $this->db->get()->row_array();
	}
	/* search */
	public function get_vehicles_list($vehicle_numbers){
	$this->db->select('vehicles.*')->from('vehicles');
	$this->db->where('vehicles.vehicle_number',$vehicle_numbers);
	$this->db->or_where('vehicles.chasis_number',$vehicle_numbers);
	$this->db->where('vehicles.status',1);
	return $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
  }