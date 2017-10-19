<body>
  <?php $this->load->view('templates/header');?>
  <div id="mainWrap">
		<div class="container">
			<div class="row">
			<?php if($page == "pages/home")
			  {
					$this->load->view($page);
					$this->load->view($home_gal, $gal_data);
				}
				else if($page == "pages/gallery")
				{
					$this->load->view($page, $gal_data['category_data']);
					$this->load->view($img_gal, $gal_data);
				}
        else if($page == "pages/result")
        {
          $this->load->view($page, $res_info);
        }
				else if($page == "pages/profile")
        {
          $this->load->view($page);
					$this->load->view($sub_page, $album_data);
				}
        else
        {
          $this->load->view($page);
        }?>
			</div>
		</div>
	</div>
	<?php $this->load->view('templates/footer'); ?>

</body>
<?php
  $this->load->view('templates/main-scripts');

  if($page == "pages/home" || $page == "pages/gallery" || $page == "pages/result" || $page == "pages/profile")
  {
    $this->load->view('templates/ender-scripts', $js_to_load);
  }
?>
