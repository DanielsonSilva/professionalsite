<?= $this->extend('default') ?>

<?= $this->section('content') ?>
<div class="container">
	<div class="row justify-content-md-center">
    	<div class="col-6">
			Using the <a href="https://en.wikipedia.org/wiki/Haversine_formula" class="badge badge-secondary">
			Haversine model</a>, the distance is <?php echo $distanceHav ?>km.<br />
			Using the <a href="https://en.wikipedia.org/wiki/Vincenty%27s_formulae" class="badge badge-secondary">
			Vicenty model</a>, the distance is <?php echo $distanceVic ?>km.<br />
			<br />
			You can check the route on 
			<a href="<?php echo $googleMapsLink ?>" class="badge badge-primary" target="_blank">
				Google Maps
			</a>.
    	</div>
	</div>
</div>
<?= $this->endSection() ?>