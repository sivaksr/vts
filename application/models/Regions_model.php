<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regions_model extends CI_Model 

{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function save_regions_details($data){
	$this->db->insert('regions',$data);
	return $this->db->insert_id();
	}
	public function get_regions_list(){
	$this->db->select('regions.*')->from('regions');
	$this->db->where('regions.status!=',2);
    return $this->db->get()->result_array();
	}
	public function get_regions_details($r_id){
	$this->db->select('regions.*')->from('regions');		
	$this->db->where('regions.r_id',$r_id);
    return $this->db->get()->row_array();
	}
	public function update_regions_details($r_id,$data){
	$this->db->where('r_id',$r_id);
	return $this->db->update('regions',$data);
	}
	public function delete_regions_details($r_id){
	$this->db->where('r_id',$r_id);
	return $this->db->delete('regions');
	}

	public  function check_region_already_exist($region_name){
		$this->db->select('region_name')->from('regions');
		$this->db->where('region_name',$region_name);
		$this->db->where('status',1);
		return $this->db->get()->row_array();
	}


	
	
	
  }