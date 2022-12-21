<?php if ($this->session->has_userdata('danger')) { ?>
	<div class="alert alert-danger mb-1" role="alert">
		<?= $this->session->flashdata('danger'); ?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('success')) { ?>
	<div class="alert alert-success mb-1" role="alert">
		<?= $this->session->flashdata('success'); ?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('warning')) { ?>
	<div class="alert alert-warning mb-1" role="alert">
		<?= $this->session->flashdata('warning'); ?>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('info')) { ?>
	<div class="alert alert-info mb-1" role="alert">
		<?= $this->session->flashdata('info'); ?>
	</div>
<?php } ?>
