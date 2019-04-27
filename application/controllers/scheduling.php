<?php 

require_once './vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

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
	// $this->load->model('scheduling_model');
	// $data["fetch_clinician_data"]=$this->scheduling_model->fetch_roster_data();

     $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $database = $firebase->getDatabase();

    $reference = $database->getReference('/duty_table');
    // $total_user = $reference->getSnapshot()->numChildren();
      $data["fetch_clinician_data"] = $reference->getSnapshot()->getValue();
      $data["total_duty_user"]= $reference->getSnapshot()->numChildren();
  


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


	// $this->load->model('scheduling_model');
	$clinician_data = $_POST["user_id"];
  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $database = $firebase->getDatabase();

    $reference = $database->getReference();

    $user_name = $database->getReference('/Users/'.$clinician_data.'/userFullName')->getSnapshot()->getValue();
    $position = $database->getReference('/Users/'.$clinician_data.'/userPosition')->getSnapshot()->getValue();   
    $Shift_Preference = $database->getReference('/Shift/Shift Preference/'.$clinician_data)->getSnapshot()->getValue();

// foreach ($clinician_data->result() as $row) {
	$Morning = "Morning";
	$Afternoon = "Afternoon";
	$Night = "Night";
	$AM = "AM";
  $PM = "PM";
  $ND = "ND";
  $Nurse = "Nurse";
	$Doctor = "Doctor";

  if ($position == $Nurse || "nurse") {
    if ($Shift_Preference == $Morning) {
      $num = rand(1,7);
      if ($num == 1) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "AM",'WED' => "AM",'THU' => "PM",'FRI' =>"ND",'SAT' =>"ND",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 2) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "AM",'WED' => "AM",'THU' => "AM",'FRI' =>"PM",'SAT' =>"ND",'SUN' =>"ND",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 3) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "",'WED' => "AM",'THU' => "AM",'FRI' =>"AM",'SAT' =>"PM",'SUN' =>"ND",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 4) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "ND",'WED' => "",'THU' => "AM",'FRI' =>"AM",'SAT' =>"AM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 5) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "ND",'WED' => "ND",'THU' => "",'FRI' =>"AM",'SAT' =>"AM",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 6) {
         $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "PM",'WED' => "ND",'THU' => "ND",'FRI' =>"",'SAT' =>"AM",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 7) {
         $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "AM",'WED' => "PM",'THU' => "ND",'FRI' =>"ND",'SAT' =>"",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }
    }elseif ($Shift_Preference == $Afternoon) {
      $num = rand(1,7);
      if ($num == 1) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "PM",'WED' => "PM",'THU' => "AM",'FRI' =>"ND",'SAT' =>"ND",'SUN' =>"",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 2) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "PM",'WED' => "PM",'THU' => "PM",'FRI' =>"AM",'SAT' =>"ND",'SUN' =>"ND",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 3) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "",'WED' => "PM",'THU' => "PM",'FRI' =>"PM",'SAT' =>"AM",'SUN' =>"ND",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 4) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "ND",'WED' => "",'THU' => "PM",'FRI' =>"PM",'SAT' =>"PM",'SUN' =>"AM",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 5) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "ND",'WED' => "ND",'THU' => "",'FRI' =>"PM",'SAT' =>"PM",'SUN' =>"PM",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 6) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "AM",'WED' => "ND",'THU' => "ND",'FRI' =>"",'SAT' =>"PM",'SUN' =>"PM",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 7) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "PM",'WED' => "AM",'THU' => "ND",'FRI' =>"ND",'SAT' =>"",'SUN' =>"PM",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }
    }elseif ($Shift_Preference == $Night) {
      $num = rand(1,7);
      if ($num == 1) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "ND",'WED' => "",'THU' => "ND",'FRI' =>"AM",'SAT' =>"PM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 2) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "ND",'WED' => "ND",'THU' => "",'FRI' =>"ND",'SAT' =>"AM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 3) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "PM",'WED' => "ND",'THU' => "ND",'FRI' =>"",'SAT' =>"ND",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 4) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "PM",'WED' => "PM",'THU' => "ND",'FRI' =>"ND",'SAT' =>"",'SUN' =>"ND",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 5) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "AM",'WED' => "PM",'THU' => "PM",'FRI' =>"ND",'SAT' =>"ND",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 6) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "ND",'WED' => "AM",'THU' => "PM",'FRI' =>"PM",'SAT' =>"ND",'SUN' =>"ND",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 7) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "",'WED' => "ND",'THU' => "AM",'FRI' =>"PM",'SAT' =>"PM",'SUN' =>"ND",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }
    }elseif ($Shift_Preference == null) {
      $num = rand(1,7);
      if ($num == 1) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "AM",'WED' => "PM",'THU' => "PM",'FRI' =>"ND",'SAT' =>"ND",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 2) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "AM",'WED' => "AM",'THU' => "PM",'FRI' =>"PM",'SAT' =>"ND",'SUN' =>"ND",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 3) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "",'WED' => "AM",'THU' => "AM",'FRI' =>"PM",'SAT' =>"PM",'SUN' =>"ND",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 4) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND",'TUE' => "ND",'WED' => "",'THU' => "AM",'FRI' =>"AM",'SAT' =>"PM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 5) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "ND",'WED' => "ND",'THU' => "",'FRI' =>"AM",'SAT' =>"AM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 6) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "PM",'WED' => "ND",'THU' => "ND",'FRI' =>"",'SAT' =>"AM",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }elseif ($num == 7) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "PM",'WED' => "PM",'THU' => "ND",'FRI' =>"ND",'SAT' =>"",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
      }
    }
  }
  if ($position == $Doctor || "doctor") {
      if ($Shift_Preference == $Morning) {
        $num = rand(1,7);
        if ($num == 1) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "AM",'WED' => "AM",'THU' => "PM",'FRI' =>"",'SAT' =>"OC",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 2) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "AM",'WED' => "AM",'THU' => "AM",'FRI' =>"PM",'SAT' =>"",'SUN' =>"OC",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 3) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"OC",'TUE' => "",'WED' => "AM",'THU' => "AM",'FRI' =>"AM",'SAT' =>"PM",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 4) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "OC",'WED' => "",'THU' => "AM",'FRI' =>"AM",'SAT' =>"AM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 5) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "",'WED' => "OC",'THU' => "",'FRI' =>"AM",'SAT' =>"AM",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 6) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "PM",'WED' => "",'THU' => "OC",'FRI' =>"",'SAT' =>"AM",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 7) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "AM",'WED' => "PM",'THU' => "",'FRI' =>"OC",'SAT' =>"",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }
      }elseif ($Shift_Preference == $Afternoon) {
        $num = rand(1,7);
        if ($num == 1) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "PM",'WED' => "",'THU' => "OC",'FRI' =>"",'SAT' =>"",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 2) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "PM",'WED' => "PM",'THU' => "",'FRI' =>"OC",'SAT' =>"",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 3) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "AM",'WED' => "PM",'THU' => "PM",'FRI' =>"",'SAT' =>"OC",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 4) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "",'WED' => "AM",'THU' => "PM",'FRI' =>"PM",'SAT' =>"",'SUN' =>"OC",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 5) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"OC",'TUE' => "",'WED' => "",'THU' => "AM",'FRI' =>"PM",'SAT' =>"PM",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 6) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "OC",'WED' => "",'THU' => "",'FRI' =>"AM",'SAT' =>"PM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 7) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "",'WED' => "OC",'THU' => "",'FRI' =>"",'SAT' =>"AM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }
      }elseif ($Shift_Preference == null) {
       $num = rand(1,7);
        if ($num == 1) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "AM",'WED' => "PM",'THU' => "PM",'FRI' =>"",'SAT' =>"OC",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 2) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "AM",'WED' => "AM",'THU' => "PM",'FRI' =>"PM",'SAT' =>"",'SUN' =>"OC",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 3) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"OC",'TUE' => "",'WED' => "AM",'THU' => "AM",'FRI' =>"PM",'SAT' =>"PM",'SUN' =>"",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 4) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"",'TUE' => "OC",'WED' => "",'THU' => "AM",'FRI' =>"AM",'SAT' =>"PM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 5) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "",'WED' => "OC",'THU' => "",'FRI' =>"AM",'SAT' =>"AM",'SUN' =>"PM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 6) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM",'TUE' => "PM",'WED' => "",'THU' => "OC",'FRI' =>"",'SAT' =>"AM",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }elseif ($num == 7) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM",'TUE' => "PM",'WED' => "PM",'THU' => "",'FRI' =>"OC",'SAT' =>"",'SUN' =>"AM",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
        }
      }
    }
  
}

	public function delete_row(){
	// $this->load->model('scheduling_model');
	// $this->scheduling_model->delete_last_row();
    $user_id = $this->input->post('Delete');

   

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $database = $firebase->getDatabase();

    $reference = $database->getReference('duty_table/'.$user_id);
    $reference->remove();

	$this->session->set_flashdata('success_msg_delete_last_row', 'Delete Successful.');
	return redirect('scheduling/jobplanning');
	}

