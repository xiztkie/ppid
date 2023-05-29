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
                                <div class="col-md-3 text-center">
                                    <a href="<?= base_url('#'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-bullhorn-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">INFORMASI PUBLIK</h6>
                                </div>
                                <div class="col-md-3 text-center">
                                    <a href="<?= base_url('permohonan'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-square-edit-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">PERMOHONAN INFORMASI</h6>
                                </div>
                                <div class="col-md-3 text-center">
                                    <a href="<?= base_url('statistik'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-chart-box-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">STATISTIK</h6>
                                </div>
                                <div class="col-md-3 text-center">
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
                            <form action="" method="post">
                                <div class="d-flex">
                                    <div class="col-md-3">
                                        <h6>Informasi</h6>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="informasi">
                                                <option value="">Semua</option>
                                                <option value="1">Berkala</option>
                                                <option value="2">Tersedia Setiap Saat</option>
                                                <option value="3">Serta Merta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-sm-10">
                                            <h6>Instansi</h6>
                                            <select class="form-select" name="id_int">
                                                <option value="">Semua</option>
                                                <?php foreach ($opd as $instansi) { ?>
                                                    <option value="<?php echo $instansi['id_int']; ?>"><?php echo $instansi['nama_int']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-sm-10">
                                            <h6>Judul / Ringkasan</h6>
                                            <input type="text" class="form-control" name="keyword">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-sm-10">
                                            <h6>&nbsp;</h6>
                                            <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">
                                                <i class="fas fa-search me-2"></i> Search
                                            </button>
                                            <a type="button" class="btn btn-success waves-effect waves-light" href="<?= base_url('#') ?>">
                                                <i class="fas fa-undo me-2"></i> Refresh
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr align="center">
                                                <th width="5%">No</th>
                                                <th>Instansi</th>
                                                <th>Informasi</th>
                                                <th width="50%">Judul</th>
                                                <th width="5%">Download</th>
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
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div><br><?= $pager->links('infopublik', 'pager_infopublik') ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->
        <?= $this->endSection() ?>
        