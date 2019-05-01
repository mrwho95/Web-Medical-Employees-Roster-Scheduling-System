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


    // $clinician_reference = $database->getReference('Users')->getSnapshot()->getValue();
    // $leave_reference = $database->getReference('Medical Leave')->getSnapshot()->getValue();

    // foreach ($clinician_reference as $key => $value) {
    //   $position = $database->getReference('Users/'.$key.'/userPosition')->getSnapshot()->getValue();
    //   $username = $database->getReference('Users/'.$key.'/userFullName')->getSnapshot()->getValue();
    // }
    // foreach ($leave_reference as $key => $value) {
    //   $Medical_leave_duration = $database->getReference('Medical Leave/'.$key.'/leaveduration')->getSnapshot()->getValue();
    //   $start_date = $database->getReference('Medical Leave/'.$key.'/leavestartdate')->getSnapshot()->getValue();
    //   $end_date = $database->getReference('Medical Leave/'.$key.'/leaveenddate')->getSnapshot()->getValue();
    // }
      
    //   if ($position == "Nurse" || "nurse") {
    //     if($Medical_leave_duration == "1" || "2" || "3" || "4" || "5" || "6" || "7" || "8" || "9" || "10" || "11" || "12" || "13" || "14" )
    //     {
    //       $this->generate_clinician_cover();
    //     }
    //   }elseif ($doctor == "Doctor" || "doctor") {
    //     if($Medical_leave_duration == "1" || "2" || "3" || "4" || "5" || "6" || "7" || "8" || "9" || "10" || "11" || "12" || "13" || "14" )
    //     {
    //       // $this->generate_clinician_cover();
    //     }
    //   }
  


		$this->load->view('scheduler_jobplanning', $data);

	}

public function sessionexpired(){

    $this->load->view('session_expired');
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect('login/index');
  }

public function generate_clinician_cover(){

  $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $newPostKey = $database->getReference('Notification')->push()->getKey();


          date_default_timezone_set("Asia/Kuala_Lumpur");
          // echo date('d-m-Y H:i:s'); //Returns IST

  $database = $firebase->getDatabase();

  $clinician_reference = $database->getReference('Users')->getSnapshot()->getValue();

  foreach ($clinician_reference as $key => $value) {
      $position = $database->getReference('Users/'.$key.'/userPosition')->getSnapshot()->getValue();
      $username = $database->getReference('Users/'.$key.'/userFullName')->getSnapshot()->getValue();
    }

    if ($position == "Nurse" || "nurse") {

      $this->send_duty_alert_notification();
    }elseif ($position == "Doctor" || "doctor") {

      $this->send_duty_alert_notification();
    }

}

public function send_duty_alert_notification(){
   $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
      ->withServiceAccount($serviceAccount)
      ->create();

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
            'NotificationTitle' => 'On Leave',
            
        ];
        $updates = [
            'Notification/'.$newPostKey => $postData,

        ];
            $database->getReference() // this is the root reference
            ->update($updates);
}


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