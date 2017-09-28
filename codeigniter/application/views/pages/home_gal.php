
<div class="col-lg-12">
	<h1 class="page-header">Recent Gallery</h1>
<?php
	foreach($gal_data['album_data']['rows'] as $alb_row)
	{
		foreach($gal_data['img_data']['rows'] as $img_row)
		{
			if ($img_row->album_id == $alb_row->album_id)
				{ ?>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<h4><?php echo ucfirst($alb_row->album_title); ?></h4>
				<a class="thumbnail modal_view" href="<?php echo $alb_row->album_title; ?>" data-image-id="<?php echo $img_row->image_id; ?>" data-toggle="modal" data-title="<?php echo $img_row->image_title; ?>" data-target=<?php echo "#myModal".$alb_row->album_id; ?> >
					<img src="<?php echo base_url().$img_row->full_path; ?>" alt="<?php echo $img_row->alt; ?>" class="img-responsive">
				</a>
				<div class="gal_menu">
					<!-- Modal callout -->
					<button type="button" class="btn btn-info modal_view" data-toggle="modal" data-target=<?php echo "#myModal".$alb_row->album_id; ?> >DETAILS</button>

					<!-- Modal -->
					<?php $data = array('alb_row' => $alb_row);
					$this->load->view($gal_data['modal_page'], $data); ?>
				</div>
			</div><?php
			}
		}
	}
?>
</div>
