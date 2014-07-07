<?php $this->load->helper('form'); 
	if ($this->input->post()) {
		echo "<pre>";
		print_r($this->input->post());
		echo "</pre>";
	}
?>
<div class="panel panel-default">
	<?php
		if (validation_errors()) { ?>
			<div class='alert alert-danger alert-dismissable'>
			<button class="close" type="button" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times fa-fw"></i></button>
			<?php echo validation_errors(); ?>
			</div>
		<?php }
	?>
	<div class="panel-heading">Questionaire</div>
	<div class="panel-body">
		<ul class="nav nav-tabs nav-justified" id="profileTabs">
			<!-- <li class="active"><a href="#demographics" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Demographics</a></li> -->
			<li class="active"><a href="#financials" data-toggle="tab"><i class="fa fa-money fa-fw"></i> Financials</a></li>
			<li><a href="#risk" data-toggle="tab"><i class="fa fa-flash fa-fw"></i> Risk Assessment</a></li>
		</ul>
		<?php echo form_open('questions/submit', '', array('user_id' => $this->session->userdata['user_id'])); ?>
		<div class="tab-content" id="profileTabContent">
<!-- 			<div class="tab-pane fade in active" id="demographics">
				<?php
//					foreach ($demographics as $q) {
//						$q->printQuestion();
//					}
				?>
				<div class="col-sm-offset-10">
					<a href="#" class="btn btn-primary" id="next">Next <i class="fa fa-chevron-right fa-fw"></i></a>
				</div>
			</div> -->
			<div class="tab-pane fade in active" id="financials">
				<!-- Start of Financial questions -->
				<?php
					foreach ($financial as $q) {
						$q->printQuestion();
					}
				?>
				<div class="col-sm-offset-10">
					<a href="#" class="btn btn-primary" id="next1">Next <i class="fa fa-chevron-right fa-fw"></i></a>
				</div>
			</div>
			<div class="tab-pane fade" id="risk">
				<!-- Start of Risk questions -->
				<?php
					foreach ($risk as $q) {
						$q->printQuestion();
					}
				?>
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