<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions_model extends CI_Model {

	function getQuestions($category)
	{
		$questions = array();
		$this->db->select('q.question_id, q.text, q.type, q.question_name, a.answer_id, a.answer, a.value')
			->from('q_questions q')
			->join('q_answers a','q.question_id = a.question_id','left')
			->where('q.category_id',$category)
			->where('q.enabled', TRUE);
		$query = $this->db->get();
		$current = 0;
		foreach ($query->result() as $q) {
			if ($q->question_id != $current) {
				$questions[$q->question_id] = new Question();
				$questions[$q->question_id]->id = $q->question_id;
				$questions[$q->question_id]->question_name = $q->question_name;
				$questions[$q->question_id]->text = $q->text;
				$questions[$q->question_id]->type = $q->type;
				if (!is_null($q->answer_id)) {
					$questions[$q->question_id]->answers[$q->answer_id] = array('answer' => $q->answer, 'value' => $q->value);
				}
				$current = $q->question_id;
			} else {
				$questions[$q->question_id]->answers[$q->answer_id] = array('answer' => $q->answer, 'value' => $q->value);
			}
		}
		// echo "<pre>";
		// print_r($questions);
		// echo "</pre>";
		return $questions;
	}	

	function createDataSet($user_id, $score)
	{
		$today = date("Y-m-d H:i:s");
		$data = array(
			'user_id' => $user_id,
			'risk_score' => $score,
			'date_taken' => $today
			);

		$this->db->insert('u_answer_sets', $data);
		return $this->db->insert_id();
	}

	function calculateRiskScore()
	{
		$risk = 0;

		$query = $this->db->select('question_id')->from('q_questions')->where('category_id', '3');
		$num_questions = $query->count_all_results();
		$this->db->select('question_id, weight')->from('q_questions')->where('category_id', '3');
		$q = $this->db->get();
		foreach ($q->result() as $row) {
			// echo "Current Risk: " . $risk . "<br>";
			// echo "ID: " . 
			$risk += $this->input->post($row->question_id) * $row->weight;
		}

		return $risk/$num_questions;
	}
}

/* End of file questions_model.php */
/* Location: ./application/models/questions_model.php */