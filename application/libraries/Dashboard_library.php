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
		$this->CI->load->helper('html');
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
		// echo "<div class='well'>";
		echo '<div id="plans">';
		foreach ($this->_data['plans'] as $provider => $plans) {
			echo "<p>" . $provider . "</p>";
			echo "<div>";
			echo "<p>";
			echo ul($plans);
			echo "</p>";
			echo "</div>";
		}
		echo "</div>";
		// echo "</div>";
	}

	public function showQuestionHistory()
	{
		if (!$this->_data['history']) {
			echo "No questionaires on record.";
			echo "<br /><br />";
		} else {
			$this->CI->table->set_heading('Date Taken', 'Risk Score', 'Risk Range', 'View Questionaire', 'View Report');
			foreach ($this->_data['history'] as $q) {
				
				if($q->risk_score >= 1 && $q->risk_score <= 1.99) { $risk_range = "Low"; }
				elseif ($q->risk_score >= 2 && $q->risk_score <=3.99) { $risk_range = "Medium"; }
				elseif ($q->risk_score >= 4) { $risk_range = "High"; }

				$d = explode(" ", $q->date_taken);
				$segments = array('report', 'index', $d[0], round($q->risk_score));
				$this->CI->table->add_row($q->date_taken, $q->risk_score, $risk_range, "click", anchor(site_url($segments), 'Report'));
			}
		echo $this->CI->table->generate();
		}
	}
}