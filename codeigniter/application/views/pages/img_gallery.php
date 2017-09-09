<?php 
$a = array ('hdpe', 'sprinkle', 'irrigation', 'spray');
for($i = 1; $i < 13; $i++):
	$theme = $a[mt_rand(0,count($a))];?>
	<div class=<?php echo "'gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter $theme'"; ?> >
		<h4>Album Title</h4>
		<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://#" data-target="#image-gallery">
			<img src="http://fakeimg.pl/365x365/" class="img-responsive">
		</a>
		<div class="gal_menu">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target=<?php echo "#myModal".$i; ?> >VIEW ALBUM</button>
		</div>
	</div>
<?php endfor; ?>