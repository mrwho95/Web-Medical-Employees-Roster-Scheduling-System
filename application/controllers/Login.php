<?php 
/**
 * 
 */
class login extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('Login_Page');
	}

		public function scheduler_form_validation()
		{
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules("schedulerID","Scheduler ID",'required');
			$this->form_validation->set_rules("inputPassword","Password",'required');

			if ($this->form_validation->run())
			{
				$schedulerID = $this->input->post("schedulerID");
				$inputPassword = $this->input->post("inputPassword");

				$this->load->model('main_model');
				$login = $this->main_model->scheduler_can_login($schedulerID, $inputPassword);

				if ($login)
				{
					$session_data = array(
						'schedulerID' => $schedulerID
					);
					$this->session->set_userdata($session_data);
					$this->scheduler_recaptcha();
					return redirect('scheduler_index');
					//redirect(base_url().'scheduler/index');
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Scheduler ID and Password');
					// redirect(base_url().'login/index');
					echo "Invalid Scheduler ID or Password";
				}

			}
			else
			{
				$this->index();
			}

		}

		public function admin_form_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules("adminID","Admin ID",'required');
			$this->form_validation->set_rules("admininputPassword","Password",'required');

			if ($this->form_validation->run())
			{
				$adminID = $this->input->post("adminID");
				$admininputPassword = $this->input->post("admininputPassword");

				$this->load->model('main_model');
				if ($this->main_model->admin_can_login($adminID, $admininputPassword))
				{
					$session_data = array(
						'adminID' => $adminID
					);
					$this->session->set_userdata($session_data);
					$this->admin_recaptcha();
					//redirect(base_url().'admin/index');
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Admin ID and Password');
					// redirect(base_url().'login/index');
					echo "Invalid Admin ID or Password";
				}

			}
			else
			{
				$this->index();
			}

		}

		public function admin_recaptcha(){
			$form_response = $this->input->post('g-recaptcha-response');
			$url= "https://www.google.com/recaptcha/api/siteverify";
			$sitekey = "6LeGaJcUAAAAAHXY_wKVPgoxso2whLb5kmAelkgn";
			$response = file_get_contents($url. "?secret=" .$sitekey."&response=".$form_response."&remoteip=".$_SERVER["REMOTE_ADDR"]);
			$data = json_decode($response);
			if (isset($data->success)&& $data->success=="true") {
				//echo "Successfully Paseed Through Captcha";
				redirect(base_url().'admin/index');
			}else{
				echo "Please Fill Captcha";
				//redirect(base_url().'login/index');
			}
		}

		public function scheduler_recaptcha(){
			$form_response = $this->input->post('g-recaptcha-response');
			$url= "https://www.google.com/recaptcha/api/siteverify";
			$sitekey = "6LeGaJcUAAAAAHXY_wKVPgoxso2whLb5kmAelkgn";
			$response = file_get_contents($url. "?secret=" .$sitekey."&response=".$form_response."&remoteip=".$_SERVER["REMOTE_ADDR"]);
			$data = json_decode($response);
			if (isset($data->success)&& $data->success=="true") {
				//echo "Successfully Paseed Through Captcha";
				redirect(base_url().'scheduler/index');
			}else{
				echo "Please Fill Captcha";
				//redirect(base_url().'login/index');
			}
		}
		

}

?>