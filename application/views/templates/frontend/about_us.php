<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div role="main" class="main">
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1></h1>
				</div>
			</div>
		</div>
	</section>
	<div id="googlemaps" class="google-map"></div>
	<div class="container">
		<div class="row mt-4">
			<div class="col-lg-7 col-xl-8">
				<h1 class="heading-primary"><strong><?php echo $getabout->title; ?></strong></h1>
				<?php echo $getabout->desc; ?>
			</div>
			<div class="col-lg-5 col-xl-4">
				<div class="featured-box featured-box-primary">
					<div class="box-content">
						<h4 class="text-uppercase">Behind the scenes</h4>
						<ul class="thumbnail-gallery mb-4 pb-3" data-plugin-lightbox data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
						<?php 
		                if(!empty($getabout->map)){
		                  foreach ($getabout->map as $value_img) { ?>
							<li>
								<a title="<?php echo $getabout->title;?>" href="<?php echo $value_img; ?>">
									<span class="thumbnail mb-0 img-about">
										<img src="<?php echo $value_img; ?>" alt="<?php echo $getabout->title;?>">
									</span>
								</a>
							</li>
							<?php } ?>
                		<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>