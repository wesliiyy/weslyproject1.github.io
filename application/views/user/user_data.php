<section class="section">
    <div class="section-header">
        <h1>List Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="#">Users</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data User</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-sm btn-primary" href="<?= site_url('user/add'); ?>"><i class="fas fa-plus-circle"></i> Tambah User</a>
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
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td style="width :5%"><?= $no++ ?></td>
                                            <td><?= $data->username ?></td>
                                            <td><?= $data->name ?></td>
                                            <td><?= $data->address ?></td>
                                            <td>
                                                <?php
                                                if ($data->role == 1) {
                                                    echo "Admin";
                                                } else if ($data->role == 2) {
                                                    echo "Staff";
                                                } else if ($data->role == 3) {
                                                    echo "Operator";
                                                }
                                                ?></td>
                                            <td>
                                                <form action="<?= site_url('user/del') ?>" method="post">
                                                    <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                                    <button id="btn-hapus" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
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