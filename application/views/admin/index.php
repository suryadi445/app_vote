<!-- alert -->
<?php if ($this->session->flashdata()) : ?>
    <div class="sukses" data-id="<?= $this->session->flashdata('sukses') ?>"></div>
<?php endif ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Halaman Admin</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-fluid" src="<?= base_url('assets/image/') ?><?= $row['gambar'] ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?= $row['nama'] ?></h3>

                            <p class="text-muted text-center text-capitalize"><?= $row['user'] ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIK</b> <a class="float-right"><?= $row['nik'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Handphone</b> <a class="float-right"><?= $row['handphone'] ?></a>
                                </li>
                                <li class="list-group-item text-capitalize">
                                    <b>Jenis Kelamin</b> <a class="float-right"><?= $row['jenis_kelamin'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>