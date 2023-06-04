        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">SETTING EMAIL</h5>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="col-sm">
                                            <?php foreach ($settings as $value) : ?>
                                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editmail<?= $value['id_email']; ?>">
                                                    EDIT EMAIL <i class="fas fa-plus-circle ms-2"></i>
                                                </button>
                                            <?php endforeach; ?>
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
                                        <?php foreach ($settings as $value) : ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">SMTP Host</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" name="smtp_host" value="<?= $value['smtp_host']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Alamat Email</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" name="smtp_user" value="<?= $value['smtp_user']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" name="smtp_pass" value="<?= $value['smtp_pass']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">SMTP Port</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" name="smtp_port" value="<?= $value['smtp_port']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label">Keamanan SMTP</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" name="smtp_crypto" value="<?php if ($value['smtp_crypto'] == 'tls') {
                                                                                                                                    echo "TLS";
                                                                                                                                } else {
                                                                                                                                    echo "SSL";
                                                                                                                                } ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-4">
                                                    <img class="card-img img-fluid" src="<?= base_url() ?>assets/images/email.jpg" height="200px">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="editmail<?= $value['id_email']; ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah user / OPD</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('emailsetting/editemail/' . $value['id_email']) ?>
                        <?php foreach ($settings as $value) : ?>
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">SMTP Host</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="smtp_host" value="<?= $value['smtp_host']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Alamat Email</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="smtp_user" value="<?= $value['smtp_user']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="smtp_pass" value="<?= $value['smtp_pass']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">SMTP Port</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="smtp_port" value="<?= $value['smtp_port']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Keamanan SMTP</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="smtp_crypto">
                                            <option value="<?= $value['smtp_crypto']; ?>">
                                                <?php if ($value['smtp_crypto'] == 'tls') {
                                                    echo "TLS";
                                                } else {
                                                    echo "SSL";
                                                } ?>
                                            </option>
                                            <option value="tls">TLS</option>
                                            <option value="ssl">SSL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">SIMPAN</button>
                            </div>
                        <?php endforeach; ?>
                        <?php echo form_close() ?>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        </div>
        <!-- End Page-content -->