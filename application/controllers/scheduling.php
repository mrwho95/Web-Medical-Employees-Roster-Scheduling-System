<?php 


/**
 * 
 */
class scheduling extends CI_Controller
{

	function __construct(){
    parent::__construct();
    if (!$this->session->userdata('entrance')) 
    	{
      redirect('login/index');
    	}
	}
	
public function jobplanning()
	{
	$this->load->model('scheduling_model');
	$data["fetch_clinician_data"]=$this->scheduling_model->fetch_roster_data();
		$this->load->view('scheduler_jobplanning', $data);

	}

public function sessionexpired(){

    $this->load->view('session_expired');
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('login/index');
  }

// public function next_person(){
// 	$this->load->model('scheduling_model');
// 	$id = 2;
// 		$data["fetch_clinician_data"]=$this->scheduling_model->get_nextperson($id);

// 	return $this->load->view('scheduler_jobplanning', $data);
	
// 		// $data["fetch_clinician_data"]=$this->scheduling_model->get_nextperson($id);
// 	$this->session->set_flashdata('success_msg_next_person', 'Move to Next Person.');
// 	// $this->load->view('scheduler_jobplanning', $data);
// 	// return redirect('scheduling/jobplanning');
// 	}




public function update_duty_table(){
	$this->load->model('scheduling_model');
	$clinician_data = $this->scheduling_model->get_data($_POST["user_id"]);

foreach ($clinician_data->result() as $row) {
	$Morning = "Morning";
	$Afternoon = "Afternoon";
	$Night = "Night";
	$AM = "AM";
   	$PM = "PM";
   	$ND = "ND";
   	$Nurse = "Nurse";
   	$Doctor = "Doctor";

if ($row->Position == $Nurse) {
	if ($row->Shift_Preference == $Morning){
   	$num = rand(1,8);
   		if ($num == 1) {
   		$query1 ="insert into roster_plan value('$row->Name', '$row->Position', 'AM','AM','PM','PM','ND','ND','')";
   		$this->db->query($query1);
   		}elseif ($num == 2) {
   		$query2 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','AM','AM','PM','PM','ND')";
   		$this->db->query($query2);	
   		}elseif ($num == 3) {
   		$query3 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','ND','ND','','AM','AM','PM')";
   		$this->db->query($query3);
   		}elseif($num == 4){
   		$query4 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','PM','PM','ND','ND','','AM')";
   		$this->db->query($query4);
   		}elseif ($num == 5) {
   		$query5 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','AM','ND','ND','','PM','PM')";
   		$this->db->query($query5);
   		}elseif ($num == 6) {
   		$query6 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','AM','AM','ND','ND','')";
   		$this->db->query($query6);
   		}elseif ($num == 7) {
   		$query7 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','PM','PM','AM','AM','ND')";
   		$this->db->query($query7);
   		}elseif ($num == 8) {
   		$query8 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','ND','ND','','PM','PM','AM')";
   		$this->db->query($query8);
   		}
    	
   	}elseif($row->Shift_Preference == $Afternoon){
   	$num = rand(1,8);
   		if ($num == 1) {
   		$query1 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','ND','ND','','AM','AM')";
   		$this->db->query($query1);
   		}elseif ($num == 2) {
   		$query2 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','','PM','PM','ND','ND','AM')";
   		$this->db->query($query2);	
   		}elseif ($num == 3) {
   		$query3 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','AM','AM','PM','PM','ND')";
   		$this->db->query($query3);
   		}elseif($num == 4){
   		$query4 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','ND','ND','AM','AM','','PM')";
   		$this->db->query($query4);
   		}elseif ($num == 5) {
   		$query5 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','AM','AM','ND','ND','')";
   		$this->db->query($query5);
   		}elseif ($num == 6) {
   		$query6 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','PM','PM','AM','AM','ND')";
   		$this->db->query($query6);	
   		}elseif ($num == 7) {
   		$query7 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','ND','ND','','PM','PM','AM')";
   		$this->db->query($query7);
   		}elseif ($num == 8) {
   		$query8 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','AM','AM','ND','ND','','PM')";
   		$this->db->query($query8);
   		}

   	}elseif($row->Shift_Preference == $Night){
   	$num = rand(1,8);
   		if ($num == 1) {
   		$query1 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','ND','','AM','AM','PM','PM')";
   		$this->db->query($query1);
   		}elseif ($num == 2) {
   		$query2 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','ND','ND','','AM','AM')";
   		$this->db->query($query2);	
   		}elseif ($num == 3) {
   		$query3 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','AM','PM','PM','ND','ND','')";
   		$this->db->query($query3);
   		}elseif($num == 4){
   		$query4 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','AM','AM','PM','PM','ND')";
   		$this->db->query($query4);
   		}elseif ($num == 5) {
   		$query5 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','ND','','PM','PM','AM','AM')";
   		$this->db->query($query5);
   		}elseif ($num == 6) {
   		$query6 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','AM','ND','ND','','PM','PM')";
   		$this->db->query($query6);
   		}elseif ($num == 7) {
   		$query7 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','AM','AM','ND','ND','')";
   		$this->db->query($query7);
   		}elseif ($num == 8) {
   		$query8 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','PM','PM','AM','AM','ND')";
   		$this->db->query($query8);
   		}

   	}else{

   		echo "No Update Duty Roster";

   	}

   	if ($row->Medical_Leave == "Yes") {

   		echo "Yes";

   	}elseif($row->Medical_Leave == "No"){

   		echo "No";

   	}else{ 

   		echo "No Update to Duty Roster...";

   	}
}elseif($row->Position == $Doctor){
	if ($row->Shift_Preference == $Morning){
   	$num = rand(1,8);
   		if ($num == 1) {
   		$query1 ="insert into roster_plan value('$row->Name', '$row->Position', 'AM','AM','PM','PM','ND','ND','')";
   		$this->db->query($query1);
   		}elseif ($num == 2) {
   		$query2 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','AM','AM','PM','PM','ND')";
   		$this->db->query($query2);	
   		}elseif ($num == 3) {
   		$query3 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','ND','ND','','AM','AM','PM')";
   		$this->db->query($query3);
   		}elseif($num == 4){
   		$query4 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','PM','PM','ND','ND','','AM')";
   		$this->db->query($query4);
   		}elseif ($num == 5) {
   		$query5 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','AM','ND','ND','','PM','PM')";
   		$this->db->query($query5);
   		}elseif ($num == 6) {
   		$query6 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','AM','AM','ND','ND','')";
   		$this->db->query($query6);
   		}elseif ($num == 7) {
   		$query7 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','PM','PM','AM','AM','ND')";
   		$this->db->query($query7);
   		}elseif ($num == 8) {
   		$query8 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','ND','ND','','PM','PM','AM')";
   		$this->db->query($query8);
   		}
    	
   	}elseif($row->Shift_Preference == $Afternoon){
   	$num = rand(1,8);
   		if ($num == 1) {
   		$query1 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','ND','ND','','AM','AM')";
   		$this->db->query($query1);
   		}elseif ($num == 2) {
   		$query2 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','','PM','PM','ND','ND','AM')";
   		$this->db->query($query2);	
   		}elseif ($num == 3) {
   		$query3 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','AM','AM','PM','PM','ND')";
   		$this->db->query($query3);
   		}elseif($num == 4){
   		$query4 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','ND','ND','AM','AM','','PM')";
   		$this->db->query($query4);
   		}elseif ($num == 5) {
   		$query5 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','AM','AM','ND','ND','')";
   		$this->db->query($query5);
   		}elseif ($num == 6) {
   		$query6 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','PM','PM','AM','AM','ND')";
   		$this->db->query($query6);	
   		}elseif ($num == 7) {
   		$query7 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','ND','ND','','PM','PM','AM')";
   		$this->db->query($query7);
   		}elseif ($num == 8) {
   		$query8 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','AM','AM','ND','ND','','PM')";
   		$this->db->query($query8);
   		}

   	}elseif($row->Shift_Preference == $Night){
   	$num = rand(1,8);
   		if ($num == 1) {
   		$query1 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','ND','','AM','AM','PM','PM')";
   		$this->db->query($query1);
   		}elseif ($num == 2) {
   		$query2 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','ND','ND','','AM','AM')";
   		$this->db->query($query2);	
   		}elseif ($num == 3) {
   		$query3 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','AM','PM','PM','ND','ND','')";
   		$this->db->query($query3);
   		}elseif($num == 4){
   		$query4 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','AM','AM','PM','PM','ND')";
   		$this->db->query($query4);
   		}elseif ($num == 5) {
   		$query5 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','ND','','PM','PM','AM','AM')";
   		$this->db->query($query5);
   		}elseif ($num == 6) {
   		$query6 ="insert into roster_plan value('','$row->Name', '$row->Position', 'AM','AM','ND','ND','','PM','PM')";
   		$this->db->query($query6);
   		}elseif ($num == 7) {
   		$query7 ="insert into roster_plan value('','$row->Name', '$row->Position', 'PM','PM','AM','AM','ND','ND','')";
   		$this->db->query($query7);
   		}elseif ($num == 8) {
   		$query8 ="insert into roster_plan value('','$row->Name', '$row->Position', 'ND','','PM','PM','AM','AM','ND')";
   		$this->db->query($query8);
   		}

   	}else{

   		echo "No Update Duty Roster";

   	}

   	if ($row->Medical_Leave == "Yes") {

   		echo "Yes";

   	}elseif($row->Medical_Leave == "No"){

   		echo "No";

   	}else{ 

   		echo "No Update to Duty Roster...";

   	}
   	
	}


	}

	// $this->session->set_flashdata('success_msg_update_roster', 'Update Duty Table Successful.');
	// return redirect('scheduling/jobplanning');
}

