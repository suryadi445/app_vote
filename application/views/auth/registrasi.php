<!-- <div class="register-box"> -->
<div class="overflow-hidden">
    <div class="row justify-content-center mt-2 mb-2">
        <h2>SISTEM PEMILIHAN UMUM<span>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card  position-static">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">Pendaftaran Anggota Baru</p>
                            <form action="<?= base_url('auth/registrasi') ?>" enctype="multipart/form-data" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama" value="<?= set_value('nama') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik" value="<?= set_value('nik') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user-tie"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="No. Handphone" name="handphone" id="handphone" value="<?= set_value('handphone') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-mobile-alt"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?= set_value('password') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select shadow-none" name="user" id="user">
                                        <option disabled selected value <?= set_select('user', '', TRUE); ?>>Pilih User</option>
                                        <option value="super admin" <?= set_select('user', 'super admin'); ?>>Super Admin</option>
                                        <option value="admin" <?= set_select('user', 'admin'); ?>>Admin</option>
                                        <option value="pengurus" <?= set_select('user', 'pengurus'); ?>>Pengurus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select shadow-none" name="jenis_kelamin" id="jenis_kelamin">
                                        <option disabled selected value <?= set_select('jenis_kelamin', '', TRUE); ?>>Jenis Kelamin</option>
                                        <option value="laki-laki" name="laki-laki" <?= set_select('jenis_kelamin', 'laki-laki'); ?>>Laki - laki</option>
                                        <option value="perempuan" name="perempuan" <?= set_select('jenis_kelamin', 'perempuan'); ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group col-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="gambar" id="gambar" value="<?= set_value('gambar') ?>">
                                            <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                    </div>
                                </div>
                            </form>

                            <a href="<?= base_url('admin/super_admin') ?>" class="text-center">Kembali</a>
                        </div>
                    </div>
                </div>
                <!-- alert -->
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="col-md-3" id="alert">
                        <div class="alert alert-danger error"><?= $this->session->flashdata('error') ?></div>
                    </div>
                <?php } ?>
                <!-- akhir alert -->
            </div>
        </div>
    </div>
</div>