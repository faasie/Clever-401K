<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Priv_Controller {

	private $_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->_data['user'] 	= $this->Dashboard_model->getUser();
		$this->_data['history'] = $this->Dashboard_model->getQuestionHistory($this->_data['user']->id);
		$this->_data['company'] = $this->Dashboard_model->getCompany($this->_data['user']->company_id);
		$this->_data['plans'] 	= $this->Dashboard_model->getPlans($this->_data['user']->company_id);
		$this->session->set_userdata('fullname', $this->_data['user']->first_name . " " . $this->_data['user']->last_name);		
		$this->session->set_userdata('user_id', $this->_data['user']->id);
		


		$this->load->library('Dashboard_library', $this->_data);
	}

	function index()
	{
		$this->_data['content'] = 'dashboard/dashboard_view';
		$this->load->view('template', $this->_data);
	}

	function password()
	{
		$this->_data['content'] = 'user/password_view';
		$this->load->view('template', $this->_data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */