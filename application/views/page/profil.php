<!-- App Capsule -->
<div id="appCapsule">

    <div class="section mt-2">
        <div class="profile-head">
            <div class="avatar">
                <img src="<?= base_url() ?>/assets/img/favicon.png" alt="avatar" class="imaged w64 rounded">
            </div>
            <div class="in">
                <h3 class="name"><?= $row->nama ?></h3>
                <!-- <h5 class="subtext">ASAL KAB/KOTA</h5> -->
            </div>
        </div>
    </div>


    <div class="section mt-2">
        <div class="section full">
            <div class="wide-block transparent p-0">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <label class="label">Username <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->username ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Nama <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->nama ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Email <span id="alert-resume" class="error">*</span></label>
                        <input type="email" class="form-control" value="<?= $row->email ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">NIK <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->nik ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Tempat Lahir <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->tempat_lahir ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Tanggal Lahir <span id="alert-resume" class="error">*</span></label>
                        <input type="date" class="form-control" value="<?= $row->tgl_lahir ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Jenis Kelamin <span id="alert-resume" class="error">*</span></label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons" readonly>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="kelamin" id="option2" value="Laki-Laki" <?= $row->kelamin == "Laki-Laki" ? "checked" : "" ?>> Laki-Laki
                            </label>
                            <label class="btn btn-outline-primary">
                                <input type="radio" name="kelamin" id="option3" value="Perempuan" <?= $row->kelamin == "Perempuan" ? "checked" : "" ?>> Perempuan
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Hp <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->hp ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Agama <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->agama ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Domisili <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->domisili ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Pernikahan <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->pernikahan ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Pendidikan <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->pendidikan_terakhir ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Tahun Bergabung <span id="alert-resume" class="error">*</span></label>
                        <input type="text" class="form-control" value="<?= $row->tahun_bergabung ?>" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">List Device Terdaftar </label>
                        <p> List Device</p>

                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Riwayat Login </label>
                        <p> Riwayat Login</p>
                    </div>

                </div>
            </div>
        </div>
    </div>




</div>
<!-- * App Capsule -->