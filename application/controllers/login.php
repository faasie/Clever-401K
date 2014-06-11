<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			$data['content'] = 'login/login_view';
			$this->load->view('template', $data);
		}
		else 
		{
			redirect('user/profile', 'refresh');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */