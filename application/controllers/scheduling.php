<?php 

require_once './vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Messaging\Message;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\MessageToTopic;


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

   $medical_referecence = $database->getReference('/Medical Leave');
   $data["fetch_leave_data"] = $medical_referecence->getSnapshot()->getValue();
   $data["total_leave_application"] = $medical_referecence->getSnapshot()->numChildren();

   $this->load->view('scheduler_jobplanning', $data);

 }

 public function sessionexpired(){

  $this->load->view('session_expired');
}

public function logout(){
  $this->session->sess_destroy();
  redirect('login/index');
}



public function update_duty_table(){

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


  $Morning = "Morning";
  $Afternoon = "Afternoon";
  $Night = "Night";
  $AM = "AM";
  $PM = "PM";
  $ND = "ND";
  $Nurse = "Nurse";
  $Doctor = "Doctor";

  $Monday = date("d/m/Y", strtotime("Next Monday"));
  $Tuesday = date("d/m/Y", strtotime("Next Monday + 1 days"));
  $Wednesday= date("d/m/Y", strtotime("Next Monday + 2 days"));
  $Thursday = date("d/m/Y", strtotime("Next Monday + 3 days"));
  $Friday = date("d/m/Y", strtotime("Next Monday + 4 days"));
  $Saturday= date("d/m/Y", strtotime("Next Monday + 5 days"));
  $Sunday = date("d/m/Y", strtotime("Next Monday + 6 days"));

  if ($position == $Doctor){
    if ($Shift_Preference == $Morning) {
      $num = rand(1,7);
      if ($num == 1) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "AM $Tuesday",'WED' => "AM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"- $Friday",'SAT' =>"OC $Saturday",'SUN' =>"- $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 2) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "AM $Tuesday",'WED' => "AM $Wednesday",'THU' => "AM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"- $Saturday",'SUN' =>"OC $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 3) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"OC $Monday",'TUE' => "- $Tuesday",'WED' => "AM $Wednesday",'THU' => "AM $Thursday",'FRI' =>"AM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"- $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 4) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "OC $Tuesday",'WED' => "- $Wednesday",'THU' => "AM $Thursday",'FRI' =>"AM $Friday",'SAT' =>"AM $Saturday",'SUN' =>"PM $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 5) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "- $Tuesday",'WED' => "OC $Wednesday",'THU' => "- $Thursday",'FRI' =>"AM $Friday",'SAT' =>"AM $Saturday",'SUN' =>"AM $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 6) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "PM $Tuesday",'WED' => "- $Wednesday",'THU' => "OC $Thursday",'FRI' =>"- $Friday",'SAT' =>"AM $Saturday",'SUN' =>"AM $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 7) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "AM $Tuesday",'WED' => "PM $Wednesday",'THU' => "- $Thursday",'FRI' =>"OC $Friday",'SAT' =>"- $Saturday",'SUN' =>"AM $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }
    }elseif ($Shift_Preference == $Afternoon) {
      $num = rand(1,7);
      if ($num == 1) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "PM $Tuesday",'WED' => "- $Wednesday",'THU' => "OC $Thursday",'FRI' =>"- $Friday",'SAT' =>"- $Saturday",'SUN' =>"AM $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 2) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "PM $Tuesday",'WED' => "PM $Wednesday",'THU' => "- $Thursday",'FRI' =>"OC $Friday",'SAT' =>"- $Saturday",'SUN' =>"- $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 3) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "AM $Tuesday",'WED' => "PM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"- $Friday",'SAT' =>"OC $Saturday",'SUN' =>"$Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 4) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "- $Tuesday",'WED' => "AM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"- $Saturday",'SUN' =>"OC $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 5) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"OC $Monday",'TUE' => "- $Tuesday",'WED' => "- $Wednesday",'THU' => "AM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"- $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 6) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "OC $Tuesday",'WED' => "- $Wednesday",'THU' => "- $Thursday",'FRI' =>"AM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"PM $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }elseif ($num == 7) {
        $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "- $Tuesday",'WED' => "OC $Wednesday",'THU' => "- $Thursday",'FRI' =>"- $Friday",'SAT' =>"AM $Saturday",'SUN' =>"PM $Sunday",];
        $updates = ['duty_table/'.$clinician_data.'' => $postData,];
        $database->getReference() ->update($updates);
      }
    }elseif ($Shift_Preference == '') {
     $num = rand(1,7);
     if ($num == 1) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "AM $Tuesday",'WED' => "PM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"- $Friday",'SAT' =>"OC $Saturday",'SUN' =>"- $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 2) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "AM $Tuesday",'WED' => "AM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"- $Saturday",'SUN' =>"OC $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 3) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"OC $Monday",'TUE' => "- $Tuesday",'WED' => "AM $Wednesday",'THU' => "AM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"- $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 4) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "OC $Tuesday",'WED' => "- $Wednesday",'THU' => "AM $Thursday",'FRI' =>"AM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"PM $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 5) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "- $Tuesday",'WED' => "OC $Wednesday",'THU' => "- $Thursday",'FRI' =>"AM $Friday",'SAT' =>"AM $Saturday",'SUN' =>"PM $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 6) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "PM $Tuesday",'WED' => "- $Wednesday",'THU' => "OC $Thursday",'FRI' =>"- $Friday",'SAT' =>"AM $Saturday",'SUN' =>"AM $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 7) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "PM $Tuesday",'WED' => "PM $Wednesday",'THU' => "- $Thursday",'FRI' =>"OC $Friday",'SAT' =>"- $Saturday",'SUN' =>"AM $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }
  }          
}

if ($position == $Nurse) {
  if ($Shift_Preference == $Morning) {
    $num = rand(1,7);
    if ($num == 1) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "AM $Tuesday",'WED' => "AM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"ND $Friday",'SAT' =>"ND $Saturday",'SUN' =>"- $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 2) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "AM $Tuesday",'WED' => "AM $Wednesday",'THU' => "AM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"ND $Saturday",'SUN' =>"ND $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 3) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "- $Tuesday",'WED' => "AM $Wednesday",'THU' => "AM $Thursday",'FRI' =>"AM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"ND $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 4) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "ND $Tuesday",'WED' => "- $Wednesday",'THU' => "AM $Thursday",'FRI' =>"AM $Friday",'SAT' =>"AM $Saturday",'SUN' =>"PM $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 5) {
      $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "ND $Tuesday",'WED' => "ND $Wednesday",'THU' => "- $Thursday",'FRI' =>"AM $Friday",'SAT' =>"AM $Saturday",'SUN' =>"AM $Sunday",];
      $updates = ['duty_table/'.$clinician_data.'' => $postData,];
      $database->getReference() ->update($updates);
    }elseif ($num == 6) {
     $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "PM $Tuesday",'WED' => "ND $Wednesday",'THU' => "ND $Thursday",'FRI' =>"- $Friday",'SAT' =>"AM $Saturday",'SUN' =>"AM $Sunday",];
     $updates = ['duty_table/'.$clinician_data.'' => $postData,];
     $database->getReference() ->update($updates);
   }elseif ($num == 7) {
     $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "AM $Tuesday",'WED' => "PM $Wednesday",'THU' => "ND $Thursday",'FRI' =>"ND $Friday",'SAT' =>"- $Saturday",'SUN' =>"AM $Sunday",];
     $updates = ['duty_table/'.$clinician_data.'' => $postData,];
     $database->getReference() ->update($updates);
   }
 }elseif ($Shift_Preference == $Afternoon) {
  $num = rand(1,7);
  if ($num == 1) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "PM $Tuesday",'WED' => "PM $Wednesday",'THU' => "AM $Thursday",'FRI' =>"ND $Friday",'SAT' =>"ND $Saturday",'SUN' =>"- $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 2) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "PM $Tuesday",'WED' => "PM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"AM $Friday",'SAT' =>"ND $Saturday",'SUN' =>"ND $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 3) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "- $Tuesday",'WED' => "PM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"AM $Saturday",'SUN' =>"ND $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 4) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "ND $Tuesday",'WED' => "- $Wednesday",'THU' => "PM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"AM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 5) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "ND $Tuesday",'WED' => "ND $Wednesday",'THU' => "- $Thursday",'FRI' =>"PM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"PM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 6) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "AM $Tuesday",'WED' => "ND $Wednesday",'THU' => "ND $Thursday",'FRI' =>"- $Friday",'SAT' =>"PM $Saturday",'SUN' =>"PM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 7) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "PM $Tuesday",'WED' => "AM $Wednesday",'THU' => "ND $Thursday",'FRI' =>"ND $Friday",'SAT' =>"- $Saturday",'SUN' =>"PM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }
}elseif ($Shift_Preference == $Night) {
  $num = rand(1,7);
  if ($num == 1) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "ND $Tuesday",'WED' => "- $Wednesday",'THU' => "ND $Thursday",'FRI' =>"AM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"PM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 2) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "ND $Tuesday",'WED' => "ND $Wednesday",'THU' => "- $Thursday",'FRI' =>"ND $Friday",'SAT' =>"AM $Saturday",'SUN' =>"PM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 3) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "PM $Tuesday",'WED' => "ND $Wednesday",'THU' => "ND $Thursday",'FRI' =>"- $Friday",'SAT' =>"ND $Saturday",'SUN' =>"AM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 4) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "PM $Tuesday",'WED' => "PM $Wednesday",'THU' => "ND $Thursday",'FRI' =>"ND $Friday",'SAT' =>"- $Saturday",'SUN' =>"ND $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 5) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "AM $Tuesday",'WED' => "PM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"ND $Friday",'SAT' =>"ND $Saturday",'SUN' =>"- $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 6) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "ND $Tuesday",'WED' => "AM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"ND $Saturday",'SUN' =>"ND $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 7) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "- $Tuesday",'WED' => "ND $Wednesday",'THU' => "AM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"ND $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }
}elseif ($Shift_Preference == '') {
  $num = rand(1,7);
  if ($num == 1) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "AM $Tuesday",'WED' => "PM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"ND $Friday",'SAT' =>"ND $Saturday",'SUN' =>"- $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 2) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"- $Monday",'TUE' => "AM $Tuesday",'WED' => "AM $Wednesday",'THU' => "PM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"ND $Saturday",'SUN' =>"ND $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 3) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "- $Tuesday",'WED' => "AM $Wednesday",'THU' => "AM $Thursday",'FRI' =>"PM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"ND $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 4) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"ND $Monday",'TUE' => "ND $Tuesday",'WED' => "- $Wednesday",'THU' => "AM $Thursday",'FRI' =>"AM $Friday",'SAT' =>"PM $Saturday",'SUN' =>"PM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 5) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "ND $Tuesday",'WED' => "ND $Wednesday",'THU' => "- $Thursday",'FRI' =>"AM $Friday",'SAT' =>"AM $Saturday",'SUN' =>"PM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 6) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"PM $Monday",'TUE' => "PM $Tuesday",'WED' => "ND $Wednesday",'THU' => "ND $Thursday",'FRI' =>"- $Friday",'SAT' =>"AM $Saturday",'SUN' =>"AM $Sunday",];
    $updates = ['duty_table/'.$clinician_data.'' => $postData,];
    $database->getReference() ->update($updates);
  }elseif ($num == 7) {
    $postData = ['user_key' => $clinician_data,'Name' => $user_name,'Role' =>$position,'MON' =>"AM $Monday",'TUE' => "PM $Tuesday",'WED' => "PM $Wednesday",'THU' => "ND $Thursday",'FRI' =>"ND $Friday",'SAT' =>"- $Saturday",'SUN' =>"AM $Sunday",];
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

  foreach ($duty_table_reference as $key => $value) {
      # code...
   $leave_reference = $database->getReference('Medical Leave/'.$key.'/Annual_Leave')->getSnapshot()->getValue();
   if ($leave_reference == "") {
    $leave_reference = "-";
  }
  $public_holiday_reference = $database->getReference('Medical Leave/'.$key.'/Public_Holiday')->getSnapshot()->getValue();
  if ($public_holiday_reference == "") {
    $public_holiday_reference = "-";
  }
  $total_leave_reference = $database->getReference('Medical Leave/'.$key.'/Total_Leave')->getSnapshot()->getValue();
  if ($total_leave_reference == "") {
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

  $this->send_new_duty_roster_message_and_notification();

  $this->session->set_flashdata('success_msg_generate_roster', 'Generate New Duty Roster. New Duty Roster Notification is sent to Clinician!');
  return redirect('scheduling/jobplanning');	

}

public function send_new_duty_roster_message_and_notification(){

  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

  $firebase = (new Factory)
  ->withServiceAccount($serviceAccount)
  ->create();

  $firstdate = date("d/m/Y", strtotime("Next Monday"));
  $lastdate = date("d/m/Y", strtotime("Next Monday + 6 days"));
  $date = $firstdate." - ".$lastdate;

  $messaging = $firebase->getMessaging();

  $title = 'New Duty Roster is published';
  $body = 'New Duty Roster from '.$date.'. Please kindly check it.';


  $notification = Notification::create($title, $body);

  $notification = Notification::create()
  ->withTitle($title)
  ->withBody($body);

  $notification = Notification::fromArray([
    'title' => $title,
    'body' => $body
  ]);

  $topic = 'hello';

  $message = CloudMessage::withTarget('topic', $topic)
        ->withNotification($notification) // optional
        // ->withData($data) // optional
        ;

        $message = CloudMessage::fromArray([
          'topic' => $topic,
        'notification' =>['title'=>$title, 'body'=>$body,], // optional
        // 'data' => [/* data array */], // optional
      ]);

        $messaging->send($message);

        $database = $firebase->getDatabase();
        $newPostKey = $database->getReference('Notification')->push()->getKey();

        date_default_timezone_set("Asia/Kuala_Lumpur");
    // echo date('d-m-Y H:i:s'); //Returns IST
        $postData = [
          'NotificationMessage' => 'New Duty Roster from '.$date.'. Please kindly check it.',
          'NotificationTimestamp' => date('d-m-Y H:i:s'),
          'NotificationTitle' => 'New Duty Roster',

        ];
        $updates = [
          'Notification/'.$newPostKey => $postData,

        ];
            $database->getReference() // this is the root reference
            ->update($updates);



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