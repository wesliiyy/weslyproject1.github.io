<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("stock/out") ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Mutasi Material Keluar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url("stock/out") ?>">Mutasi Out</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Mutasi Material Keluar</h4>
                    </div>
                    <div class="card-body col">
                        <form action="<?= site_url("stock/process") ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Tanggal *</label>
                                        <input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>
                                    </div>
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
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Coil <small>(pcs)</small>*</label>
                                        <input type="text" name="qty_coil" id="qty_coil" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Total Berat</label>
                                        <input type="text" name="qty_weight" id="qty_weight" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="part_no">Id Part</label>
                                        <input type="text" name="part_no" id="part_no" value="" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Weight per Coil</label>
                                        <input type="text" name="weight_coil" id="weight_coil" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Berat Awal</label>
                                        <input type="text" name="weight_before" id="weight_before" value="" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Total Coil Awal</label>
                                        <input type="text" name="coil_before" id="coil_before" value="" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Berat Akhir</label>
                                        <input type="text" name="weight_after" id="weight_after" value="" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Total Coil Akhir</label>
                                        <input type="text" name="coil_after" id="coil_after" value="" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <Button type="submit" name="out_add" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</Button>
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
                            <th>Current Weight <small>(Kg)</small></th>
                            <th>Current Coil <small>(pcs)</small></th>
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
                                <td style="width :15%"><?= $data->weight ?></td>
                                <td><?= $data->coil ?></td>
                                <td style="width :10%">
                                    <button class="btn btn-xs btn-info" id="select" data-weight_coil="<?= $data->weight_coil ?>" data-material_id="<?= $data->material_id ?>" data-type="<?= $data->type ?>" data-part_no="<?= $data->part_no ?>" data-size="<?= $data->size ?>" data-weight_before="<?= $data->weight ?>" data-customer_name="<?= $data->customer_name ?>" data-coil_before="<?= $data->coil ?>">
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
    function count_weight() {
        var weight_coil = $('#weight_coil').val()
        var qty_coil = $('#qty_coil').val()

        qty_weight = qty_coil * weight_coil
        $('#qty_weight').val(qty_weight.toFixed(1))
    }
    $(document).on('keyup mouseup', '#qty_coil', function() {
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
            var weight_before = $(this).data('weight_before');
            var coil_before = $(this).data('coil_before');
            $('#material_id').val(material_id);
            $('#type').val(type);
            $('#size').val(size);
            $('#customer_name').val(customer_name);
            $('#part_no').val(part_no);
            $('#weight_before').val(weight_before);
            $('#coil_before').val(coil_before);
            $('#weight_coil').val(weight_coil);
            $('#modal-item').modal('hide');
        })
    })
</script>
<script type="text/javascript">
    $("#qty_coil").keyup(function() {
        var coil_before = parseFloat($("#coil_before").val());
        var qty_coil = parseFloat($("#qty_coil").val());
        var coil_after = coil_before - qty_coil;
        $("#coil_after").val(coil_after);
    });
    $("#qty_coil").keyup(function() {
        var weight_before = parseFloat($("#weight_before").val());
        var qty_coil = parseFloat($("#qty_coil").val());
        var weight_coil = parseFloat($("#weight_coil").val());
        var weight_after = weight_before - qty_coil * weight_coil;
        $("#weight_after").val(weight_after.toFixed(1));
    });
</script>