<div class="panel panel-default">
	<div class="panel-heading">Dashboard</div>
	<div class="panel-body">
		<ul class="nav nav-tabs nav-justified" id="profileTabs">
			<li class="active"><a href="#userData" data-toggle="tab"><i class="fa fa-user fa-fw"></i> Profile</a></li>
			<!-- <li><a href="#companyData" data-toggle="tab"><i class="fa fa-briefcase fa-fw"></i> Company</a></li> -->
			<li><a href="#qData" data-toggle="tab"><i class="fa fa-question-circle fa-fw"></i> Questionaire History</a></li>
			<li><a href="#settings" data-toggle="tab"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
		</ul>
		<div class="tab-content" id="profileTabConent">
			<div class="tab-pane fade in active" id="userData">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo $this->session->userdata('fullname'); ?></strong></div>
							<!-- <div class="panel-body">Body</div> -->
 							<?php $this->dashboard_library->showUserInfo(); ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading"><strong> <?php echo $this->session->userdata('companyname'); ?> </strong></div>
							<!-- <div class="panel-body">Body</div> -->
							<!-- // <?php $this->dashboard_library->showCompanyInfo(); ?> -->
							<?php $this->dashboard_library->showPlansInfo(); ?>

						</div>
					</div>
				</div>
			</div>
<!--
 			<div class="tab-pane fade" id="companyData">
				<?php $this->dashboard_library->showCompanyInfo(); ?>
				<br>
				<?php $this->dashboard_library->showPlansInfo(); ?>
				<br>
			</div>
 -->
 			<div class="tab-pane fade" id="qData">
				<?php $this->dashboard_library->showQuestionHistory(); ?>
				<p><a href="<?php echo base_url(); ?>questions" class="btn btn-primary"><i class="fa fa-question-circle fa-fw"></i> Go to questions.</a></p>
			</div>
			<div class="tab-pane fade" id="settings">
				<p><a href="<?php echo base_url(); ?>dashboard/edit_profile" class="btn btn-primary" disabled="disabled"><i class="fa fa-list-alt fa-fw"></i> Edit Profile</a></p>
				<p><a href="<?php echo base_url(); ?>dashboard/password" class="btn btn-primary"><i class="fa fa-lock fa-fw"></i> Change password</a></p>
			</div>
		</div>
	</div>
</div>
  <script>
  $(function() {
    $( "#accordion" ).accordion({active: false});
  });
  </script>