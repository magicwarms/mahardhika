<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div role="main" class="main" id="home">
	<div class="slider-container rev_slider_wrapper" style="height: 1000px;">
		<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'sliderLayout': 'fullscreen', 'fullScreenOffset': '0', 'responsiveLevels': [4096,1200,992,500]}">
			<ul>
				<li data-transition="fade">
					<img src="<?php echo base_url().$this->data['asfront']; ?>img/slides/slide-bg-full.jpg"  
						alt=""
						data-bgposition="center center" 
						data-bgfit="cover" 
						data-bgrepeat="no-repeat" 
						class="rev-slidebg">
	
					<div class="tp-caption"
						data-x="center" data-hoffset="['-150','-150','-150','-220']"
						data-y="center" data-voffset="-95"
						data-start="1000"
						style="z-index: 5"
						data-transform_in="x:[-300%];opacity:0;s:500;"><img src="<?php echo base_url().$this->data['asfront']; ?>img/slides/slide-title-border.png" alt=""></div>
	
					<div class="tp-caption"
						data-x="center" data-hoffset="['150','150','150','220']"
						data-y="center" data-voffset="-95"
						data-start="1000"
						style="z-index: 5"
						data-transform_in="x:[300%];opacity:0;s:500;"><img src="<?php echo base_url().$this->data['asfront']; ?>img/car-rent/7211.jpg" alt=""></div>

					<div class="tp-caption top-label"
						data-x="center" data-hoffset="0"
						data-y="center" data-voffset="-95"
						data-start="500"
						data-fontsize="['24','24','24','36']"	
						style="z-index: 5"
						data-transform_in="y:[-300%];opacity:0;s:500;">DO YOU NEED</div>

					<div class="tp-caption main-label"
						data-x="center" data-hoffset="0"
						data-y="center" data-voffset="['-45','-45','-45','-25']"
						data-start="1500"
						data-whitespace="nowrap"	
						data-fontsize="['52','52','52','82']"					 
						data-transform_in="y:[100%];s:500;"
						data-transform_out="opacity:0;s:500;"
						style="z-index: 5"
						data-mask_in="x:0px;y:0px;">A CAR?
					</div>
	
					<div class="tp-caption bottom-label"
						data-x="center" data-hoffset="0"
						data-y="center" data-voffset="['5','5','5','38']"
						data-start="2000"
						data-fontsize="['20','20','20','36']"
						style="z-index: 5"
						data-transform_in="y:[100%];opacity:0;s:500;">Check out our options and booking now !!!.
					</div>
				</li>
			</ul>
		</div>
	</div>

	<section class="section section-primary mt-0" id="projects">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2><strong>OUR</strong> CAR</h2>
				</div>
				<div class="row mb-5 pb-2">
				<?php 
              	if(!empty($listrental)){
                	foreach ($listrental  as $key => $rental) {
                		if($rental->status == 1){
		                  $status = '<span class="badge badge-primary badge-md"><strong>Available</strong></span>';
		                } else {
		                  $status = '<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>';
		                }
                ?>
					<div class="col-12 col-sm-6 col-lg-4 car-rent mb-4 mb-lg-0">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="#">
									<img src="<?php echo $rental->imageRENTAL;?>" class="img-fluid" alt="<?php echo $rental->name;?>">
									<span class="thumb-info-title">
										<span class="thumb-info-inner"><?php echo $rental->name;?></span>
										<span class="thumb-info-type"><?php echo $rental->year;?></span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<?php echo $status;?>
								<p class="desc-text"><strong>Door</strong>: <?php echo $rental->door;?>
								<br>
								<strong>Bag</strong>: <?php echo $rental->bag;?><br>
								<strong>Seats</strong>: <?php echo $rental->seat;?><br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="<?php echo base_url();?>contact" target="_blank"><button class="btn btn-primary">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
					<?php } ?>
				<?php } ?>
				</div>
			</div>
		</div>
	</section>
</div>