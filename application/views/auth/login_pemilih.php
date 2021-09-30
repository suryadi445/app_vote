<?php if ($this->session->flashdata()) : ?>
    <div class="gagal" data-id="<?= $this->session->flashdata('gagal') ?>"></div>
<?php endif ?>

<div class="login-box">
    <div class="login-logo">
        <span>SISTEM PEMILIHAN UMUM<span>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body mt-2">
            <p class="login-box-msg mb-3 text-capitalize">Login untuk masuk kedalam sistem</p>
            <form action="<?= base_url('auth/pemilih') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nik" placeholder="Nik" value="<?= set_value('nik') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?php if (form_error('nik')) : ?>
                    <div class="text-danger mt-n3 errors"><?= form_error('nik') ?></div>
                <?php endif ?>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php if (form_error('password')) : ?>
                    <div class="text-danger mt-n3 errors"><?= form_error('password') ?></div>
                <?php endif ?>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>