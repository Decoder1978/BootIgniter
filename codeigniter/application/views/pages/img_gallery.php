<div class="gallery_list col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php foreach($gal_data['category_data']['rows'] as $cat_row)
			{
				foreach($gal_data['album_data'] as $alb_row)
				{
					foreach($gal_data['img_data'] as $img_row)
					{
						if ($cat_row->category_id == $alb_row->category_id)
						{
							if ($img_row->album_id == $alb_row->album_id)
							{?>
								<div class=<?= "'gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 thumb filter $cat_row->category_title'"; ?> style="display: none;">
									<h4><?= ucfirst($alb_row->album_title); ?></h4>
									<a class="thumbnail modal_view" data-image-id="<?= $img_row->image_id;?>" data-toggle="modal" data-title="<?= $img_row->image_title;?>" data-target="<?= '#myModal'.$alb_row->album_id; ?>" >
										<img src="<?= base_url().$alb_row->album_path.'/thumbs/'.$img_row->thumb; ?>" alt="<?= $img_row->alt;?>" class="img-responsive">
									</a>
									<div class="gal_menu">
										<!-- Modal callout -->
										<button type="button" class="btn btn-default btn-inverse modal_view" data-toggle="modal" data-target="<?= '#myModal'.$alb_row->album_id; ?>" >MODAL</button>
										<a type="button" class="btn btn-default btn-inverse" href="<?= base_url()?>album/<?= $alb_row->album_title; ?>">REDIRECT</a>
										<a type="button" class="btn btn-default btn-inverse" href="<?= base_url()?>gallery/download_album/<?= $alb_row->album_id; ?>">DOWNLOAD</a>
										<a type="button" class="btn btn-default btn-inverse">PLACEHOLDER</a>
										<!-- Modal -->
										<?php
										$data = array('alb_row' => $alb_row, 'gal_data' => $gal_data);
										$this->load->view($gal_data['modal_page'], $data);
										?>
									</div>
								</div>
								<?php
							}
							else
								continue;
						}
						else
							continue;
					}
				}
			}	?>
</div>
