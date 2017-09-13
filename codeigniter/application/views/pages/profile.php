<div class="col-md-4">
	<h4>Profile Summary</h4>
	<hr/>
	<p>Name: <?php echo $uname; ?></p>
	<p>Email: <?php echo $uemail; ?></p>
	<p>...</p>
	<p>Upload image:</p>
	<form action="profile/do_upload" method="post" enctype="multipart/form-data">
		<select name="albums"><?php
		foreach($album_data as $album)
		{?>
			<option value="<?php echo $album->title;?>"><?php echo ucfirst($album->title);?></option><?php
		}?>
		</select>
		<input type = "file" name = "userfile" size = "20" />
		<input type = "submit" value = "Upload" />
	</form>
</div>
