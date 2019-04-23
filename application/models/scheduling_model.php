<?php


/**
 * 
 */
class scheduling_model extends CI_Model
{

	public function fetch_roster_data(){
    $query = $this->db->get("roster_plan");
    return $query;
  }

	public function delete_all_roster_data(){
		$this->db->empty_table('roster_plan');
		$this->db->empty_table('roster'); 
	}

	public function delete_last_row(){
		$last_row = $this->db->select("ID")->order_by('ID' , "desc")->limit(1)->get('roster_plan')->row();

		$this->db->where("ID", $last_row->ID);
		$this->db->delete('roster_plan');
		
	}


	// public function insert_duty_roster_data($data){
	// 	$query = $this->db->get('roster');
	// 	foreach ($query->result() as $row) {
 //      	$this->db->insert('task',$row);
	// 	}
	// 	// $this->db->insert('roster', $data);
	// }

		public function generate_roster_table(){
			$query = $this->db->select('Name, Position, MON, TUE, WED, THU, FRI, SAT, SUN')->from('roster_plan')->get();
			// $query = $this->db->get('roster');
			foreach ($query->result() as $row) 
			{
      			$this->db->insert('roster',$row);
			}
	}

	public function generate_new_notification_message(){
		$firstdate = date("d/m/Y", strtotime("Next Monday"));
		$lastdate = date("d/m/Y", strtotime("Next Monday + 6 days"));
		$query = "insert into notification value('','New Duty Roster','New Duty Roster from $firstdate to $lastdate. Please kindly check it.', CURRENT_TIMESTAMP , CURRENT_TIMESTAMP)";
		$this->db->query($query);
	}

	public function auto_delete_notification(){
		// $query = "delete from notification where date < DATE_SUB(NOW(), INTERVAL 1 DAY)";
		 $query = "DELETE FROM notification WHERE 'Timestamp' < DATE_SUB( NOW(), INTERVAL 1 DAY)";
		$this->db->query($query);
	}


	public function get_data($user_id){
		$this->db->where("ID", $user_id);
		$data = $this->db->select('Name, Position, Shift_Preference, Medical_Leave')->from('clinician')->get();

		return $data;

	}

	// public function get_nextperson($id){
	// 	$data = $this->db->query("select * from clinician where ID = $id + 1 ");
	
	// 	return $data;

	// 	// $query = $this->db->select('*')->from('clinician')->where('ID', $id)->get();
	// 	// return $query->result();
	// }

	public function test(){
		$data = $this->db->select('Name, Position, Shift_Preference, Medical_Leave')->from('clinician')->get();

		return $data;
	}



}



 ?>