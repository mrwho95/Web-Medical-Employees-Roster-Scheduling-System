<?php 

/**
 * 
 */
class admin_model extends CI_Model
{
	


	function admin_insert($data)
	{
		$this->db->insert("admin", $data);
	}

	function admin_can_login($adminID, $inputpassword)
	{
		$this->db->where('AdminID', $adminID);
		$this->db->where('Password', $admininputpassword);
		$query = $this->db->get('admin');

    $login = $query->row();
    return $login;

		//SELECT * FROM admin WHERE userID = '$userID' AND password = '$password'

		// if ($query->num_rows() > 0) 
		// {
		// 	return true;
		// }else{
		// 	return false;
		// }
	} 

	function fetch_admin_data(){
		$query = $this->db->get("admin");
		return $query;
	}

    //Ajax 
    var $table = "scheduler";  
    var $table2 = "clinician";
    var $table3 = "department";
    var $table4 = "hospital";

    var $select_scheduler_column = array("id", "SchedulerID", "Name", "Gender", "Phone_Number","Email","Department","Hospital");  
    var $order_scheduler_column = array(null, "SchedulerID", "Name", "Gender",  "Phone_Number","Email","Department","Hospital");  

    var $select_clinician_column = array("id", "Name", "ClinicianID", "Gender", "Age", "Phone_Number", "Address","Email","Position","Department","Hospital");  
    var $order_clinician_column = array(null, "Name", "ClinicianID", "Gender", "Age", "Phone_Number", "Address","Email","Position","Department","Hospital");  

    var $select_department_column = array("id", "Name", "Unit", "Manager_Name");
    var $order_department_column = array(null, "Name", "Unit", "Manager_Name");

    var $select_hospital_column = array("id", "Name", "Location", "Type");  
    var $order_hospital_column = array(null, "Name", "Location",  "Type");

    //Scheduler
    function make_scheduler_query()  
      {  
    $this->db->select($this->select_scheduler_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("Name", $_POST["search"]["value"]);
                $this->db->or_like("SchedulerID", $_POST["search"]["value"]);   
                $this->db->or_like("Gender", $_POST["search"]["value"]);
                $this->db->or_like("Phone_Number", $_POST["search"]["value"]);
                $this->db->or_like("Email", $_POST["search"]["value"]);
                $this->db->or_like("Department", $_POST["search"]["value"]);
                $this->db->or_like("Hospital", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_scheduler_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'ASC');  
           }        }  

     function make_scheduler_datatables()
     {  
           $this->make_scheduler_query();   
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result(); 
      }  

      function get_filtered_scheduler_data()
      {  
           $this->make_scheduler_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       

      function get_all_scheduler_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();
       }  


       //Clinician
    function make_clinician_query()  
      {  
    $this->db->select($this->select_clinician_column);  
           $this->db->from($this->table2);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("Name", $_POST["search"]["value"]);  
                $this->db->or_like("Gender", $_POST["search"]["value"]);
                $this->db->or_like("Age", $_POST["search"]["value"]); 
                $this->db->or_like("Phone_Number", $_POST["search"]["value"]);
                $this->db->or_like("Address", $_POST["search"]["value"]);
                $this->db->or_like("Email", $_POST["search"]["value"]);
                $this->db->or_like("Position", $_POST["search"]["value"]);
                $this->db->or_like("Department", $_POST["search"]["value"]);
                $this->db->or_like("Hospital", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_clinician_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'ASC');  
           }        }  

     function make_clinician_datatables()
     {  
           $this->make_clinician_query();   
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result(); 
      }  

      function get_filtered_clinician_data()
      {  
           $this->make_clinician_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       

      function get_all_clinician_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table2);  
           return $this->db->count_all_results();
       }  

       //department
      function make_department_query()  
      {  
           $this->db->select($this->select_department_column);  
           $this->db->from($this->table3);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("Name", $_POST["search"]["value"]);  
                $this->db->or_like("Unit", $_POST["search"]["value"]);
                $this->db->or_like("Manager_Name", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_department_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }

      function make_department_datatables(){  
           $this->make_department_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  

      function get_filtered_department_data(){  
           $this->make_department_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       

      function get_all_department_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table3);  
           return $this->db->count_all_results();  
      }    


      //Hospital 
      function make_hospital_query()  
      {  
          $this->db->select($this->select_hospital_column);  
           $this->db->from($this->table4);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("Name", $_POST["search"]["value"]);  
                $this->db->or_like("Type", $_POST["search"]["value"]);  
                $this->db->or_like("Location", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_hospital_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }        }  

     function make_hospital_datatables()
     {  
           $this->make_hospital_query();   
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result(); 
      }  

      function get_filtered_hospital_data()
      {  
           $this->make_hospital_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       

      function get_all_hospital_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table4);  
           return $this->db->count_all_results();
       }  
	
}

?>