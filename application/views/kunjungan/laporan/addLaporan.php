<?= form_open_multipart('') ?>
<div class="custom-file-upload">
    <input type="file" name="surat_tugas" id="surat_tugas" accept=".pdf">
    <label for="surat_tugas">
        <span>
            <strong>
                <ion-icon name="cloud-upload-outline"></ion-icon>
                <i>Klik Untuk Memilih Dokumen Target Kerja</i>
            </strong>
        </span>
    </label>
</div>
<div class="custom-file-upload">
    <input type="file" name="sppd" id="sppd" accept=".pdf">
    <label for="sppd">
        <span>
            <strong>
                <ion-icon name="cloud-upload-outline"></ion-icon>
                <i>Klik Untuk Memilih Dokumen Target Kerja</i>
            </strong>
        </span>
    </label>
</div>
<div class="custom-file-upload">
    <input type="file" name="surat_kunjungan" id="surat_kunjungan" accept=".pdf">
    <label for="surat_kunjungan">
        <span>
            <strong>
                <ion-icon name="cloud-upload-outline"></ion-icon>
                <i>Klik Untuk Memilih Dokumen Target Kerja</i>
            </strong>
        </span>
    </label>
</div>
<div class="custom-file-upload">
    <input type="file" name="laporan_kunjungan" id="laporan_kunjungan" accept=".pdf">
    <label for="laporan_kunjungan">
        <span>
            <strong>
                <ion-icon name="cloud-upload-outline"></ion-icon>
                <i>Klik Untuk Memilih Dokumen Target Kerja</i>
            </strong>
        </span>
    </label>
</div>
<button type="submit" class="btn btn-block btn-info"><ion-icon name="cloud-upload-outline"></ion-icon> UPLOAD</button>
<?= form_close() ?>