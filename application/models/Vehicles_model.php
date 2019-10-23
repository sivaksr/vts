<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicles_model extends CI_Model 

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
	public function get_vehicles_list(){
	$this->db->select('vehicles.*,users.name,regions.region_name')->from('vehicles');
   $this->db->join('users','users.u_id=vehicles.user_id','left');
   $this->db->join('regions','regions.r_id=vehicles.ps_region','left');
   $this->db->where('vehicles.status!=',2);
    return $this->db->get()->result_array();
	}
	public function get_user_details($u_id){
	$this->db->select('users.*,regions.region_name')->from('users');
    $this->db->join('regions','regions.r_id=users.region','left');	
	$this->db->where('users.u_id',$u_id);
	$this->db->where('users.status',1);
    return $this->db->get()->row_array();
	}
	public function get_vehicles_details($v_id){
	$this->db->select('vehicles.*')->from('vehicles');		
	$this->db->where('vehicles.v_id',$v_id);
    return $this->db->get()->row_array();
	}
	public function update_vehicles_details($v_id,$data){
	$this->db->where('v_id',$v_id);
	return $this->db->update('vehicles',$data);
	}
	public function delete_vehicles_details($v_id){
	$this->db->where('v_id',$v_id);
	return $this->db->delete('vehicles');
	}
	public  function check_vehicle_chasis_number_exist($vehicle_number,$chasis_number,$vehicle_type){
		$this->db->select('vehicle_number,chasis_number')->from('vehicles');
		$this->db->where('vehicle_number',$vehicle_number);
		$this->db->where('chasis_number',$chasis_number);
		$this->db->where('vehicles.vehicle_type',$vehicle_type);
		$this->db->where('status',1);
		return $this->db->get()->row_array();
	}
	public  function check_vehicle_number_exist($vehicle_number,$vehicle_type){
		$this->db->select('vehicle_number')->from('vehicles');
		$this->db->where('vehicle_number',$vehicle_number);
		$this->db->where('status',1);
		$this->db->where('vehicles.vehicle_type',$vehicle_type);
		return $this->db->get()->row_array();
	}
	public  function check_chasis_number_exist($chasis_number,$vehicle_type){
		$this->db->select('chasis_number')->from('vehicles');
		$this->db->where('chasis_number',$chasis_number);
		$this->db->where('status',1);
		$this->db->where('vehicles.vehicle_type',$vehicle_type);
		return $this->db->get()->row_array();
	}
	public function get_found_vehicles_list(){
	$this->db->select('vehicles.*,users.name')->from('vehicles');	
   $this->db->join('users','users.u_id=vehicles.user_id','left');	
	$this->db->where('vehicles.status',1);
	//$this->db->where('vehicles.user_id',$u_id);
	$this->db->where('vehicles.vehicle_type','Found Vehicle');
    return $this->db->get()->result_array();
	}
	public function get_lost_vehicles_list(){
	$this->db->select('vehicles.*,users.name')->from('vehicles');
   $this->db->join('users','users.u_id=vehicles.user_id','left');	
	$this->db->where('vehicles.status',1);
	//$this->db->where('vehicles.user_id',$u_id);
	$this->db->where('vehicles.vehicle_type','Lost Vehicle');
    return $this->db->get()->result_array();
	}
	/* contact details*/
	public function save_contact_details($data){
	$this->db->insert('contact',$data);
	return $this->db->insert_id();
	}
	public function get_contact_list($u_id){
	$this->db->select('users.*')->from('users');		
	$this->db->where('users.status',1);
	$this->db->where('users.u_id',$u_id);
    return $this->db->get()->row_array();
	}
	/* sloved vehicle list */
	public function get_sloved_vehicles_list(){
	$this->db->select('vehicles.*,users.name,regions.region_name')->from('vehicles');	
    $this->db->join('users','users.u_id=vehicles.user_id','left');
    $this->db->join('regions','regions.r_id=users.region','left');
	$this->db->where('vehicles.status',2);
    return $this->db->get()->result_array();
	}
	public function get_regionwise_vehicles_list($region){
	$this->db->select('vehicles.*,users.name,regions.region_name')->from('vehicles');	
    $this->db->join('users','users.u_id=vehicles.user_id','left');
    $this->db->join('regions','regions.r_id=users.region','left');
	$this->db->where('vehicles.status',1);
	$this->db->where('vehicles.ps_region',$region);
    return $this->db->get()->result_array();
	}
	
	
	
	
	
  }