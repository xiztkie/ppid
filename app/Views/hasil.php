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
                                                            <thead class="text-center">
                                                                <tr class="table-info text-center">
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
                                                                        <td align="center" width="12%"><?= $row['no_tiket']; ?></td>
                                                                        <td align="center" width="12%"><?= $row['kontak']; ?></td>
                                                                        <td align="center" width="12%"><?= $row['created_at']; ?></td>
                                                                        <td align="center" width="15%">
                                                                            <?php if ($row['status_tiket'] == 0) {
                                                                                echo "Permohonan Belum Disetujui";
                                                                            } else {
                                                                                echo "Sedang Diproses";
                                                                            }; ?>
                                                                        </td>
                                                                        <td><?= $row['keterangan']; ?></td>

                                                                        <?php foreach ($proses_tiket as $key => $proses) { ?>
                                                                            <?php if ($row['id_pemohon'] == $proses['id_pemohon']) { ?>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td align="center">
                                                                            <?php if ($row['id_pemohon'] == $proses['id_pemohon']) {
                                                                                    echo $proses['date_proses'];
                                                                                } else {
                                                                                } ?>
                                                                        </td>
                                                                        <td align="center">
                                                                            <?php if ($row['id_pemohon'] == $proses['id_pemohon']) {
                                                                                    echo $proses['status_pro'];
                                                                                } else {
                                                                                } ?>
                                                                        </td>
                                                                        <td style="word-break: break-all;">
                                                                            <?php if ($row['id_pemohon'] == $proses['id_pemohon']) {
                                                                                    echo $proses['ket_proses'];
                                                                                } else {
                                                                                } ?>
                                                                        </td>
                                                                    <?php } else { ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                                <?php foreach ($data as $key => $row1) { ?>
                                                                    <?php if ($row1['solved'] == 1) { ?>
                                                                    <tr style="background-color: #FFCDA8;">
                                                                        <td colspan="2"></td>
                                                                        <td align="center"><?= $row['solved_date']; ?></td>
                                                                        <td align="center">
                                                                            Solved
                                                                        </td>
                                                                        <td style="word-break: break-all;">
                                                                            Permohonan Telah Selesai dan Tiket Telah Ditutup
                                                                        </td>
                                                                    <?php } else { ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <b><i>*Bila ingin melakukan keberatan dengan data yang diperoleh atau keputusan pejabat silahkan isi form keberatan dengan menekan tombol Keberatan dibawah ini</i></b>
                                                            </div>
                                                            <div class="card-body">
                                                                <button class="btn btn-rounded btn-info" data-bs-toggle="modal" data-bs-target="#keberatan">KEBERATAN</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p>Data tidak ditemukan.</p>
                            <?php endif; ?>
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="keberatan">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myExtraLargeModalLabel">PENGAJUAN KEBERATAN</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php foreach ($data as $row) : ?>
                                                <div class="col-md-12">
                                                    <div class="mb-6">
                                                        <label class="form-label">Tiket Nomor</label>
                                                        <input type="text" class="form-control" value="<?= $row['no_tiket']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-6">
                                                        <label class="form-label">Nomor Kontak</label>
                                                        <input type="text" class="form-control" value="<?= $row['kontak']; ?>" readonly>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                            <div class="col-md-12">
                                                <div class="mb-6">
                                                    <label class="form-label">Uraian Keberatan Anda</label>
                                                    <textarea name="uraian"class="form-control" style="height: 200px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="mb-6">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                         KIRIM <i class="fas fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?= $this->endSection() ?>