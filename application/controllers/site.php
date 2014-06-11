<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MY_Controller {

	public function index()
	{
		if (!$this->ion_auth->logged_in()) {
			$data['content'] = 'site/index_view';
			$this->load->view('template', $data);
		} else {
			$data['content'] = 'site/index_view';
			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('template', $data);
		}
	}

}

/* End of file site.php */
/* Location: ./application/controllers/site.php */