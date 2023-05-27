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
                               <h4>STRUKTUR ORGANISASI</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body text-center">
                           <img src="<?= base_url("assets/Images/struktur.jpg"); ?>" height="auto" width="auto" ></img>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->
        <?= $this->endSection() ?>