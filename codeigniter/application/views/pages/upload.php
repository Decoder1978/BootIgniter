<?php echo $error;?>
<div class="col-md-4">
	<h4>Upload image:</h4>
				<!-- image-preview-filename input [CUT FROM HERE]-->
			<form action="<?= site_url('Upload/do_upload');?>" method="post" enctype="multipart/form-data">
				<div class="input-group image-preview">

						<select required class="form-control" name="album_select" required>
							<option value="">Select album</option>
							<?php
						foreach($album_data as $album)
						{?>

							<option value="<?php echo $album->album_title;?>"><?php echo ucfirst($album->album_title);?></option><?php
						}?>
						</select>

						<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
						<span class="input-group-btn">
								<!-- image-preview-clear button -->
								<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
										<span class="glyphicon glyphicon-remove"></span> Clear
								</button>
								<!-- image-preview-input -->
								<div class="btn btn-default image-preview-input">
										<span class="glyphicon glyphicon-folder-open"></span>
										<span class="image-preview-input-title">Browse</span>
										<input type="file" accept="image/png, image/jpeg, image/gif" name="userfile"/>
								</div>
									<input class="btn btn-default image-upload-input" type="submit" value="Upload"/>
						</span>

				</div><!-- /input-group image-preview [TO HERE]-->
			</form>
</div>
