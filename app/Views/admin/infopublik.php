<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">DATA INFOPUBLIKk</h5>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-sm">
                                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addinfopublik">
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
                                        <tr class="text-center">
                                            <th width="5%">No</th>
                                            <th>Instansi</th>
                                            <th>Informasi</th>
                                            <th width="50%">Judul</th>
                                            <th width="5%">Download</th>
                                            <th width="5%">Dilihat</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 + (10 * ($currentpage - 1)); ?>
                                        <?php foreach ($infopublik as $key => $value) { ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= $value['nama_int']; ?></td>
                                                <td align="center">
                                                    <option value="<?= $value['informasi']; ?>">
                                                        <?php if ($value['informasi'] == 1) {
                                                            echo "Berkala";
                                                        } else if ($value['informasi'] == 2) {
                                                            echo "Tersedia Setiap Saat";
                                                        } else if ($value['informasi'] == 3) {
                                                            echo "Serta Merta";
                                                        } ?></option>
                                                </td>
                                                <td><?= $value['created_at']; ?><br><?= $value['judul']; ?></td>
                                                <td align="center"><a href="<?= base_url('files/infopublik/') ?><?= $value['file_info']; ?>"><i class=" fas fa-download "></i></a></td>
                                                <td align="center"><i class="fas fa-eye">&nbsp;&nbsp;<?= $value['counter']; ?></i></a></td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <a href="<?= base_url('infopublik/delete/' . $value['id_info']) ?>">
                                                            <i class="ri-delete-bin-6-fill"></i>
                                                        </a>&nbsp;&nbsp;
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#editinfopublik<?= $value['id_info']; ?>">
                                                            <i class="mdi mdi-lead-pencil"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('infopublik', 'pager_infopublik') ?>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="addinfopublik">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Dokumen Publik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('infopublik/addinfopublik') ?>
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Instansi</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="id_int">
                            <?php foreach ($opd as $instansi) { ?>
                                <option value="<?php echo $instansi['id_int']; ?>"><?php echo $instansi['nama_int']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Kategori Informasi</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="informasi">
                            <option value="1">Berkala</option>
                            <option value="2">Tersedia Setiap Saat</option>
                            <option value="3">Serta Merta</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="judul" type="text"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-3 col-form-label">Upload Dokumen</label>
                    <div class="col-9">
                        <div class="input-group">
                            <input type="file" class="form-control" name="file_info">
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
<?php foreach ($infopublik as $key => $value) { ?>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="editinfopublik<?= $value['id_info']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Dokumen Publik <?= $value['judul']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('infopublik/editinfopublik/' . $value['id_info']) ?>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Instansi</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="id_int">
                                <option value="<?= $value['id_int']; ?>" selected><?= $value['id_int']; ?></option>
                                <?php foreach ($opd as $instansi) { ?>
                                    <option value="<?php echo $instansi['id_int']; ?>"><?php echo $instansi['nama_int']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Kategori Informasi</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="informasi">
                                <option value="<?= $value['informasi']; ?>">
                                    <?php if ($value['informasi'] == 1) {
                                        echo "Berkala";
                                    } else if ($value['informasi'] == 2) {
                                        echo "Tersedia Setiap Saat";
                                    } else if ($value['informasi'] == 3) {
                                        echo "Serta Merta";
                                    } ?></option>
                                <option value="1">Berkala</option>
                                <option value="2">Tersedia Setiap Saat</option>
                                <option value="3">Serta Merta</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="judul" type="text" value="<?= $value['judul']; ?>"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-3 col-form-label">File</label>
                        <div class="col-9 text-center">
                        <input type="text" class="form-control" name="file_info" value="<?= $value['file_info'] ?>" hidden>
                            <a href="<?= base_url('files/infopublik/'); ?><?= $value['file_info'] ?>"><i class="fas  fas fa-download fa-2x"></i><br>
                                <span><?= $value['judul'] ?></span>
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