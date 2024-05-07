<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("proses") ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Proses</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url("proses") ?>">Process</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form <?= ucfirst($page) ?> Proses</h4>
                    </div>
                    <div class="card-body col">
                        <form action="<?= site_url("proses/process") ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id" value="<?= $row->proses_id ?>">
                                        <label>Kode Proses *</label>
                                        <input type="text" name="code" value="<?= $row->code ?>" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" name="id" value="<?= $row->proses_id ?>">
                                        <label>Nama Proses *</label>
                                        <input type="text" name="proses_name" value="<?= $row->proses_name ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Remark *</label>
                                        <textarea name="remark" class="form-control" required> <?= $row->remark ?></textarea>
                                    </div>
                                    <div class="col">

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