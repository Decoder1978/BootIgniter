<div class="col-md-8 md_c">
    <div id="modal-carousel<?= $alb_row->album_id; ?>" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
              <?php
                $prev_num = NULL;
                $arr_length = count($gal_data['modal_data']);
                for($j = 1; $j <= $arr_length; $j++)
                {
                  if ($gal_data['modal_data'][$j-1]->album_id == $alb_row->album_id)
                  {
                      if ($prev_num == NULL)
                      { ?>
                      <div class="item active" data-slide-number="<?= $j-1; ?>">
                          <img class="lazy_load<?= $alb_row->album_id ?>" src="" data-src="<?= base_url().$gal_data['modal_data'][$j-1]->full_path; ?>" alt="<?php echo $gal_data['modal_data'][$j-1]->alt; ?>" >
                          <h4><?= $gal_data['modal_data'][$j-1]->image_title; ?></h4>
                      </div>
                <?php }
                  else
                      { ?>
                      <div class="item" data-slide-number="<?= $j-1; ?>">
                          <img class="lazy_load<?= $alb_row->album_id ?>" src="" data-src="<?= base_url().$gal_data['modal_data'][$j-1]->full_path; ?>" alt="<?php echo $gal_data['modal_data'][$j-1]->alt; ?>" >
                          <h4><?= $gal_data['modal_data'][$j-1]->image_title; ?></h4>
                      </div>
                <?php }
              $prev_num = $j;
                  }
                } ?>
                <a class="left carousel-control" data-slide="prev" onclick="$('<?= "#modal-carousel".$alb_row->album_id; ?>').carousel('prev')">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" data-slide="next" onclick="$('<?= "#modal-carousel".$alb_row->album_id; ?>').carousel('next')">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
          </div>
          <!-- Indicators -->
          <!-- <ol class="carousel-indicators">
              <?php
              $prev_count = NULL;
              $arr_length = count($gal_data['modal_data']);
              for($i = 1; $i <= $arr_length; $i++)
              {
                if ($gal_data['modal_data'][$i-1]->album_id == $alb_row->album_id)
                {
                  if ($prev_count == NULL)
                  { ?>
                    <li data-target="#modal-carousel<?= $alb_row->album_id; ?>" data-slide-to="<?= $i-1; ?>" class="active"></li>
                    <?php
                  }
                  else
                  { ?>
                    <li data-target="#modal-carousel<?= $alb_row->album_id; ?>" data-slide-to="<?= $i-1; ?>"></li>
                    <?php
                  }
                  $prev_count = $i;
                }
              } ?>
          </ol> -->
    </div>
</div>
