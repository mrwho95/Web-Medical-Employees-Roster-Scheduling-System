<?php

/**
 * 
 */
class main_model extends CI_Model
{

	public function authen(){
		$userid = $this->ion_auth->get_user_id();
		$this->db->where('ID', $userid);
		$this->db->from('scheduler');
		$num = $this->db->count_all_results();

		return $num;
	}

	public function check_exist_scheduler($schedulerID){
		$this->db->where('SchedulerID', $schedulerID);
		// $this->db->where('Email', $email);
		$this->db->from('scheduler');
		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->result();
		}else{
			return $query->result();
		}
	}

	public function check_exist_admin($adminID){
		$this->db->where('AdminID', $adminID);
		// $this->db->where('Email', $email);
		$this->db->from('admin');
		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->result();
		}else{
			return $query->result();
		}
	}

	//This function for showing data from database
	// public function show_scheduler_details($schedulerID){
	// 	$this->db->where("SchedulerID", $schedulerID);
	// 	$query = $this->db->get("scheduler");
	// 	return $query->result();
	// }

	// //This function view data and link scheduler ID
	// public function get_scheduler_details_data(){
	// 	$query = $this->db->query("select * from scheduler");
	// 	return $query->result();
	// }


	// public function show_clinician_details($clinicianID){
	// 	$this->db->where("ClinicianID", $clinicianID);
	// 	$query = $this->db->get("clinician");
	// 	return $query->result();
	// }

	// public function get_clinician_details_data(){
	// 	$query = $this->db->query("select * from clinician");
	// 	return $query->result();
	// }
	
	function scheduler_insert($data){
		$this->db->insert("scheduler", $data);
		
	}



	function scheduler_can_login($schedulerID, $inputPassword)
	{
		$this->db->where('SchedulerID', $schedulerID);
		$this->db->where('Password', $inputPassword);
		$query = $this->db->get('scheduler');

		$login = $query->row();
		return $login;

		//SELECT * FROM scheduler WHERE userID = '$userID' AND password = '$password'

		// if ($query->num_rows() > 0) 
		// {
		// 	return true;
		// }else{
		// 	return false;
		// }
	}

	function admin_can_login($adminID, $inputpassword)
	{
		$this->db->where('AdminID', $adminID);
		$this->db->where('Password', $inputpassword);
		$query = $this->db->get('admin');

		//SELECT * FROM admin WHERE userID = '$userID' AND password = '$password'

		if ($query->num_rows() > 0) 
		{
			return true;
		}else{
			return false;
		}
	} 

	function fetch_admin_data($adminID){
    $this->db->where('AdminID', $adminID);
		$query = $this->db->get('admin');
		return $query->row();
	}

	function admin_insert($data){
		$this->db->insert("admin", $data);
		
	}

	function update_admin_profile($user_id, $data){
		$this->db->set($data);
		$this->db->where('AdminID', $user_id);
		$this->db->update('admin');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	function update_scheduler_profile($user_id, $data){
		$this->db->set($data);
		$this->db->where('SchedulerID', $user_id);
		$this->db->update('scheduler');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}


	public function fetch_scheduler_data($schedulerID){
		$this->db->where('SchedulerID', $schedulerID);
		$query = $this->db->get('scheduler');
		return $query->row();
  }

  public function fetch_calendar_data(){
  	$query = $this->db->get("roster");
  }


	public function fetch_roster_data(){
    $query = $this->db->get("roster");
    return $query;
  }
	
	





}

?>