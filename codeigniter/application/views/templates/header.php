<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="home">BootIgniter Gallery</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a class="<?php echo ($this->uri->segment(1) == "home") ? "active" : "";?>" href="<?php echo base_url(); ?>home">Home</a></li>
				<li><a class="<?php echo ($this->uri->segment(1) == "gallery") ? "active" : "";?>" href="<?php echo base_url(); ?>gallery">Gallery</a></li>
				<li><a class="<?php echo ($this->uri->segment(1) == "about") ? "active" : "";?>" href="<?php echo base_url(); ?>about">About</a></li>
				<li><a class="<?php echo ($this->uri->segment(1) == "contact") ? "active" : "";?>" href="<?php echo base_url(); ?>contact">Contact</a></li>
				<li>
					<div class="search">
						<form action="<?php echo base_url();?>result" method = "post">
							<input type="text" name = "keyword" required/>
							<input type="submit" value = "Search" />
						</form>
					</div>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><a href="<?php echo base_url(); ?>profile">Hello, <?php echo $this->session->userdata('uname'); ?></a></li>
				<li><a href="<?php echo base_url(); ?>home/logout">Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>signup">Signup</a></li>
				<?php } ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
