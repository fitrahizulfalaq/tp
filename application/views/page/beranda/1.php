<!-- App Capsule -->
<div id="appCapsule">
    <!-- <script src="https://cdn.logwork.com/widget/countdown.js"></script>
    <a href="https://logwork.com/countdown-x6ge" class="countdown-timer" data-style="flip3" data-timezone="Asia/Jakarta" data-date="2023-01-10 00:00">Waktu Pendaftaran Device</a> -->
    <!-- * App Capsule -->
    <div class="section mt-2">
        <div class="card text-center">
            <h2 class="text-info">Leaderboard Tenaga Pendamping</h2>
            <ul class="listview image-listview">
                <?php $no = "1";
                foreach ($leaderboard->result() as $key => $data) { ?>
                    <li>
                        <div class="item">
                            <!-- <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image"> -->
                            <h3><?= $no++ ?></h3>
                            <div class="in">
                                <div><?= $this->fungsi->nama($data->user_id) ?></div>
                                <span class="badge badge-primary">Poin : <?= $data->total_score ?></span>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>    
    <!-- tab content -->
    <div class="section full mb-2">
        <div class="tab-content">
            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <?php if ($device->num_rows() == null) { ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ion-icon name="warning-outline"></ion-icon>
                            Device ini belum terdaftar
                        </div>
                    <?php } ?>
                    <?php $this->view("message") ?>
                    <div class="row">
                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= site_url('kunjungan/checkin') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/maps-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= site_url('kunjungan/checkin') ?>">
                                        KUNJUNGAN
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('kunjungan/data') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/folder-link.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('kunjungan/data') ?>">
                                        DATA
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url("kunjungan/addlaporan") ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/text-folder.png" alt="" width="100%">
                                    </a>
                                    <p align="center">
                                        <a href="<?= base_url("kunjungan/addlaporan") ?>">
                                            LAPORAN
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('target') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/pencil-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('target') ?>">
                                        RENCANA KERJA
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('pengaturan/setDevice') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/key-folder.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('pengaturan/setDevice') ?>">
                                        PERANGKAT
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-4">
                            <!-- small card -->
                            <div class="card product-card">
                                <div class="inner text-center">
                                    <a href="<?= base_url('pengaturan/setPassword') ?>">
                                        <img src="<?= base_url("") ?>/assets/img/icon/user-file.png" alt="" width="100%">
                                    </a>
                                </div>
                                <p align="center">
                                    <a href="<?= base_url('pengaturan/setPassword') ?>">
                                        SET PASSWORD
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <?php if ($kunjungan->num_rows() > 0) { ?>
                    <br>
                    <div class="card text-center">
                        <img class="imaged w250" src="https://maps.googleapis.com/maps/api/staticmap?center=<?= $center ?>&zoom=12&scale=10&size=1200x500&maptype=roadmap&format=jpg&key=AIzaSyBulTatyUv6oR6ykvWU-QDzp-wYQXNWV7A&<?= $markers ?>" alt="Google map of -7.8081176,112.0413752" />
                    </div>
                <?php } ?>
            </div>
            <!-- * feed -->
        </div>
    </div>
    <!-- * tab content -->
    <div class="section full mt-2 mb-2">
        <div class="section-title"><h1>Statistik Kunjungan</h1></div>
        <ul class="listview image-listview media mb-2">
            <li>
                <a href="#" class="item">                    
                    <div class="in">
                        <div>
                            <h3>Kunjungan Ke Lainnya : <?= $k_lainnya->num_rows()?></h3>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>
                            <h3>Kunjungan Ke Koperasi : <?= $k_koperasi->num_rows()?></h3>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>
                            <h3>Kunjungan Ke UKM : <?= $k_ukm->num_rows()?></h3>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>
                            <h3>Terlambat/Tidak Absen : <?= $k_terlambat->num_rows()?></h3>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div>
                            <h3>Izin : <?= $k_izin->num_rows()?></h3>
                        </div>
                    </div>
                </a>
            </li>            
        </ul>
        <?php if ($k_izin->num_rows() == null) { ?>
            <a onclick="alert('Apakah Anda Yakin Ingin Izin Hari Ini ?')" href="<?=base_url("kunjungan/izin")?>" id="btn-izin" class="btn btn-danger btn-block"><ion-icon name="medkit-outline"></ion-icon> IZIN UNTUK HARI INI</a>
        <?php } ?>
    </div>
</div>
<!-- * App Capsule -->