<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
if ($plugins == 'home') {
?>

<?php
} elseif ($plugins == 'contact_us') {
?>
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
	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/skins/default.css"> 
	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/custom.css">
	<!-- Head Libs -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/modernizr/modernizr.min.js"></script>
<?php } elseif ($plugins == 'about_us') { ?>
	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/animate/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>vendor/magnific-popup/magnific-popup.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme-elements.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme-blog.css">
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/theme-shop.css">
	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/skins/default.css"> 
	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url().$this->data['asfront']; ?>css/custom.css">
	<!-- Head Libs -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/modernizr/modernizr.min.js"></script>
<?php } ?>
