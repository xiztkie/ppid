<?php

use Config\Images;
?>
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
                                <h4>KONTAK</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="d-flex">
                                <div class="col-4 text-center">
                                    <a href="<?= base_url('#'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-bullhorn-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">INFORMASI PUBLIK</h6>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="<?= base_url('permohonan'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-square-edit-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">PERMOHONAN INFORMASI</h6>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="<?= base_url('statistik'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-chart-box-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">STATISTIK</h6>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Markers</h4>
                                            <p class="card-title-dsec">Example of google maps.</p>
                                            <div id="gmaps-markers" class="gmaps"></div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->
            <?= $this->endSection() ?>