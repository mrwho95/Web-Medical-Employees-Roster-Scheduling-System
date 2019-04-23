<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Registration extends CI_Controller
{
	public function scheduler_register_index()
	{

		$this->load->view('scheduler_register');
	}

		public function form_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules("name","Name",'required');
			$this->form_validation->set_rules("schedulerID","Scheduler ID",'required');
			$this->form_validation->set_rules("inputEmail","Email",'required');
			$this->form_validation->set_rules("department","Department",'required');
			$this->form_validation->set_rules("inputPassword","Password",'required|min_length[5]');
			$this->form_validation->set_rules("confirm_password","Confirm Password",'required|min_length[5]|matches[inputPassword]');

			if ($this->form_validation->run())
			{
				$this->load->model("main_model");
				$data = array(
				"Name" =>$this->input->post("name"),
				"SchedulerID" =>$this->input->post("schedulerID"),
				"Email" =>$this->input->post("inputEmail"),
				"Department" =>$this->input->post("department"),
				"Password" =>$this->input->post("inputPassword")
				);

				$this->main_model->scheduler_insert($data);

				 $this->session->set_flashdata('success_msg', 'Register Scheduler Account Successful.');
        		 
				redirect(base_url()."Registration/scheduler_register_index");

				// $this->output->set_header('refresh:3; url=login/index');
			}
			else
			{
				$this->session->set_flashdata('error_msg', 'Failed Register Scheduler Account.');
        		return redirect(base_url()."Registration/scheduler_register_index");
				// $this->scheduler_register_index();
			}

		}

		public function admin_register_index()
	{

		$this->load->view('admin_register');
	}

		public function admin_form_validation()
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
				$this->load->model("main_model");
				$data = array(
				"Name" =>$this->input->post("name"),
				"AdminID" =>$this->input->post("adminID"),
				"Email" =>$this->input->post("inputEmail"),
				"Phone_Number" =>$this->input->post("phonenumber"),
				"Password" =>$this->input->post("inputPassword")
				);

				$this->main_model->admin_insert($data);
				 $this->session->set_flashdata('success_msg', 'Register Administrator Account Successful.');
        		 
				redirect(base_url()."Registration/admin_register_index");
				
				// $this->output->set_header('refresh:3; url=login/index');
			}
			else
			{
				$this->session->set_flashdata('error_msg', 'Failed Register Administrator Account.');
        		return redirect(base_url()."Registration/admin_register_index");
				// $this->scheduler_register_index();
			}

		}
}


?>