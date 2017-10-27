<div class="col-lg-12 home_gal">
	<h1 class="page-header">Recent Gallery</h1>
	<div class="thumb_list">
		<?php
			foreach($gal_data['album_data'] as $alb_row)
			{
				foreach($gal_data['img_data'] as $img_row)
				{
					if ($img_row->album_id == $alb_row->album_id)
						{ ?>
					<div class="col-lg-3 col-md-4 col-xs-6 thumb">
						<div class="thumb_title">
							<h4><?php echo ucfirst($alb_row->album_title); ?></h4>
						</div>
						<div class="thumb_image">
							<a class="thumbnail modal_view" data-image-id="<?php echo $img_row->image_id; ?>" data-toggle="modal" data-title="<?php echo $img_row->image_title; ?>" data-target="<?php echo '#myModal'.$alb_row->album_id; ?>" >
								<img src="<?php echo base_url().$alb_row->album_path.'/thumbs/'.$img_row->thumb; ?>" alt="<?php echo $img_row->alt; ?>" class="img-responsive">
							</a>
						</div>
						<div class="gal_menu">
							<!-- Modal callout -->
							<button type="button" class="btn btn-default btn-inverse modal_view" data-toggle="modal" data-target="<?php echo '#myModal'.$alb_row->album_id; ?>" >VIEW</button>
							<a type="button" class="btn btn-default btn-inverse" href="<?php echo base_url()?>home/download_album/<?php echo $alb_row->album_id; ?>">DOWNLOAD</a>
							<!-- Modal -->
							<?php
							$data = array('alb_row' => $alb_row, 'gal_data' => $gal_data);
							$this->load->view($gal_data['modal_page'], $data);
							?>
						</div>
					</div><?php
					}
				}
			}
		?>
	</div>
</div>
