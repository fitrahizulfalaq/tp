<!-- App Capsule -->
<div id="appCapsule">

	<div class="section mt-2">
		<div class="card text-center">
			<a href="https://logwork.com/countdown-xhpy" class="countdown-timer" data-style="circles" data-timezone="Asia/Jakarta" data-date="2023-01-02 00:00">Batas Waktu Upload</a>
		</div>
	</div>

	<div class="section mt-2">
		<div class="card text-center">
			<div class="card-body">
				<h5 class="card-title">Template Dokumen target Kerja</h5>
				<p class="card-text text-left">Pentunjuk Pengisian Dokumen Target Kerja dalam Setahun.
				<ol class="text-left">
					<li>Download Template Dokumen Target Kinerja selama setahun.</li>
					<li>Download Template Dokumen Target Kinerja selama setahun.</li>
					<li>Download Template Dokumen Target Kinerja selama setahun.</li>
				</ol>
				</p>
				<a href="#" class="btn btn-primary">Download Template</a>
			</div>
		</div>
	</div>
	<?php $this->view('message'); ?>
	<div class="section full mt-2 mb-2">
		<div class="wide-block pb-2 pt-2">
			<?= form_open_multipart('') ?>
			<div class="custom-file-upload">
				<input type="file" name="file" id="fileuploadInput" accept=".pdf">
				<label for="fileuploadInput">
					<span>
						<strong>
							<ion-icon name="cloud-upload-outline"></ion-icon>
							<i>Klik Untuk Memilih Dokumen Target Kerja</i>
						</strong>
					</span>
				</label>
			</div>
			<button type="submit" class="btn btn-block btn-info">UPLOAD</button>
			<?= form_close() ?>
		</div>
	</div>
</div>

</div>
<!-- * App Capsule -->