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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-4">
                                <img class="card-img img-fluid" src="<?= base_url() ?>assets/images/kontak.jpg">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <a class="rounded-3">
                                            <i class="fas fa-street-view fa-4x"></i>
                                        </a><br>
                                        <br>
                                        <h6 class="mb-2">DESK LAYANAN INFORMASI PPID</h6>
                                        Dinas Komunikasi dan Informatika<br>Kabupaten Puncak Jaya.
                                        <br><br><h7>Alamat : Jl. Philipus Andreas Coem No. 1 Distrik Pagaleme, Puncak Jaya, Papua.</h7>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="<?= base_url('#'); ?>" class="rounded-3">
                                            <i class="fas fa-phone-alt fa-4x"></i>
                                        </a><br>
                                        <br>
                                        <h6 class="mb-2">KONTAK</h6>
                                        <h7> TELP : (0984) 21196<br>
                                    WhatsApp : - <br>Email : -</h7>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="<?= base_url('statistik'); ?>" class="rounded-3">
                                            <i class="fas fa-business-time fa-4x"></i>
                                        </a><br>
                                        <br>
                                        <h6 class="mb-2">WAKTU LAYANAN INFORMASI</h6>
                                        <h7>Senin - Kamis : 08.00 - 15.30<br>
                                            Jumat : 08.00 - 14.30<br>
                                            Istirahat : 12.00 - 13.00</h7>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <!-- Content of the col-md-8 goes here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row no-gutters align-items-center">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">Maps Dinas Komunikasi dan Informatika Kabupaten Puncak Jaya</h4>
                                        <p class="card-title-dsec">Jl. Philipus Andreas Coem No. 1 Distrik Pagaleme, Puncak Jaya, Papua.</p>
                                        <div id="gmaps-markers" class="gmaps"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img class="card-img img-fluid" src="<?= base_url() ?>assets/images/map.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->
    <?= $this->endSection() ?>