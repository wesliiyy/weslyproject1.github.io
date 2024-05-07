<section class="section">
    <div class="section-header">
        <h1>Laporan Mutasi Material Keluar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Mutasi Material Keluar</h4>
                    </div>
                    <div class="col-12">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col">Tgl Awal</label>
                                            <div class="col">
                                                <input type="date" name="date1" value="<?= @$post['date1'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col">Tgl Akhir</label>
                                            <div class="col">
                                                <input type="date" name="date2" value="<?= @$post['date2'] ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col">Tipe Material</label>
                                            <div class="col">
                                                <select name="type" class="form-control">
                                                    <option value="">- Pilih Tipe Material -</option>
                                                    <?php foreach ($material as $st => $data) { ?>
                                                        <option value="<?= $data->material_id ?>" <?= @$post['type'] == $data->material_id ? 'selected' : '' ?>><?= $data->type ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="col">
                                        <div class="text-right">
                                            <button type="submit" name="reset" class="btn btn-warning btn-flat">
                                                <i class="fa fa-eraser"></i> Reset
                                            </button>
                                            <button type="submit" name="filter" class="btn btn-info btn-flat">
                                                <i class="fa fa-search"></i> Filter
                                            </button>
                                            <a href="<?= site_url("report/export_stockout") ?>" name="export" class="btn btn-primary btn-flat">
                                                <i class="fa fa-download"></i> Ekspor
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Tipe Material</th>
                                        <th>Ukuran Material</th>
                                        <th>Nomor Part</th>
                                        <th>Customer</th>
                                        <th>Total Qty <small>(Pcs)</small></th>
                                        <th>Total Berat <small>(Kg)</small></th>
                                        <th>Total Qty Sebelum <small>(Pcs)</small></th>
                                        <th>Total Qty Sesudah <small>(Pcs)</small></th>
                                        <th>Total Berat Sebelum <small>(Kg)</small></th>
                                        <th>Total Berat Sesudah <small>(Kg)</small></th>
                                        <th>Pelaksana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td style="width :2%"><?= $no++ ?></td>
                                            <td><?= indo_date($data->date) ?></td>
                                            <td><?= $data->type ?></td>
                                            <td><?= $data->size ?></td>
                                            <td><?= $data->part_no ?></td>
                                            <td><?= $data->customer_name ?></td>
                                            <td><?= $data->qty_coil ?></td>
                                            <td><?= $data->qty_weight ?></td>
                                            <td><?= $data->weight_before ?></td>
                                            <td><?= $data->weight_after ?></td>
                                            <td><?= $data->coil_before ?></td>
                                            <td><?= $data->coil_after ?></td>
                                            <td><?= $data->username ?></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>