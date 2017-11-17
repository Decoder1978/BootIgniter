<div class="col-md-4">
	<h4>Upload image:</h4>
		<!-- image-preview-filename input [CUT FROM HERE]-->
			<form action="<?= base_url()."upload";?>" method="post" enctype="multipart/form-data">
				<div class="input-group" id="upload">
						<select class="form-control upload_select" name="album_select" required>
							<option value="" hidden="hidden">Select album</option>
							<?php	$prev_cat = '';
								foreach($cat_data as $cat)
								{
									if($cat->category_title == $prev_cat)
									{	continue;	}
									else { ?>
										<option class="upload_select_cat" disabled>──────<?= ucfirst($cat->category_title);?>──────</option><?php
										foreach ($album_data as $alb)
										{
											if($alb->category_id == $cat->category_id)
											{ ?>
												<option value="<?php echo $alb->album_title;?>"><?= ucfirst($alb->album_title);?></option><?php
											}
										}
										$prev_cat = $cat->category_title;
									}
								} ?>
						</select>
						<span class="input-group-btn">
						<!-- image-preview-input -->
							<input class="btn btn-default image_files_upload" type="file" accept="image/png, image/jpeg, image/gif" name="usr_files[]" multiple="multiple"/>
							<button class="btn btn-warning image-upload-input" type="submit" value="Upload">Upload</button>
						</span>

				</div><!-- /input-group image-preview [TO HERE]-->
				<?= $this->session->flashdata('error');?>
			</form>
</div>
