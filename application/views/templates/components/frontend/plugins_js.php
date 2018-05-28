<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	
<?php
if ($plugins == 'home') { ?>

   




<?php } elseif ($plugins == 'contact_us') { ?>
	<!-- Vendor -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.appear/jquery.appear.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery-cookie/jquery-cookie.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/popper/umd/popper.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/common/common.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.validation/jquery.validation.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/isotope/jquery.isotope.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/vide/vide.min.js"></script>
	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/theme.js"></script>
	<!-- Current Page Vendor and Views -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/views/view.contact.js"></script>
	<!-- Theme Custom -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/custom.js"></script>
	<!-- Theme Initialization Files -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/theme.init.js"></script>
<?php } ?>
