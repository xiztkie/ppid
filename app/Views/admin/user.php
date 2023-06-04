        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">DATA USER</h5>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="col-sm">
                                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#adduser">
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
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Hak Akses</th>
                                                    <th>Instansi</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 + (10 * ($currentpage - 1)); ?>
                                                <?php foreach ($user as $key => $value) { ?>
                                                    <tr>
                                                        <td align="center"><?= $no++; ?></td>
                                                        <td><?= $value['username']; ?></td>
                                                        <td><?= $value['password']; ?></td>
                                                        <td><?= $value['level']; ?></td>
                                                        <td><?= $value['id_int']; ?></td>
                                                        <td align="center">
                                                            <div class="btn-group">
                                                                <form action="<?= base_url('user/delete/' . $value['id_user']) ?>" method="post">
                                                                <?= csrf_field() ?>
                                                                    <button type="submit" class="btn btn-link p-0 m-0">
                                                                        <i class="ri-delete-bin-6-fill"></i>
                                                                    </button>
                                                                </form>
                                                                <a type="button" data-bs-toggle="modal" data-bs-target="#edituser<?= $value['id_user']; ?>">
                                                                    <i class="mdi mdi-lead-pencil"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>


                                            </tbody>
                                        </table>
                                        <?= $pager->links('user', 'pager_user') ?>
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="adduser">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah user / OPD</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('user/adduser') ?>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="username" type="text" placeholder="Masukan nama user" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="password" type="password" placeholder="Masukan nama user" required="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="level">
                                    <option value="Admin">Admin</option>
                                    <option value="Operator">Operator</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Instansi / OPD</label>
                            <div class="col-9">
                                <select class="form-select" name="id_int" aria-label="Default select example">
                                    <?php foreach ($opd as $instansi) { ?>
                                        <option value="<?php echo $instansi['id_int']; ?>"><?php echo $instansi['nama_int']; ?> </option>
                                    <?php } ?>
                                </select>
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
        <?php foreach ($user as $key => $value) { ?>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="edituser<?= $value['id_user']; ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myExtraLargeModalLabel">Edit user / OPD</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('user/edituser/' . $value['id_user']) ?>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="username" type="text" value="<?= $value['username']; ?>" required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="password" type="password" value="<?= $value['password']; ?>" required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Level</label>
                                <div class="col-sm-9">
                                    <select class="form-select" name="level">
                                        <option value="<?= $value['level']; ?>" select><?= $value['level']; ?></option>
                                        <option value="Admin">Admin</option>
                                        <option value="Operator">Operator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Instansi / OPD</label>
                                <div class="col-9">
                                    <select class="form-select" name="id_int" aria-label="Default select example">
                                        <?php foreach ($opd as $instansi) { ?>
                                            <option value="<?php echo $instansi['id_int']; ?>"><?php echo $instansi['nama_int']; ?> </option>
                                        <?php } ?>
                                    </select>
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