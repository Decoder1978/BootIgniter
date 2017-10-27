<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<?php $attributes = array("name" => "signupform");
			echo form_open("signup/index", $attributes);?>
			<legend>Signup</legend>

			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" name="name" placeholder="Name" type="text" value="<?php echo set_value('name'); ?>" />
				<span class="text-danger"><?php echo form_error('name'); ?></span>
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger"><?php echo form_error('email'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" />
				<span class="text-danger"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">Signup</button>
				<button name="cancel" type="reset" class="btn btn-info">Cancel</button>
			</div>
			<?php echo form_close(); ?>
			<?php echo $this->session->flashdata('msg'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			<p>Already Registered?</p>
		 	<a href="<?php echo base_url(); ?>login">Login Here</a>
		</div>
	</div>
</div>
