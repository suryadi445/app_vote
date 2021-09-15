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
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="handphone" placeholder="No Handphone" value="<?= set_value('handphone') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-mobile-alt"></span>
                        </div>
                    </div>
                </div>
                <?php if (form_error('handphone')) : ?>
                    <div class="text-danger mt-n3 errors"><?= form_error('handphone') ?></div>
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

            <p class="mb-3 mt-3">
                <a href="">Lupa Password</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>