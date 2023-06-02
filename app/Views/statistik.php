<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <form id="filterForm" method="GET" action="<?= base_url('statistik/filter') ?>">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="col-3">
                                        <h6>Tahun</h6>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="tahun" aria-label="Default select example">
                                                <option value="<?= date('Y') ?>"><?= date('Y') ?></option>
                                                <?php for ($i = date('Y'); $i >= 2022; $i--) : ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <h6>Bulan</h6>
                                        <div class="col-sm-10">
                                            <?php
                                            $bulan = ''; // Nilai default
                                            // Cek apakah ada input bulan dari form
                                            if (isset($_GET['bulan'])) {
                                                $bulan = $_GET['bulan'];
                                            }
                                            ?>
                                            <select class="form-select" name="bulan" aria-label="Default select example">
                                                <option value="">Semua</option>
                                                <option value="1" <?= $bulan == 1 ? 'selected' : '' ?>>Januari</option>
                                                <option value="2" <?= $bulan == 2 ? 'selected' : '' ?>>Februari</option>
                                                <option value="3" <?= $bulan == 3 ? 'selected' : '' ?>>Maret</option>
                                                <option value="4" <?= $bulan == 4 ? 'selected' : '' ?>>April</option>
                                                <option value="5" <?= $bulan == 5 ? 'selected' : '' ?>>Mei</option>
                                                <option value="6" <?= $bulan == 6 ? 'selected' : '' ?>>Juni</option>
                                                <option value="7" <?= $bulan == 7 ? 'selected' : '' ?>>Juli</option>
                                                <option value="8" <?= $bulan == 8 ? 'selected' : '' ?>>Agustus</option>
                                                <option value="9" <?= $bulan == 9 ? 'selected' : '' ?>>September</option>
                                                <option value="10" <?= $bulan == 10 ? 'selected' : '' ?>>Oktober</option>
                                                <option value="11" <?= $bulan == 11 ? 'selected' : '' ?>>November</option>
                                                <option value="12" <?= $bulan == 12 ? 'selected' : '' ?>>Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="col-sm-10">
                                            <h6>Instansi</h6>
                                            <select class="form-select" name="nama_int">
                                                <option value="">Semua</option>
                                                <?php foreach ($opd as $row) : ?>
                                                    <option value="<?php echo $row['nama_int']; ?>"><?php echo $row['nama_int']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" id="printFilter" name="print" value="false">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="col-sm-10">
                                            <h6>&nbsp;</h6>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                <i class="fas fa-search me-2"></i> Search
                                            </button>
                                            <a href="<?= base_url('statistik'); ?>" class="btn btn-success waves-effect waves-light">
                                                <i class="fas fa-undo me-2"></i> Refresh
                                            </a>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light" onclick="setPrintFilter()">
                                                <i class="fas fa-print me-2"></i> Print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row" id="tableContainer">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr align="center">
                                                <th width="2%">No</th>
                                                <th width="50%">Instansi</th>
                                                <th>Permohonan Baru</th>
                                                <th>Permohonan Diproses</th>
                                                <th>Permohonan Disetujui</th>
                                                <th>Permohonan Ditolak</th>
                                                <th>Total Permohonan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php $seluruhpermohonan = 0; ?>
                                            <?php foreach ($dataper as $data) : ?>
                                                <?php $totalpermohonan = $data->permohonanbaru + $data->permohonanproses + $data->permohonantolak; ?>
                                                <?php $seluruhpermohonan += $totalpermohonan; ?>
                                                <tr align="center">
                                                    <td><?= $no++ ?></td>
                                                    <td align="left"><?php echo $data->nama_int; ?></td>
                                                    <td><?php echo $data->permohonanbaru; ?></td>
                                                    <td><?php echo $data->permohonanproses ?></td>
                                                    <td><?php echo $data->permohonansetuju; ?></td>
                                                    <td><?php echo $data->permohonantolak; ?></td>
                                                    <td><?php echo $totalpermohonan; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr align="center">
                                                <td colspan="6">
                                                    <h6>TOTAL SELURUH PERMOHONAN</h6>
                                                </td>
                                                <td>
                                                    <h6><?= $seluruhpermohonan ?></h6>
                                                </td>
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
        <script>
            function setPrintFilter() {
                document.getElementById('printFilter').value = 'true';
            }
        </script>
        <?= $this->endSection() ?>