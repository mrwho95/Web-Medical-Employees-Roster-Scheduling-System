<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */


class Forgot_Password extends CI_Controller
{
	
	public function Email($inputemail,$subject,$message)
	{
		$this->load->library('email');

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'dnkh903@gmail.com',
			'smtp_pass' => 'Dnkh0903',
			'smtp_port' => '465',
			'smtp_crypto' => 'ssl',
			'mailtype' => 'html',
			'charset' => 'utf-8'
		);
		// $config['protocol']="smtp";
		// $config['smtp_host']="smtp.gmail.com";
		// $config['smtp_user']="dennisngu95@gmail.com";
		// $config['smtp_pass']="Dnkh7838";
		// $config['smtp_port']="465";
		// $config['smtp_crypto'] = 'ssl';
		// $config['mailtype']="html";
		// $config['charset']  = 'utf-8';
		
		
		$this->email->initialize($config);

		$this->email->set_newline("\r\n");  
		$this->email->to("dennisngu95@gmail.com");
		$this->email->from("dnkh903@gmail.com","Dennis Ngu");
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {
			echo "Successful to send reset password link to your Email";
		}else{
			echo "failed";
			show_error($this->email->print_debugger());
		}
	}
    
	public function reset_link(){
		$email = $this->input->post('inputEmail');
		$result = $this->db->query("select * from scheduler where Email='".$email."'")->result_array();

		if (count($result)> 0) {

			// echo "Exist";
			$tokan = rand(1000,9999);

			$this->db->query("update scheduler set Password='".$tokan."' where Email='".$email."'");

			$message = "Please click on password reset link to reset password.<br><a href='".base_url('Forgot_Password/reset?tokan=').$tokan."'>Reset Password</a>";
			$this->Email($email, 'Scheduler Reset Password Link', $message);

		}else{
			echo "Email not registerd";
			// redirect(base_url('Forgot_Password/scheduler'));		
		}

	}

	public function reset(){
		$data['tokan'] = $this->input->get('tokan');
		$_SESSION['tokan']=$data['tokan'];
		$this->load->view('resetpassword');
	}

	public function updatepassword(){
		$_SESSION['tokan'];
		$data = $this->input->post();
		if ($data['inputnewPassword'] == $data['inputcPassword']) {
			$this->db->query("update scheduler set Password='".$data['inputnewPassword']."'where Password='".$_SESSION['tokan']."'");
			echo "Update password successful!";
		}else{
			echo "Update password failed!";
		}
	}

		public function scheduler()
	{
		$this->load->view('forgot_password');
	}

		public function admin()
	{
		$this->load->view('admin_forgot_password');
	}

		public function admin_reset_link(){
		$email = $this->input->post('inputEmail');
		$result = $this->db->query("select * from admin where Email='".$email."'")->result_array();

		if (count($result)> 0) {

			// echo "Exist";
			$tokan = rand(1000,9999);

			$this->db->query("update admin set Password='".$tokan."' where Email='".$email."'");

			$message = "Please click on password reset link to reset password.<br><a href='".base_url('Forgot_Password/admin_reset?tokan=').$tokan."'>Reset Password</a>";
			$this->Email($email, 'Administrator Reset Password Link', $message);

		}else{
			echo "Email not registerd";
			// redirect(base_url('Forgot_Password/scheduler'));		
		}

	}

	public function admin_reset(){
		$data['tokan'] = $this->input->get('tokan');
		$_SESSION['tokan']=$data['tokan'];
		$this->load->view('admin_resetpassword');
	}

		public function admin_updatepassword(){
		$_SESSION['tokan'];
		$data = $this->input->post();
		if ($data['inputnewPassword'] == $data['inputcPassword']) {
			$this->db->query("update admin set Password='".$data['inputnewPassword']."'where Password='".$_SESSION['tokan']."'");
			echo "Update password successful!";
		}else{
			echo "Update password failed!";
		}
	}




}
  ?>