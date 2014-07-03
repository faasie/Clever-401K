<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Dashboard Model
*/
class Dashboard_model extends CI_model
{
	
	function getUser($user_id)
	{
		$this->db->select('a.birthdate, a.retirement_age, a.gender, b.company_name, c.edu_level')
			->from('u_profile a, company b, education_options c')
			->where('a.company_id = b.company_id')
			->where('c.edu_id = a.edu_id')
			->where('a.user_id', $user_id);
		$q = $this->db->get();
		if ($q->num_rows > 0) {
			$now 	= new DateTime(date("Y-m-d"));
			$end 	= new DateTime($q->row()->birthdate);
			$diff = $now->diff($end);
			$age =  $diff->y;
			$q->row()->age = $age;
			$d = $q->row(1);
			return $d;
		}
	}

	function getCompany($company_id)
	{
		$this->db->select('company_name, company_description')
			->from('company')
			->where('company_id', $company_id);
		$q = $this->db->get();
		$data = $q->row(1);
		$this->session->set_userdata('companyname', $data->company_name);
		return $data;
	}

	function getPlans($company_id)
	{
		// $this->db->select('b.plan_name, b.plan_description')
		// 	->from('company_plan a')
		// 	->join('plans b','a.plan_id = b.plan_id')
		// 	->where('company_id', $company_id)
		// 	->where('enabled', TRUE);
		// $q = $this->db->get();
		// return $q->result();
		$this->db->select('c.name, e.symbol, e.plan_name')
			->from('company_provider a, company b, providers c, provider_plans d, plans e')
			->where('b.company_id', $company_id)
			->where('e.enabled', TRUE)
			->where('a.company_id = b.company_id')
			->where('a.provider_id = c.provider_id')
			->where('c.provider_id = d.provider_id')
			->where('d.plan_id = e.plan_id');
		$q = $this->db->get();
		echo "<pre>";
		print_r($q->result());
		echo "</pre>";
		// $plans = array();
		// $current = 0;
		// foreach ($q->result() as $p) {
		// 	if ($p->name == $current) {
		// 		echo "in loop: " . $current . "<br>";
		// 		$plans[$p->name] = array();

		// 		$current = $p->name;
		// 	}
		// }
		// print_r($plans);
		return $q->result();
	}

	function getQuestionHistory($user_id)
	{
		$this->db->select('date_taken')
			->from('u_answer_sets')
			->where('user_id', $user_id);
		$q = $this->db->get();
		
		if ($q->result()) {
			return $q->result();
		} else {
			return FALSE; 
		}
	}
}