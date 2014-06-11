<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->ion_auth->is_admin()) 
		{
			$data = array(
				'type' => 'alert-danger', 
				'message' => 'You must be an admin to view this page.'
				);
			$this->session->set_flashdata($data);
			redirect('site','redirect');
		}
	}
}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */