<?php  
/**
 * 
 */
class admin_operation extends CI_Model
{

	//add user
	function insert_scheduler_data($data)  
      {  
           $this->db->insert('scheduler', $data);  
      }

    function insert_clinician_data($data)
    {
    	$this->db->insert('clinician', $data);  
    }

    function insert_department_data($data)  
      {  
           $this->db->insert('department', $data);  
      } 

    function insert_hospital_data($data)  
      {  
           $this->db->insert('hospital', $data);  
      }  
 	

 	//update user
     function fetch_single_scheduler($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $query=$this->db->get('scheduler');  
           return $query->result();  
      }
      function update_scheduler_data($user_id, $data)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->update("scheduler", $data);  
      }

      function fetch_single_clinician($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $query=$this->db->get('clinician');  
           return $query->result();  
      }
      function update_clinician_data($user_id, $data)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->update("clinician", $data);  
      } 

      function fetch_single_department($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $query=$this->db->get('department');  
           return $query->result();  
      }
      function update_department_data($user_id, $data)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->update("department", $data);  
      }

      function fetch_single_hospital($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $query=$this->db->get('hospital');  
           return $query->result();  
      }
      function update_hospital_data($user_id, $data)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->update("hospital", $data);  
      }     

      //delete user
      function delete_single_scheduler($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->delete("scheduler");  
           //DELETE FROM users WHERE id = '$user_id'  
      }

      function delete_single_clinician($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->delete("clinician");  
           //DELETE FROM users WHERE id = '$user_id'  
      }

      function delete_single_department($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->delete("department");  
           //DELETE FROM users WHERE id = '$user_id'  
      }

      function delete_single_hospital($user_id)  
      {  
           $this->db->where("ID", $user_id);  
           $this->db->delete("hospital");  
           //DELETE FROM users WHERE id = '$user_id'  
      }    

}

?>