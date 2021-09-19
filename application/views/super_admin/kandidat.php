<!-- <div class="register-box"> -->
<div class="">
    <div class="row justify-content-center mt-2 mb-2">
        <h2>SISTEM PEMILIHAN UMUM<span>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="row">
                <div class="col-md-12"> -->
            <div class="card  position-static">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Pendaftaran Kandidat RT</p>
                    <form action="<?= base_url('admin/kandidat') ?>" enctype="multipart/form-data" method="post">
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
                            <input type="text" class="form-control" placeholder="Nomor Peserta" name="no_urut" id="no_urut" value="<?= set_value('no_urut') ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-list-ol"></span>
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
                        <div class="form-group row">
                            <div class="input-group col-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="gambar" value="<?= set_value('gambar') ?>">
                                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="Alamat"></textarea>
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
        <!-- </div>
        </div> -->
    </div>
</div>