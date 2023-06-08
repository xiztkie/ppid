        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">HALAMAN KIRIM EMAIL</h5>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="col-sm">
                                            <a type="button" class="btn btn-success waves-effect waves-light" href="<?= base_url(); ?>kirimemail/compose">
                                                Compose <i class="fas fa-plus-circle ms-2"></i>
                                            </a>
                                            <a type="button" class="btn btn-success waves-effect waves-light" href="<?= base_url(); ?>kirimemail/reply">
                                                Reply Ticket <i class="fas fa-plus-circle ms-2"></i>
                                            </a>
                                        </div>
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
                                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="5%">No</th>
                                                <th width="10%">No Tiket</th>
                                                <th width="15%">Alamat Email</th>
                                                <th width="50%">Subject</th>
                                                <th width="10%">Lampiran</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1  ?>
                                            <?php foreach ($kirimemail as $key => $value) { ?>
                                                <tr>
                                                    <td align="center"><?= $no++; ?></td>
                                                    <td align="center"><?= $value['no_tiket']; ?></td>
                                                    <td><?= $value['alamat_email']; ?></td>
                                                    <td><?= $value['subject']; ?></td>
                                                    <td align="center"><a href="<?= base_url('files/lampiran/' . $value['lampiran']) ?>"><i class="fas fa-download"></i></a></td>
                                                    <td align="center">
                                                        <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#kirimulang<?= $value['id_kirim']; ?>">
                                                            <i class="fas fa-tasks"></i>
                                                        </a>&nbsp;
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <?= $pager->links('kirimemail', 'pager_kirimemail') ?>
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
        <?php foreach ($kirimemail as $key => $value) { ?>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="kirimulang<?= $value['id_kirim']; ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Instansi / OPD</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <form action="/kirimemail/resend" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <input type="text" name="alamat_email" class="form-control" placeholder="To" value="<?= $value['alamat_email'] ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?= $value['subject'] ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <input name="lampiran" type="text" class="form-control" value="<?= $value['lampiran'] ?>" readonly>
                                    </div>
                                    <a class="btn btn-info" width="200" href="<?= base_url('files/lampiran/' . $value['lampiran']) ?>"><i class="fas fa-download"></i> Download File</a><br>
                                    <br>
                                    <div class="mb-3">
                                        <textarea id="elm1" name="isi_email" readonly><?= $value['isi_email'] ?></textarea>
                                    </div>
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