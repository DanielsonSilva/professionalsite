<?= $this->extend('default') ?>

<?= $this->section('content') ?>
	<?php echo form_open('FindMeController/checkResult'); ?>
	<div class="row">
		<div class="col-6" id="labelSelect">
			Select the city:
		</div>
		<div class="col-2" id="citySelect">
			<?php echo form_dropdown('citySelect', $cities, 0, $configSelect); ?>
		</div>
		<div class="col-4"></div>
	</div>
	<div class="row justify-content-center" id="confirm-button">
		<div class="col text-center">
			<?php echo form_button($buttonData); ?>
		</div>		
	</div>
<?= $this->endSection() ?>