<section class="section">
    <div class="section-header">
        <h1>Form Surat Jalan Material</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-part active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td>
                                    <label>Supplier</label>
                                </td>
                                <td>
                                    <div class="mb-3">
                                        <select name="supplier" id="supplier" class="form-control" required>
                                            <option value="">- Pilih Supplier -</option>
                                            <?php foreach ($supplier as $supp => $value) {
                                                echo '<option value="' . $value->supplier_id . '">' . $value->supplier_name . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Nomor DO</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="no_do" name="no_do" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Nomor PO</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="no_po" name="no_po" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Nomor Kontrak</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="no_kontrak" name="no_kontrak" class="form-control">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td>
                                    <label>Dibuat Oleh</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="user" name="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Pilih Material</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" id="material_id">
                                        <input type="hidden" id="weight_coil">
                                        <input type="hidden" id="weight">
                                        <input type="text" id="type" class="form-control" data-toggle="modal" data-target="#modal-item" required autofocus readonly>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary btn-flat btn-lg" data-toggle="modal" data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Qty Material</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="qty_coil" name="qty_coil" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <button id="add_cart" type="button" class="btn btn-md btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td>
                                    <label>Tanggal DO</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" id="do_date" name="do_date" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Tanggal Masuk</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" id="in_date" name="in_date" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Total Qty</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="total_coil" name="total_coil" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Total Weight</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="total_weight" name="total_weight" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="text-right mb-4">
                    <Button type="button" id="simpan" class="btn btn-lg btn-success"><i class="fas fa-save">&ensp;</i> Simpan</Button>
                    <Button type="button" id="cancel_material" class="btn btn-lg btn-danger"><i class="fas fa-times-circle">&ensp;</i> Batal</Button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table2">
                        <thead>
                            <tr>
                                <th style="width :5%">No</th>
                                <th>Tipe Material</th>
                                <th>Ukuran Material</th>
                                <th>Nomor Part</th>
                                <th>Berat per Qty <small> (kg)</small></th>
                                <th>Total Qty <small> (pcs)</small></th>
                                <th>Total Berat <small> (kg)</small></th>
                                <th style="width :15%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <?php $this->view('sjmaterial/cart_data') ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Edit Cart Material -->
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Material</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_material">
                <div class="form-group">
                    <label for="type_material">Tipe Material</label>
                    <input type="text" id="type_material" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="size_material">Ukuran Material</label>
                    <input type="text" id="size_material" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="weight_coil_material">Berat per Qty</label>
                    <input type="text" id="weight_coil_material" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="qty_coil_material">Qty Material</label>
                    <input type="number" id="qty_coil_material" class="form-control">
                </div>
                <div class="form-group">
                    <label for="qty_weight_material_before">Berat Material Sebelumnya<small>(Kg)</small></label>
                    <input type="text" id="qty_weight_material_before" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="qty_weight_material">Berat Material <small>(Kg)</small></label>
                    <input type="text" id="qty_weight_material" class="form-control" readonly>
                </div>
                <div class="text-right">
                    <button type="button" id="edit_cart" class="btn btn-lg btn-success">
                        <i class="fas fa-paper-plane"></i> &ensp;Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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
                            <th style="width :5%">No</th>
                            <th>Material Type</th>
                            <th>Material Size</th>
                            <th>Part text</th>
                            <th>Customer Name</th>
                            <th>Current Total Weight <small> (pcs)</small></th>
                            <th>Current Total Coil <small> (pcs)</small></th>
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
                                <td><?= $data->weight ?></td>
                                <td><?= $data->coil ?></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="select" data-coil="<?= $data->coil ?>" data-material_id="<?= $data->material_id ?>" data-type="<?= $data->type ?>" data-weight="<?= $data->weight ?>" data-weight_coil="<?= $data->weight_coil ?>">
                                        <i class="fa fa-check"></i> Select
                                    </button>
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
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var material_id = $(this).data('material_id');
            var type = $(this).data('type');
            var size = $(this).data('size');
            var customer_name = $(this).data('customer_name');
            var part_no = $(this).data('part_no');
            var weight_coil = $(this).data('weight_coil');
            $('#material_id').val(material_id);
            $('#type').val(type);
            $('#size').val(size);
            $('#customer_name').val(customer_name);
            $('#part_no').val(part_no);
            $('#weight_coil').val(weight_coil);
            $('#modal-item').modal('hide');
        })
    })
    $(document).on('click', '#add_cart', function() {
        var material_id = $('#material_id').val()
        var weight_coil = $('#weight_coil').val()
        var coil = $('#coil').val()
        var weight = $('#weight').val()
        var qty_coil = $('#qty_coil').val()
        if (material_id == '') {
            alert('Material belum dipilih')
            $('#type').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sjmaterial/process') ?>',
                data: {
                    'add_cart': true,
                    'material_id': material_id,
                    'qty_coil': qty_coil,
                    'weight_coil': weight_coil,
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sjmaterial/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#material_id').val()
                        $('#type').val()
                        $('#qty_coil').val(0)
                        $('#type').focus()
                    } else {
                        alert('Gagal tambah material')
                    }
                }
            })
        }
    })
    $(document).on('click', '#edit_cart', function() {
        var cart_id = $('#cartid_material').val()
        var weight_coil = $('#weight_coil_material').val()
        var qty_weight = $('#qty_weight_material').val()
        var qty_coil = $('#qty_coil_material').val()
        if (qty_coil == '') {
            alert('Qty tidak boleh kosong')
            $('#qty_coil').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sjmaterial/process') ?>',
                data: {
                    'edit_cart': true,
                    'cart_id': cart_id,
                    'qty_coil': qty_coil,
                    'qty_weight': qty_weight,
                    'weight_coil': weight_coil,
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sjmaterial/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#modal-item-edit').modal('hide');
                    } else {
                        alert('Gagal update material')
                    }
                }
            })
        }
    })
    $(document).on('click', '#del_cart', function() {
        if (confirm('Apakah Anda yakin?')) {
            var cart_id = $(this).data('cartid')
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sjmaterial/cart_del') ?>',
                dataType: 'json',
                data: {
                    'cart_id': cart_id
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sjmaterial/cart_data') ?>', function() {
                            calculate()
                        })
                    } else {
                        alert('Gagal hapus material');
                    }
                }
            })
        }
    })


    $(document).on('click', '#update_cart', function() {
        $('#cartid_material').val($(this).data('cartid'));
        $('#type_material').val($(this).data('type'));
        $('#size_material').val($(this).data('size'));
        $('#weight_coil_material').val($(this).data('weight_coil'));
        $('#qty_coil_material').val($(this).data('qty_coil'));
        $('#qty_weight_material_before').val($(this).data('weight_coil') * $(this).data('qty_coil'));
        $('#qty_weight_material').val($(this).data('qty_weight'));
    })

    function count_edit_modal() {
        var weight_coil = $('#weight_coil_material').val()
        var weight = $('#qty_coil_material').val()

        qty = weight_coil * weight
        $('#qty_weight_material').val(qty)
    }
    $(document).on('keyup mouseup', '#qty_coil_material', function() {
        count_edit_modal()
    })

    function calculate() {
        var gt1 = 0;
        $('#cart_table tr').each(function() {
            gt1 += parseFloat($(this).find('#total1').text())
        })
        isNaN(gt1) ? $('#total_weight').val(0) : $('#total_weight').val(gt1)
        var gt2 = 0;
        $('#cart_table tr').each(function() {
            gt2 += parseFloat($(this).find('#total2').text())
        })
        isNaN(gt2) ? $('#total_coil').val(0) : $('#total_coil').val(gt2)
    }
    $(document).ready(function() {
        calculate()
    })
    $(document).on('click', '#simpan', function() {
        var supplier_id = $('#supplier').val()
        var no_do = $('#no_do').val()
        var no_po = $('#no_po').val()
        var no_kontrak = $('#no_kontrak').val()
        var total_coil = $('#total_coil').val()
        var total_weight = $('#total_weight').val()
        var do_date = $('#do_date').val()
        var in_date = $('#in_date').val()
        if (total_coil < 1) {
            alert('Belum ada material yang ditambahkan')
            $('#type').focus()
        } else {
            if (confirm('Apakah data sudah benar?')) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('sjmaterial/process') ?>',
                    data: {
                        'simpan': true,
                        'supplier_id': supplier_id,
                        'no_po': no_po,
                        'no_do': no_do,
                        'no_kontrak': no_kontrak,
                        'total_coil': total_coil,
                        'total_weight': total_weight,
                        'do_date': do_date,
                        'in_date': in_date

                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            alert('Berhasil tambah surat jalan material');
                        } else {
                            alert('Gagal tambah surat jalan material');
                        }
                        location.href = '<?= site_url('sjmaterial') ?>'
                    }
                })
            }
        }
    })
    $(document).on('click', '#cancel_material', function() {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sjmaterial/cart_del') ?>',
                dataType: 'json',
                data: {
                    'cancel_material': true
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sjmaterial/cart_data') ?>', function() {
                            calculate()
                        })
                    }
                }
            })
            $('#no_kontrak').val()
            $('#no_po').val('')
            $('#no_do').val('')
            $('#supplier').val(0).change()
            $('#type').val('')
            $('#type').focus()
        }
    })
</script>