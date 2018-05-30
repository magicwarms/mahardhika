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
					<div class="col-12 col-sm-6 col-lg-4 car-rent mb-4 mb-lg-0">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/hiace1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">HIACE COMMUTER<br>16 Seater</span>
										<span class="thumb-info-type">2016</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
					<div class="col-12 col-sm-6 col-lg-4 car-rent mb-4 mb-lg-0">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/elf-long1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Elf Long<br>19 seater</span>
										<span class="thumb-info-type">2016</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
					<div class="col-12 col-sm-6 col-lg-4 car-rent mb-4 mb-sm-0">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/bus1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Bus<br>33 Seater</span>
										<span class="thumb-info-type">-</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
					<div class="col-12 col-sm-6 col-lg-4 car-rent">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/avanza1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Avanza</span>
										<span class="thumb-info-type">2016</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a></a>
								</span>
							</span>
						</span>
					</div>
					<div class="col-12 col-sm-6 col-lg-4 car-rent mb-4 mb-sm-0">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/avanza1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Innova reborn</span>
										<span class="thumb-info-type">2017</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
					<div class="col-12 col-sm-6 col-lg-4 car-rent">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/rush1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Rush</span>
										<span class="thumb-info-type">2017</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
					<div class="col-12 col-sm-6 col-lg-4 car-rent mb-4 mb-sm-0">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/xenia1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Xenia</span>
										<span class="thumb-info-type">2016</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
					<div class="col-12 col-sm-6 col-lg-4 car-rent">
						<span class="thumb-info thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper">
								<a href="about-me.html">
									<img src="<?php echo base_url().$this->data['asfront']; ?>img/car/coaster1000x1000.png" class="img-fluid" alt="">
									<span class="thumb-info-title">
										<span class="thumb-info-inner">Coaster<br>24 Seat</span>
										<span class="thumb-info-type">-</span>
									</span>
								</a>
							</span>
							<span class="thumb-info-caption car-rent">
								<span class="badge badge-primary badge-md"><strong>Available</strong></span>
								<span class="badge badge-warning badge-md"><strong>Not Available</strong></span>
								<p class="desc-text"><strong>Door</strong>: 4<br>
													 <strong>Bag</strong>: 2 Big 1 Small<br>
													 <strong>Seats</strong>: 6<br>
								</p>
								<span class="thumb-info-social-icons">
									<h5><strong>RATES</strong></h5>
									<a href="contact-us.html"><button class="btn btn-primary" data-toggle="modal" data-target="#smallModal">Call Us</button></a>
								</span>
							</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>