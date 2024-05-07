<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("material") ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Material</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url("material") ?>">Materials</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form <?= ucfirst($page) ?> Material</h4>
                    </div>
                    <div class="card-body col">
                        <form action="<?= site_url("material/process") ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id" value="<?= $row->material_id ?>">
                                        <label>Material Type *</label>
                                        <input type="text" name="type" value="<?= $row->type ?>" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label>Material Size *</label>
                                        <input type="text" name="size" value="<?= $row->size ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Berat per Coil <small>(Kg)</small> *</label>
                                        <input type="text" name="weight_coil" value="<?= $row->weight_coil ?>" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label>Id Part *</label>
                                        <select name="part_no" id="part_no" class="form-control" required>
                                            <option value="">- Pilih Part -</option>
                                            <?php foreach ($part->result() as $key => $data) { ?>
                                                <option data-customer_name="<?= $data->customer_name ?>" data-part_name="<?= $data->part_name ?>" data-standar="<?= $data->standar ?>" value="<?= $data->part_no ?>" <?= $data->part_no == $row->part_no ? "selected" : null ?>><?= $data->part_no ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Part Name *</label>
                                        <input type="text" name="part_name" value="<?= $row->part_name ?>" id="part_name" class="form-control" readonly>
                                    </div>
                                    <div class="col">
                                        <label>Customer Name *</label>
                                        <input type="text" name="customer_name" value="<?= $row->customer_name ?>" id="customer_name" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <Button type="submit" name="<?= $page ?>" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</Button>
                                <Button type="reset" class="btn btn-sm btn-secondary">Reset</Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#part_no').on('change', function() {
            const customer_name = $('#part_no option:selected').data('customer_name');
            $('[name=customer_name]').val(customer_name);
            const part_name = $('#part_no option:selected').data('part_name');
            $('[name=part_name]').val(part_name);
        });
    })
</script>