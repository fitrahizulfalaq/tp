<!DOCTYPE html>
<html>

<body>
    Ini contoh buat implementasi value latitude dan longtitude serta loc image yang dibutuhkan di database kunjungan.
    Ketika disumbit bisa menggunakan model Kunjungan_m->saveKunjungan($post)
    <form action="<?=base_url("test/addKunjungan")?>" method="post">
    <input type="text" value="" name="user_id"><br>
    <input type="text" value="" name="tipe"><br>
    <input type="text" value="" name="resume"><br>
    <input type="text" value="" name="detail"><br>
    <input type="text" value="" name="identifikasi"><br>
    <input type="text" value="" name="kegiatan"><br>
    <input type="text" value="" name="foto_selfie"><br>
    <input type="text" value="" name="foto_lokasi"><br>
    <input type="text" value="<?= $lat?>" name="lat">// Ini nanti di hidden<br>
    <input type="text" value="<?= $lng?>" name="lng">// Ini nanti di hidden<br>
    <input type="text" value="<?= $loc_img?>" name="loc_img">// Ini nanti di hidden<br>
    <button>Submit</button>
    </form>
</body>
</html>