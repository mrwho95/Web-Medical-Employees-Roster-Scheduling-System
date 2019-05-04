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
class scheduling2 extends CI_Controller
{
	
	public function check_leave(){
		$Monday = date("d/m/Y", strtotime("Next Monday"));
		$Tuesday = date("d/m/Y", strtotime("Next Monday + 1 days"));
		$Wednesday= date("d/m/Y", strtotime("Next Monday + 2 days"));
		$Thursday = date("d/m/Y", strtotime("Next Monday + 3 days"));
		$Friday = date("d/m/Y", strtotime("Next Monday + 4 days"));
		$Saturday= date("d/m/Y", strtotime("Next Monday + 5 days"));
		$Sunday = date("d/m/Y", strtotime("Next Monday + 6 days"));
		$user_id = $this->input->post('Update');

		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

		$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->create();

		$database = $firebase->getDatabase();

		$leavestartdate = $database->getReference('/Medical Leave/'.$user_id.'/leavestartdate')->getSnapshot()->getValue();
		$leaveenddate = $database->getReference('/Medical Leave/'.$user_id.'/leaveenddate')->getSnapshot()->getValue();
		$leaveduration = $database->getReference('/Medical Leave/'.$user_id.'/leaveduration')->getSnapshot()->getValue();
		$user_name = $database->getReference('/Medical Leave/'.$user_id.'/Name')->getSnapshot()->getValue();
		
		$clinician_cover = $database->getReference('/Medical Leave/'.$user_id.'/clinician_cover')->getSnapshot()->getValue();

		$position = $database->getReference('/Users/'.$user_id.'/userPosition')->getSnapshot()->getValue();

		if ($leavestartdate == $Monday ) {
			if ($leaveduration == 1) {
				$updates = ['duty_table/'.$user_id.'/MON' => '- '.$Monday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 2) {
        	$updates = ['duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 3) {
        	$updates = ['duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 4) {
        	$updates = ['duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 5) {
        	$updates = ['duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 6) {
        	$updates = ['duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }
    }elseif ($leavestartdate == $Tuesday) {
    	if ($leaveduration == 1) {
    		$updates = ['duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 2) {
        	$updates = ['duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 3) {
        	$updates = ['duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 4) {
        	$updates = ['duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 5) {
        	$updates = ['duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}elseif ($leaveduration == 6) {
			$updates = ['duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}
	}elseif ($leavestartdate == $Wednesday) {
		if ($leaveduration == 1) {
			$updates = ['duty_table/'.$user_id.'/WED' => '- '.$Wednesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 2) {
        	$updates = ['duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 3) {
        	$updates = ['duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 4) {
        	$updates = ['duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 5) {
        	$updates = ['duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}elseif ($leaveduration == 6) {
			$updates = ['duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SAT' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}
	}elseif ($leavestartdate == $Thursday) {
		if ($leaveduration == 1) {
			$updates = ['duty_table/'.$user_id.'/THU' => '- '.$Thursday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 2) {
        	$updates = ['duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 3) {
        	$updates = ['duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 4) {
        	$updates = ['duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 5) {
        	$updates = ['duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}elseif ($leaveduration == 6) {
			$updates = ['duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}
	}elseif ($leavestartdate == $Friday) {
		if ($leaveduration == 1) {
			$updates = ['duty_table/'.$user_id.'/FRI' => '- '.$Friday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 2) {
        	$updates = ['duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 3) {
        	$updates = ['duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 4) {
        	$updates = ['duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 5) {
        	$updates = ['duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}elseif ($leaveduration == 6) {
			$updates = ['duty_table/'.$user_id.'/FRI' => '- '.$Friday,'duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}
	}elseif ($leavestartdate == $Saturday) {
		if ($leaveduration == 1) {
			$updates = ['duty_table/'.$user_id.'/SAT' => '- '.$Saturday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 2) {
        	$updates = ['duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 3) {
        	$updates = ['duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 4) {
        	$updates = ['duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 5) {
        	$updates = ['duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}elseif ($leaveduration == 6) {
			$updates = ['duty_table/'.$user_id.'/SAT' => '- '.$Saturday,'duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}
	}elseif ($leavestartdate == $Sunday) {
		if ($leaveduration == 1) {
			$updates = ['duty_table/'.$user_id.'/SUN' => '- '.$Sunday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 2) {
        	$updates = ['duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 3) {
        	$updates = ['duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 4) {
        	$updates = ['duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leaveduration == 5) {
        	$updates = ['duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}elseif ($leaveduration == 6) {
			$updates = ['duty_table/'.$user_id.'/SUN' => '- '.$Sunday,'duty_table/'.$user_id.'/MON' => '- '.$Monday,'duty_table/'.$user_id.'/TUE' => '- '.$Tuesday,'duty_table/'.$user_id.'/WED' => '- '.$Wednesday,'duty_table/'.$user_id.'/THU' => '- '.$Thursday,'duty_table/'.$user_id.'/FRI' => '- '.$Friday,];
			$database->getReference() // this is the root reference
			->update($updates);
		}
	}
	
	if ($position == "Nurse") {
		$this->nurse_leave_notification($leavestartdate, $leaveenddate, $user_name, $clinician_cover);
	}elseif ($position == "Doctor") {
		$this->doctor_leave_notification($leavestartdate, $leaveenddate, $user_name, $clinician_cover);
	}
	

	$updates = [
		'Medical Leave/'.$user_id.'/clinician_cover' => '-',
		'Medical Leave/'.$user_id.'/leaveduration' => '-',
		'Medical Leave/'.$user_id.'/leaveenddate' => '-',
		'Medical Leave/'.$user_id.'/leavestartdate' => '-',
		'Medical Leave/'.$user_id.'/leavereason' => '-',
		'Medical Leave/'.$user_id.'/leavetype' => '-',
		'Medical Leave/'.$user_id.'/leavestatus' => 'No pending status',

	];
            $database->getReference() // this is the root reference
            ->update($updates);

            

            $this->session->set_flashdata('success_update_msg', 'Updated Duty Table Successful.');
            return redirect('scheduling/jobplanning');
        }

        public function nurse_leave_notification($leavestartdate, $leaveenddate, $user_name, $clinician_cover){
        	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

        	$firebase = (new Factory)
        	->withServiceAccount($serviceAccount)
        	->create();

        	$messaging = $firebase->getMessaging();

        	$title = 'Nurse '.$user_name.' On Leave';
        	$body = 'Successful to On leave from '.$leavestartdate.' to '.$leaveenddate.'. Nurse '.$clinician_cover.' please cover that job.';


        	$notification = Notification::create($title, $body);

        	$notification = Notification::create()
        	->withTitle($title)
        	->withBody($body);

        	$notification = Notification::fromArray([
        		'title' => $title,
        		'body' => $body
        	]);

        	$topic = 'hello';

 $message = CloudMessage::withTarget('topic', $topic)->withNotification($notification) // optional
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
 	'NotificationMessage' => 'Successful to On leave from '.$leavestartdate.' to '.$leaveenddate.'. Nurse '.$clinician_cover.' please cover that job.',
 	'NotificationTimestamp' => date('d-m-Y H:i:s'),
 	'NotificationTitle' => 'Nurse '.$user_name.' On Leave',

 ];
 $updates = [
 	'Notification/'.$newPostKey => $postData,

 ];
  $database->getReference() // this is the root reference
  ->update($updates);
}

public function doctor_leave_notification($leavestartdate, $leaveenddate, $user_name, $clinician_cover){
	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

	$firebase = (new Factory)
	->withServiceAccount($serviceAccount)
	->create();

	$messaging = $firebase->getMessaging();

	$title = 'Doctor '.$user_name.' On Leave';
	$body = 'Successful to On leave from '.$leavestartdate.' to '.$leaveenddate.'. Doctor '.$clinician_cover.' please cover that job.';


	$notification = Notification::create($title, $body);

	$notification = Notification::create()
	->withTitle($title)
	->withBody($body);

	$notification = Notification::fromArray([
		'title' => $title,
		'body' => $body
	]);

	$topic = 'hello';

 $message = CloudMessage::withTarget('topic', $topic)->withNotification($notification) // optional
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
 	'NotificationMessage' => 'Successful to On leave from '.$leavestartdate.' to '.$leaveenddate.'. Doctor '.$clinician_cover.' please cover that job.',
 	'NotificationTimestamp' => date('d-m-Y H:i:s'),
 	'NotificationTitle' => 'Doctor '.$user_name.' On Leave',

 ];
 $updates = [
 	'Notification/'.$newPostKey => $postData,

 ];
  $database->getReference() // this is the root reference
  ->update($updates);
}

public function Fail_applyleave(){
	$user_id = $this->input->post('Fail');
	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

	$firebase = (new Factory)
	->withServiceAccount($serviceAccount)
	->create();

	$database = $firebase->getDatabase();

	$leavetype = $database->getReference('/Medical Leave/'.$user_id.'/leavetype')->getSnapshot()->getValue();
	$leaveduration = $database->getReference('/Medical Leave/'.$user_id.'/leaveduration')->getSnapshot()->getValue();
	$Annual_Leave = $database->getReference('/Medical Leave/'.$user_id.'/Annual_Leave')->getSnapshot()->getValue();
	$Public_Holiday = $database->getReference('/Medical Leave/'.$user_id.'/Public_Holiday')->getSnapshot()->getValue();
	$Total_Leave = $database->getReference('/Medical Leave/'.$user_id.'/Total_Leave')->getSnapshot()->getValue();
	$Medical_Certificate = $database->getReference('/Medical Leave/'.$user_id.'/Medical_Certificate')->getSnapshot()->getValue();
	$AddLeave1 = $Annual_Leave + $leaveduration;
	$AddLeave2 = $Total_Leave + $leaveduration;
	$AddLeave3 = $Public_Holiday + $leaveduration;
	$Leave = $Medical_Certificate - $leaveduration;

	if ($leavetype == "Annual Leave") {

		$updates = [
			'Medical Leave/'.$user_id.'/Annual_Leave' => strval($AddLeave1),
			'Medical Leave/'.$user_id.'/Total_Leave' => strval($AddLeave2),
			'Medical Leave/'.$user_id.'/clinician_cover' => '-',
			'Medical Leave/'.$user_id.'/leaveduration' => '-',
			'Medical Leave/'.$user_id.'/leaveenddate' => '-',
			'Medical Leave/'.$user_id.'/leavestartdate' => '-',
			'Medical Leave/'.$user_id.'/leavereason' => '-',
			'Medical Leave/'.$user_id.'/leavetype' => '-',
			'Medical Leave/'.$user_id.'/leavestatus' => 'No pending status',

		];
            $database->getReference() // this is the root reference
            ->update($updates);

        }elseif ($leavetype == "Public Holiday") {
        	$updates = [
        		'Medical Leave/'.$user_id.'/Public_Holiday' => strval($AddLeave3),
        		'Medical Leave/'.$user_id.'/Total_Leave' => strval($AddLeave2),
        		'Medical Leave/'.$user_id.'/clinician_cover' => '-',
        		'Medical Leave/'.$user_id.'/leaveduration' => '-',
        		'Medical Leave/'.$user_id.'/leaveenddate' => '-',
        		'Medical Leave/'.$user_id.'/leavestartdate' => '-',
        		'Medical Leave/'.$user_id.'/leavereason' => '-',
        		'Medical Leave/'.$user_id.'/leavetype' => '-',
        		'Medical Leave/'.$user_id.'/leavestatus' => 'No pending status',

        	];
            $database->getReference() // this is the root reference
            ->update($updates);
        }elseif ($leavetype == "Medical Certificate") {
        	$updates = [
        		'Medical Leave/'.$user_id.'/Medical_Certificate' => strval($Leave),
        		'Medical Leave/'.$user_id.'/Total_Leave' => strval($AddLeave2),
        		'Medical Leave/'.$user_id.'/clinician_cover' => '-',
        		'Medical Leave/'.$user_id.'/leaveduration' => '-',
        		'Medical Leave/'.$user_id.'/leaveenddate' => '-',
        		'Medical Leave/'.$user_id.'/leavestartdate' => '-',
        		'Medical Leave/'.$user_id.'/leavereason' => '-',
        		'Medical Leave/'.$user_id.'/leavetype' => '-',
        		'Medical Leave/'.$user_id.'/leavestatus' => 'No pending status',

        	];
            $database->getReference() // this is the root reference
            ->update($updates);
        }

        $this->session->set_flashdata('fail_update_msg', 'Failed Apply Leave Application.');
        return redirect('scheduling/jobplanning');
    }




}




?>