	public function redo(){
	$this->load->model('scheduling_model');
	$this->scheduling_model->delete_last_row();

	$this->session->set_flashdata('success_msg_delete_last_row', 'Delete last row.');
	return redirect('scheduling/jobplanning');
	}

public function generate_duty_roster(){
	$this->load->model('scheduling_model');
	$this->scheduling_model->generate_roster_table();
	
	$this->scheduling_model->generate_new_notification_message();
	// $this->scheduling_model->auto_delete_notification();

	$to = "cV4SzvL6kvk:APA91bGkz_I6YT8b4Wf8N7w0Fkc8rDSMdFQnmjXEqJTp9cS-W3HMKV12mJnsWYphfv8iDeI1m-812e4PqRYF6Hnn2PVFhFvdOVPw1K6yS_xvQVv8DH7nTZfJbEb9NnW5ZAMRxMQLM_Ho";

	$data = array(
	'body' => 'New Duty Roster is published',
	'sound'	=> 'default'

	);

	$this->sendPushNotification($to, $data);

	$this->session->set_flashdata('success_msg_generate_roster', 'Generate New Duty Roster. New Duty Roster Notification is sent to Clinician!');
	return redirect('scheduling/jobplanning');	
	}

	public function sendPushNotification($to = '', $data = array()){
	$apiKey = 'AIzaSyA1G9X49txb5h32ish90HCyrwOCyX8tMfs';
	$fields = array('to' => $to , 'notification' => $data);

	$headers = array('Authorization: key='.$apiKey, 'Content-Type: application/json');
	$url = 'https://android.googleapis.com/gcm/send';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result, true);


}

