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
			<img src="http://placehold.it/1200x400" />
			<div class="carousel-caption">
				<h1 class="carousel-caption-header">Slide 1</h1>
				<p class="carousel-caption-text hidden-sm hidden-xs">
					Long Slide Caption 1
				</p>
			</div>
		</div>
		
		<div class="item">
			<img src="http://placehold.it/1200x400/AAAAAA/888888" />
			<div class="carousel-caption">
				<h1 class="carousel-caption-header">Slide 2</h1>
				<p class="carousel-caption-text hidden-sm hidden-xs">
					Long Slide Caption 2
				</p>
			</div>
		</div>
		
		<div class="item">
			<img src="http://placehold.it/1200x400/888888/555555" />
			<div class="carousel-caption">
				<h1 class="carousel-caption-header">Slide 3</h1>
				<p class="carousel-caption-text hidden-sm hidden-xs">
					Long Slide Caption 3
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