<section id="halaman_hasil">
    <div class="container-fluid mr-4 mt-2">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold text-capitalize">Pemilihan Umum RT 02/15 tahun 2023</h3>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="row justify-content-start">
                    <div class="col-md-5 text-capitalize">
                        <div id="output"></div>
                        <?php
                        $no = 1;
                        foreach ($join as $row) :
                        ?>
                            <!-- <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('assets/upload_kandidat/') ?><?= $row['foto'] ?>" class="img-thumbnail" style="width: 120px; height:198px">
                                    </div>
                                    <div class="col-md-8"> -->
                            <!-- <div class="font-weight-bold text-danger text-capitalize card-header hasil_ajax"></div> -->
                            <!-- <div class="hasil_ajax"></div> -->
                            <!-- <div class="card-body">
                                            <p class="text-center font-weight-bold text-capitalize"><?= $row['no_urut'] ?></p>
                                            <h5 class="font-weight-bold card-title"><?= $row['nama'] ?></h5>
                                            <p class="card-text text-capitalize"><?= $row['alamat'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <?php endforeach ?>
                    </div>
                    <div class="col-md-7 text-capitalize">
                        <div class="card">
                            <div class="card-header font-weight-bold">
                                Hasil pemilihan RT 02/15 </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" id="jumlah_pemilih"></li>
                                    <li class="list-group-item" id="sah"></li>
                                    <li class="list-group-item" id="tidak_sah">jumlah suara yang tidak sah :</li>
                                    <!-- <li class="list-group-item" id="">Jumlah suara yang hadir :</li>
                                    <li class="list-group-item" id="">jumlah suara yang tidak hadir :</li> -->
                                    <li class="list-group-item" id="">tanggal pelaksanaan :</li>
                                    <li class="list-group-item" id="">waktu pelaksanaan :</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <a href="<?= base_url('auth/logout') ?>" style="z-index: 99; position: absolute" class="btn btn-danger logout">Logout</a>

                            <!-- audio -->
                            <audio id="myAudio" style="width: 50px; z-index:1; position:relative" controls>
                                <source src="<?= base_url('assets/alarm.mp3') ?>" type="audio/mpeg">
                            </audio>
                            <!-- batas audio -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>