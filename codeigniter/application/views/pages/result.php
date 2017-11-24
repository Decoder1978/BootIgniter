<div class="gallery_list col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <h1 class="page-header">Search results</h1>
<?php
if($gal_data["search_result"] == null){
  ?> <blockquote>No match found. Try again later or type in another request.</blockquote> <?php
}
else
{
  foreach($gal_data["search_result"] as $row)
    { ?>
      	<div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 thumb">
          <h4><?= $row->album_title; ?></h4>
      		<h5><?= $row->image_title; ?></h5>
          <a class="thumbnail modal_view" data-image-id="<?= $row->image_id;?>" data-toggle="modal" data-title="<?= $row->image_title;?>" data-target=<?= "#myModal".$row->album_id; ?>>
            <img src="<?= base_url().$row->full_path;?>" alt="<?= $row->alt;?>" class="img-responsive">
          </a>
          <div class="gal_menu">
  					<!-- Modal callout -->
            <button type="button" class="btn btn-default btn-inverse modal_view" data-toggle="modal" data-target="<?= '#myModal'.$row->album_id; ?>" >MODAL</button>
            <a type="button" class="btn btn-default btn-inverse" href="<?= base_url()?>album/<?= $row->album_title; ?>">REDIRECT</a>
            <a type="button" class="btn btn-default btn-inverse" href="<?= base_url()?>gallery/download_album/<?= $row->album_id; ?>">DOWNLOAD</a>
            <a type="button" class="btn btn-default btn-inverse">PLACEHOLDER</a>
  					<!-- Modal -->
            <?php
            $data = array('alb_row' => $row, 'gal_data' => $gal_data);
            $this->load->view($gal_data['modal_page'], $data);
            ?>
  				</div>
      	</div>
  <?php
    }
}
  ?>
</div>
