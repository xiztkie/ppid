<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">CEK PROGRESS PERMOHONAN</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="<?= base_url('cektiket/progresstiket') ?>" method="post">
                                                <?php if (isset($errorMessage)) : ?>
                                                    <p><?= $errorMessage; ?></p>
                                                <?php endif; ?>
                                                <div class="d-flex">
                                                    <div class="col-md-4">
                                                        <div class="col-md-10">
                                                            <h6>Kode Ticket</h6>
                                                            <input class="form-control" type="text" name="no_tiket" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="col-md-10">
                                                            <h6>Nomor Handphone</h6>
                                                            <input class="form-control" type="number" name="kontak" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="col-md-10">
                                                            <h6>&nbsp;</h6>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                                <i class="fas fa-search me-2"></i> Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>