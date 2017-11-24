<div class="col-md-12" id="main_area">
        <!-- Slider -->
        <div class="row">
            <div id="slider">
                <!-- Top part of the slider -->
                    <div class="col-sm-8" id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                              <?php
                              $arr_length = count($gal_data['modal_data']);
                              for($j = 1; $j <= $arr_length; $j++)
                              {
                                if ($j == 1) { ?>
                                      <div class="item active" data-slide-number="<?= $j-1; ?>">
                                <?php }
                                else { ?>
                                      <div class="item" data-slide-number="<?= $j-1; ?>">
                                <?php } ?>
                                          <img src="<?= $gal_data['modal_data'][$j-1]->full_path; ?>" alt="<?= $gal_data['modal_data'][$j-1]->alt; ?>" >
                                          <span id="<?= $gal_data['modal_data'][$j-1]->pic_tags; ?>" style="display: none !important;"></span>
                                          <h4><?= $gal_data['modal_data'][$j-1]->image_title; ?></h4>
                                      </div>
                                <?php
                              } ?>
                            </div><!-- Carousel nav -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4 album_info">
                      <h3 id="album_title"><?= ucfirst($gal_data['album_title']); ?></h3>
                      <div class="albtags">
                        <p id="albtag_info">Album tags:</p>
                        <div id="albtag_links">
                          <?php foreach ($gal_data['album_tags'] as $value) { ?>
                                <a class="album_tags" name="keyword" href="result/<?= $value; ?>"><?= $value; ?></a>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="pictags">
                        <p id="pictag_info">Picture tags:</p>
                        <div id="pictag_links">
                          <a class="pic_tags"></a>
                        </div>
                      </div>
                      <p id="album_rating">Rating: 12/10 na konchikah pal'cev</p>
                      <a type="button" class="btn btn-default btn-inverse" href="download/<?= $gal_data['modal_data'][0]->album_id; ?>">DOWNLOAD</a>
                    </div>
                </div>
        </div><!--/Slider-->
        <div class="row hidden-xs" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                  <?php
                  for($i = 0; $i < $arr_length; $i++)
                  { ?>
                        <li class="col-sm-2">
                          <a class="thumbnail pic_thumb" id="carousel-selector-<?= $i; ?>">
                            <?php ?>
                            <img src="<?= $gal_data['modal_data'][$i]->album_path."/thumbs/".$gal_data['modal_data'][$i]->thumb; ?>">
                          </a>
                        </li>
                      <?php
                  } ?>
                </ul>
        </div>
</div>
