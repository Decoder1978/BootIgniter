<div class="col-md-4">
	<h4>Profile Summary</h4>
	<hr>
	<p>Name: <?= $uname; ?></p>
	<p>Email: <?= $uemail; ?></p>
	<p>...</p>

	<button class="btn btn-default dropdown-toggle profile_change" type="button" data-toggle="dropdown">Change info</button>
	<div class="pr_form " style="display: none">
		<form class="profile_form" action="<?= base_url();?>profile" method="post" enctype="multipart/form-data">
			<div id="profile">
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control" name="name" placeholder="Name" type="text" required/>
					<span class="popuptext" style="display: none;">Less then 3 symbols!</span>
					<span class="text-danger"><?= form_error('name'); ?></span>
				</div>
				<div class="form-group">
					<button class="btn btn-warning profile_update form-submit" type="submit" value="Update">Update</button>
				</div>
			</div>
		</form>
	</div>
</div>
