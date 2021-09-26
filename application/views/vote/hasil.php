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
                                    <li class="list-group-item">Jumlah pemilih</li>
                                    <li class="list-group-item">Jumlah suara yang hadir</li>
                                    <li class="list-group-item">jumlah suara yang tidak hadir</li>
                                    <li class="list-group-item">jumlah suara yang sah</li>
                                    <li class="list-group-item">jumlah suara yang tidak sah</li>
                                    <li class="list-group-item">tanggal pelaksanaan</li>
                                    <li class="list-group-item">waktu pelaksanaan</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalHasil">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="modalHasil" tabindex="-1" aria-labelledby="labelHasil" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelHasil">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>