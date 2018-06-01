<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/animate/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme-elements.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme-blog.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme-shop.css">

<?php
if ($plugins == 'home') {
?>
<?php } elseif ($plugins == 'about_us') { ?>
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/magnific-popup/magnific-popup.min.css">
<?php } elseif ($plugins == 'car_rent') { ?>
	<!-- Current Page CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/rs-plugin/css/layers.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/rs-plugin/css/navigation.css">	
<?php } ?>
	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/skins/default.css"> 
	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/custom.css">
	<!-- Head Libs -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/modernizr/modernizr.min.js"></script>