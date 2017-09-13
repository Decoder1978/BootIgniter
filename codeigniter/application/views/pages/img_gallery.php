<?php
foreach($gal_data['category_data']['rows'] as $cat_row)
{
	foreach($gal_data['album_data']['rows'] as $alb_row)
	{
		foreach($gal_data['img_data']['rows'] as $img_row)
		{
			if ($cat_row->category_id == $alb_row->category_id)
			{
				if ($img_row->album_id == $alb_row->album_id)
				{?>
					<div class=<?php echo "'gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter $cat_row->title'"; ?> >
						<h4><?php echo ucfirst($alb_row->title); ?></h4>
						<a class="thumbnail" href="#" data-image-id="<?php echo $img_row->image_id;?>" data-toggle="modal" data-title="<?php echo $img_row->title;?>" data-target="#image-gallery">
							<img src="<?php echo base_url().$img_row->full_path;?>" alt="<?php echo $img_row->alt;?>" class="img-responsive">
						</a>
						<div class="gal_menu">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target=<?php echo "#myModal".$alb_row->album_id; ?> >VIEW ALBUM</button>
						</div>
					</div>
					<?php
				}
				else
				{
					continue;
				}
			}
			else
			{
				continue;
			}
		}
	}
}
	?>