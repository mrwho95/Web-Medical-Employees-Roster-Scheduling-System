<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class admin extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin_index');
	}	

	public function clinician(){
		$this->load->view('admin_clinician');
	}

	public function department(){
		$this->load->view('admin_department');
	}

	public function hospital(){
		$this->load->view('admin_hospital');
	}

	public function admin_details(){
    $this->load->model("main_model");
    $data['fetch_data'] = $this->main_model->fetch_admin_data();
		$this->load->view('admin_profile', $data);

	}

 public function update_admin_form_validation()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules("name","Name",'required');
      $this->form_validation->set_rules("adminID","Admin ID",'required');
      $this->form_validation->set_rules("inputEmail","Email",'required');
      $this->form_validation->set_rules("phonenumber","Phone Number",'required');
      $this->form_validation->set_rules("inputPassword","Password",'required|min_length[5]');
      $this->form_validation->set_rules("confirm_password","Confirm Password",'required|min_length[5]|matches[inputPassword]');

      if ($this->form_validation->run())
      {
        $data = array(
        "Name" =>$this->input->post("name"),
        "AdminID" =>$this->input->post("adminID"),
        "Email" =>$this->input->post("inputEmail"),
        "Phone_Number" =>$this->input->post("phonenumber"),
        "Password" =>$this->input->post("inputPassword")
        );

      $this->load->model('main_model');
      $result = $this->main_model->update_admin_profile($this->input->post("adminID"), $data);
      if ($result > 0) {
        $session_data = array(
          'admin_fullname' => $data['Name'],
          'admin_ID' => $data['AdminID'],
          'admin_email' => $data['Email'],
          'admin_phonenumber' => $data['Phone_Number'],
          'admin_password' => $data['Password']

        );
        
        $this->session->set_userdata($session_data);
        $this->session->set_flashdata('success_msg', 'Administrator Profile is Updated.');
        return redirect('admin/admin_details');

      }else{
        $this->session->set_flashdata('error_msg', 'Error: Not Update Administrator Profile');
        return redirect('admin/admin_details');

      }
      
     
    } else
      {
        $this->admin_details();
      }
  }


  public function access_scheduler_request()
  {
    $this->load->view('admin_special');
  }

    //scheduler
    public function fetch_scheduler_data(){
    $this->load->model("admin_model");  
           $fetch_scheduler_data = $this->admin_model->make_scheduler_datatables();  
           $data = array();  
           foreach($fetch_scheduler_data as $row)  
           {  
                $sub_array = array();  
                /*$sub_array[] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  */
                $sub_array[] = $row->Name;  
                $sub_array[] = $row->Gender;
                $sub_array[] = $row->Phone_Number;
                $sub_array[] = $row->Email; 
                $sub_array[] = $row->Department;  
                $sub_array[] = $row->Hospital;   
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal"=>$this->admin_model->get_all_scheduler_data(),  
                "recordsFiltered"=>$this->admin_model->get_filtered_scheduler_data(),  
                "data"=>$data  
           );  
           echo json_encode($output);  
      }  


      //Clinician
    public function fetch_clinician_data(){
    $this->load->model("admin_model");  
           $fetch_clinician_data = $this->admin_model->make_clinician_datatables();  
           $data = array();  
           foreach($fetch_clinician_data as $row)  
           {  
                $sub_array = array();  
                /*$sub_array[] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  */
                $sub_array[] = $row->Name;  
                $sub_array[] = $row->Gender;
                $sub_array[] = $row->Age;
                $sub_array[] = $row->Phone_Number;
                $sub_array[] = $row->Address;
                $sub_array[] = $row->Email; 
                $sub_array[] = $row->Position; 
                $sub_array[] = $row->Department;  
                $sub_array[] = $row->Hospital;   
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal"=>$this->admin_model->get_all_clinician_data(),  
                "recordsFiltered"=>$this->admin_model->get_filtered_clinician_data(),  
                "data"=>$data  
           );  
           echo json_encode($output);  
      }  


      //department
    public function fetch_department_data(){
    $this->load->model("admin_model");  
           $fetch_department_data = $this->admin_model->make_department_datatables();  
           $data = array();  
           foreach($fetch_department_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->Name;  
                $sub_array[] = $row->Unit;  
                $sub_array[] = $row->Manager_Name;   
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal"=>$this->admin_model->get_all_department_data(),  
                "recordsFiltered"=>$this->admin_model->get_filtered_department_data(),  
                "data"=>$data  
           );  
           echo json_encode($output);  
      }  


      //hospital
      public function fetch_hospital_data(){
      $this->load->model("admin_model");  
           $fetch_hospital_data = $this->admin_model->make_hospital_datatables();  
           $data = array();  
           foreach($fetch_hospital_data as $row)  
           {  
                $sub_array = array();  
                /*$sub_array[] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  */
                $sub_array[] = $row->Name;  
                $sub_array[] = $row->Location;
                $sub_array[] = $row->Type; 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal"=>$this->admin_model->get_all_hospital_data(),  
                "recordsFiltered"=>$this->admin_model->get_filtered_hospital_data(),  
                "data"=>$data  
           );  
           echo json_encode($output);  
      }  
	   

}

 ?>