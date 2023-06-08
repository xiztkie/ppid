        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">REPLY TICKET</h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md">
                                        </div>
                                        <div class="col-md-4">
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
                                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="2%">No</th>
                                                <th width="3%">No Tiket</th>
                                                <th width="8%">Nama</th>
                                                <th width="8%">Instansi</th>
                                                <th width="10%">kebutuhan</th>
                                                <th width="10%">Tujuan</th>
                                                <th width="5%">Status Tiket</th>
                                                <th width="12%">Keterangan</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1  ?>
                                            <?php foreach ($replytiket as $key => $value) { ?>
                                                <tr>
                                                    <td align="center"><?= $no++; ?></td>
                                                    <td align="center"><?= $value['no_tiket']; ?></td>
                                                    <td><?= $value['nama']; ?></td>
                                                    <td><?= $value['nama_int']; ?></td>
                                                    <td><?= $value['kebutuhan']; ?></td>
                                                    <td><?= $value['tujuan']; ?></td>
                                                    <td align="center"><?php if ($value['status_tiket'] == 0) {
                                                                            echo '<label class="badge rounded-pill badge-soft-success" style="color: #003744; background-color: #7971EA;"><i class="fas fa-plus"></i> Tiket Belum Disetujui</label>';
                                                                        } else if ($value['status_tiket'] == 1) {
                                                                            echo '<label class="badge rounded-pill badge-soft-success" style="color: #003744; background-color: #7CB855;"><i class="fas fa-check"></i> Tiket Disetujui</label>';
                                                                        } else if ($value['status_tiket'] == 2) {
                                                                            echo '<label class="badge rounded-pill badge-soft-success" style="color: #003744; background-color: #F54D42;"><i class="far fa-times-circle"></i> Tiket Ditolak</label>';
                                                                        } ?></td>
                                                    <td><?= $value['keterangan']; ?></td>
                                                    <td align="center">
                                                        <a type="button" class="btn btn-info btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#kirimemail<?= $value['id_pemohon']; ?>">
                                                            <i class="fas fa-paper-plane"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?= $pager->links('replytiket', 'pager_permohonandata') ?>
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
        <?php foreach ($replytiket as $key => $value) { ?>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="kirimemail<?= $value['id_pemohon']; ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">REPLY TIKET NOMOR <?= $value['no_tiket'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <form action="/kirimemail/send" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <input type="text" name="id_pemohon" class="form-control" placeholder="To" value="<?= $value['id_pemohon']; ?>" hidden readonly>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">To</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat_email" class="form-control" placeholder="To" value="<?= $value['email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Subject</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject" value="Permohonan Data Dengan Nomor Tiket <?= $value['no_tiket']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">lampiran</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="lampiran" class="form-control" placeholder="lampirkan Dokumen Pendukung" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                            <textarea id="elm1" name="isi_email" readonly></textarea>
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <button class="btn btn-rounded btn-primary" type="submit">KIRIM</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <?php } ?>
        <!-- End Page-content -->