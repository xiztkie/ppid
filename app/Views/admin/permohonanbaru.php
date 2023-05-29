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
                            <?php
                            if (session()->getFlashdata('pesan')) {
                                echo '
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-check-all me-2"></i>';
                                echo session()->getFlashdata('pesan');
                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                            }
                            ?>
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
                                                <td align="center"><?= $value['dgn_cara']; ?></td>
                                                <td align="center"><?php if ($value['status_tiket'] == 0) {
                                                                        echo "Tiket Belum Disetujui";
                                                                    } else if ($value['status_tiket'] == 1) {
                                                                        echo "Tiket Disetujui";
                                                                    } else if ($value['status_tiket'] == 2) {
                                                                        echo "Tiket Ditolak";
                                                                    } ?></td>
                                                <td align="center">
                                                    <a type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tolak<?php $value['id_pemohon']; ?>">
                                                        <i class="fas fa-window-close"></i>
                                                    </a>&nbsp;
                                                    <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#detailpermohonan<?php $value['id_pemohon']; ?>">
                                                        <i class="fas fa-tasks"></i>
                                                    </a>&nbsp;
                                                    <a type="button" class="btn btn-success btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#setuju<?php $value['id_pemohon']; ?>">
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
<?php foreach ($permohonanbaru as $key => $value) { ?>
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="detailpermohonan<?php $value['id_pemohon']; ?>">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">DETAIL TIKET
                        <b>"<?= $value['no_tiket']; ?>"</b> TANGGAL <?= $value['created_at']; ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                        <div class="col-5">
                            <input type="text" name="no_tiket" class="form-control" readonly id="nomortiket" hidden>
                            <div class="col-md-12">
                                <div class="form-group mb-6">
                                    <label class="form-label">NIK Pemohon</label>
                                    <input type="number" name="nik" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Nama Pemohon Informasi</label>
                                    <input type="text" name="nama" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Alamat Lengkap Pemohon</label>
                                    <textarea type="text" name="alamat" class="form-control" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Kontak Pemohon</label>
                                    <input type="number" name="kontak" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Informasi Yang Dibutuhkan</label>
                                    <textarea type="text" name="kebutuhan" class="form-control" readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Tujuan Pengunaan Informasi</label>
                                    <textarea type="text" name="tujuan" class="form-control" readonly></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">Dinas / Tujuan Permohonan</label>
                                    <input type="text" name="pekerjaan" class="form-control" readonly>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-6">
                                        <label class="form-label">Cara Memperoleh Informasi</label>
                                        <input type="text" name="pekerjaan" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-6">
                                        <label class="form-label">CARA MENDAPATKAN SALINAN INFORMASI</label>
                                        <input type="text" name="pekerjaan" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-6">
                                        <label class="form-label">Dokumen Pendukung</label>
                                        <div class="col-md-12">
                                            <div class="mb-6">
                                                <a href="<?= base_url('files/regulasi/') ?><?= $value['file']; ?>" target="_blank"><i class="fas fa-download fa-3x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="card border">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" data-bs-dismiss="modal">
                                    &nbsp;&nbsp;&nbsp;TUTUP
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>
<?php foreach ($permohonanbaru as $key => $value) { ?>
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="setuju<?php $value['id_pemohon']; ?>">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myExtraLargeModalLabel">SETUJUI PERMOHONAN </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('permohonandata/accepttiket/' . $value['id_pemohon']) ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">NO TIKET</label>
                                    <input type="text" class="form-control" value="<?= $value['no_tiket']; ?> Tanggal <?= $value['created_at']; ?>" readonly>
                                    <input type="text" name="no_tiket" class="form-control" value="<?= $value['no_tiket']; ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">INSTANSI TUJUAN</label>
                                    <input type="text" class="form-control" value="<?= $value['nama_int']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">INFORMASI YANG DIBUTUHKAN</label>
                                    <textarea type="text" " class=" form-control" readonly><?= $value['kebutuhan']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">TUJUAN PENGUNAAN INFORMASI</label>
                                    <textarea type="text" class="form-control" readonly><?= $value['tujuan']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">CATATAN</label>
                                    <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan status tiket jika disetujui" required></textarea>
                                    <input type="text" name="status_tiket" class="form-control" value="1" hidden>
                                </div>
                            </div>
                            <br>
                            <div class="alert alert-warning">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        SETUJU PERMOHONANAN INI DAN AKAN DITERUSKAN KE INSTANSI TERKAIT
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                        SETUJU
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach ($permohonanbaru as $key => $value) { ?>
    <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="tolak<?php $value['id_pemohon']; ?>">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myExtraLargeModalLabel">TOLAK PERMOHONAN </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('permohonandata/tolaktiket/' . $value['id_pemohon']) ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">NO TIKET</label>
                                    <input type="text" class="form-control" value="<?= $value['no_tiket']; ?> Tanggal <?= $value['created_at']; ?>" readonly>
                                    <input type="text" name="no_tiket" class="form-control" value="<?= $value['no_tiket']; ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">INSTANSI TUJUAN</label>
                                    <input type="text" class="form-control" value="<?= $value['nama_int']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">INFORMASI YANG DIBUTUHKAN</label>
                                    <textarea type="text" " class=" form-control" readonly><?= $value['kebutuhan']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">TUJUAN PENGUNAAN INFORMASI</label>
                                    <textarea type="text" class="form-control" readonly><?= $value['tujuan']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <label class="form-label">CATATAN</label>
                                    <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan status tiket jika disetujui" required></textarea>
                                    <input type="text" name="status_tiket" class="form-control" value="1" hidden>
                                </div>
                            </div>
                            <br>
                            <div class="alert alert-warning">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        APAKAH ANDA YAKIN MENOLAK PERMOHONAN INI
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6">
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">
                                        TOLAK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>