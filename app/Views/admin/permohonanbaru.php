<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">DATA PERMOHONAN BARU</h5>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-sm-4">
                                <form action="" method="post">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukan Keyword Pencarian...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">Search <i class="fas fa-search align-middle ms-2"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="3%">No</th>
                                            <th width="7%">No Tiket</th>
                                            <th width="10%">Nama</th>
                                            <th width="25%">Alamat</th>
                                            <th width="8%">Kontak</th>
                                            <th width="12%">Instansi Tujuan</th>
                                            <th width="8%">Dengan Cara</th>
                                            <th width="7%">status tiket</th>
                                            <th width="8%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1  ?>
                                        <?php foreach ($permohonanbaru as $key => $value) { ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= $value['no_tiket']; ?></td>
                                                <td><?= $value['nama']; ?></td>
                                                <td><?= $value['alamat']; ?></td>
                                                <td align="center"><?= $value['kontak']; ?></td>
                                                <td><?= $value['nama_int']; ?></td>
                                                <td align="center" ><?= $value['dgn_cara']; ?></td>
                                                <td align="center"><?php if ($value['status_tiket'] == 0) {
                                                            echo "Tiket Belum Disetujui";
                                                        } else if ($value['status_tiket'] == 1) {
                                                            echo "Tiket Disetujui";
                                                        } else if ($value['status_tiket'] == 2) {
                                                            echo "Tiket Ditolak";
                                                        } ?></td>
                                                <td align="center">
                                                    <a type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                                                        <i class="fas fa-window-close"></i>
                                                    </a>&nbsp;
                                                    <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light">
                                                        <i class="fas fa-tasks"></i>
                                                    </a>&nbsp;
                                                    <a type="button" class="btn btn-success btn-rounded waves-effect waves-light">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('permohonanbaru', 'pager_permohonandata') ?>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
    </div>
</div>
</div> <!-- container-fluid -->
</div>

<!-- End Page-content -->