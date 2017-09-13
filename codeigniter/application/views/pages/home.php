<!-- The carousel -->
<div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
		<li data-target="#transition-timer-carousel" data-slide-to="1"></li>
		<li data-target="#transition-timer-carousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="<?php echo base_url();?>uploads/carousel_photo/fall_grass_leaves_91527.jpg" />
			<div class="carousel-caption">
				<h1 class="carousel-caption-header">Find picture of your dreams</h1>
				<p class="carousel-caption-text hidden-sm hidden-xs">
					Here you can find many wallpapers for your personal preference
				</p>
			</div>
		</div>

		<div class="item">
			<img src="<?php echo base_url();?>uploads/carousel_photo/milky_way_stars_night_sky_space_97654.jpg" />
			<div class="carousel-caption">
				<h1 class="carousel-caption-header">Share your thoughts</h1>
				<p class="carousel-caption-text hidden-sm hidden-xs">
					Write comments for pictures that attract your attention
				</p>
			</div>
		</div>

		<div class="item">
			<img src="<?php echo base_url();?>uploads/carousel_photo/surface_texture_stains_background_50906.jpg" />
			<div class="carousel-caption">
				<h1 class="carousel-caption-header">Add your own images</h1>
				<p class="carousel-caption-text hidden-sm hidden-xs">
					Upload wallpapers of your own collection to share with others
				</p>
			</div>
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>

	<!-- Timer "progress bar" -->
	<hr class="transition-timer-carousel-progress-bar animate" />
</div>
