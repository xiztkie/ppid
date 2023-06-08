<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Compose Mail</h5>
                        <div class="card-body">
                            <?php if (session()->getFlashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-check-all me-2"></i>';
                                echo session()->getFlashdata('pesan');
                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="/kirimemail/send" method="POST" enctype="multipart/form-data">
                                        <?= csrf_field() ?>
                                        <div class="mb-3">
                                            <input type="text" name="alamat_email" class="form-control" placeholder="To" value="<?= old('alamat_email') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?= old('subject') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input name="lampiran" type="file" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <textarea id="elm1" name="isi_email"><?= old('isi_email') ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-rounded btn-primary" type="submit">KIRIM</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-fluid" src="<?= base_url(); ?>assets/images/kirimemail.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>