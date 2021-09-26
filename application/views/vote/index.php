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