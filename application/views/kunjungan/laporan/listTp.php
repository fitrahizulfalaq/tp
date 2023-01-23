<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-2">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h3>DATA TENAGA PENDAMPING</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div style="overflow-x:auto;">
                                    <table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Nama Tenaga Pendamping</th>
                                                <th width="20%">Rencana Kerja</th>
                                                <th width="40%">Laporan Bulan Ini</th>
                                                <th width="10%">Action</th>
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
                                                    <td><?= $data->nama ?></td>
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
                                                    <td><a href="<?= site_url('laporan/detailTP/'.$data->id) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                                </tr>
                                            <?php } ?>
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