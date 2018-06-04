<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div role="main" class="main">
	<div class="slider-container rev_slider_wrapper" style="height: 700px;">
		<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 6000, 'gridwidth': 800, 'gridheight': 700, 'responsiveLevels': [4096,1200,992,500]}">
			<ul>
			<?php
				if(!empty($listslider)){
					foreach ($listslider as $slide) {
			?>
				<li data-transition="fade">
					<img src="<?php echo $slide->imageSLIDER;?>"  
						alt="<?php echo $slide->title2;?>"
						data-bgposition="center center" 
						data-bgfit="cover" 
						data-bgrepeat="no-repeat" 
						class="rev-slidebg">
					<div class="tp-caption"
						data-x="center" data-hoffset="-150"
						data-y="center" data-voffset="-95"
						data-start="1000"
						style="z-index: 5"
						data-transform_in="x:[-300%];opacity:1;s:500;"><img src="<?php echo base_url().$this->data['asfront']; ?>img/slides/slide-title-border.png" alt=""></div>
					<div class="tp-caption top-label"
						data-x="center" data-hoffset="0"
						data-y="center" data-voffset="-95"
						data-start="500"
						style="z-index: 5"
						data-transform_in="y:[-300%];opacity:1;s:500;"><?php echo $slide->title1;?></div>
					<div class="tp-caption"
						data-x="center" data-hoffset="150"
						data-y="center" data-voffset="-95"
						data-start="1000"
						style="z-index: 5"
						data-transform_in="x:[300%];opacity:0;s:500;"><img src="<?php echo base_url().$this->data['asfront']; ?>img/slides/slide-title-border.png" alt=""></div>
					<div class="tp-caption main-label"
						data-x="center" data-hoffset="0"
						data-y="center" data-voffset="-45"
						data-start="1500"
						data-whitespace="nowrap"						 
						data-transform_in="y:[100%];s:500;"
						data-transform_out="opacity:0;s:500;"
						style="z-index: 5"
						data-mask_in="x:0px;y:0px;"><?php echo $slide->title2;?> </div>
					<div class="tp-caption bottom-label"
						data-x="center" data-hoffset="0"
						data-y="center" data-voffset="5"
						data-start="2000"
						data-fontsize="['20','20','20','30']"
						style="z-index: 5"
						data-transform_in="y:[100%];opacity:0;s:500;"><?php echo $slide->title3;?></div>
					<div class="tp-dottedoverlay tp-opacity-overlay"></div>
				</li>
					<?php } ?>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="home-intro" id="home-intro">
		<div class="container"></div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1><strong>CAR</strong> RENTAL</h1>
				<div class="owl-carousel owl-theme" data-plugin-options="{'items': 4, 'margin': 20, 'loop': false}">
				<?php
					if(!empty($listrental)){
						foreach ($listrental as $rental) {
				?>
					<div class="portfolio-item">
						<a href="<?php echo base_url();?>rental" data-portfolio-on-modal>
							<span class="thumb-info thumb-info-lighten">
								<span class="thumb-info-wrapper">
									<img src="<?php echo $rental->imageRENTAL;?>" class="img-fluid" alt="<?php echo $rental->name;?>">
									<span class="thumb-info-title">
										<span class="thumb-info-inner"><?php echo $rental->name;?></span>
										<span class="thumb-info-type"><?php echo $rental->year;?></span>
									</span>
								</span>
							</span>
						</a>
					</div>
						<?php } ?>
					<?php } ?>
				</div>
				<hr class="tall">
			</div>
		</div>
	</div>
	<section class="section section-default section-with-mockup mb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="feature-box feature-box-style-2 reverse mb-5 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
						<div class="feature-box-info">
							<h2 class="mb-2"><?php echo $getabout->title;?></h2>
							<p class="mb-4"><?php echo $getabout->desc;?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<img src="<?php echo $getabout->imageABOUT;?>" class="img-fluid mockup-landing-page mb-5 appear-animation" alt="<?php echo $getabout->title;?>" data-appear-animation="zoomIn" data-appear-animation-delay="300">
				</div>
			</div>
		</div>
	</section>
	<div class="container tour-home">
		<h1><strong>TOUR</strong> PACKAGE</h1>
		<div class="row">
		<?php 
			if(!empty($listtour)){ 
				foreach ($listtour as $tour) {
		?>
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<span class="thumb-info thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper">
						<img src="frontend/img/tour-package/hiace&elf.png" class="img-fluid" alt="">
						<span class="thumb-info-title">
							<span class="thumb-info-inner">HIACE / ISUZU ELF</span>
							<span class="thumb-info-type">16 seater / 19 seater</span>
						</span>
					</span>
					<span class="thumb-info-caption">
						<span class="thumb-info-caption-text">
							<h5><strong>CITY TOUR ( DALAM KOTA MAX 12 JAM )</strong></h5>
							<p><strong>IDR 800.000 / Tour<br>
							   IDR 80.000/ PAX<br>
							   MIN : 10 PAX<br>
							   MAX : 17 PAX</strong></p></span>
						<span class="thumb-info-social-icons">
							<button type="button" class="mb-1 mt-1 mr-1 btn btn-primary"><i class="fa fa-arrow-circle-right"></i> More Information</button>
						</span>
					</span>
				</span>
			</div>
			<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
				<span class="thumb-info thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper">
						<img src="<?php echo $tour->imageTOUR;?>" class="img-fluid" alt="<?php echo $tour->title;?>">
						<span class="thumb-info-title">
							<span class="thumb-info-inner"><?php echo $tour->title;?></span>
						</span>
					</span>
					<span class="thumb-info-caption">
						<span class="thumb-info-caption-text">
							<h5><strong><?php echo $tour->start_journey;?></strong></h5>
							<p><strong>IDR <?php echo number_format($tour->price_tour, 0,',','.'); ?> /Tour<br>
							   IDR <?php echo number_format($tour->price_pax, 0,',','.'); ?>/PAX<br>
							   MIN : <?php echo $tour->min_tour;?> PAX<br>
							   MAX : <?php echo $tour->max_tour;?> PAX</strong></p></span>
						<span>
							<a href="<?php echo base_url();?>tour" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> More Information</a>
						</span>
					</span>
				</span>
			</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<div class="container tour-home">
		<h1><strong>OUR</strong> PROMO</h1>
		<div class="row promo">
		<?php
			if(!empty($listpromo)){
				foreach ($listpromo as $promo) {
		?>
			<div class="col-sm-4 col-lg-3 mb-4 mb-lg-0">
				<span class="thumb-info thumb-info-hide-wrapper-bg our-promo">
					<span class="thumb-info-wrapper">
						<img src="frontend/img/car/xenia.png" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption promo">
						<span class="thumb-info-caption-text" style="text-align: center;">
							<h4><strong>Promo Akhir Tahun</strong></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. </p>
						</span>
					   	<a href="detail-page.html"> <button type="button" class="mb-1 mt-1 mr-1 btn btn-primary"><i class="fa fa-arrow-circle-right"></i> More...</button></a>
					</span>
				</span>
			</div>
			<div class="col-sm-4 col-lg-3 mb-4 mb-lg-0">
				<span class="thumb-info thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper">
						<img src="<?php echo $promo->imagePROMO;?>" class="img-fluid" alt="<?php echo $promo->title;?>">
					</span>
					<span class="thumb-info-caption promo">
						<span class="thumb-info-caption-text" style="text-align: center;">
							<h4><strong><?php echo $promo->title;?></strong></h4>
							<?php echo $promo->desc;?>
						</span>
					   	<a href="<?php echo base_url();?>promo" class="btn btn-primary"><i class="fa fa-arrow-circle-right"></i> More Information</a>
					</span>
				</span>
			</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<hr>
				<h2><strong>Testimonials</strong></h2>
			</div>
		</div>
	</div>

	<section class="parallax section section-text-light section-parallax section-center mt-0 mb-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?php echo base_url().$this->data['asfront']; ?>img/slides/Masjid-raya-batam.jpg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme mb-0" data-plugin-options="{'items': 1}">
					<?php
						if(!empty($listtestimonial)){
							foreach ($listtestimonial as $testi) {
					?>
					<div>
						<div class="col">
							<div class="testimonial testimonial-primary">
								<blockquote>
									<p><?php echo $testi->testimoni;?></p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail img-thumbnail">
										<img src="<?php echo $testi->imageTESTI;?>" alt="<?php echo $testi->name;?>">
									</div>
									<p><strong><?php echo $testi->name;?></strong><span><?php echo $testi->position;?></span></p>
								</div>
							</div>
						</div>
					</div>
						<?php } ?>
					<?php } ?>
				</div>
				</div>
			</div>
		</div>
	</section>
</div>