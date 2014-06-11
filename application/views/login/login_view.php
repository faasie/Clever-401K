<?php
$a = array('class' => 'form-horizontal');
echo form_open('auth/login', $a);
?>
<div class="form-group">
 	<?php 
	$a = array('class' => 'col-sm-2 control-label'); 
	echo form_label('Username', 'identity', $a);
	?>
	<div class="col-sm-4">
		<?php 
		$a = array(
			'class' => 'form-control',
			'name' => 'identity',
			'id' => 'identity',
			'tabindex' => 1); 
		echo form_input($a);
		?>
	</div>
</div>
<div class="form-group">
	<?php 
	$a = array('class' => 'col-sm-2 control-label'); 
	echo form_label('Password', 'password', $a);
	?>
	<div class="col-sm-4">
		<?php 
		$a = array(
			'class' => 'form-control',
			'name' => 'password',
			'id' => 'password',
			'tabindex' => 2); 
		echo form_password($a);
		?>
	</div>
</div>
<div class="col-sm-offset-2">
	<button type='submit' class="btn btn-primary">Sign in</button>
	<button type='reset' class="btn btn-default">Clear</button>
</div>
<?php echo form_close(); ?>