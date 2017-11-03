<div class="col-md-4">
	<h4>Profile Summary</h4>
	<hr/>
	<p>Name: <?php echo $uname; ?></p>
	<p>Email: <?php echo $uemail; ?></p>
	<p>...</p>

	<button class="btn btn-default btn-inverse dropdown-toggle profile_change" type="button" data-toggle="dropdown">Change info</button>
	<div class="pr_form " style="display: none">
		<form class="profile_form" action="<?= base_url();?>profile" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" name="name" placeholder="Name" type="text" required/>
				<span class="text-danger"><?php echo form_error('name'); ?></span>
			</div>
			<div class="form-group">
				<input class="btn btn-default profile_update" type="submit" value="Update"/>
			</div>
		</form>
	</div>
</div>
