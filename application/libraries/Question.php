<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question {

	public $id;
	public $question_name;
	public $text;
	public $type;
	public $answers = array();

	public function __construct()
	{
	}

	public function printQuestion()
	{
		echo '<div class="panel panel-default">';
			echo '<div class="panel-heading">' . $this->text . '</div>';
			echo '<div class="panel-body">';
				echo '<div class="row">';
					echo '<div class="col-sm-offset-1">';
					if ($this->type == "text") {
						echo '<div class="col-sm-4">';
						$data = array(
							'id' 	=> $this->id,
							'name' 	=> $this->id,
							'value' => set_value($this->id),
							'class' => 'form-control'
							);
						echo form_input($data);
						echo '</div>';
					} elseif ($this->type == "radio") {
						foreach ($this->answers as $id => $a) {
							echo '<div class="radio">';
								echo '<label>';
								$data = array(
									'name'	=> $this->id,
									'id'	=> $id,
									'value'	=> set_radio($this->id, $id)
									);
								echo form_radio($data);
								echo $a['answer'];
								echo '</label>';
							echo '</div>';
						}
					}
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
}