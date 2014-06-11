<div class="panel panel-default">
	<div class="panel-heading">Questionairre</div>
	<div class="panel-body">
		<ul class="nav nav-tabs nav-justified" id="profileTabs">
			<li class="active"><a href="#demographics" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Demographics</a></li>
			<li><a href="#financials" data-toggle="tab"><i class="fa fa-money fa-fw"></i> Financials</a></li>
			<li><a href="#risk" data-toggle="tab"><i class="fa fa-flash fa-fw"></i> Risk Assessment</a></li>
		</ul>
		<?php echo form_open('questions/submit', '', array('user_id' => $this->session->userdata['user_id'])); ?>
		<div class="tab-content" id="profileTabContent">
			<div class="tab-pane fade in active" id="demographics">
				<?php foreach ($questions->result() as $q) { 
					if ($q->category_id == '1') { ?>
						<div class="panel panel-default">
							<div class="panel-heading"><?php echo $q->text; ?></div>		
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-offset-1">
									<?php 
									if ($q->type == 'radio') {
										foreach ($answers->result() as $a) {
											if ($a->question_id == $q->question_id) { ?>
											<div class="radio">
												<label>
													<?php echo form_radio(array(
														'name' => $q->question_id,
														'id' => $a->answer_id,
														'value' => $a->order
													));
													echo $a->answer;
													?>
												</label>
											</div>
											<?php 
											}
										}
									} elseif ($q->type == 'text') { ?>
										<div class="col-sm-4">
										<?php 
										echo form_input(array(
											'id' => $q->question_id,
											'name' => $q->question_id,
											'value' => $q->question_id,
											'class' => 'form-control'
											));
										 ?>	
										</div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
				<?php 
						}
				} ?>
				<div class="col-sm-offset-10">
					<a href="#" class="btn btn-primary" id="next">Next <i class="fa fa-chevron-right fa-fw"></i></a>
				</div>
			</div>
			<div class="tab-pane fade" id="financials">
				<?php foreach ($questions->result() as $q) { 
					if ($q->category_id == '2') { ?>
						<div class="panel panel-default">
							<div class="panel-heading"><?php echo $q->text; ?></div>		
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-offset-1">
									<?php 
									if ($q->type == 'radio') {
										foreach ($answers->result() as $a) {
											if ($a->question_id == $q->question_id) { ?>
											<div class="radio">
												<label>
													<?php echo form_radio(array(
														'name' => $q->question_id,
														'id' => $a->answer_id,
														'value' => $a->order
													));
													echo $a->answer;
													?>
												</label>
											</div>
											<?php 
											}
										}
									} elseif ($q->type == 'text') { ?>
										<div class="col-sm-4">
										<?php 
										echo form_input(array(
											'id' => $q->question_id,
											'name' => $q->question_id,
											'class' => 'form-control'
											));
										 ?>	
										</div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
				<?php 
						}
				} ?>
				<div class="col-sm-offset-10">
					<a href="#" class="btn btn-primary" id="next1">Next <i class="fa fa-chevron-right fa-fw"></i></a>
				</div>
			</div>
			<div class="tab-pane fade" id="risk">
				<?php foreach ($questions->result() as $q) { 
					if ($q->category_id == '3') { ?>
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $q->text; ?></div>		
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-offset-1">
							<?php 
							if ($q->type == 'radio') {
								foreach ($answers->result() as $a) {
									if ($a->question_id == $q->question_id) { ?>
									<div class="radio">
										<label>
											<?php echo form_radio(array(
												'name' => $q->question_id,
												'id' => $a->answer_id,
												'value' => $a->order
											));
											echo $a->answer;
											?>
										</label>
									</div>
									<?php 
									}
								}
							} elseif ($q->type == 'text') { ?>
								<div class="col-sm-4">
								<?php 
								echo form_input(array(
									'id' => $q->question_id,
									'name' => $q->question_id,
									'value' => $q->question_id,
									'class' => 'form-control'
									));
								 ?>	
								</div>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php 
					}
				} ?>
				<div class="col-sm-offset-4">
					<button type='submit' class="btn btn-primary">Submit Answers</button>
					<button type='reset' class="btn btn-default">Clear Answers</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
$('a[id="next"').click(function(event) {
	$('a[href="#financials"]').tab('show')
});
$('a[id="next1"').click(function(event) {
	$('a[href="#risk"]').tab('show')
});

</script>