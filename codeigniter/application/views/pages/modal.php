
<div class="portfolio-modal modal hide fade" id="<?php echo "myModal".$alb_row->album_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row">
              <?php
                $data = array('alb_row' => $alb_row, 'gal_data' => $gal_data);
    						$this->load->view($gal_data['modal_carousel'], $data);
                $this->load->view($gal_data['modal_comments'], $data);
              ?>
            </div>
        </div>
    </div>
</div>
