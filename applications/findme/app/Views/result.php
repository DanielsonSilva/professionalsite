<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<div class="container">
	<div class="row justify-content-md-center">
    	<div class="col-6">
			<a href="https://en.wikipedia.org/wiki/Haversine_formula" class="badge badge-secondary">
			Haversine model</a>: <?php echo number_format($distanceHav, 0, "", ".") ?>km.<br />
			<a href="https://en.wikipedia.org/wiki/Vincenty%27s_formulae" class="badge badge-secondary">
			Vicenty model</a>: <?php echo number_format($distanceVic, 0, "", ".") ?>km.<br />
			<br />
			You can check the route on 
			<a href="<?php echo $googleMapsLink ?>" class="badge badge-primary" target="_blank">
				Google Maps
			</a>
    	</div>
	</div>
</div>
<?= $this->endSection() ?>