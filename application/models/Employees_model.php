<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees_model extends CI_Model 

{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_vehicles_details($data){
	$this->db->insert('vehicles',$data);
	return $this->db->insert_id();
	}
	public function get_roles_list(){
	$this->db->select('roles.role_id,roles.role')->from('roles');
	$this->db->where('roles.status',1);
	$this->db->where('roles.role_id',2);
    return $this->db->get()->result_array();
	}
	public function get_roles_details(){
	$this->db->select('roles.role_id,roles.role')->from('roles');
	$this->db->where('roles.status',1);
	$this->db->where('roles.role_id!=',1);
	$this->db->where('roles.role_id!=',2);
    return $this->db->get()->result_array();
	}
	public function get_employees_list(){
	$this->db->select('users.*,roles.role,regions.region_name')->from('users');
	$this->db->join('roles','roles.role_id=users.role_id','left');
	$this->db->join('regions','regions.r_id=users.region','left');
	$this->db->where('users.status!=',2);
    return $this->db->get()->result_array();
	}
	public function get_employees_list_not_admin(){
	$this->db->select('users.*,roles.role,regions.region_name')->from('users');
	$this->db->join('roles','roles.role_id=users.role_id','left');
	$this->db->join('regions','regions.r_id=users.region','left');
	$this->db->where('users.status!=',2);
	$this->db->where('users.role_id!=',1);
    return $this->db->get()->result_array();
	}
	public function get_regions_list(){
	$this->db->select('regions.r_id,regions.region_name')->from('regions');
	$this->db->where('regions.status',1);
    return $this->db->get()->result_array();
	}
	public function get_employee_details($u_id){
	$this->db->select('users.*')->from('users');
	$this->db->where('users.u_id',$u_id);
    return $this->db->get()->row_array();
	}
	public function update_employee_details($u_id,$data){
	$this->db->where('u_id',$u_id);
	return $this->db->update('users',$data);
	}
	public function delete_employee_details($u_id){
	$this->db->where('u_id',$u_id);
	return $this->db->delete('users');
	}
	
	
	
	
	
  }