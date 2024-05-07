<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("customer") ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Customer</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url("customer") ?>">Customers</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form <?= ucfirst($page) ?> Customer</h4>
                    </div>
                    <div class="card-body col">
                        <form action="<?= site_url("customer/process") ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                                        <label>Customer Name *</label>
                                        <input type="text" name="customer_name" value="<?= $row->customer_name ?>" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label>Contact *</label>
                                        <input type="number" name="phone" value="<?= $row->phone ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Address *</label>
                                        <textarea name="addr" class="form-control" required> <?= $row->address ?></textarea>
                                    </div>
                                    <div class="col">
                                        <label>Remark</label>
                                        <textarea name="desc" class="form-control"><?= $row->description ?></textarea>
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