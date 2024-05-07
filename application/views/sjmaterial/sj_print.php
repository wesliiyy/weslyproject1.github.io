<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Print Surat Jalan</title>
    <style type="text/css">
        html {
            font-family: "Verdana, Arial";
        }

        .content {
            width: 200mm;
            font-size: 15px;
            padding: 30px;
        }

        .title {
            text-align: left;
            font-size: 14px;
            padding-bottom: 40px;
        }

        table,
        td,
        th {
            border: 1px solid;
            border-top-style: none;
            padding-bottom: 5px;
            padding-left: 5px;
            padding-right: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .title2 {
            text-align: center;
            font-size: 24px;
            padding-bottom: 40px;
        }

        .title3 {
            text-align: left;
            font-size: 14px;
            padding-bottom: 20px;
        }


        .head {
            margin-top: 5px;
            margin-bottom: 10px;
            padding-bottom: 30px;
        }

        .thanks {
            margin-top: 10px;
            padding-top: 30px;
            text-align: left;
        }

        @media print {
            @page {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="content">
        <div class="title">
            <b>PT Bintang Matrix Indonesia</b>
            <br>
            Jl. Madrasah No.96 Ciketing Udik, Bantargebang.
            <br>
            Telp: +6221 8260 7603
        </div>
        <div class="title2">
            <b>Surat Jalan Material</b>
        </div>
        <div class="head">
            <div class="title3">
                <b>Dibuat Oleh &ensp;&ensp;&ensp;&ensp;:</b>&ensp;<?= $sjmaterial->name ?>
                <br>
                <b>Dibuat Tanggal &ensp;&nbsp;:</b>&ensp;<?= indo_date($sjmaterial->created) ?>
            </div>
            <table style="border-top:1px solid;">
                <tr>
                    <td>Supplier</td>
                    <td style="text-align: center;">:</td>
                    <td>
                        <?= $sjmaterial->supplier_name ?>
                    </td>
                    <td>Nomor Kontrak</td>
                    <td style="text-align: center;">:</td>
                    <td>
                        <?= $sjmaterial->no_kontrak ?>
                    </td>
                </tr>
                <tr>
                    <td>No Purchase Order</td>
                    <td style="text-align: center;">:</td>
                    <td>
                        <?= $sjmaterial->no_po ?>
                    </td>
                    <td>Tgl Delivery Order</td>
                    <td style="text-align: center;">:</td>
                    <td>
                        <?= indo_date($sjmaterial->do_date) ?>
                    </td>
                </tr>
                <tr>
                    <td>No Delivery Order</td>
                    <td style="text-align: center;">:</td>
                    <td>
                        <?= $sjmaterial->no_do ?>
                    </td>
                    <td>Tgl Material Masuk</td>
                    <td style="text-align: center;">:</td>
                    <td>
                        <?= indo_date($sjmaterial->in_date) ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="material">
            <table style="border-top: 1px solid;">
                <tr>
                    <td style="text-align:center">Tipe Material</td>
                    <td style="text-align:center">Ukuran Material</td>
                    <td style="text-align:center">Total Qty <small>(pcs)</small></td>
                    <td style="text-align:center">Total Berat <small>(kg)</small></td>
                </tr>
                <?php
                $arr_discount = array();
                foreach ($sjmaterial_detail as $key => $value) { ?>
                    <tr>
                        <td style="text-align:center"><?= $value->type ?></td>
                        <td style="text-align:center"><?= $value->size ?></td>
                        <td style="text-align:center"><?= $value->qty_coil ?></td>
                        <td style="text-align:center"><?= $value->qty_weight ?></td>
                    </tr>
                <?php
                } ?>
                <table>
                    <tr>
                        <td style="text-align:center">Grand Total Qty <small>(pcs)</small></td>
                    </tr>
                    <tr>
                        <td style="text-align:center"><?= $sjmaterial->total_coil ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Grand Total Berat <small>(kg)</small></td>
                    </tr>
                    <tr>
                        <td style="text-align:center"><?= $sjmaterial->total_weight ?></td>
                    </tr>
                </table>
            </table>
        </div>
    </div>
</body>

</html>