<?php echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>

<form action = "" method = "">
	<select><?php
	foreach($upload_album_data as $album)
	{?>
		<option><?php echo $album->title;?></option><?php
	}?>
	</select>
	<input type = "file" name = "userfile" size = "20" />
	<input type = "submit" value = "Upload" />
</form>