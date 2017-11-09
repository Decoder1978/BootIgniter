<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
		<?php $attributes = array("name" => "loginform"); ?>
			<?= form_open("login/index", $attributes); ?>
			<legend>Login</legend>
			
			<p class="text-danger"><?= form_error('email'); ?></p>
			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" name="email" placeholder="Email" type="text" value="<?= set_value('email'); ?>" />
			</div>

			<p class="text-danger"><?= form_error('password'); ?></p>
			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" value="<?= set_value('password'); ?>" />
			</div>

			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-info">Login</button>
				<button name="cancel" type="reset" class="btn btn-info">Cancel</button>
			</div>
		<?= form_close(); ?>
		<?= $this->session->flashdata('msg'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
			<p>New User?</p>
		 	<a href="<?= base_url(); ?>signup">Sign Up Here</a>
		</div>
	</div>
</div>
