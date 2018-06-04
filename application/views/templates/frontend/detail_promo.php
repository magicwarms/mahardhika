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
		<div class="row" style="text-align: center;">
			<div class="col">
				<h2 class="mb-0"><strong>Our</strong> Promo</h2>
				<hr class="tall">
			</div>
		</div>
		<?php
			if(!empty($listpromo)){
				foreach ($listpromo as $key => $promo) {
		?>
		<div class="row">
			<div class="col-lg-4">
				<img src="<?php echo $promo->imagePROMO;?>" class="img-fluid appear-animation" data-appear-animation="wobble" data-appear-animation-delay="0" data-appear-animation-duration="1s">
			</div>
			<div class="col-lg-6">
				<h4><?php echo $promo->title;?></h4>
				<?php echo $promo->desc;?>
				<hr class="tall">
			</div>
		</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>