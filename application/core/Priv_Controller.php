<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Priv_Controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->ion_auth->logged_in())
		{
			$data = array(
				'type' => 'alert-danger', 
				'message' => 'You must be logged in to view this page.'
				);
			$this->session->set_flashdata($data);
			redirect('site','redirect');
		}
	}
}

/* End of file Priv_Controller.php */
/* Location: ./application/core/Priv_Controller.php */