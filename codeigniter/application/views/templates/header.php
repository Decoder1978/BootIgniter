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
				<li><a class="<?php echo ($this->uri->segment(1) == "home") ? "active" : "";?>" href="<?php echo base_url(); ?>home">HOME</a></li>
				<li><a class="<?php echo ($this->uri->segment(1) == "gallery") ? "active" : "";?>" href="<?php echo base_url(); ?>gallery">GALLERY</a></li>
				<li><a class="<?php echo ($this->uri->segment(1) == "about") ? "active" : "";?>" href="<?php echo base_url(); ?>about">ABOUT</a></li>
				<li><a class="<?php echo ($this->uri->segment(1) == "contact") ? "active" : "";?>" href="<?php echo base_url(); ?>contact">CONTACT</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-menu-right">
				<li>
					<div class="navbar-right">
						<div class="dropdown">
						  <button class="btn btn-default btn-inverse dropdown-toggle" type="button" data-toggle="dropdown">SEARCH</button>
						  <ul class="dropdown-menu">
						    <li>
									<form class="search-form" role="search" action="<?php echo base_url();?>result" method="post">
						        <div class="form-group pull-right" id="search">
						          <input type="text" name="keyword" class="form-control" placeholder="Search" required>
						          <button type="submit" class="form-control form-control-submit">Submit</button>
						          <span class="search-label"><i class="glyphicon glyphicon-search"></i></span>
						        </div>
						      </form>
								</li>
						  </ul>
						</div>
					</div>
				</li>
				<?php if ($this->session->userdata('login')){ ?>
				<li><a href="<?php echo base_url(); ?>profile">Hello, <?php echo $this->session->userdata('uname'); ?></a></li>
				<li><a href="<?php echo base_url(); ?>home/logout">LOGOUT</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>login">LOGIN</a></li>
				<li><a href="<?php echo base_url(); ?>signup">SIGNUP</a></li>
				<?php } ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
