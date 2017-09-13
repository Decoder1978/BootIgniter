<div class="col-lg-12">
<?php foreach($search_result as $row) { ?>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
    		<h3><?php echo $row->title; ?></h3>
        <a class="thumbnail" href="#" data-image-id="<?php echo $row->image_id;?>" data-toggle="modal" data-title="<?php echo $row->title;?>" data-target="#image-gallery">
          <img src="<?php echo base_url().$row->full_path;?>" alt="<?php echo $row->alt;?>" class="img-responsive">
        </a>
    	</div>
<?php } ?>
</div>
