<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-3">
                                    <h6>Tahun</h6>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= date('Y') ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <h6>Bulan</h6>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected="">Pilih Bulan</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-sm-10">
                                        <h6>Instansi</h6>   
                                        <select class="form-select" name="id_int">
                                                <option value="">Semua</option>
                                                <?php foreach ($opd as $instansi) { ?>
                                                    <option value="<?php echo $instansi['id_int']; ?>"><?php echo $instansi['nama_int']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-sm-10">
                                        <h6>&nbsp;</h6>
                                        <button type="button" class="btn btn-primary waves-effect waves-light">
                                            <i class="fas fa-search me-2"></i> Search
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                            <i class="fas fa-undo me-2"></i> Refresh
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                            <i class="fas fa-print me-2"></i> Print
                                        </button>
                                    </div>
                                </div>
                            </div>
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
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->
        <?= $this->endSection() ?>