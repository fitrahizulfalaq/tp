<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-2">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h3>LAPORAN TENAGA PENDAMPING</h3>
                    <?php $this->view("message") ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <input type="hidden" name="id" value="<?= $this->session->id ?>">
                                <div class="input-group mb-3">
                                    <!-- <select name="tahun" class="btn btn-outline-primary " required>
                                        <option value="">Pilih Tahun</option>
                                        <?php $thn_skr = date('Y');
                                        for ($x = $thn_skr; $x >= 2022; $x--) { ?>
                                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php } ?>
                                    </select> -->
                                    <select name="kota" class="btn btn-outline-primary " required>
                                        <option value="">Pilih Kabupaten / Kota</option>
                                        <?php
                                        $this->db->order_by('id', 'ASC');
                                        foreach ($this->fungsi->pilihan("tb_lembaga")->result() as $key => $pilihan) {;
                                        ?>
                                            <option value="<?= $pilihan->id ?>"><?= $pilihan->kota ?></option>
                                        <?php } ?>
                                    </select>
                                    <button type="submit" class="btn btn-success">Filter <i class="fa fa-eye"></i></button>
                                    <a href="<?= base_url("laporan/belumLogin") ?>" class="btn btn-info" target="_blank">Lihat yang belum login <i class="fa fa-eye"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div style="overflow-x:auto;">
                                    <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Nama Tenaga Pendamping</th>
                                                <th width="10%">Estimasi Jarak</th>
                                                <th width="10%">Total Kunjungan</th>
                                                <th width="15%">Rencana Kerja</th>
                                                <th width="20%">Laporan Bulan Ini</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($row->result() as $key => $data) {;
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <p><?= $no++ ?></p>
                                                    </td>
                                                    <td>
                                                        <?= $data->nama ?>
                                                        <?= $this->fungsi->pilihan_advanced("tb_device", "user_id", $data->id)->num_rows() == null ? "<span class='badge badge-danger'>Belum mendaftarkan Device</span>" : "<span class='badge badge-success'>Sudah Daftar</span>" ?>
                                                    </td>
                                                    <td>
                                                        <?= $this->fungsi->totalJarak($data->id) ?>
                                                    </td>
                                                    <td>
                                                        <?= $this->fungsi->totalKunjunganBulanIni($data->id) ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($this->fungsi->loadDataLike1("tb_target", "created", date("Y") . "-" . date("m"), $data->id)->num_rows() != null) { ?>
                                                            <a href="<?= base_url("target/perintah?aksi=download&tahun=2023&token=" . base64_encode($data->id)) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-download"></i> Download RK</a>
                                                        <?php } else { ?>
                                                            <span class='badge badge-danger'>Belum Upload</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($this->fungsi->loadDataLike1("tb_laporan", "created", date("Y") . "-" . date("m"), $data->id)->num_rows() != null) { ?>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=surat_tugas&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Surat Tugas</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=sppd&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> SPPD</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=surat_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Kunjungan</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=laporan_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Laporan Kunjungan</a>
                                                        <?php } else { ?>
                                                            <span class='badge badge-danger'>Belum Upload</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('laporan/detailTP/' . $data->id) ?>" class="btn btn-primary btn-sm"><ion-icon name="eye-outline"></ion-icon></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- * App Capsule -->