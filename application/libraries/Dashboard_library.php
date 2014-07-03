<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_library
{
	private $_data;
	private $CI;
	private $template;

	public function __construct($data)
	{
		$this->_data = $data;
		$this->CI =& get_instance();
		$this->CI->load->library('table');
		$this->template = array(
			'table_open' => '<table width="75%" class="table">'
			);
			 // 'table_open' => '<table width="75%" class="table table-striped table-bordered table-condensed">'			 
		$this->CI->table->set_template($this->template);
	}

	public function showUserInfo()
	{
		$this->CI->table->add_row('<strong>Gender</strong>', $this->_data['user']->gender);
		$this->CI->table->add_row('<strong>Age</strong>', $this->_data['user']->age);
		$this->CI->table->add_row('<strong>Retirement Age</strong>', $this->_data['user']->retirement_age);
		$this->CI->table->add_row('<strong>Education</strong>', $this->_data['user']->edu_level);

		echo $this->CI->table->generate();
	}

	public function showCompanyInfo()
	{
		$this->CI->table->set_heading('Company Name','Company Description');
		$this->CI->table->add_row($this->_data['company']->company_name, $this->_data['company']->company_description);
		echo $this->CI->table->generate();
	}

	public function showPlansInfo()
	{
		$this->CI->table->set_heading('Available Plans', 'Plan Description');
		foreach ($this->_data['plans'] as $p) {
			$this->CI->table->add_row($p->plan_name, $p->plan_description);
		}
		echo $this->CI->table->generate();
	}

	public function showQuestionHistory()
	{
		if (!$this->_data['history']) {
			echo "No questionaires on record.";
			echo "<br /><br />";
		} else {
			$this->CI->table->set_heading('Date Taken', 'View Questionaire');
			foreach ($this->_data['history'] as $q) {
				$this->CI->table->add_row($q->date_taken, "click");
			}
		echo $this->CI->table->generate();
		}
	}
}