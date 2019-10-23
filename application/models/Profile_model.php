<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model 

{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	/* register */
	public function save_register_details($data){
	$this->db->insert('users',$data);
	return $this->db->insert_id();
	}
	
	
	
	
	
	
	
  }