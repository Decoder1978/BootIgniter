 <div class="col-lg-12">
        <h1 class="page-header">Recent Gallery</h1>

    <?php for($i = 1; $i < 4; $i++)
    {?>
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://#" data-target="#image-gallery">
            <img class="img-responsive" src="http://fakeimg.pl/365x365/" alt="Short alt text">
        </a>
  			<div class="gal_menu">
  			<button type="button" class="btn btn-info" data-toggle="modal" data-target=<?php"#myModal".$i;?>>VIEW ALBUM</button>
  			</div>
      </div>
<?php}?>
	</div>
