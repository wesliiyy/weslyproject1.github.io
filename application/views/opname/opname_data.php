<section class="section">
    <div class="section-header">
        <h1>Stock Opname</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="#">STO</a></div>
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
                        <h4>Data Stock Opname</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-sm btn-primary" href="<?= site_url('opname/add'); ?>"><i class="fas fa-plus-circle"></i> Tambah STO</a>
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
                                        <th>Material Type</th>
                                        <th>Material Size</th>
                                        <th>Weight System <small>(Kg)</small></th>
                                        <th>Weight Actual <small>(Kg)</small></th>
                                        <th>Coil System <small>(pcs)</small></th>
                                        <th>Coil Actual <small>(pcs)</small></th>
                                        <th>Selisih Weight <small>(Kg)</small></th>
                                        <th>Selisih Coil <small>(pcs)</small></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row as $key => $data) { ?>
                                        <tr>
                                            <td style="width :5%"><?= $no++ ?></td>
                                            <td><?= $data->type ?></td>
                                            <td><?= $data->size ?></td>
                                            <td><?= $data->weight_system ?></td>
                                            <td><?= $data->weight_actual ?></td>
                                            <td><?= $data->coil_system ?></td>
                                            <td><?= $data->coil_actual ?></td>
                                            <td><?= $data->selisih_weight ?></td>
                                            <td><?= $data->selisih_coil ?></td>
                                            <td>
                                                <a id="set_dtl" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-item" data-type="<?= $data->type ?>" data-time="<?= $data->time ?>" data-size="<?= $data->size ?>" data-weight_system="<?= $data->weight_system ?>" data-weight_actual="<?= $data->weight_actual ?>" data-selisih_weight="<?= $data->selisih_weight ?>" data-selisih_coil="<?= $data->selisih_coil ?>" data-coil_system="<?= $data->coil_system ?>" data-coil_actual="<?= $data->coil_actual ?>" data-username="<?= $data->username ?>"><i class="far fa-eye"></i></a>
                                                <a href="<?= site_url('opname/del/' . $data->opname_id . '/' . $data->material_id) ?>" class="btn btn-danger btn-sm" id="btn-hapus"><i class="far fa-trash-alt"></i></a>
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
                            <th>Dibuat Oleh</th>
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
                            <th>Berat Sistem <small>(Kg)</small></th>
                            <td><span id="weight_system"></span></td>
                        </tr>
                        <tr>
                            <th>Coil Sistem <small>(pcs)</small></th>
                            <td><span id="coil_system"></span></td>
                        </tr>
                        <tr>
                            <th>Berat Actual <small>(Kg)</small></th>
                            <td><span id="weight_actual"></span></td>
                        </tr>
                        <tr>
                            <th>Coil Actual <small>(pcs)</small></th>
                            <td><span id="coil_actual"></span></td>
                        </tr>
                        <tr>
                            <th>Selisih Berat <small>(Kg)</small></th>
                            <td><span id="selisih_weight"></span></td>
                        </tr>
                        <tr>
                            <th>Selisih Coil <small>(pcs)</small></th>
                            <td><span id="selisih_coil"></span></td>
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
            var type = $(this).data('type');
            var size = $(this).data('size');
            var selisih_weight = $(this).data('selisih_weight');
            var selisih_coil = $(this).data('selisih_coil');
            var weight_system = $(this).data('weight_system');
            var weight_actual = $(this).data('weight_actual');
            var coil_system = $(this).data('coil_system');
            var coil_actual = $(this).data('coil_actual');
            var username = $(this).data('username');
            var time = $(this).data('time');
            $('#type').text(type);
            $('#size').text(size);
            $('#selisih_weight').text(selisih_weight);
            $('#selisih_coil').text(selisih_coil);
            $('#weight_system').text(weight_system);
            $('#weight_actual').text(weight_actual);
            $('#coil_system').text(coil_system);
            $('#coil_actual').text(coil_actual);
            $('#username').text(username);
            $('#time').text(time);
        })
    })
</script>