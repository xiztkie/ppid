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
                                                        <div class="form-group mb-6">
                                                            <label class="form-label">NIK Pemohon</label>
                                                            <input type="number" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Nama Pemohon Informasi</label>
                                                            <input type="text" name="nama" class="form-control" placeholder="Nama Pemohon">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Alamat Lengkap Pemohon</label>
                                                            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Kontak Pemohon</label>
                                                            <input type="number" name="kontak" class="form-control" placeholder="kontak Pemohon">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Pekerjaan</label>
                                                            <input type="text" name="pekerjaan" class="form-control" placeholder="Perkerjaan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Kategori Pemohon</label>
                                                            <select class="form-select" name="kategori">
                                                                <option value="Perorangan">Perorangan</option>
                                                                <option value="Kelompok">Kelompok</option>
                                                                <option value="LSM / NGO">LSM / NGO</option>
                                                                <option value="Instansi Pemerintahan">Instansi Pemerintahan</option>
                                                                <option value="Lembaga Pendidikan">Lembaga Pendidikan</option>
                                                                <option value="Lain - lainnya">Lain - lainnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Informasi Yang Dibutuhkan</label>
                                                            <textarea type="text" name="kebutuhan" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-6">
                                                            <label class="form-label">Tujuan Pengunaan Informasi</label>
                                                            <textarea type="text" name="tujuan" class="form-control"></textarea>
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
                                                                    <option value="<?php echo $instansi['id_int']; ?>" <?php echo old('id_int') === $instansi['id_int'] ? 'selected' : ''; ?>>
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
                                                                    <input class="form-check-input" type="radio" name="cara_info" value="1">
                                                                    <label class="form-check-label">
                                                                        MELIHAT/MEMBACA/MENDENGARKAN/MENCATAT
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="cara_info" value="2">
                                                                    <label class="form-check-label">
                                                                        SALINAN INFORMASI HARDCOPY / SALINAN INFORMASI SOFTCOPY
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <div class="mb-6">
                                                                <label class="form-label">CARA MENDAPATKAN SALINAN INFORMASI</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="dgn_cara" value="MENGAMBIL LANGSUNG">
                                                                    <label class="form-check-label">
                                                                        MENGAMBIL LANGSUNG
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="dgn_cara" value="EMAIL">
                                                                    <label class="form-check-label">
                                                                        EMAIL
                                                                    </label>
                                                                </div>
                                                                <!-- Tampilkan pesan error jika dgn_cara tidak dipilih -->
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="alert alert-warning">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="invalidCheck" require>
                                                    <label class="form-check-label" for="invalidCheck">
                                                        DATA & INFORMASI YANG KAMI PEROLEH, KAMI GUNAKAN SESUAI DENGAN <br>KETENTUAN PERUNDANG-UNDANGAN YANG BERLAKU.
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
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