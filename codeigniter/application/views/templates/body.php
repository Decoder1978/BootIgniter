<body>
    <div id="mainWrap">
		<?php $this->load->view('templates/header');?>
		<div class="container">
			<div class="row">
			<?php if($page == "pages/home")
			  {
					$this->load->view($page);
					$this->load->view($nested_home_gal, $gal_data);
				}
				else if($page == "pages/gallery")
				{
					$this->load->view($page, $gal_data['category_data']);
					$this->load->view($img_gal, $gal_data);
				}
        else if($page == "pages/result")
        {
          $this->load->view($page, $search_result);
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
	<?php $this->load->view('templates/ender-scripts'); ?>
</body>