public function generate_duty_roster(){
	// $this->load->model('scheduling_model');
	// $this->scheduling_model->generate_roster_table();
	
	// $this->scheduling_model->generate_new_notification_message();
	// $this->scheduling_model->auto_delete_notification();

  $firstdate = date("d/m/Y", strtotime("Next Monday"));
  $lastdate = date("d/m/Y", strtotime("Next Monday + 6 days"));
  $date = $firstdate." - ".$lastdate;

   $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $database = $firebase->getDatabase();

    $duty_table_reference = $database->getReference('duty_table')->getSnapshot()->getValue();

    // $official_duty_roster = $database->getReference('official_duty_roster');

    foreach ($duty_table_reference as $key => $value) {
      # code...
       $leave_reference = $database->getReference('Medical Leave/'.$key.'/Annual_Leave')->getSnapshot()->getValue();
       if ($leave_reference == "") {
         # code...
        $leave_reference = "-";
       }
        $public_holiday_reference = $database->getReference('Medical Leave/'.$key.'/Public_Holiday')->getSnapshot()->getValue();
         if ($public_holiday_reference == "") {
         # code...
        $public_holiday_reference = "-";
       }
         $total_leave_reference = $database->getReference('Medical Leave/'.$key.'/Total_Leave')->getSnapshot()->getValue();
          if ($total_leave_reference == "") {
         # code...
        $total_leave_reference = "-";
       }

        $postData = [
            'date' => $date,
            'user_key' => $key,
            'Name' => $duty_table_reference[$key]['Name'],
            'Role' => $duty_table_reference[$key]['Role'],
            'L' =>$leave_reference,
            'PH' =>$public_holiday_reference,
            'TL' => $total_leave_reference,
            'MON' =>$duty_table_reference[$key]['MON'],
            'TUE' => $duty_table_reference[$key]['TUE'],
            'WED' => $duty_table_reference[$key]['WED'],
            'THU' => $duty_table_reference[$key]['THU'],
            'FRI' =>$duty_table_reference[$key]['FRI'],
            'SAT' =>$duty_table_reference[$key]['SAT'],
            'SUN' =>$duty_table_reference[$key]['SUN'],

        ];
        $updates = [
            'official_duty_roster/'.$key.'' => $postData,

        ];
            $database->getReference() // this is the root reference
            ->update($updates);
    }

    date_default_timezone_set("Asia/Kuala_Lumpur");
    // echo date('d-m-Y H:i:s'); //Returns IST
    $postData = [
            'Message' => 'New Duty Roster from '.$date.'. Please kindly check it.',
            'Timestamp' => date('d-m-Y H:i:s'),
            'Title' => 'New Duty Roster',
            
        ];
        $updates = [
            'Notification/' => $postData,

        ];
            $database->getReference() // this is the root reference
            ->update($updates);

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
	// $this->load->model('scheduling_model');
	// $this->scheduling_model->delete_all_roster_data();

  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $database = $firebase->getDatabase();

    $reference = $database->getReference('duty_table');
    $reference->remove();
    // $reference2 = $database->getReference('official_duty_roster');
    // $reference2->remove();
    $this->session->set_flashdata('success_msg_clear_content', 'Clear All Duty Roster Data.');
	return redirect('scheduling/jobplanning');

	}

	 public function fetch_clinician_data(){
    	// $this->load->model("admin_model");  
     //       $fetch_clinician_data = $this->admin_model->make_clinician_datatables();  

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $database = $firebase->getDatabase();

    $reference = $database->getReference('/Users');
    $snapshot = $reference->getSnapshot();
    $all_user = $snapshot->getValue();

    $total_user = $snapshot->numChildren();
           $data = array();  
           foreach($all_user as $key => $value)
           {  
                $sub_array = array();  

                $Medical_Leave = $database->getReference('/Medical Leave/'.$key.'/leaveduration');
                $snapshot2 = $Medical_Leave->getSnapshot();
                $Annual_Leave = $snapshot2->getValue();
                
                $Shift_Preference = $database->getReference('/Shift/Shift Preference/'.$key);
                $snapshot3 = $Shift_Preference->getSnapshot();
                $Shift_Preference = $snapshot3->getValue();

                $sub_array[] = $all_user[$key]['userFullName'];
                $sub_array[] = $all_user[$key]['userStaffID'];
                $sub_array[] = $all_user[$key]['userHandphone'];
                $sub_array[] = $all_user[$key]['userEmail'];
                $sub_array[] = $all_user[$key]['userPosition'];
                $sub_array[] = $all_user[$key]['userDepartment'];
                $sub_array[] = $all_user[$key]['userHospital'];
                $sub_array[] = $Annual_Leave;
                $sub_array[] = $Shift_Preference;
                $sub_array[] = '<button type="button" name="update" id="'.$key.'"  class="btn btn-warning btn-xs update">Update</button>';
                  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal"=>$total_user,
                // "recordsFiltered"=>$this->admin_model->get_filtered_clinician_data(),  
                "data"=>$data  
           );  
           echo json_encode($output);  
      }  


}


?>