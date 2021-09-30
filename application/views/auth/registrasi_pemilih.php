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
                            <p class="login-box-msg">Pendaftaran Pemilih</p>
                            <form action="<?= base_url('auth/registrasi_pemilih') ?>" enctype="multipart/form-data" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik" value="<?= set_value('nik') ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user-tie"></span>
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
                <?php } else { ?>
                    <div class="sukses" data-id="<?= $this->session->flashdata('sukses') ?>"></div>
                <?php } ?>
                <!-- akhir alert -->
            </div>
        </div>
    </div>
</div>