
<div class="col-lg-12">
	<h1 class="page-header">Recent Gallery</h1>
<?php
	foreach($gal_data['album_data']['rows'] as $alb_row)
	{
		foreach($gal_data['img_data']['rows'] as $img_row)
		{
			if ($img_row->album_id == $alb_row->album_id)
				{
					?>
			<div class="col-lg-3 col-md-4 col-xs-6 thumb">
				<h4><?php echo ucfirst($alb_row->title); ?></h4>
				<a class="thumbnail modal_view" href="#" data-image-id="<?php echo $img_row->image_id; ?>" data-toggle="modal" data-title="<?php echo $img_row->title; ?>" data-target=<?php echo "#myModal".$alb_row->album_id; ?> >
					<img src="<?php echo base_url().$img_row->full_path; ?>" alt="<?php echo $img_row->alt; ?>" class="img-responsive">
				</a>
				<div class="gal_menu">
					<!-- Modal callout -->
					<button type="button" class="btn btn-info modal_view" data-toggle="modal" data-target=<?php echo "#myModal".$alb_row->album_id; ?> >VIEW ALBUM</button>


					<!-- Modal -->
					<div class="modal hide fade" id=<?php echo "myModal".$alb_row->album_id; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	            <div class="modal-dialog modal-lg" role="document">
	                <div class="modal-content">
	                    <div class="row">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        <div class="col-md-8">
	                            <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel" style="height:600px; background-color: black;">
	                                <!-- Indicators -->
	                                <ol class="carousel-indicators">
																			<?php
																			$prev_count = 0;
																			for($i = 0; $i < count($gal_data['modal_data']); $i++)
																			{
																				if ($gal_data['modal_data'][$i]->album_id == $alb_row->album_id)
																				{
																						if ($prev_count == 0)
																						{  ?>
																							<li data-target="#transition-timer-carousel" data-slide-to="<?php echo $i; ?>" class="active"></li>
																			<?php	}
																				else { ?>
																							<li data-target="#transition-timer-carousel" data-slide-to="<?php echo $i; ?>"></li>
																			<?php	 }
																				$prev_count = $i;
																				}
																			} ?>
	                                </ol>

	                                <!-- Wrapper for slides -->
	                                <div class="carousel-inner">
																			<?php
																				$prev_num = 0;
																				for($j = 0; $j < count($gal_data['modal_data']); $j++)
																				{
																					if ($gal_data['modal_data'][$j]->album_id == $alb_row->album_id)
																					{
																							if ($prev_num == 0)
																							{ ?>
																							<div class="item active">
																									<img src="<?php echo base_url().'/'.$gal_data['modal_data'][$j]->full_path; ?>" alt="<?php echo $gal_data['modal_data'][$j]->alt; ?>" >
																							</div>
																				<?php
																							}
																					else
																							{ ?>
																							<div class="item">
																									<img src="<?php echo base_url().'/'.$gal_data['modal_data'][$j]->full_path; ?>" alt="<?php echo $gal_data['modal_data'][$j]->alt; ?>" >
																							</div>
																				<?php	}
																			$prev_num = $j;
																					}
																				} ?>

	                                </div>
																	<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
																		<span class="glyphicon glyphicon-chevron-left"></span>
																	</a>
																	<a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
																		<span class="glyphicon glyphicon-chevron-right"></span>
																	</a>
																	<hr class="transition-timer-carousel-progress-bar animate" />

	                            </div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="modal-body inline">
	                                <div class="row">
	                                    <div class="col-md-9">
	                                        <h4><?php echo $img_row->title; ?></h4>
	                                    </div>
	                                </div>
	                               <hr/>
																 	<h5><b>Comments:</b></h5>
	                                <p class="text-success">Text Text Text</p>
	                                <p>TextTextText</p>
	                                <p class="text-mute">TextTextText</p>
	                                <br/>
	                                <p class="text-success">Text Text Text</p>
	                                <p>TextTextText</p>
	                                <p class="text-mute">TextTextText</p>
	                                <br/>

	                                <input placeholder="Comment" type="text" style="height:100px" class="form-control" />
	                                <span class="text-mute">Please write your opinion.</span>
	                                <button class="btn btn-sm btn-primary pull-right">Save</button>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
				</div>
			</div><?php
			}
		}
	}
?>
</div>
