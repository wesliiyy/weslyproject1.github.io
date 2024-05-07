<section class="section">
    <div class="section-header">
        <h1>Mutasi Material Masuk</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="#">Mutasi In</a></div>
            <div class="breadcrumb-item">Table</div>
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
                        <h4>Data Mutasi Material Masuk</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-sm btn-primary" href="<?= site_url('stock/in/add'); ?>"><i class="fas fa-plus-circle"></i> Tambah Mutasi In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Material Type</th>
                                        <th>Material Size</th>
                                        <th>Id Part</th>
                                        <th>Customer Name</th>
                                        <th>Total Weight <small>(Kg)</small></th>
                                        <th>Total Coil <small>(pcs)</small></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row as $key => $data) { ?>
                                        <tr>
                                            <td style="width :5%"><?= $no++ ?></td>
                                            <td><?= indo_date($data->date) ?></td>
                                            <td><?= $data->type ?></td>
                                            <td><?= $data->size ?></td>
                                            <td><?= $data->part_no ?></td>
                                            <td><?= $data->customer_name ?></td>
                                            <td><?= $data->qty_weight ?></td>
                                            <td><?= $data->qty_coil ?></td>
                                            <td>
                                                <a id="set_dtl" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-item" data-type="<?= $data->type ?>" data-time="<?= $data->time ?>" data-size="<?= $data->size ?>" data-part_no="<?= $data->part_no ?>" data-customer_name="<?= $data->customer_name ?>" data-weight_after="<?= $data->weight_after ?>" data-weight_before="<?= $data->weight_before ?>" data-qty_weight="<?= $data->qty_weight ?>" data-qty_coil="<?= $data->qty_coil ?>" data-coil_after="<?= $data->coil_after ?>" data-coil_before="<?= $data->coil_before ?>" data-username="<?= $data->username ?>" data-date="<?= indo_date($data->date) ?>"><i class="far fa-eye"></i></a>
                                                <a href="<?= site_url('stock/in/del/' . $data->stock_id . '/' . $data->material_id) ?>" class="btn btn-danger btn-sm" id="btn-hapus"><i class="far fa-trash-alt"></i></a>
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

<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Material Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width:35%">Tanggal Pengambilan</th>
                            <td><span id="date"></span></td>
                        </tr>
                        <tr>
                            <th>Diambil Oleh</th>
                            <td><span id="username"></span></td>
                        </tr>
                        <tr>
                            <th>Tipe Material</th>
                            <td><span id="type"></span></td>
                        </tr>
                        <tr>
                            <th>Ukuran Material</th>
                            <td><span id="size"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Customer</th>
                            <td><span id="customer_name"></span></td>
                        </tr>
                        <tr>
                            <th>Nomor Part</th>
                            <td><span id="part_no"></span></td>
                        </tr>
                        <tr>
                            <th>Total Berat <small>(Kg)</small></th>
                            <td><span id="qty_weight"></span></td>
                        </tr>
                        <tr>
                            <th>Total Coil <small>(pcs)</small></th>
                            <td><span id="qty_coil"></span></td>
                        </tr>
                        <tr>
                            <th>Total Berat Awal <small>(Kg)</small></th>
                            <td><span id="weight_before"></span></td>
                        </tr>
                        <tr>
                            <th>Total Berat Akhir <small>(Kg)</small></th>
                            <td><span id="weight_after"></span></td>
                        </tr>
                        <tr>
                            <th>Total Coil Awal <small>(pcs)</small></th>
                            <td><span id="coil_before"></span></td>
                        </tr>
                        <tr>
                            <th>Total Coil Akhir <small>(pcs)</small></th>
                            <td><span id="coil_after"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pembuatan</th>
                            <td><span id="time"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var date = $(this).data('date');
            var type = $(this).data('type');
            var size = $(this).data('size');
            var customer_name = $(this).data('customer_name');
            var part_no = $(this).data('part_no');
            var qty_weight = $(this).data('qty_weight');
            var qty_coil = $(this).data('qty_coil');
            var weight_after = $(this).data('weight_after');
            var weight_before = $(this).data('weight_before');
            var coil_after = $(this).data('coil_after');
            var coil_before = $(this).data('coil_before');
            var username = $(this).data('username');
            var time = $(this).data('time');
            $('#date').text(date);
            $('#type').text(type);
            $('#size').text(size);
            $('#customer_name').text(customer_name);
            $('#part_no').text(part_no);
            $('#qty_weight').text(qty_weight);
            $('#qty_coil').text(qty_coil);
            $('#weight_after').text(weight_after);
            $('#weight_before').text(weight_before);
            $('#coil_after').text(coil_after);
            $('#coil_before').text(coil_before);
            $('#username').text(username);
            $('#time').text(time);
        })
    })
</script>