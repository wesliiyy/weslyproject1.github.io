<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url("user"); ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="#">Users</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-4 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Add User</h4>
                    </div>
                    <div class="card-body col-md-6">
                        <form action="" method="post" autocomplete="off">
                            <div class="form-group <?= form_error('fullname') ? 'text-danger' : null ?>">
                                <label>Nama Lengkap *</label>
                                <input type="text" class="form-control" value="<?= set_value('fullname') ?>" name="fullname">
                                <?= form_error('fullname') ?>
                            </div>
                            <div class="form-group <?= form_error('username') ? 'text-danger' : null ?>">
                                <label>Username *</label>
                                <input type="text" class="form-control" value="<?= set_value('username') ?>" name="username">
                                <?= form_error('username') ?>
                            </div>
                            <div class="form-group <?= form_error('password') ? 'text-danger' : null ?>">
                                <label>Password *</label>
                                <input type="password" class="form-control" value="<?= set_value('password') ?>" name="password">
                                <?= form_error('password') ?>
                            </div>
                            <div class="form-group <?= form_error('passconf') ? 'text-danger' : null ?>">
                                <label>Konfirmasi Password *</label>
                                <input type="password" class="form-control" value="<?= set_value('passconf') ?>" name="passconf">
                                <?= form_error('passconf') ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="address" value="<?= set_value('address') ?>"></textarea>
                            </div>
                            <div class="form-group <?= form_error('role') ? 'text-danger' : null ?>">
                                <label>Role *</label>
                                <select name="role" class="form-control">
                                    <option value="">- Pilih Role -</option>
                                    <option value="1" <?= set_value('role') == 1 ? "selected" : null ?>>Admin</option>
                                    <option value="2" <?= set_value('role') == 2 ? "selected" : null ?>>Staff</option>
                                    <option value="3" <?= set_value('role') == 3 ? "selected" : null ?>>Operator</option>
                                </select>
                                <?= form_error('role') ?>
                            </div>
                            <div>
                                <Button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Save</Button>
                                <Button type="reset" class="btn btn-sm btn-secondary">Reset</Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>