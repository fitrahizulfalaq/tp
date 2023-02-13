<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mb-2">
        <div class="tab-content">
            <div class="card">
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <input type="hidden" readonly value="<?= $row->row("user_id") ?>">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>

                            <select name="bulan" class="btn btn-outline-primary " required>
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>

                            <select name="tahun" class="btn btn-outline-primary " required>
                                <option value="">Pilih Tahun</option>
                                <?php $thn_skr = date('Y');
                                for ($x = $thn_skr; $x >= 2022; $x--) { ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" class="btn btn-success">Filter <i class="fa fa-eye"></i></button>
                            <a href="<?= base_url("laporan") ?>" class="btn btn-info float-right">Kembali <i class="fa fa-fw fa-angle-double-left" aria-hidden="true"></i></a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div id="grafikKunjungan" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <div id="grafikKunjungan2" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div style="overflow-x:auto;">
                                            <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                                <h2>Berdasarkan Poin Peringkat</h2>
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="30%">Nama</th>
                                                        <th width="10%">Total Poin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = "1";
                                                    foreach ($leaderboard->result() as $key => $data) { ?>
                                                        <tr>
                                                            <td scope="row">
                                                                <p><?= $no++ ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?= $this->fungsi->nama($data->user_id) ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?= $data->total_score ?></p>
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
                        <div class="col-6 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div style="overflow-x:auto;">
                                            <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                                <h2>Berdasarkan Jarak Kunjungan</h2>
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="30%">Nama</th>
                                                        <th width="10%">Total Jarak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = "1";
                                                    foreach ($row->result() as $key => $data) { ?>
                                                        <tr>
                                                            <td scope="row">
                                                                <p><?= $no++ ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?= $this->fungsi->nama($data->id) ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?= $this->fungsi->totalJarak($data->id) ?></p>
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
                </div>
            </div>

            <hr>

            <!-- <div class="section full mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div style="overflow-x:auto;">
                                <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                    <h2>Berdasarkan Lokasi Kunjungan</h2>
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="40">Maps</th>
                                            <th width="40%">Nama</th>
                                            <th width="30%">Keperluan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">
                                                <p>1</p>
                                            </td>
                                            <td>
                                                <p>Maps</p>
                                            </td>
                                            <td>
                                                <p>Dian</p>
                                            </td>
                                            <td>
                                                <p>Pembuatan NIB</P>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- * App Capsule -->

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("grafikKunjungan", {
            exportEnabled: true,
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Berdasarkan Jumlah Kunjungan ke Koperasi / UKM"
            },
            legend: {
                cursor: "pointer",
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y} kunjungan Koperasi / UKM</strong>",
                indexLabel: "{name} - {y}",
                dataPoints: [
                    <?php foreach ($row->result() as $key => $data) {; ?> {
                            y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() + $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                            name: "<?= $data->nama ?>"
                        },
                    <?php } ?>
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("grafikKunjungan2", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Berdasarkan Jumlah Kunjungan ke Kantor"
            },
            axisY: {
                title: "Jumlah"
            },
            data: [{
                    type: "column",
                    name: "Kunjungan ke Kantor",
                    legendText: "Kunjungan Ke Koperasi",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($row->result() as $key => $data) {; ?> 
                            {
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                                label: "<?= $data->nama ?>"
                            },
                        <?php } ?>
                    ]
                },
                {
                    type: "column",
                    name: "Kunjungan Ke UKM",
                    legendText: "Kunjungan Ke UKM",
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($row->result() as $key => $data) {; ?> 
                            {
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                                label: "<?= $data->nama ?>"
                            },
                        <?php } ?>
                    ]
                },
                {
                    type: "column",
                    name: "Kunjungan Ke Lainnya",
                    legendText: "Kunjungan Ke Lainnya",
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($row->result() as $key => $data) {; ?> 
                            {
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "lainnya", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                                label: "<?= $data->nama ?>"
                            },
                        <?php } ?>
                    ]
                }
            ]
        });
        chart.render();
    }
</script>