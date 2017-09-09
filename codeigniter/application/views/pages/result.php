<div class="container">
    <div class="row">
<?php foreach($results as $item){ ?>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
		<h3><?php$item['raw_name']?></h3>
		<img src="<?php echo base_url().'uploads/'.$item['image_title'] ?>" class="img-responsive">
	</div>
<?php } ?>
	</div>
</div>