<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div role="main" class="main">
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col">
				</div>
			</div>
			<div class="row">
				<div class="col"></div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="portfolio-title">
					<div class="row">
						<div class="col-lg-10 text-center">
							<h1 class="mb-0"><strong>TOUR</strong> PACKAGE</h1>
						</div>
					</div>
				</div>

				<hr class="tall">
			</div>
		</div>
		<?php
			if(!empty($listtour)){
				foreach ($listtour as $tour) {
		?>
		<div class="row tour-package">
			<div class="col-lg-4">
				<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 3000}">
					<?php 
                    if(!empty($tour->map)){
                      foreach ($tour->map as $key=> $value_img) { ?>
					<div>
						<span class="img-thumbnail d-block">
							<img alt="<?php echo $tour->title; ?>" class="img-fluid" src="<?php echo $value_img; ?>">
						</span>
					</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="portfolio-info">
					<div class="row">
						<div class="col-md-10">
							<h4 class="desc-head"><strong><?php echo $tour->title; ?></strong></h4>
							<h5 class="tagline-txt"><?php echo $tour->start_journey; ?></h5>
						</div>
						<div class="col-md-4">
							<p><strong>IDR <?php echo number_format($tour->price_tour, 0,',','.'); ?>/ Tour<br>
							IDR <?php echo number_format($tour->price_pax, 0,',','.'); ?>/ PAX<br></strong></p>
						</div>
						<div class="col-md-4">
								<p><strong>MIN : <?php echo $tour->min_tour; ?> PAX<br>
								MAX : <?php echo $tour->max_tour; ?> PAX</strong></p>
						</div>
					</div>
				</div>
				<ul class="portfolio-details list-list">
					<div>
						<?php echo $tour->destination; ?>
					</div>
					<div>
						<?php echo $tour->include; ?>
						<?php echo $tour->exclude; ?>
					</div>
				</ul>
			</div>
		</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>