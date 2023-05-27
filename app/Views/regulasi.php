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
                        <h5 class="card-header">REGULASI</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th align="center" width="5%">No</th>
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