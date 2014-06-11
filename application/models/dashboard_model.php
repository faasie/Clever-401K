<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Dashboard Model
*/
class Dashboard_model extends CI_model
{
	
	function getUser()
	{
		$data = $this->ion_auth->user()->row();
		$this->db->select('company_name')->from('company')->where('company_id', $data->company);
		$q = $this->db->get();
		$data->company_id = $data->company;
		$data->company = $q->row(1)->company_name;
		return $data;
	}

	function getCompany($company_id)
	{
		$this->db->select('company_name, company_description')
			->from('company')
			->where('company_id', $company_id);
		$q = $this->db->get();
		$data = $q->row(1);
		return $data;
	}

	function getPlans($company_id)
	{
		$this->db->select('b.plan_name, b.plan_description')
			->from('company_plan a')
			->join('plans b','a.plan_id = b.plan_id')
			->where('company_id', $company_id);
		$q = $this->db->get();
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