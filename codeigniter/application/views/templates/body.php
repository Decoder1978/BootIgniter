<body>
    <div id="mainWrap">
		<?php $this->load->view('templates/header');?>
		<div class="container">
			<div class="row">
			<?php if ($page == "pages/home"){ 
					$this->load->view($page);
					$this->load->view($nested_home_gal);
				}
				else if($page == "pages/gallery"){
					$this->load->view($page);
					$this->load->view($img_gal);
					}
				else{
					$this->load->view($page, $upload_data = '', $error = '');
				}?>
			</div>
		</div>
	</div>
	<?php $this->load->view('templates/footer'); ?>
	<?php $this->load->view('templates/ender-scripts'); ?>
</body>