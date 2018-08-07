<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div role="main" class="main">
	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col">
					<ul class="breadcrumb">
						<li><a href="#"></a></li>
						<li class="active"></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<h1 style="text-align: center;font-weight: 400">Testimonials</h1>
		<hr style="height: 5px;" class="tall">
		<div class="row mb-5">
		<?php
			if(!empty($listtestimonial)){
				foreach ($listtestimonial as $testi) {
		?>
			<div class="col-lg-4">
				<div class="testimonial testimonial-style-5">
					<blockquote>
						<img class="pict-testi" src="<?php echo $testi->imageTESTI; ?>">
						<p><?php echo $testi->testimoni; ?></p>
					</blockquote>
					<div class="testimonial-arrow-down"></div>
					<div class="testimonial-author">
						<p><strong><?php echo $testi->name; ?></strong><span><?php echo $testi->position; ?></span></p>
					</div>
				</div>
			</div>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
</div>