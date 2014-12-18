<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends Priv_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
	}

	public function index()
	{
		$data = array(
			'content' => 'report/report_view',
			'date'		=> $this->uri->segment(3),
			'risk_score'	=> $this->uri->segment(4)
			);
		$this->load->view('template', $data);
	}

	private function getReport() {
		/* Connect to Elasticsearch node and query for company and date
			Return JSON
		*/		
	}

}

/* End of file report.php */
/* Location: ./application/controllers/report.php */