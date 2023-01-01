<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-2">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h3>LAPORAN TENAGA PENDAMPING</h3>
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
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
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('laporan/detailTP/'.$data->id) ?>" class="btn btn-primary"><ion-icon name="eye-outline"></ion-icon></a>
                                                        <a href="<?= base_url("target/perintah?aksi=download&tahun=2023&token=".base64_encode($data->id))?>" class="btn btn-info" target="_blank"><i class="fa fa-download"></i> Download Rencana Kerja</a>
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