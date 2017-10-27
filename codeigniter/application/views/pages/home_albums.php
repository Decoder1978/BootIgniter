<div class="col-lg-12 home_albums">
	<h1 class="page-header">Our Albums</h1>
	<div class="album_list">
		<div class="grid">
		<?php
			foreach($gal_data['modal_data'] as $row)
			{ ?>


					<!-- .grid-sizer empty element, only used for element sizing -->
					<div class="grid-sizer"></div>
					<div class="grid-item"></div>
					<div class="grid-item grid-item--width2"></div>
					<div class="grid-item"></div>
					<div class="grid-item"></div>

					<!-- <div class="col-lg-3 col-md-4 col-xs-6 thumb">
						<div class="thumb_title">
							<h4><?php echo ucfirst($row->album_title); ?></h4>
						</div>
						<div class="thumb_image">
							<a class="thumbnail modal_view" data-image-id="<?php echo $row->image_id; ?>" data-toggle="modal" data-title="<?php echo $row->image_title; ?>" data-target="<?php echo '#myModal'.$row->album_id; ?>" >
								<img src="<?php echo base_url().$row->full_path; ?>" alt="<?php echo $row->alt; ?>" class="img-responsive">
							</a>
						</div>
						<div class="gal_menu">
							<button type="button" class="btn btn-default btn-inverse modal_view" data-toggle="modal" data-target="<?php echo '#myModal'.$row->album_id; ?>" >VIEW</button>
							<a type="button" class="btn btn-default btn-inverse" href="<?php echo base_url()?>home/download_album/<?php echo $row->album_id; ?>">DOWNLOAD</a>
							<?php
							$data = array('alb_row' => $row, 'gal_data' => $gal_data);
							$this->load->view($gal_data['modal_page'], $data);
							?>
						</div>
					</div> -->
					<?php
			}
		?>
		</div>
	</div>
</div>
