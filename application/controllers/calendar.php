<?php
require_once './vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount; 
/**
 * 
 */
class calendar extends CI_Controller
{
	
     public function getcalendarevents(){
    
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();

    $database = $firebase->getDatabase();

    $calendar_reference = $database->getReference('calendar')->getSnapshot()->getValue();

    $calender_array = array();


    foreach ($calendar_reference as $key => $value) {

        foreach ($value as $key1 => $value2) {
            # code...
            array_push($calender_array, $value2); 
        }

    }

    echo json_encode($calender_array);


    
  }
// public function get_events()
//  {
//      // Our Start and End Dates
//      $start = $this->input->get("start");
//      $end = $this->input->get("end");

//      // $startdt = new DateTime('now'); // setup a local datetime
//      // $startdt->setTimestamp($start); // Set the date based on timestamp
//      // $start_format = $startdt->format('Y-m-d H:i:s');

//      // $enddt = new DateTime('now'); // setup a local datetime
//      // $enddt->setTimestamp($end); // Set the date based on timestamp
//      // $end_format = $enddt->format('Y-m-d H:i:s');

//      $events = $this->calendar_model->get_events($start_format, $end_format);

//      $data_events = array();

//      foreach($events->result() as $r) {

//          $data_events[] = array(
//              "name" => $r->Name,
//              "role" => $r->Role
//              // "title" => $r->title,
//              // "description" => $r->description,
//              // "end" => $r->end,
//              // "start" => $r->start
//          );
//      }

//      echo json_encode(array("events" => $data_events));
//      exit();
//  }


}

?>