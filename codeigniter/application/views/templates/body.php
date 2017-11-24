<body>
  <?php $this->load->view('templates/header');?>
  <div id="mainWrap">
		<div class="container">
			<div class="row">
        <?php
        switch($page)
        {
          case 'pages/home':
            $this->load->view($page);
            $this->load->view($home_gal, $gal_data);
            break;
          case 'pages/gallery':
            $this->load->view($page, $gal_data);
  					$this->load->view($img_gal, $gal_data);
            break;
          case 'pages/album':
            $this->load->view($page, $gal_data);
            $this->load->view($page_com, $gal_data);
            break;
          case 'pages/album_coms':
            $this->load->view($page_add, $comm_data);
            break;
          case 'pages/result':
            $this->load->view($page, $gal_data);
            break;
          case 'pages/profile':
            $this->load->view($page);
            $this->load->view($sub_page, $album_data);
            break;
          default:
            $this->load->view($page);
        }
        ?>
			</div>
		</div>
	</div>
	<?php $this->load->view('templates/footer'); ?>
</body>
<?php
  $this->load->view('templates/main-scripts');

  if($page == "pages/home" || $page == "pages/gallery" || $page == "pages/album" || $page == "pages/result" || $page == "pages/profile")
  {
    $this->load->view('templates/ender-scripts', $js_to_load);
  }
?>
