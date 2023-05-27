<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">DATA SOP (Standart Operasional Procedur)</h5>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-sm">
                                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addsop">
                                        Tambah <i class="fas fa-plus-circle ms-2"></i>
                                    </button>
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
                            <div class="card-body">
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="50%">Judul</th>
                                            <th width="5%">Download</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 + (10 * ($currentpage - 1)); ?>
                                        <?php foreach ($sop as $key => $value) { ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td><?= $value['created_at']; ?><br><?= $value['judul_sop']; ?></td>
                                                <td align="center"><a href="<?= base_url('files/sop/') ?><?= $value['file_sop']; ?>"><i class=" fas fa-download "></i></a></td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('sop/delete/' . $value['id_sop']) ?>">
                                                            <i class="ri-delete-bin-6-fill"></i>
                                                        </a>&nbsp;&nbsp;
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#editsop<?= $value['id_sop']; ?>">
                                                            <i class="mdi mdi-lead-pencil"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('sop', 'pager_sop') ?>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="addsop">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Dokumen Publik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('sop/addsop') ?>
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Judul SOP</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="judul_sop" type="text"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Upload Dokumen</label>
                    <div class="col-9">
                        <div class="input-group">
                            <input type="file" class="form-control" name="file_sop">
                        </div>
                    </div>
                </div>
                <div class="modal-footer right-content-between">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<?php foreach ($sop as $key => $value) { ?>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="editsop<?= $value['id_sop']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Dokumen Publik <?= $value['judul_sop']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('sop/editsop/' . $value['id_sop']) ?>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Judul SOP</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="judul_sop" type="text" ><?= $value['judul_sop']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">File</label>
                        <div class="col-9 text-center">
                            <input type="text" class="form-control" name="file_sop" value="<?= $value['file_sop'] ?>" hidden>
                            <a href="<?= base_url('files/sop/'); ?><?= $value['file_sop'] ?>"><i class="fas  fas fa-download fa-2x"></i><br>
                                <span><?= $value['judul_sop'] ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer right-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>
<!-- End Page-content -->