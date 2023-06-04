<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                        <img class="card-img-top img-fluid" src="assets/images/regulasi.png" alt="Card image cap" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header"><i class="fas fa-database"></i>&nbsp;&nbsp;DATA REGULASI</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr class="table-info text-center">
                                            <th align="center" width="2%">No</th>
                                            <th align="center" width="50%">Judul</th>
                                            <th align="center" width="5%">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 + (10 * ($currentpage - 1)); ?>
                                        <?php foreach ($regulasidata as $key => $value) { ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td><?= $value['created_at']; ?><br><?= $value['judul_reg']; ?></td>
                                                <td align="center"><a href="<?= base_url('files/regulasi/') ?><?= $value['file_reg']; ?>"><i class=" fas fa-download "></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table><br>
                                <?= $pager->links('regulasidata', 'pager_regulasidata') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->
            <?= $this->endSection() ?>