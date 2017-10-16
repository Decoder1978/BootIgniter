<div class="col-md-4">
    <div class="modal-body inline">
        <div class="row">
            <div class="col-md-9">
                <h4><?php echo $alb_row->album_title; ?></h4>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
       <hr/>
       <h5><b>Comments:</b></h5>
       <div class="com_pagination_top"></div>
       <div class="com_list">
         <?php
         $comm_length = count($gal_data['comment_data']);
         for ($i = 0; $i < $comm_length; $i++)
         {
               if($gal_data['comment_data'][$i]->album_id == $alb_row->album_id)
               { ?>
                 <div class="<?php echo "comment com_data-".$alb_row->album_id; ?>">
                   <p class="text-success"><?php echo $gal_data['comment_data'][$i]->name; ?></p>
                   <p><?php echo $gal_data['comment_data'][$i]->comment_text; ?></p>
                   <p class="text-mute"><?php echo $gal_data['comment_data'][$i]->date; ?></p>
                 </div>
           <?php	} ?>
        <?php }
         ?>
       </div>
       <form class="comment_section <?php echo $gal_data['comment_status']; ?>" action="<?= base_url()."gallery";?>" method="post" enctype="multipart/form-data">
         <input type="hidden" class="album" name="album" value="<?php echo $alb_row->album_id; ?>"/>
         <textarea placeholder="Comment" type="text" style="height:100px" name="comment" class="form-control" maxlength="255" required></textarea>
         <span class="text-mute">Please write your opinion.</span>
         <button class="btn btn-sm btn-primary pull-right comment-btn">Save</button>
       </form>
    </div>
</div>
