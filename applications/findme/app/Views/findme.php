<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php echo form_open('FindMeController/checkResult'); ?>
	<div class="row justify-content-md-center">
		<div class="col-6 text-center" id="labelSelect">
			Select the city:
		</div>
	</div>
	<div class="row justify-content-md-center">
		<div class="col-6 text-center" id="citySelect">
			<?php echo form_dropdown('citySelect', $cities, 0, $configSelect); ?>
		</div>
	</div>
	<div class="row justify-content-md-center" id="confirm-button">
		<div class="col-3"></div>
		<div class="col-6 text-center">
			<?php echo form_button($buttonData); ?>
		</div>
		<div class="col-3"></div>		
	</div>
<?= $this->endSection() ?>