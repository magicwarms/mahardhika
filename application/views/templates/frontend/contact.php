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
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<?php if (!empty($message)){ ?>
			      <div class="alert alert-<?php echo $message['type']; ?> mt-lg">
			        <strong><?php echo $message['title']; ?></strong>
			        <?php echo $message['text']; ?>
			      </div>
				<?php } ?>
				<h2 class="mb-3 mt-2"><strong>Contact</strong> Us</h2>
				<form action="<?php echo base_url();?>contact/sendmessage" method="POST">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
					<div class="form-row">
						<div class="form-group col-lg-6">
							<label>Your name *</label>
							<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
						</div>
						<div class="form-group col-lg-6">
							<label>Your email address *</label>
							<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label>Subject</label>
							<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<label>Message *</label>
							<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="desc" id="desc" required></textarea>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<input type="submit" value="Send Message" class="btn btn-primary btn-lg" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-6">

				<h4 class="heading-primary mt-4">Get in <strong>Touch</strong></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<hr>
				<h4 class="heading-primary">The <strong>Office</strong></h4>
				<ul class="list list-icons list-icons-style-3 mt-4">
					<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>
					<li><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</li>
					<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
				</ul>
				<hr>
				<h4 class="heading-primary">Business <strong>Hours</strong></h4>
				<ul class="list list-icons list-dark mt-4">
					<li><i class="fa fa-clock-o"></i> Monday - Friday - 9am to 5pm</li>
					<li><i class="fa fa-clock-o"></i> Saturday - 9am to 2pm</li>
					<li><i class="fa fa-clock-o"></i> Sunday - Closed</li>
				</ul>
			</div>
		</div>
	</div>
</div>