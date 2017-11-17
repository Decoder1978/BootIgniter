<div class="col-md-8">
	<h3>Your file was successfully uploaded!</h3>
	<p><?= anchor(base_url().'profile', 'Upload More Images!'); ?> </p>
	<?php for ($i = 0; $i < count($album_data); $i++) { ?>
					<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 thumb">
						<h5><?php echo $album_data[$i]['file_name'];?></h5>
						<a class="thumbnail modal_view" data-title="<?php echo $album_data[$i]['file_name'];?>">
							<img src="<?php

							echo base_url().str_replace('/home/luzarcom/public_html/test.k-h.com.ua', '', $album_data[$i]['full_path']);?>" alt="<?php echo $album_data[$i]['file_type'];?>" class="img-responsive">

																				<!-- ^^^^^ REWORK THIS PIECE OF SHIT ^^^^^ -->

						</a>
						<h5><?php echo $album_data[$i]['file_size']."KB";?></h5>
					</div>
		<?php
		}?>
</div>
