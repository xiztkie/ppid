<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('#'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-bullhorn-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">INFORMASI PUBLIK</h6>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('permohonan'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-square-edit-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">PERMOHONAN INFORMASI</h6>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('statistik'); ?>" class="rounded-3">
                                        <i class="mdi-dark mdi mdi-chart-box-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">STATISTIK</h6>
                                </div>
                                <div class="col-3 text-center">
                                    <a href="<?= base_url('cektiket'); ?>"" class=" rounded-3">
                                        <i class="mdi-dark mdi mdi-check-box-multiple-outline mdi-48px"></i>
                                    </a>
                                    <h6 class="mb-2">CEK PROGRESS PERMOHONAN</h6>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <h5><i class="fas fa-file-alt fa-lg"></i>&nbsp;&nbsp;&nbsp;FORM PERMOHONAN DATA</h5>
                                        <hr>
                                        <?php if (session()->getFlashdata('pesan')) {
                                            $no_tiket = session()->getFlashdata('no_tiket');
                                            $email = session()->getFlashdata('email');
                                            echo '
                                                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                                    <i class="mdi mdi-check-all me-2"></i>';
                                            echo session()->getFlashdata('pesan');
                                            echo "<br><h1>$no_tiket</h1>";
                                            echo session()->getFlashdata('pesan_email');
                                            echo "<a>$email</a>";
                                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </div>';
                                        } ?>
                                        <form method="post" action="<?= site_url('/permohonan/tambahtiket') ?>" enctype="multipart/form-data">
                                            <?php csrf_field() ?>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" name="no_tiket" class="form-control" readonly id="nomortiket" hidden>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nik">NIK</label>
                                                            <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan" value="<?= old('nik') ? old('nik') : set_value('nik') ?>">
                                                            <?php if (session('validationErrors.nik')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i><?= session('validationErrors.nik') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Nama Pemohon Informasi</label>
                                                            <input type="text" name="nama" class="form-control" placeholder="Nama Pemohon" value="<?= old('nama') ? old('nama') : set_value('nama') ?>">
                                                            <?php if (session('validationErrors.nama')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.nama') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Alamat Lengkap Pemohon</label>
                                                            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap"><?= old('alamat') ? old('alamat') : set_value('alamat') ?></textarea>
                                                            <?php if (session('validationErrors.alamat')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.alamat') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Kontak Pemohon</label>
                                                            <input type="number" name="kontak" class="form-control" placeholder="kontak Pemohon" value="<?= old('kontak') ? old('kontak') : set_value('kontak') ?>">
                                                            <?php if (session('validationErrors.kontak')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.kontak') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Pekerjaan</label>
                                                            <input type="text" name="pekerjaan" class="form-control" placeholder="Perkerjaan" value="<?= old('pekerjaan') ? old('pekerjaan') : set_value('pekerjaan') ?>">
                                                            <?php if (session('validationErrors.pekerjaan')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.pekerjaan') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Kategori Pemohon</label>
                                                            <select class="form-select" name="kategori">
                                                                <option value="Perorangan" <?php echo old('kategori') === 'Perorangan' ? 'selected' : ''; ?>>Perorangan</option>
                                                                <option value="Kelompok" <?php echo old('kategori') === 'Kelompok' ? 'selected' : ''; ?>>Kelompok</option>
                                                                <option value="LSM / NGO" <?php echo old('kategori') === 'LSM / NGO' ? 'selected' : ''; ?>>LSM / NGO</option>
                                                                <option value="Instansi Pemerintahan" <?php echo old('kategori') === 'Instansi Pemerintahan' ? 'selected' : ''; ?>>Instansi Pemerintahan</option>
                                                                <option value="Lembaga Pendidikan" <?php echo old('kategori') === 'Lembaga Pendidikan' ? 'selected' : ''; ?>>Lembaga Pendidikan</option>
                                                                <option value="Lain - lainnya" <?php echo old('kategori') === 'Lain - lainnya' ? 'selected' : ''; ?>>Lain - lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ? old('email') : set_value('email') ?>">
                                                            <?php if (session('validationErrors.email')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.email') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Informasi Yang Dibutuhkan</label>
                                                            <textarea type="text" name="kebutuhan" class="form-control"><?= old('kebutuhan') ? old('kebutuhan') : set_value('kebutuhan') ?></textarea>
                                                            <?php if (session('validationErrors.kebutuhan')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.kebutuhan') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Tujuan Penggunaan Informasi</label>
                                                            <textarea type="text" name="tujuan" class="form-control"><?= old('tujuan') ? old('tujuan') : set_value('tujuan') ?></textarea>
                                                            <?php if (session('validationErrors.tujuan')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.tujuan') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-5">
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Dinas / Tujuan Permohonan</label>
                                                            <select class="form-select" aria-label="Default select example" name="id_int">
                                                                <?php
                                                                foreach ($opd as $instansi) {
                                                                ?>
                                                                    <option value="<?php echo $instansi['id_int']; ?>" <?php echo old('id_int') == $instansi['id_int'] ? 'selected' : ''; ?>>
                                                                        <?php echo $instansi['nama_int']; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <div class="mb-6">
                                                                <label class="form-label">CARA MEMPEROLEH INFORMASI</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="cara_info" value="1" <?php echo old('cara_info') === '1' ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label">
                                                                        MELIHAT/MEMBACA/MENDENGARKAN/MENCATAT
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="cara_info" value="2" <?php echo old('cara_info') === '2' ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label">
                                                                        SALINAN INFORMASI HARDCOPY / SALINAN INFORMASI SOFTCOPY
                                                                    </label>
                                                                </div>
                                                                <?php if (session('validationErrors.cara_info')) : ?>
                                                                    <div class="text-right">
                                                                        <i class="fas fa-info-circle"></i> <?= session('validationErrors.cara_info') ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <div class="mb-6">
                                                                <label class="form-label">CARA MENDAPATKAN SALINAN INFORMASI</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="dgn_cara" value="MENGAMBIL LANGSUNG" <?php echo old('dgn_cara') === 'MENGAMBIL LANGSUNG' ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label">
                                                                        MENGAMBIL LANGSUNG
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="dgn_cara" value="EMAIL" <?php echo old('dgn_cara') === 'EMAIL' ? 'checked' : ''; ?>>
                                                                    <label class="form-check-label">
                                                                        EMAIL
                                                                    </label>
                                                                </div>
                                                                <?php if (session('validationErrors.dgn_cara')) : ?>
                                                                    <div class="text-right">
                                                                        <i class="fas fa-info-circle"></i> <?= session('validationErrors.dgn_cara') ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <div class="mb-6">
                                                                <label class="form-label">Upload</label>
                                                                <p class="card-title-desc">Silahkan cantumkan berkas persyaratan yang dipersyaratkan dalam permintaan informasi jadikan 1 file dalam bentuk format (ZIP/RAR/PDF/JPEG/JPG)</p>
                                                                <div class="input-group">
                                                                    <input type="file" name="file" class="form-control">
                                                                </div>
                                                                <input type="text" name="status_tiket" class="form-control" readonly value="0" hidden>
                                                                <input type="text" name="status_proses" class="form-control" readonly value="0" hidden>
                                                            </div>
                                                            <?php if (session('validationErrors.file')) : ?>
                                                                <div class="text-right">
                                                                    <i class="fas fa-info-circle"></i> <?= session('validationErrors.file') ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="alert alert-warning">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="invalidCheck" name="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">
                                                        DATA & INFORMASI YANG KAMI PEROLEH, KAMI GUNAKAN SESUAI DENGAN <br>KETENTUAN PERUNDANG-UNDANGAN YANG BERLAKU.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card border">
                                                    <div class="card-body">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            <i class="fas fa-paper-plane align-middle ms-2"></i>&nbsp;&nbsp;&nbsp;KIRIM PERMINTAAN
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-sm-1">
                                    </div>
                                    <div class="col-md-12">
                                        <h5><i class="fas fa-newspaper fa-lg"></i>&nbsp;&nbsp;&nbsp;INFORMASI SYARAT PERMOHONAN</h5>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div>
    </div>
</div>

<!-- End Page-content -->
<?= $this->endSection() ?>