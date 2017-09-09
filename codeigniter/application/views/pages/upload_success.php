<h3>Your file was successfully uploaded!</h3>  
		
<ul> 
	<?php 
	foreach ($upload_image_data as $key => $value) { ?> 
		<?php if ($key == "raw_name") { ?>
			<h4><?php echo $value;?></h4>
			<div>
		<?php if ($key == "full_path") { ?>
				<img src="<?php echo $value;?>">
		<?php } ?>
			</div>
	<?php } ?>
</ul>  

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>