<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html> 
<html>
	<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<?php 
		$uri = $this->uri->segment(1);
		if(empty($uri)){
			$uri = ucwords('home');
		} else {
			$uri = ucwords($this->uri->segment(1));
		}
	?>
	<title><?php echo $uri;?> | Mahardhika Transport Batam</title>	

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Porto - Responsive HTML5 Template">
	<meta name="author" content="Andhana Utama">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo base_url().$this->data['asfront']; ?>img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php echo base_url().$this->data['asfront']; ?>img/apple-touch-icon.png">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
	<?php echo $addons; ?>
	</head>

	<body>
	<div class="body">
		<header id="header" class="header-narrow header-semi-transparent header-transparent-sticky-deactive header-transparent-bottom-border" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 1, 'stickySetTop': '1'}">
			<div class="header-body">
				<div class="header-container container">
					<div class="header-row">
						<div class="header-column">
							<div class="header-row">
								<div class="header-logo">
									<a href="">
										<img alt="Porto" width="82" height="40" src="<?php echo base_url().$this->data['asfront']; ?>img/logomtbwhite.png">
									</a>
								</div>
							</div>
						</div>
						<div class="header-column justify-content-end">
							<div class="header-row">
								<div class="header-nav">
									<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
										<nav class="collapse">
											<ul class="nav nav-pills" id="mainNav">
											<?php
							                $menu = array(array('','Home'), array('about','About Us'), array('rental','Car Rent'),array('tour','Tour Package'),array('contact','Contact Us'));
							                foreach ($menu as $value) {
							                    $url = $this->uri->segment(1);
							                    $class = '';
							                    if($url == $value[0])$class = 'active';
							                ?>
												<li class="">
													<a class="nav-link <?php echo $class;?>" href="<?php echo base_url().$value[0]?>">
														<?php echo $value[1];?>
													</a>
												</li>
											<?php } ?>
											</ul>
										</nav>
									</div>
									<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
										<i class="fa fa-bars"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
