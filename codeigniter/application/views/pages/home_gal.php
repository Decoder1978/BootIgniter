<div class="col-lg-12 masonry">
	<h1 class="page-header">Best Albums</h1>
	<div class="grid">
		<div class="grid-sizer"></div>
		<?php	foreach($gal_data['img_data'] as $row)
		{ ?>
			<a href="<?= base_url(); ?>album/<?= $row->album_title; ?>"><div class="grid-item grid-item--width2" id="alb_num<?= $row->album_id; ?>">
		  	<img src="<?= base_url().$row->album_path.'/thumbs/'.$row->thumb; ?>" alt="<?= $row->alt; ?>" class="img-responsive">
				<span class="mas_title"><?= $row->album_title; ?></span>
		  </div></a>
	<?php	} ?>
	</div>
</div>

<div class="col-lg-12 home_gal">
	<h1 class="page-header">Recent Uploads</h1>
	<div class="thumb_list">
			<?php foreach($gal_data['recent_data'] as $row)
						{ ?>
								<div class="col-lg-3 col-md-4 col-xs-6 thumb">
									<div class="thumb_title">
										<h4><?= $row->image_title; ?></h4>
									</div>
									<div class="thumb_image">
										<a class="thumbnail" href="album/<?= $row->album_title; ?>" data-image-id="<?= $row->image_id; ?>" data-title="<?= $row->image_title; ?>" >
											<img src="<?= $row->album_path.'/thumbs/'.$row->thumb; ?>" alt="<?= $row->alt; ?>" class="img-responsive">
										</a>
									</div>
								</div>
			<?php	}	?>
	</div>
</div>
