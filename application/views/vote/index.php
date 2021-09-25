<section id="halaman_utama">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold text-capitalize">Pemilihan Umum RT 02/15 tahun 2023</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-around">
                    <?php
                    $no = 1;
                    foreach ($result as $row) :
                    ?>
                        <div class="kandidat" data-id="<?= $no++ ?>">
                            <div class="card m-2" style="width: 18rem;">
                                <img src="<?= base_url('assets/upload_kandidat/') ?><?= $row['foto'] ?>" class="card-img-top" style="height: 24rem;">
                                <div class="card-body">
                                    <p class="text-center font-weight-bold text-capitalize"><?= $row['no_urut'] ?></p>
                                    <h5 class="font-weight-bold card-title"><?= $row['nama'] ?></h5>
                                    <p class="card-text text-capitalize"><?= $row['alamat'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal  hasil-->
<div class="modal fade" id="modalHasil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Hasil Sementara</h5>
            </div>
            <div class="modal-body">
                <div class="card-deck">
                    <div class="card">
                        <div class="row mt-3 justify-content-center">
                            <img src="<?= base_url('assets/image/suryadi.jpg') ?>" style="width: 7rem;" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="text-center"><b>1</b></h5>
                            <p class="text-center"><b>nama</b></p>
                            <p>Suara Sementara : <b> 10 suara</b></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row mt-3 justify-content-center">
                            <img src="<?= base_url('assets/image/suryadi.jpg') ?>" style="width: 7rem;" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="text-center"><b>2</b></h5>
                            <p class="text-center"><b>nama</b></p>
                            <p>Suara Sementara : <b> 10 suara</b></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row mt-3 justify-content-center">
                            <img src="<?= base_url('assets/image/suryadi.jpg') ?>" style="width: 7rem;" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="text-center"><b>3</b></h5>
                            <p class="text-center"><b>nama</b></p>
                            <p>Suara Sementara : <b> 10 suara</b></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-lg-between p-3">
                    <p>Total Kepala Keluarga : <b>80</b></p>
                    <p>Total Pemilih Sementara : <b>70</b></p>
                    <p>Total Suara Sah : <b>70</b></p>
                    <p>Total Suara Tidak Sah : <b>0</b></p>
                </div>
                <div class="row justify-content-end p-3">
                    <a href="<?= base_url() ?>" class="btn btn-danger logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>