public function clear_duty_roster(){
	$this->load->model('scheduling_model');
	$this->scheduling_model->delete_all_roster_data();
	$this->session->set_flashdata('success_msg_clear_content', 'Clear All Duty Roster Data.');
	return redirect('scheduling/jobplanning');

	}

	 public function fetch_clinician_data(){
    	$this->load->model("admin_model");  
           $fetch_clinician_data = $this->admin_model->make_clinician_datatables();  
           $data = array();  
           foreach($fetch_clinician_data as $row)
           {  
                $sub_array = array();  
                /*$sub_array[] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  */
                $sub_array[] = $row->Name;
                $sub_array[] = $row->ClinicianID;
                // $sub_array[] = $row->Gender;
                // $sub_array[] = $row->Age;
                $sub_array[] = $row->Phone_Number;
                // $sub_array[] = $row->Address;
                $sub_array[] = $row->Email; 
                $sub_array[] = $row->Position; 
                $sub_array[] = $row->Department;  
                $sub_array[] = $row->Hospital;   
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-info btn-xs update">Update</button>';  
                // $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal"=>$this->admin_model->get_all_clinician_data(),  
                "recordsFiltered"=>$this->admin_model->get_filtered_clinician_data(),  
                "data"=>$data  
           );  
           echo json_encode($output);  
      }  


}


?>