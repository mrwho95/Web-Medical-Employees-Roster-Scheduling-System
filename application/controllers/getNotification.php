<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

require_once './vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
/**
 * 
 */


class getNotification extends CI_Controller
{
	
	public function getNotificationFromMobile(){
		if (isset($_POST["view"])) {
		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

	    $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();

	    $database = $firebase->getDatabase();

	    $childNum = $database->getReference('/webNotification')->getSnapshot()->numChildren();

	    $webNotification = $database->getReference('/webNotification')->getSnapshot()->getValue();

	    // print_r($webNotification);

	    $notificationArray = array();
	    foreach ($webNotification as $userID => $value) {
	    	$array['message'] = $value['Message'];
	    	$array['title'] = $value['Title'];
	    	$array['time'] = $value['current_Timestamp'];
	    	$notificationArray[] = $array;
	    }

	    $notificationArray = array_reverse($notificationArray);

	    // print_r($notificationArray);
	    $output = '';
	    if ($childNum > 0) {
	    	foreach ($notificationArray as $key => $value) {
	    		$output .= '
			   <li>
			     <strong>'.$value['title'].'</strong><br />
			     <small><em>'.$value['message'].'</em></small><br/>
			     <small><em>'.$value['time'].'</em></small>
			   </li>
			   <li class="dropdown-divider"></li>
			   ';
	    	}
	    	
	    }else{
	    	$output .= '<li><p class="text-bold text-italic">No Notification Found</p></li>';
	    }

	    // $newWebNotification = array();
	    // foreach ($webNotification as $key => $value) {
	    // 	foreach ($value as $key1 => $value1) {
	    // 		array_push($newWebNotification, $value1);
	    // 	}
	    // }

	    // print_r($newWebNotification);
	    // echo "\n\n\n";
	    // $output = '';
	    //  $output .= '
		   // <li>
		   //  <a href="#">
		   //   <strong>'.$newWebNotification[0].'</strong><br />
		   //   <small><em>'.$newWebNotification[1].'</em></small>
		   //  </a>
		   // </li>
		   // <li class="divider"></li>
		   // ';
	    

	    $data = array(
	    	'notification' => $output,
	    	'unseen_notification' => ''
	    );
	    // print_r($data);

	    // echo "\nchildNum: ".$childNum;

	    echo json_encode($data);


	    
	    // $calendar_reference = $database->getReference('webNotification')->getSnapshot()->getValue();


		}
	}
		

}




?>