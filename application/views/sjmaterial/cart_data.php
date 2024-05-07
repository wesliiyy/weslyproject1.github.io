<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $data->material_type ?></td>
            <td><?= $data->size ?></td>
            <td><?= $data->part_no ?></td>
            <td class="text-right"><?= $data->cart_weight_coil ?></td>
            <td id="total2" class="text-right"><?= $data->qty_coil ?></td>
            <td id="total1" class="text-right"><?= $data->qty_weight ?></td>
            <td class="text-center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit" data-cartid="<?= $data->cart_id ?>" data-type="<?= $data->material_type ?>" data-size="<?= $data->size ?>" data-weight_coil="<?= $data->cart_weight_coil ?>" data-qty_weight="<?= $data->qty_weight ?>" data-qty_coil="<?= $data->qty_coil ?>" data-part_no="<?= $data->part_no ?>" class="btn btn-xs btn-warning">
                    <i class="far fa-edit"></i>
                </button>
                <button id="del_cart" data-cartid="<?= $data->cart_id ?>" class="btn btn-xs btn-danger">
                    <i class="far fa-trash-alt"></i>
                </button>
            </td>
        </tr>
<?php
    }
} ?>