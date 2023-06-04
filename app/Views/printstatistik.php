<?php

use Kint\Zval\Value;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>LAPORAN STATISTIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
    <!-- jquery.vectormap css -->
    <link href="<?= base_url() ?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="<?= base_url() ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .center-middle {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <img src="<?= base_url() ?>assets/images/kop.jpg" align="center" height="200px">
    <br>
    <br>
    <table class="table table-bordered mb-0">
        <thead>
            <tr align="center">
                <th class="center-middle" rowspan="2">
                    <h6>No</h6>
                </th>
                <th class="center-middle" rowspan="2" width="400px">
                    <h6>Instansi</h6>
                </th>
                <th class="center-middle" colspan="4" width="400px">
                    <h6>Permohonan</h6>
                </th>
                <th class="center-middle" rowspan="2" width="50px">
                    <h6>Total Permohonan</h6>
                </th>
            </tr>
            <tr align="center">
                <th class="center-middle" width="100px">
                    <h6>Baru</h6>
                </th>
                <th class="center-middle" width="100px">
                    <h6>Diproses</h6>
                </th>
                <th class="center-middle" width="100px">
                    <h6>Disetujui</h6>
                </th>
                <th class="center-middle" width="100px">
                    <h6>Ditolak</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $seluruhpermohonan = 0; ?>
            <?php foreach ($dataper as $data) : ?>
                <?php $seluruhpermohonan += $data->totalpermohonan; ?>
                <tr align="center">
                    <td><?= $no++ ?></td>
                    <td align="left"><?php echo $data->nama_int; ?></td>
                    <td><?php echo $data->permohonanbaru; ?></td>
                    <td><?php echo $data->permohonanproses ?></td>
                    <td><?php echo $data->permohonansetuju; ?></td>
                    <td><?php echo $data->permohonantolak; ?></td>
                    <td><?php echo $data->totalpermohonan; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr align="center">
                <td colspan="6">
                    <h6>TOTAL SELURUH PERMOHONAN</h6>
                </td>
                <td>
                    <h6><?= $seluruhpermohonan ?></h6>
                </td>
            </tr>
        </tbody>
    </table>

    <script>
        // Otomatis memanggil fungsi print saat halaman selesai dimuat
        window.onload = function() {
            window.print();
            window.onafterprint = function() {
                // Kembali ke halaman sebelumnya setelah mencetak
                history.go(-1);
            }
        };
    </script>
</body>