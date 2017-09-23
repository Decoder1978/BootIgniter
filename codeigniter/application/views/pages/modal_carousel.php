<div class="col-md-8">
    <div id=<?php echo "modal-carousel".$alb_row->album_id; ?> class="carousel slide modal-carousel" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators gal-c-i">
            <?php
            $prev_count = NULL;
            for($i = 1; $i < count($gal_data['modal_data']); $i++)
            {
              if ($gal_data['modal_data'][$i-1]->album_id == $alb_row->album_id)
              {
                  if ($prev_count == NULL)
                  {  ?>
                    <li data-target=<?php echo "#modal-carousel".$alb_row->album_id; ?> data-slide-to="<?php echo $i-1; ?>" class="active"></li>
            <?php	}
              else { ?>
                    <li data-target=<?php echo "#modal-carousel".$alb_row->album_id; ?> data-slide-to="<?php echo $i-1; ?>"></li>
            <?php	 }
              $prev_count = $i;
              }
            } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
              $prev_num = NULL;
              for($j = 1; $j < count($gal_data['modal_data']); $j++)
              {
                if ($gal_data['modal_data'][$j-1]->album_id == $alb_row->album_id)
                {
                    if ($prev_num == NULL)
                    { ?>
                    <div class="item active">
                        <img src="<?php echo base_url().'/'.$gal_data['modal_data'][$j-1]->full_path; ?>" alt="<?php echo $gal_data['modal_data'][$j-1]->alt; ?>" >
                        <h4><?php echo $gal_data['modal_data'][$j-1]->image_title; ?></h4>
                    </div>
              <?php
                    }
                else
                    { ?>
                    <div class="item">
                        <img src="<?php echo base_url().'/'.$gal_data['modal_data'][$j-1]->full_path; ?>" alt="<?php echo $gal_data['modal_data'][$j-1]->alt; ?>" >
                        <h4><?php echo $gal_data['modal_data'][$j-1]->image_title; ?></h4>
                    </div>
              <?php	}
            $prev_num = $j;
                }
              } ?>
              <a class="left carousel-control" data-slide="prev" onclick="$('<?php echo "#modal-carousel".$alb_row->album_id; ?>').carousel('prev')">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="right carousel-control" data-slide="next" onclick="$('<?php echo "#modal-carousel".$alb_row->album_id; ?>').carousel('next')">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
        </div>
    </div>
</div>