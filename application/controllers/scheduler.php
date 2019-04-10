<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class scheduler extends CI_Controller {


		public function index()
	{
    $this->load->model("main_model");
    $data["fetch_data"] = $this->main_model->fetch_roster_data();
		$this->load->view('scheduler_index',$data);
	}

  public function fetch_duty_schedule_pdf(){
    $this->load->model("main_model");
    $data = $this->main_model->fetch_roster_data();
    $output = '';
    if ($data ->num_rows() > 0) {
      foreach ($data -> result() as $row) {
        $output .= '<tr>
                      <td>'.$row->ID.'</td>
                      <td>'.$row->Name.'</td>
                      <td>'.$row->Role.'</td>
                      <td>'.$row->L.'</td>
                      <td>'.$row->PH.'</td>
                      <td>'.$row->MON.'</td>
                      <td>'.$row->TUE.'</td>
                      <td>'.$row->WED.'</td>
                      <td>'.$row->THU.'</td>
                      <td>'.$row->FRI.'</td>
                      <td>'.$row->SAT.'</td>
                      <td>'.$row->SUN.'</td>
                    </tr>'; 
      }
      
    }else{
      $output .= '<tr>
                    <td colspan="3">No Data Found</td>
                  </tr>';
      }
    return $output;

  }

  public function generate_pdf(){

    if (isset($_POST["generate_pdf"])) 
    {
    require_once('tcpdf/tcpdf.php');
    // require_once('tcpdf/config/lang/eng.php');

      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("Medical Duty Roster");
      $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 10);
      $obj_pdf->SetFont('helvetica', '',11);
      $obj_pdf->AddPage();
      $content = '';
      $content .= '<h2 align ="center">MEDICAL EMPLOYEES ROSTER</h2>
      <h3 align ="center">18/3/2019 - 24/3/2019</h3>
       <table border = "1" cellspacing="0" cellpadding ="5">
              <tr>
                <th width = "5%">No</th>
                <th width = "14.5%">Name</th>
                <th>Role</th>
                <th width= "7%">L</th>
                <th width= "7%">PH</th>
                <th>MON</th>
                <th>TUE</th>
                <th>WED</th>
                <th>THU</th>
                <th>FRI</th>
                <th>SAT</th>
                <th>SUN</th>
              </tr>
            </thead>';
      $content .= $this->fetch_duty_schedule_pdf();
      $content .= '
            <tfoot>
              <tr>
                <td colspan="12">Morning Shift AM - 0700-1400 (Nurse) / 0700-1900 (Doctor)</td>
              </tr>
              <tr>
                <td colspan="12">Afternoon Shift PM - 1400-2100 (Nurse) / 0700-2200 (Doctor)</td>
              </tr>  
              <tr>
                <td colspan="12">Night Shift ND - 2100-0700 (Nurse)</td>
              </tr>
              <tr>
                <td colspan="12">On-Call OC - 0700-1200(Next Day) (Doctor)</td>
              </tr>
            </tfoot>
            <tbody style="text-align: center;">';
      $content .= '</tbody>
      </table>';
      $obj_pdf->writeHTML($content);
      $obj_pdf->Output('Medical Duty Roster.pdf', 'I');
    }



  }

		public function calendar()
	{
    $this->load->model("main_model");
    $data["fetch_calendar_data"] = $this->main_model->fetch_calendar_data();
		$this->load->view('scheduler_calendar',$data);
	}

		public function jobplanning()
	{
		$this->load->view('scheduler_jobplanning');
	}

		public function staff()
	{
		$this->load->view('scheduler_staff');
	}

	public function scheduler_details(){
    $this->load->model("main_model");
    $data["fetch_data"] = $this->main_model->fetch_scheduler_data();
		$this->load->view('scheduler_profile', $data);
	}

	public function department_work_policy(){
		$this->load->view('work_policy');
	}

public function update_scheduler_form_validation()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules("name","Name",'required');
      $this->form_validation->set_rules("schedulerID","Scheduler ID",'required');
      $this->form_validation->set_rules("inputEmail","Email",'required');
      $this->form_validation->set_rules("department","Department",'required');
      $this->form_validation->set_rules("inputPassword","Password",'required|min_length[5]');
      $this->form_validation->set_rules("confirm_password","Confirm Password",'required|min_length[5]|matches[inputPassword]');
      $this->form_validation->set_rules("phonenumber","Phone Number",'required');
      $this->form_validation->set_rules("gender","Gender",'required');
      $this->form_validation->set_rules("hospital","Hospital",'required');

      if ($this->form_validation->run())
      {
        $this->load->model("main_model");
        $data = array(
        "Name" =>$this->input->post("name"),
        "SchedulerID" =>$this->input->post("schedulerID"),
        "Email" =>$this->input->post("inputEmail"),
        "Department" =>$this->input->post("department"),
        "Password" =>$this->input->post("inputPassword"),
        "Hospital" =>$this->input->post("hospital"),
        "Phone_Number" =>$this->input->post("phonenumber"),
        "Department" =>$this->input->post("department")
        );

        $this->load->model('main_model');
      $result = $this->main_model->update_scheduler_profile($this->input->post("schedulerID"), $data);
      if ($result > 0) {
        $session_data = array(
          'scheduler_fullname' => $data['Name'],
          'scheduler_ID' => $data['SchedulerID'],
          'scheduler_email' => $data['Email'],
          'scheduler_phonenumber' => $data['Phone_number'],
          'scheduler_password' => $data['Password'],
          'scheduler_department' => $data['Department'],
          'scheduler_gender' => $data['Gender'],
          'scheduler_hospital' => $data['Hospital']

        );
        $this->session->set_userdata($session_data);
        $this->session->set_flashdata('success_msg', 'Scheduler Profile is Updated.');
        return redirect('scheduler/scheduler_details');
      }else{
        $this->session->set_flashdata('error_msg', 'Error: Not Update Scheduler Profile');
        return redirect('scheduler/scheduler_details');
      }
      
      

    }else
      {
        $this->scheduler_details();
      }
  }



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


}
?>