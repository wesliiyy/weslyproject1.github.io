<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("part") ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Part</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url("part") ?>">Part</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form <?= ucfirst($page) ?> Part</h4>
                    </div>
                    <div class="card-body col">
                        <?php echo form_open_multipart('part/process') ?>
                        <?php $this->view('messages') ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id" value="<?= $row->part_id ?>">
                                    <label>Id Part *</label>
                                    <input type="text" name="part_no" value="<?= $row->part_no ?>" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label>Part Name *</label>
                                    <input type="text" name="part_name" value="<?= $row->part_name ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Customer Name *</label>
                                    <select name="customer_name" class="form-control" required>
                                        <option value="">- Pilih Customer -</option>
                                        <?php foreach ($customer->result() as $key => $data) { ?>
                                            <option value="<?= $data->customer_name ?>" <?= $data->customer_name == $row->customer_name ? "selected" : null ?>><?= $data->customer_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Proses Name *</label>
                                    <select name="proses_name" class="form-control" required>
                                        <option value="">- Pilih Proses -</option>
                                        <?php foreach ($proses->result() as $key => $data) { ?>
                                            <option value="<?= $data->proses_name ?>" <?= $data->proses_name == $row->proses_name ? "selected" : null ?>><?= $data->proses_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label>Standard Part *</label>
                                    <input type="text" name="standar" value="<?= $row->standar ?>" class="form-control">
                                </div>
                                <div class="col">
                                    <label>Image</label>
                                    <?php if ($page == 'edit') {
                                        if ($row->image != null) { ?>
                                            <div style="margin-bottom:5px">
                                                <img src="<?= base_url('uploads/part/' . $row->image) ?>" style="width:80%">
                                            </div>
                                    <?php
                                        }
                                    } ?>
                                    <input type="file" name="image" class="form-control">
                                    <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                                </div>
                            </div>
                        </div>
                        <div>
                            <Button type="submit" name="<?= $page ?>" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</Button>
                            <Button type="reset" class="btn btn-sm btn-secondary">Reset</Button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>