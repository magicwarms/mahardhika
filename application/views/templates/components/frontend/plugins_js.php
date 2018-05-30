<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	
<?php
if ($plugins == 'home') { ?>

   




<?php } elseif ($plugins == 'contact_us') { ?>
	<!-- Vendor -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/popper/umd/popper.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/common/common.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.validation/jquery.validation.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/theme.js"></script>
	<!-- Current Page Vendor and Views -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/views/view.contact.js"></script>
	<!-- Theme Custom -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/custom.js"></script>
	<!-- Theme Initialization Files -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/theme.init.js"></script>
<?php } elseif ($plugins == 'about_us') { ?>
	<!-- Vendor -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.appear/jquery.appear.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery-cookie/jquery-cookie.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/popper/umd/popper.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/common/common.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/isotope/jquery.isotope.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/theme.js"></script>
	<!-- Theme Custom -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/custom.js"></script>
	<!-- Theme Initialization Files -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/theme.init.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhcGgyS9iBG1WUPh1Hc6Ljf4FwBVt7wgI"></script>
		<script>
			// Map Markers
			var mapMarkers = [{
				address: "Rental Mobil Batam (CV. Mahardhika Transport Batam)",
				html: "<strong>Tamansari hijau A1 no 23</strong><br>Tiban Baru, Sekupang, Kota Batam, Kepulauan Riau 29429",
				icon: {
					image: "<?php echo base_url().$this->data['asfront']; ?>img/pin.png",
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			}];

			// Map Initial Location
			var initLatitude = 1.105930;
			var initLongitude = 103.974097;

			// Map Extended Settings
			var mapSettings = {
				controls: {
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 16
			};

			var map = $('#googlemaps').gMap(mapSettings);

			// Map text-center At
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$('#googlemaps').gMap("centerAt", options);
			}
		</script>
<?php } elseif ($plugins == 'car_rent') { ?>
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
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?php echo base_url().$this->data['asfront']; ?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	
	<!-- Theme Custom -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/custom.js"></script>
	
	<!-- Theme Initialization Files -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/theme.init.js"></script>

	<!-- Examples -->
	<script src="<?php echo base_url().$this->data['asfront']; ?>js/examples/examples.portfolio.js"></script>
<?php } ?>
