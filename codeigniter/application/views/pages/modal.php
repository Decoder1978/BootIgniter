<div class="modal hide fade" id=<?php echo "myModal".$album_data->album_id; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row">
              <?php
              $this->load->view('modal_carousel');
              $this->load->view('modal_comments');
              ?>
            </div>
        </div>
    </div>
</div>
