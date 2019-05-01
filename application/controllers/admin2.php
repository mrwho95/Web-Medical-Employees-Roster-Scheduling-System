<?php 
require_once './vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
/**
 * 
 */
class admin2 extends CI_Controller
{

	//add user //edit user
	function add_scheduler_action(){  

    $this->load->model("admin_operation"); 
    $insert_data = array(  
      "Name"=>$this->input->post("fullname"),  
      "Password"=>$this->input->post("inputpassword"),
      "Email"=>$this->input->post("inputEmail"),
      "Department"=>$this->input->post("department"),
      "Hospital"=>$this->input->post("hospital"),
      "SchedulerID"=>$this->input->post("schedulerID"),
      "Phone_Number"=>$this->input->post("phonenumber"),
      "Gender"=>$this->input->post("gender"));  
    $this->admin_operation->insert_scheduler_data($insert_data);  
    echo "Data Inserted"; 

  }

  function edit_scheduler_action(){
    $this->load->model("admin_operation"); 
    $updated_data = array(  
      "Name"=>$this->input->post("Editfullname"),  
      "Email"=>$this->input->post("EditinputEmail"),
      "Department"=>$this->input->post("Editdepartment"),
      "Hospital"=>$this->input->post("Edithospital"),
      "Phone_Number"=>$this->input->post("Editphonenumber"),
      "Gender"=>$this->input->post("Editgender")
    );  
    $this->admin_operation->update_scheduler_data($this->input->post("Edituser_id"), $updated_data);  
    echo "Data Updated"; 
  }



  function update_clinician_action(){  

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

    $database = $firebase->getDatabase();

    $clinicianID = $this->input->post("clinicianID");

    $updates = [
      'Users/'.$clinicianID.'/userAge' => $this->input->post("age"),
      'Users/'.$clinicianID.'/userDepartment' => $this->input->post("department"),
      'Users/'.$clinicianID.'/userHandphone' => $this->input->post("phonenumber"),
      'Users/'.$clinicianID.'/userHomeAddress' => $this->input->post("address"),
      'Users/'.$clinicianID.'/userHospital' => $this->input->post("hospital"),
      'Users/'.$clinicianID.'/userPosition' => $this->input->post("position"),
      'Users/'.$clinicianID.'/userFullName' => $this->input->post("fullname"),

    ];
            $database->getReference() // this is the root reference
            ->update($updates);

            echo "Data Updated";   

          }

          function add_clinician_action(){
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

            $database = $firebase->getDatabase();
            $auth = $firebase->getAuth();

            $newUserKey = $database->getReference('Users')->push()->getKey();

//this data send to authentication
            $userProperties = [
              'uid' =>  $newUserKey,
              'email' => $this->input->post("inputEmail"),
              'password' => $this->input->post("inputpassword"),
              'displayName' => $this->input->post("fullname"),
            ];

            $createdUser = $auth->createUser($userProperties);

            $Imageurl = "defaults";
            $userStatus = "offline";

            $postData = [
              'userAge' => $this->input->post("age"),
              'userDepartment' => $this->input->post("department"),
              'userEmail' => $this->input->post("inputEmail"),
              'userFullName' => $this->input->post("fullname"),
              'userHandphone' =>$this->input->post("phonenumber"),
              'userHomeAddress' =>$this->input->post("address"),
              'userHospital' => $this->input->post("hospital"),
              'userId' => $newUserKey,
              'userImageurl' => $Imageurl,
              'userstatus' => $userStatus,
              'userPassword' => $this->input->post("inputpassword"),
              'userPosition' => $this->input->post("position"),
              'userStaffID' =>$this->input->post("staffID"),

            ];
            $updates = [
              'Users/'.$newUserKey => $postData,

            ];
            $database->getReference() // this is the root reference
            ->update($updates);


            $postMedicalData = [
              'Annual_Leave' => '20',
              'Medical_Certificate' => '0',
              'Public_Holiday' => '19',
              'Total_Leave' => '39',

            ];
            $Medicalupdates = [
              'Medical Leave/'.$newUserKey => $postMedicalData,

            ];
            $database->getReference() // this is the root reference
            ->update($Medicalupdates);
          }



          function add_department_action()
          {  
              $this->load->model("admin_operation"); 
              $insert_data = array(  
                "Name"=>$this->input->post("dname"),  
                "Unit"=>$this->input->post("unit"),
                "Manager_Name"=>$this->input->post("manager_name"));  
              $this->admin_operation->insert_department_data($insert_data); 
              echo 'Data Inserted';  
          }

