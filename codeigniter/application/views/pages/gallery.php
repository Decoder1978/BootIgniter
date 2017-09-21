		<div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="gallery-title">Gallery</h1>
		</div>
		<div align="center">
			<button class="btn btn-default filter-button active" data-filter="all">All</button>
		<?php
			for($i = 0; $i < $gal_data['category_data']['num_rows']; $i++):
				$rows = $gal_data['category_data']['rows'];
				$category_title = $rows[$i]->category_title;?>
			<button class="btn btn-default filter-button" data-filter="<?php echo $category_title;?>"><?php echo ucfirst($category_title);?></button>
			<?php
			endfor; ?>
		</div>
		<br/>
