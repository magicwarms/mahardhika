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
				<h1 class="heading-primary"><strong>About</strong> Us</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
				<p>Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing <span class="alternative-font">metus</span> sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula.</p>
			</div>
			<div class="col-lg-5 col-xl-4">
				<div class="featured-box featured-box-primary">
					<div class="box-content">
						<h4 class="text-uppercase">Behind the scenes</h4>
						<ul class="thumbnail-gallery mb-4 pb-3" data-plugin-lightbox data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
							<li>
								<a title="Benefits 1" href="<?php echo base_url().$this->data['asfront']; ?>img/slides/barelang.jpg">
									<span class="thumbnail mb-0">
										<img src="<?php echo base_url().$this->data['asfront']; ?>img/slides/barelang.jpg" alt="">
									</span>
								</a>
							</li>
							<li>
								<a title="Benefits 2" href="<?php echo base_url().$this->data['asfront']; ?>img/slides/masjid-raya.jpg">
									<span class="thumbnail mb-0">
										<img src="<?php echo base_url().$this->data['asfront']; ?>img/slides/masjid-raya.jpg" alt="">
									</span>
								</a>
							</li>
							<li>
								<a title="Benefits 3" href="<?php echo base_url().$this->data['asfront']; ?>img/slides/barelang-batam.jpg">
									<span class="thumbnail mb-0">
										<img src="<?php echo base_url().$this->data['asfront']; ?>img/slides/barelang-batam.jpg" alt="">
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>