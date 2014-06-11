<div class="panel panel-default">
	<div class="panel-heading">User Profile</div>
	<div class="panel-body">
		<ul class="nav nav-tabs nav-justified" id="profileTabs">
			<li class="active"><a href="#userData" data-toggle="tab"><i class="fa fa-user fa-fw"></i> User</a></li>
			<li><a href="#companyData" data-toggle="tab"><i class="fa fa-briefcase fa-fw"></i> Company</a></li>
			<li><a href="#qData" data-toggle="tab"><i class="fa fa-question-circle fa-fw"></i> Questionaire History</a></li>
			<li><a href="#settings" data-toggle="tab"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
		</ul>
		<div class="tab-content" id="profileTabConent">
			<div class="tab-pane fade in active" id="userData">
				<p>First Name: <?php echo $user->first_name; ?></p>
				<p>Last Name: <?php echo $user->last_name; ?></p>
				<p>Username: <?php echo $user->username; ?></p>
			</div>
			<div class="tab-pane fade" id="companyData">
				Company Data
			</div>
			<div class="tab-pane fade" id="qData">
				Questionaire Data
			</div>
			<div class="tab-pane fade" id="settings">
				Settings.
			</div>
		</div>
	</div>
</div>