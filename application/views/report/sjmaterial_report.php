<section class="section">
    <div class="section-header">
        <h1>Laporan Surat Jalan Material</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
        </div>
    </div>

    <div class="section-body">
        <?php
        ?>
        <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Surat Jalan Material</h4>
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
                                            <label class="col">Supplier</label>
                                            <div class="col">
                                                <select name="supplier" class="form-control">
                                                    <option value="">- Pilih Supplier -</option>
                                                    <?php foreach ($supplier as $supp => $data) { ?>
                                                        <option value="<?= $data->supplier_id ?>" <?= @$post['supplier'] == $data->supplier_id ? 'selected' : '' ?>><?= $data->supplier_name ?></option>
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
                                            <a href="<?= site_url("report/export") ?>" name="export" class="btn btn-primary btn-flat">
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
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Supplier</th>
                                        <th>Tanggal Pengiriman</th>
                                        <th>Nomor Delivery Order</th>
                                        <th>Nomor Purchase Order</th>
                                        <th>Total Coil</th>
                                        <th>Total Berat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td style="width :5%"><?= $no++ ?></td>
                                            <td><?= indo_date($data->in_date) ?></td>
                                            <td><?= $data->supplier_name ?></td>
                                            <td><?= indo_date($data->do_date) ?></td>
                                            <td><?= $data->no_do ?></td>
                                            <td><?= $data->no_po ?></td>
                                            <td><?= $data->total_coil ?></td>
                                            <td><?= $data->total_weight ?></td>
                                            <td>
                                                <a href="<?= site_url('sjmaterial/cetak/' . $data->sjmaterial_id) ?>" class="btn btn-success btn-sm"><i class="fa fa-print"></i></a>
                                                <a href="<?= site_url('sjmaterial/del/' . $data->sjmaterial_id) ?>" class="btn btn-danger btn-sm" id="btn-hapus"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                            </form>
                                            </td>
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