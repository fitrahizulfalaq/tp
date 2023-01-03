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
                                                <th width="20%">Aksi</th>
                                                <th width="40%">Laporan Bulan Ini</th>
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
                                                        <a href="<?= site_url('laporan/detailTP/'.$data->id) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                        <a href="<?= base_url("target/perintah?aksi=download&tahun=2023&token=".base64_encode($data->id))?>" class="btn btn-danger" target="_blank"><i class="fa fa-download"></i> Download Rencana Kerja</a>
                                                    </td>
                                                    <td>
                                                    <a href="<?= base_url("laporan/perintah?aksi=download&tahun=".date("Y")."&bulan=".date("m")."&jenis=surat_tugas&token=".base64_encode($data->id))?>" class="btn btn-warning" ><i class="fa fa-download"></i> Surat Tugas</a>
                                                        <a href="<?= base_url("laporan/perintah?aksi=download&tahun=".date("Y")."&bulan=".date("m")."&jenis=sppd&token=".base64_encode($data->id))?>" class="btn btn-warning" ><i class="fa fa-download"></i> SPPD</a>
                                                        <a href="<?= base_url("laporan/perintah?aksi=download&tahun=".date("Y")."&bulan=".date("m")."&jenis=surat_kunjungan&token=".base64_encode($data->id))?>" class="btn btn-warning" ><i class="fa fa-download"></i> Kunjungan</a>
                                                        <a href="<?= base_url("laporan/perintah?aksi=download&tahun=".date("Y")."&bulan=".date("m")."&jenis=laporan_kunjungan&token=".base64_encode($data->id))?>" class="btn btn-warning" ><i class="fa fa-download"></i> Laporan Kunjungan</a>
                                                    </td>
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