<div class="col-lg-12">
  <h1 class="page-header">Search results</h1>
<?php foreach($res_info["search_result"] as $row) { ?>
    	<div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <h4><?php echo $row->album_title; ?></h4>
    		<h5><?php echo $row->image_title; ?></h5>
        <a class="thumbnail modal_view" href="#" data-image-id="<?php echo $row->image_id;?>" data-toggle="modal" data-title="<?php echo $row->image_title;?>" data-target=<?php echo "#myModal".$row->album_id; ?>>
          <img src="<?php echo base_url().$row->full_path;?>" alt="<?php echo $row->alt;?>" class="img-responsive">
        </a>
        <div class="gal_menu">
					<!-- Modal callout -->
					<button type="button" class="btn btn-info modal_view" data-toggle="modal" data-target=<?php echo "#myModal".$row->album_id; ?> >DETAILS</button>
					<!-- Modal -->
					<div class="portfolio-modal modal hide fade" id=<?php echo "myModal".$row->album_id; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	            <div class="modal-dialog modal-lg" role="document">
	                <div class="modal-content">
	                    <div class="row">
	                        <div class="col-md-8">
	                            <div id=<?php echo "modal-carousel".$row->album_id; ?> class="carousel slide modal-carousel" data-ride="carousel">
	                                <!-- Indicators -->
	                                <ol class="carousel-indicators">
																			<?php
																			$prev_count = 0;
																			for($i = 1; $i < count($res_info['modal_data']); $i++)
																			{
																				if ($res_info['modal_data'][$i-1]->album_id == $row->album_id)
																				{
																						if ($prev_count == 0)
																						{  ?>
																							<li data-target=<?php echo "#modal-carousel".$row->album_id; ?> data-slide-to="<?php echo $i-1; ?>" class="active"></li>
																			<?php	}
																				else { ?>
																							<li data-target=<?php echo "#modal-carousel".$row->album_id; ?> data-slide-to="<?php echo $i-1; ?>"></li>
																			<?php	 }
																				$prev_count = $i;
																				}
																			} ?>
	                                </ol>
	                                <!-- Wrapper for slides -->
	                                <div class="carousel-inner">
																			<?php
																				$prev_num = 0;
																				for($j = 1; $j < count($res_info['modal_data']); $j++)
																				{
																					if ($res_info['modal_data'][$j-1]->album_id == $row->album_id)
																					{
																							if ($prev_num == 0)
																							{ ?>
																							<div class="item active">
																									<img class="lazy_load" src="<?php echo base_url().'/'.$res_info['modal_data'][$j-1]->full_path; ?>" alt="<?php echo $res_info['modal_data'][$j-1]->alt; ?>" >
																									<h4><?php echo $res_info['modal_data'][$j-1]->image_title; ?></h4>
																							</div>
																				<?php
																							}
																					else
																							{ ?>
																							<div class="item">
																									<img class="lazy_load" src="<?php echo base_url().'/'.$res_info['modal_data'][$j-1]->full_path; ?>" alt="<?php echo $res_info['modal_data'][$j-1]->alt; ?>" >
																									<h4><?php echo $res_info['modal_data'][$j-1]->image_title; ?></h4>
																							</div>
																				<?php	}
																			$prev_num = $j;
																					}
																				} ?>
	                                </div>
                                  <a class="left carousel-control" data-slide="prev" onclick="$('<?php echo "#modal-carousel".$row->album_id; ?>').carousel('prev')">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                  </a>
                                  <a class="right carousel-control" data-slide="next" onclick="$('<?php echo "#modal-carousel".$row->album_id; ?>').carousel('next')">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                  </a>
	                            </div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="modal-body inline">
	                                <div class="row">
	                                    <div class="col-md-9">
	                                        <h4><?php echo $row->album_title; ?></h4>
	                                    </div>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                </div>
	                               <hr/>
																 	<h5><b>Comments:</b></h5>
																	<?php
																	for ($i = 0; $i < count($res_info['comment_data']); $i++)
																	{
																		if($res_info['comment_data'][$i]->album_id == $row->album_id)
																		{ ?>
																			<p class="text-success"><?php echo $res_info['comment_data'][$i]->name; ?></p>
			                                <p><?php echo $res_info['comment_data'][$i]->comment_text; ?></p>
			                                <p class="text-mute"><?php echo $res_info['comment_data'][$i]->date; ?></p>
																			<br/>
																<?php	}
																	}
																	?>
																	<form class="<?php echo $res_info['comment_status']; ?>" action="<?= base_url()."result";?>" method="post" enctype="multipart/form-data">
																		<input type="hidden" name="album" value="<?php echo $row->album_id; ?>"/>
		                                <input placeholder="Comment" type="text" style="height:100px" name="comment" class="form-control" required/>
		                                <span class="text-mute">Please write your opinion.</span>
		                                <button class="btn btn-sm btn-primary pull-right comment-btn">Save</button>
																	</form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
				</div>
    	</div>
<?php } ?>
</div>
