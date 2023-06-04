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
                        <img class="card-img-top img-fluid" src="assets/images/laporan.png" alt="Card image cap" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="card-header"><i class="fas fa-file-contract"></i>&nbsp;&nbsp;DATA LAPORAN</h5>
                        <div class="card-body">
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr class="table-info text-center">
                                        <th width="2%">No</th>
                                        <th width="50%">Judul</th>
                                        <th width="5%">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 + (10 * ($currentpage - 1)); ?>
                                    <?php foreach ($laporandata as $key => $value) { ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td><?= $value['created_at']; ?><br><?= $value['judul_lap']; ?></td>
                                            <td align="center"><a href="<?= base_url('files/laporan/') ?><?= $value['file_lap']; ?>"><i class=" fas fa-download "></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?= $pager->links('laporandata', 'pager_laporandata') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->
        <?= $this->endSection() ?>