<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">PROSES PERMOHONAN</h5>
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
                                            <th width="2%">No</th>
                                            <th width="3%">No Tiket</th>
                                            <th width="8%">Nama</th>
                                            <th width="3%">Kontak</th>
                                            <th width="8%">Instansi</th>
                                            <th width="10%">kebutuhan</th>
                                            <th width="10%">Tujuan</th>
                                            <th width="5%">Status Tiket</th>
                                            <th width="12%">Keterangan</th>
                                            <th width="6%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        use Kint\Zval\Value;

                                        $no = 1  ?>
                                        <?php foreach ($prosespermohonan as $key => $value) { ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= $value['no_tiket']; ?></td>
                                                <td><?= $value['nama']; ?></td>
                                                <td align="center"><?= $value['kontak']; ?></td>
                                                <td><?= $value['nama_int']; ?></td>
                                                <td><?= $value['kebutuhan']; ?></td>
                                                <td><?= $value['tujuan']; ?></td>
                                                <td align="center"><?php if ($value['status_tiket'] == 0) {
                                                                        echo "Tiket Belum Disetujui";
                                                                    } else if ($value['status_tiket'] == 1) {
                                                                        echo "Tiket Disetujui";
                                                                    } else if ($value['status_tiket'] == 2) {
                                                                        echo "Tiket Ditolak";
                                                                    } ?></td>
                                                <td><?= $value['keterangan']; ?></td>
                                                <td align="center">
                                                    <a type="button" class="btn btn-success btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#solved<?php $value['id_pemohon']; ?>">
                                                        <i class="fas fa-check-double"></i>
                                                    </a>&nbsp;
                                                    <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#detailpermohonan<?php $value['id_pemohon']; ?>">
                                                        <i class="fas fa-tasks"></i>
                                                    </a>&nbsp;
                                                    <a type="button" class="btn btn-info btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#proses<?php $value['id_pemohon']; ?>">
                                                        <i class="fas fa-paper-plane"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php foreach ($proses_tiket as $key => $proses) { ?>
                                                <?php if ($value['id_pemohon'] == $proses['id_pemohon']) { ?>
                                                    <tr>
                                                        <td colspan="7"></td>
                                                        <td align="center"><?php if ($value['id_pemohon'] == $proses['id_pemohon']) {
                                                                echo $proses['status_pro'];
                                                            } else {
                                                            } ?></td>
                                                        <td style="word-break: break-all;"><?php if ($value['id_pemohon'] == $proses['id_pemohon']) {
                                                                            echo $proses['ket_proses'];
                                                                        } else {
                                                                        } ?></td>
                                                        <td></td>
                                                       
                                                    <?php } else { ?>
                                                    <?php } ?>
                                                    <?php } ?>
                                            <?php } ?>

                                    </tbody>
                                </table>
                                <?= $pager->links('prosespermohonan', 'pager_permohonandata') ?>
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
<?php foreach ($prosespermohonan as $key => $value) { ?>
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
<?php foreach ($prosespermohonan as $key => $value) { ?>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="solved<?php $value['id_pemohon']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myExtraLargeModalLabel">CLOSE TIKET </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('permohonandata/closetiket/' . $value['id_pemohon']) ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="mb-6 text-center">
                                    <h3>TIKET NOMOR<br><br><button class="btn btn-primary btn-lg waves-effect waves-light"><?= $value['no_tiket']; ?></button> </h3>
                                    <h5><br>Tanggal <?= $value['created_at']; ?></h5>
                                    <input type="text" name="no_tiket" class="form-control" value="<?= $value['no_tiket']; ?>" hidden>
                                    <input type="text" name="solved" class="form-control" value="1" hidden>
                                </div>
                            </div>
                            <br>
                            <div class="alert alert-warning">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        APAKAH PERMOHONAN TELAH DISELESAIKAN DAN DITERIMA PEMOHON
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-6 text-center">
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">
                                        CLOSE TIKET
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
<?php foreach ($prosespermohonan as $key => $value) { ?>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="proses<?php $value['id_pemohon']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myExtraLargeModalLabel">PROSES TIKET</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('permohonandata/prosestiket/' . $value['id_pemohon']) ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">No Tiket</label>
                                <div class="col-sm-9">
                                    <b><?= $value['no_tiket'] ?></b>
                                </div>
                                <input type="text" value="<?= $value['id_pemohon'] ?>" name="id_pemohon" hidden>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Status Proses</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="status_pro">
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Dalam Proses Rekap">Dalam Proses Rekap</option>
                                        <option value="Data Telah Dikirim Ke e-mail">Data Telah Dikirim Ke e-mail</option>
                                        <option value="Data Telah Diterima Oleh Pemohon">Data Telah Diterima Oleh Pemohon</option>
                                        <option value="Data Telah Dibaca / Dicatat / Didengar Oleh Pemohon">Data Telah Dibaca / Dicatat / Didengar Oleh Pemohon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Status Proses</label>
                                <div class="col-sm-9">
                                    <textarea rows="4" cols="50" class="form-control" name="ket_proses" type="text" placeholder="Ketikan keterangan"></textarea>
                                </div>
                            </div>

                            <br>
                            <div class="row mb-3">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-9">
                                    <div class="alert alert-warning">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                            <label class="form-check-label" for="invalidCheck">
                                                PERIKSA KEMBALI APAKAH STATUS TIKET SUDAH SESUAI
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-9">
                                    <div class="col-md-12">
                                        <div class="mb-6">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                SIMPAN
                                            </button>
                                        </div>
                                    </div>
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
<!-- End Page-content -->