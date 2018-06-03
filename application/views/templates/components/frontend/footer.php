<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="footer-ribbon">
					<span>Get in Touch</span>
				</div>
				<div class="col-lg-4">
					<div class="contact-details">
						<h4>Contact Us</h4>
						<ul class="contact">
							<li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
							<li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</p></li>
							<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2">
					<h4>Follow Us</h4>
					<ul class="social-icons">
						<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-1">
						<a href="" class="logo">
							<img alt="Mahardhika Logo" class="img-fluid" src="<?php echo base_url().$this->data['asfront']; ?>img/logo-footer.png">
						</a>
					</div>
					<div class="col-lg-7">
						<p>© Copyright 2018. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>
<?php echo $plugins; ?>
</body>
</html>