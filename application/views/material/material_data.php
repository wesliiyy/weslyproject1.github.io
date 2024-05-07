<section class="section">
    <div class="section-header">
        <h1>List Material</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url("dashboard") ?>">Home</a></div>
            <div class="breadcrumb-item"><a href="#">Materials</a></div>
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
                        <h4>Data Material</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-sm btn-primary" href="<?= site_url('material/add'); ?>"><i class="fas fa-plus-circle"></i> Tambah Material</a>
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
                                        <th>Id Part</th>
                                        <th>Part Name</th>
                                        <th>Customer Name</th>
                                        <th>Total Weight <small>(Kg)</small></th>
                                        <th>Total Coil <small>(pcs)</small></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td style="width :5%"><?= $no++ ?></td>
                                            <td><?= $data->type ?></td>
                                            <td><?= $data->size ?></td>
                                            <td><?= $data->part_no ?></td>
                                            <td><?= $data->part_name ?></td>
                                            <td><?= $data->customer_name ?></td>
                                            <td><?= $data->weight ?></td>
                                            <td><?= $data->coil ?></td>
                                            <td>
                                                <a href="<?= site_url('material/edit/' . $data->material_id) ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                                <a href="<?= site_url('material/del/' . $data->material_id) ?>" class="btn btn-danger btn-sm" id="btn-hapus"><i class="far fa-trash-alt"></i></a>
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