          function update_department_action(){
            $this->load->model("admin_operation"); 
              $updated_data = array(  
                "Name"=>$this->input->post("dname"),  
                "Unit"=>$this->input->post("unit"),
                "Manager_Name"=>$this->input->post("manager_name"));
              $this->admin_operation->update_department_data($this->input->post("user_id"), $updated_data);  
              echo 'Data Updated'; 
          }  

          function add_hospital_action()
          {  
              $this->load->model("admin_operation"); 
              $insert_data = array(  
                "Name"=>$this->input->post("hname"),  
                "Location"=>$this->input->post("location"),
                "Type"=>$this->input->post("hospital_type"));  
              $this->admin_operation->insert_hospital_data($insert_data); 
              echo 'Data Inserted';  
          }

          function update_hospital_action(){
            $this->load->model("admin_operation"); 
              $updated_data = array(  
                "Name"=>$this->input->post("hname"),  
                "Location"=>$this->input->post("location"),
                "Type"=>$this->input->post("hospital_type"));     
              $this->admin_operation->update_hospital_data($this->input->post("user_id"), $updated_data);  
              echo "Data Updated";
          }  

    //update user
          function fetch_single_scheduler()  
          {  
           $output = array();  
           $this->load->model("admin_operation");  
           $data = $this->admin_operation->fetch_single_scheduler($_POST["user_id"]);  
           foreach($data as $row)  
           {  
            $output['fullname'] = $row->Name;  
            $output['gender'] = $row->Gender;  
            $output['phonenumber'] = $row->Phone_Number;  
            $output["email"] = $row->Email;
            $output['department'] = $row->Department;  
            $output['hospital'] = $row->Hospital;    
          }  
          echo json_encode($output);  
        }

        function fetch_single_clinician()  
        {  
          $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

          $firebase = (new Factory)
          ->withServiceAccount($serviceAccount)
          ->create();

          $database = $firebase->getDatabase();
          $clinician_data = $_POST["user_id"];
          $clinician_reference = $database->getReference('Users/'.$clinician_data)->getSnapshot()->getValue();
          

          echo json_encode($clinician_reference);  
        }  

        function fetch_single_department()  
        {  
         $output = array();  
         $this->load->model("admin_operation");  
         $data = $this->admin_operation->fetch_single_department($_POST["user_id"]);  
         foreach($data as $row)  
         {  
          $output['dname'] = $row->Name;  
          $output['unit'] = $row->Unit;
          $output['manager_name'] = $row->Manager_Name;  
        }  
        echo json_encode($output);  
      }  

      function fetch_single_hospital()  
      {  
       $output = array();  
       $this->load->model("admin_operation");  
       $data = $this->admin_operation->fetch_single_hospital($_POST["user_id"]);  
       foreach($data as $row)  
       {  
        $output['hname'] = $row->Name;  
        $output['location'] = $row->Location;
        $output['hospital_type'] = $row->Type;  
      }  
      echo json_encode($output);  
    }    

    //delete user
    function delete_single_scheduler()  
    {  
     $this->load->model("admin_operation");  
     $this->admin_operation->delete_single_scheduler($_POST["user_id"]);  
     echo 'Data Deleted';  
   }

   function delete_single_clinician()  
   {  
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/medical_firebase.json');

    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();
    $auth = $firebase->getAuth();

    $database = $firebase->getDatabase();


           // $this->load->model("admin_operation");  
    $user_id = ($_POST["user_id"]); 
    $delete_reference = $database->getReference('Users/'.$user_id);
    $delete_reference->remove();
    $auth->deleteUser($user_id);

    $delete_clinician_all_leave = $database->getReference('Medical Leave/'.$user_id);
    $delete_clinician_all_leave->remove();

    echo 'Data Deleted';  
  } 

  function delete_single_department()  
  {  
   $this->load->model("admin_operation");  
   $this->admin_operation->delete_single_department($_POST["user_id"]);  
   echo 'Data Deleted';  
 } 

 function delete_single_hospital()  
 {  
   $this->load->model("admin_operation");  
   $this->admin_operation->delete_single_hospital($_POST["user_id"]);  
   echo 'Data Deleted';  
 }     
}

?>