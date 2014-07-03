<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	function login()
	{
		$user 	= $this->input->post('identity');
		$pw 	= $this->input->post('password');

		if ($this->ion_auth->login($user, $pw)) {
			$user = $this->ion_auth->user()->row();
			$this->session->set_userdata('fullname', $user->first_name . " " . $user->last_name);
			$this->session->set_userdata('user_id', $user->id);
			$this->session->set_userdata('username', $user->username);
			$this->session->set_userdata('company_id', $user->company);
			redirect('dashboard','refresh');
		} else {
			$msg = (!$this->ion_auth->username_check($user)) ? "Username not found!" : "Login failed. Please try again.";
			$this->session->set_flashdata('type', 'alert-danger');
			$this->session->set_flashdata('message', $msg);
			redirect('login', 'redirect');
		}
	}

	function changePassword()
	{
		$this->form_validation->set_rules('old_pw', 'old password', 'trim|required|xss_clean');
		$this->form_validation->set_rules(
			'new_pw', 
			'new password', 
			'trim|required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|xss_clean');
		$this->form_validation->set_rules(
			'verify_pw', 
			'verify password', 
			'trim|required|matches[new_pw]|xss_clean');

		if ($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('type', 'alert-danger');
			$this->session->set_flashdata('message', validation_errors());
			redirect('dashboard/password', 'redirect');
		} else {
			$identity 	= $this->session->userdata('username');
			$old_pw		= $this->input->post('old_pw');
			$new_pw 	= $this->input->post('new_pw');
			$change 	= $this->ion_auth->change_password($identity, $old_pw, $new_pw);
			if($change) {
				$this->session->set_flashdata('type', 'alert-success');
				$this->session->set_flashdata('message', 'Password successfully changed.');
				redirect('dashboard', 'redirect');
			} else {
				$flash = array('type' => 'alert-danger', 'message' => 'Password change FAILED. Your password has not been changed. <br />Your old password was likely typed incorrectly.');
				$this->session->set_flashdata($flash);
				redirect('dashboard/password', 'redirect');
			}
		}

	}

	function logout()
	{
		$this->ion_auth->logout();
		// $this->session->sess_destroy();
		$this->session->set_flashdata('type', 'alert-success');
		$this->session->set_flashdata('message', 'Logout successful.');
		redirect('site','refresh');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */