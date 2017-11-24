<div class="col-md-12 post-comments">
<hr>
<h4>User comments:</h4>
<div class="com_form">
  <form class="comment_section <?= $gal_data['comment_status']; ?>" action="<?= base_url(); ?>album/index/<?= $this->uri->segment(2);?>"; method="post" enctype="multipart/form-data">
    <div id="comment">
      <label for="comment">Your Comment</label>
      <textarea type="text" name="comment" class="form-control" rows="3"></textarea>
      <button class="btn btn-warning comment-btn form-submit comment-control-submit">Send</button>
      <span class="popuptext" style="display: none;">Less then 3 symbols!</span>
    </div>
  </form>
</div>
  <div class="com_list">
    <div class="comments-nav">
      <h4>There are <?php if($gal_data['comment_data'][0]->album_id == $gal_data['modal_data'][0]->album_id)
      { echo count($gal_data['comment_data']); } ?> comments </h4>
      <hr>
    </div>
      <?php $comm_length = count($gal_data['comment_data']);
      for ($i = 0; $i < $comm_length; $i++)
      { ?>
      <div class="media">
        <div class="media-heading">
          <p class="username"><?= $gal_data['comment_data'][$i]->name; ?></p>
          <p class="com_date"><?= $gal_data['comment_data'][$i]->date; ?></p>
        </div>
          <div class="media-body">
            <p class="com_text"><?= $gal_data['comment_data'][$i]->comment_text; ?></p>
          </div>
        <hr>
      </div>
  <?php } ?>
  </div>
</div>
