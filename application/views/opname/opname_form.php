<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("opname") ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Stock Opname</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url("opname") ?>">STO</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Mutasi Material Masuk</h4>
                    </div>
                    <div class="card-body col">
                        <form action="<?= site_url("opname/process") ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Pilih Material *</label>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="material_id" id="material_id">
                                            <input type="text" name="type" id="type" class="form-control" data-toggle="modal" data-target="#modal-item" readonly autofocus>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Size</label>
                                        <input type="text" name="size" id="size" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Weight per Coil <small>(Kg)</small></label>
                                        <input type="text" name="weight_coil" id="weight_coil" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Berat Aktual <small>(Kg)</small>*</label>
                                        <input type="text" name="weight_actual" id="weight_actual" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Coil Aktual <small>(pcs)</small></label>
                                        <input type="text" name="coil_actual" id="coil_actual" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Berat Sistem <small>(Kg)</small></label>
                                        <input type="text" name="weight_system" id="weight_system" value="" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Coil Sistem <small>(pcs)</small></label>
                                        <input type="text" name="coil_system" id="coil_system" value="" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Selisih Berat <small>(Kg)</small></label>
                                        <input type="text" name="selisih_weight" id="selisih_weight" value="" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Selisih Coil <small>(pcs)</small></label>
                                        <input type="text" name="selisih_coil" id="selisih_coil" value="" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <Button type="submit" name="opname_add" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</Button>
                                <Button type="reset" class="btn btn-sm btn-secondary">Reset</Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Material</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material Type</th>
                            <th>Material Size</th>
                            <th>Id Part</th>
                            <th>Customer</th>
                            <th>Weight per Coil <small>(Kg)</small></th>
                            <th>Weight System <small>(Kg)</small></th>
                            <th>Coil System<small>(pcs)</small></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($material as $i => $data) { ?>
                            <tr>
                                <td style="width :5%"><?= $no++ ?></td>
                                <td><?= $data->type ?></td>
                                <td><?= $data->size ?></td>
                                <td><?= $data->part_no ?></td>
                                <td><?= $data->customer_name ?></td>
                                <td style="width :15%"><?= $data->weight_coil ?></td>
                                <td style="width :15%"><?= $data->weight ?></td>
                                <td><?= $data->coil ?></td>
                                <td style="width :10%">
                                    <button class="btn btn-xs btn-info" id="select" data-weight_coil="<?= $data->weight_coil ?>" data-material_id="<?= $data->material_id ?>" data-type="<?= $data->type ?>" data-part_no="<?= $data->part_no ?>" data-size="<?= $data->size ?>" data-weight_system="<?= $data->weight ?>" data-customer_name="<?= $data->customer_name ?>" data-coil_system="<?= $data->coil ?>">
                                        <i class="fa fa-check"></i> Select
                                    </button>
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


<script>
    function count_qty_coil() {
        var weight_actual = $('#weight_actual').val()
        var weight_coil = $('#weight_coil').val()
        coil_actual = weight_actual / weight_coil
        $('#coil_actual').val(coil_actual.toFixed(1))
    }
    $(document).on('keyup mouseup', '#weight_actual', function() {
        count_qty_coil()
    })

    function count_qty_coil_1() {
        var weight_actual = $('#weight_actual').val()
        var weight_coil = $('#weight_coil').val()
        var coil_system = $('#coil_system').val()
        selisih_coil = coil_system - weight_actual / weight_coil
        $('#selisih_coil').val(selisih_coil.toFixed(1))
    }
    $(document).on('keyup mouseup', '#weight_actual', function() {
        count_qty_coil_1()
    })

    function count_weight() {
        var weight_system = $('#weight_system').val()
        var weight_actual = $('#weight_actual').val()

        selisih_weight = weight_system - weight_actual
        $('#selisih_weight').val(selisih_weight)
    }
    $(document).on('keyup mouseup', '#weight_actual', function() {
        count_weight()
    })

    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var material_id = $(this).data('material_id');
            var type = $(this).data('type');
            var size = $(this).data('size');
            var customer_name = $(this).data('customer_name');
            var part_no = $(this).data('part_no');
            var weight_coil = $(this).data('weight_coil');
            var weight_system = $(this).data('weight_system');
            var coil_system = $(this).data('coil_system');
            $('#material_id').val(material_id);
            $('#type').val(type);
            $('#size').val(size);
            $('#customer_name').val(customer_name);
            $('#part_no').val(part_no);
            $('#weight_system').val(weight_system);
            $('#coil_system').val(coil_system);
            $('#weight_coil').val(weight_coil);
            $('#modal-item').modal('hide');
        })
    })
</script>