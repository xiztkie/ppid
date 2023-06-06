<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="<?= base_url("dashboard") ?>" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-title">PERMOHONAN</li>
                <li>
                    <a href="<?= base_url("permohonandata") ?>" class=" waves-effect">
                        <i class="fas fa-database"></i>
                        <span>Data Permohonan</span>
                    </a>
                </li>
                <?php $user = session()->get('level');
                if ($user == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url("permohonanbaru") ?>" class=" waves-effect">
                            <i class="ri ri-file-add-line"></i>
                            <span>Permohonan Baru</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
                <li>
                    <a href="<?= base_url("prosespermohonan") ?>" class=" waves-effect">
                        <i class="fas fa-business-time"></i>
                        <span>Proses Permohonan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("cekpermohonan") ?>" class=" waves-effect">
                        <i class="mdi mdi-cloud-search-outline"></i>
                        <span>Cek Progress</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('sendemail') ?>" class=" waves-effect">
                        <i class="fas fa-file-signature"></i>
                        <span>Kirim Email</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('laporantiket') ?>" class=" waves-effect">
                        <i class="fas fa-file-export"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li class="menu-title">MASTER DATA</li>
                <?php $user = session()->get('level');
                if ($user == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('instansi') ?>" class=" waves-effect">
                            <i class="ri-database-fill"></i>
                            <span>Data Instansi</span>
                        </a>
                    </li> <?php } else {
                        } ?>
                <li>
                    <a href="<?= base_url('infopublik') ?>" class=" waves-effect">
                        <i class="far fa-copy"></i>
                        <span>Dokumen Publik</span>
                    </a>
                </li>
                <?php $user = session()->get('level');
                if ($user == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('sop') ?>" class=" waves-effect">
                            <i class="fas fa-file-contract"></i>
                            <span>SOP PPID</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('regulasidata') ?>" class=" waves-effect">
                            <i class="fas fa-file-signature"></i>
                            <span>Regulasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('laporandata') ?>" class=" waves-effect">
                            <i class="ri-survey-fill"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li class="menu-title">SETTING</li>
                    <li>
                        <a href="<?= base_url('user') ?>" class=" waves-effect">
                            <i class="fas fa-user"></i>
                            <span>User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('email') ?>" class=" waves-effect">
                            <i class="ri-mail-settings-line"></i>
                            <span>E-mail</span>
                        </a>
                    </li>
                <?php } else {
                } ?>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->