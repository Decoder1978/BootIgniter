<div class="col-lg-12">
	<h1 class="page-header">Recent Gallery</h1>
<?php
for($i = 1; $i < 5; $i++)
{
	foreach($gal_data['album_data']['rows'] as $alb_row)
	{
		foreach($gal_data['img_data']['rows'] as $img_row)
		{?>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<h4><?php echo ucfirst($alb_row->title); ?></h4>
				<a class="thumbnail" href="#" data-image-id="<?php echo $img_row->image_id;?>" data-toggle="modal" data-title="<?php echo $img_row->title;?>" data-target="#image-gallery">
					<img src="<?php echo base_url().$img_row->full_path;?>" alt="<?php echo $img_row->alt;?>" class="img-responsive">
				</a>
				<div class="gal_menu">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target=<?php echo "#myModal".$alb_row->album_id; ?> >VIEW ALBUM</button>
				</div>
			</div>	  
	<?php}
	}
}?>
</div>
