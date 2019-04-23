<?php 

/**
 * 
 */
class admin2 extends CI_Controller
{

	//add user //edit user
	function add_scheduler_action(){  
        if($_POST["action"] == "Add")
        {
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
        if($_POST["action"] == "Update")
        {
            $this->load->model("admin_operation"); 
                $updated_data = array(  
                    "Name"=>$this->input->post("fullname"),  
                    "Password"=>$this->input->post("inputpassword"),
                    "Email"=>$this->input->post("inputEmail"),
                    "Department"=>$this->input->post("department"),
                    "Hospital"=>$this->input->post("hospital"),
                    "SchedulerID"=>$this->input->post("schedulerID"),
                    "Phone_Number"=>$this->input->post("phonenumber"),
                    "Gender"=>$this->input->post("gender"));  
                $this->admin_operation->update_scheduler_data($this->input->post("user_id"), $updated_data);  
                echo "Data Updated"; 
            
            }
    	}

        function add_clinician_action(){  
        if($_POST["action"] == "Add")
        {
            $this->load->model("admin_operation"); 
                $insert_data = array(  
                    "Name"=>$this->input->post("fullname"),
                    "ClinicianID"=>$this->input->post("clinicianID"),  
                    "Password"=>$this->input->post("inputpassword"),
                    "Email"=>$this->input->post("inputEmail"),
                    "Department"=>$this->input->post("department"),
                    "Hospital"=>$this->input->post("hospital"),
                    "ClinicianID"=>$this->input->post("clinicianID"),
                    "Phone_Number"=>$this->input->post("phonenumber"),
                    "Gender"=>$this->input->post("gender"),
                    "Age"=>$this->input->post("age"),
                    "Address"=>$this->input->post("address"),
                    "Position"=>$this->input->post("position"));  
                $this->admin_operation->insert_clinician_data($insert_data);  
                echo "Data Inserted";   
            }

        if($_POST["action"] == "Update")
        {
            $this->load->model("admin_operation"); 
                $updated_data = array(  
                    "Name"=>$this->input->post("fullname"),
                    "ClinicianID"=>$this->input->post("clinicianID"),  
                    "Password"=>$this->input->post("inputpassword"),
                    "Email"=>$this->input->post("inputEmail"),
                    "Department"=>$this->input->post("department"),
                    "Hospital"=>$this->input->post("hospital"),
                    "ClinicianID"=>$this->input->post("clinicianID"),
                    "Phone_Number"=>$this->input->post("phonenumber"),
                    "Gender"=>$this->input->post("gender"),
                    "Age"=>$this->input->post("age"),
                    "Address"=>$this->input->post("address"),
                    "Position"=>$this->input->post("position"));  
                $this->admin_operation->update_clinician_data($this->input->post("user_id"), $updated_data);  
                echo "Data Updated";   
            }
         }

        function add_department_action()
        {  
            if($_POST["action"] == "Add")
              {
              $this->load->model("admin_operation"); 
                $insert_data = array(  
                    "Name"=>$this->input->post("dname"),  
                    "Unit"=>$this->input->post("unit"),
                    "Manager_Name"=>$this->input->post("manager_name"));  
                $this->admin_operation->insert_department_data($insert_data); 
                echo 'Data Inserted';  
            }
        if($_POST["action"] == "Update")
        {
            $this->load->model("admin_operation"); 
                $updated_data = array(  
                    "Name"=>$this->input->post("dname"),  
                    "Unit"=>$this->input->post("unit"),
                    "Manager_Name"=>$this->input->post("manager_name"));
                $this->admin_operation->update_department_data($this->input->post("user_id"), $updated_data);  
                echo "Data Updated"; 
            
            }
      }  

      function add_hospital_action()
        {  
            if($_POST["action"] == "Add")
              {
              $this->load->model("admin_operation"); 
                $insert_data = array(  
                    "Name"=>$this->input->post("hname"),  
                    "Location"=>$this->input->post("location"),
                    "Type"=>$this->input->post("hospital_type"));  
                $this->admin_operation->insert_hospital_data($insert_data); 
                echo 'Data Inserted';  
            }

           if($_POST["action"] == "Update")
        {
            $this->load->model("admin_operation"); 
                $updated_data = array(  
                    "Name"=>$this->input->post("hname"),  
                    "Location"=>$this->input->post("location"),
                    "Type"=>$this->input->post("hospital_type"));     
                $this->admin_operation->update_hospital_data($this->input->post("user_id"), $updated_data);  
                echo "Data Updated"; 
            
            }
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
                $output['schedulerID'] = $row->SchedulerID;  
                $output['inputEmail'] = $row->Email;  
                $output['inputpassword'] = $row->Password;  
                $output['phonenumber'] = $row->Phone_Number;  
                $output['department'] = $row->Department;  
                $output['hospital'] = $row->Hospital;    
           }  
           echo json_encode($output);  
      }

      function fetch_single_clinician()  
      {  
           $output = array();  
           $this->load->model("admin_operation");  
           $data = $this->admin_operation->fetch_single_clinician($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['fullname'] = $row->Name;  
                $output['gender'] = $row->Gender;
                $output['clinicianID'] = $row->ClinicianID;
                $output['age'] = $row->Age;
                $output['address'] = $row->Address;
                $output['position'] = $row->Position;  
                $output['inputEmail'] = $row->Email;  
                $output['inputpassword'] = $row->Password;  
                $output['phonenumber'] = $row->Phone_Number;  
                $output['department'] = $row->Department;  
                $output['hospital'] = $row->Hospital;  
           }  
           echo json_encode($output);  
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
           $this->load->model("admin_operation");  
           $this->admin_operation->delete_single_clinician($_POST["user_id"]);  
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