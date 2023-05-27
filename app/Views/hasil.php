<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('#'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-bullhorn-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">INFORMASI PUBLIK</h6>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('permohonan'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-square-edit-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">PERMOHONAN INFORMASI</h6>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('statistik'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-chart-box-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">STATISTIK</h6>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('cektiket'); ?>"" class=" rounded-3">
                                        <i class="mdi-dark mdi mdi-check-box-multiple-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">CEK PROGRESS PERMOHONAN</h6>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('cektiket/index') ?>" method="post">
                                <div class="d-flex">
                                    <div class="col-3">
                                        <div class="col-sm-10">
                                            <h6>Kode Ticket</h6>
                                            <input class="form-control" type="text" name="no_tiket" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="col-sm-10">
                                            <h6>Nomor Handphone</h6>
                                            <input class="form-control" type="number" name="kontak" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="col-sm-10">
                                            <h6>&nbsp;</h6>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                <i class="fas fa-search me-2"></i> Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php if (!empty($data)) : ?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nomor Tiket</th>
                                                                    <th>Nomor Kontak</th>
                                                                    <th>Tanggal Permohonan</th>
                                                                    <th>Status</th>
                                                                    <th>Keterangan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($data as $row) : ?>
                                                                    <tr>
                                                                        <td><?= $row['no_tiket']; ?></td>
                                                                        <td><?= $row['kontak']; ?></td>
                                                                        <td><?= $row['created_at']; ?></td>
                                                                        <td><?php if ($row['status_tiket'] == 0) {
                                                                                echo "Permohonan Belum Disetujui";
                                                                            } else {
                                                                                echo "Sedang Diproses";
                                                                            }; ?></td>
                                                                        <td><?= $row['keterangan']; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                <?php foreach ($data as $row) : ?>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><?php if ($row['status_tiket'] == 0) {
                                                                                echo "Permohonan Belum Disetujui";
                                                                            } else {
                                                                                echo "Sedang Diproses";
                                                                            }; ?></td>
                                                                        <td><?= $row['keterangan']; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p>Data tidak ditemukan.</p>
                            <?php endif; ?>
                            <?= $this->endSection() ?>