<!doctype html>
<html>
	<head>
		<title>Clever 401k</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/css/bootstrap.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/css/style.css">
		<script src="<?php echo base_url(); ?>application/views/js/jquery.js" type="text/javascript"></script>
	</head>
	<body>
		<!-- Navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#cleverNav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<a href="<?php echo base_url(); ?>" class="navbar-brand">Clever<strong>401k</strong></a>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="cleverNav">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home fa-fw"></i> Home</a>
						<li><a href="about"><i class="fa fa-info fa-fw"></i> About</a></li>
						<li><a href="contact"><i class="fa fa-envelope fa-fw"></i> Contact Us</a></li>
						<?php 
						if (!$this->ion_auth->logged_in()) {
						?>
							<li><a href="login/index"><i class="fa fa-user fa-fw"></i> Login</a></li>
						<?php 
						} elseif ($this->ion_auth->logged_in()) {
						?>
							<li class="dropdown"> 
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('fullname'); ?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url(); ?>dashboard">Dashboard </a></li>
									<li><a href="<?php echo base_url(); ?>dashboard/password">Change password </a></li>
									<li><a href="<?php echo base_url(); ?>auth/logout">Logout </a></li>
									<li></li>
 								</ul>
							</li>
						</li>
						<?php
						}
						 ?>

					</ul>
				</div>
			</div>
		</div>
		<!-- Main Content -->
		<div class="container">
		<!-- Error Content -->
		<?php if($this->session->flashdata('message')) { ?>
		<div class="alert <?php echo $this->session->flashdata('type'); ?> alert-dismissable">
			<!-- <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button> -->
			<button class="close" type="button" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times fa-fw"></i></button>
			<?php echo $this->session->flashdata('message'); ?>
		</div>
		<?php } ?>	