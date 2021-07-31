<section id="halaman_utama">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold">Pemilihan Umum RT 02/15 tahun 2023</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-danger">Test Vote</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-around">
                    <div class="card m-2" style="width: 18rem;">
                        <img src="<?= base_url('assets/image/suryadi.jpg') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="text-center font-weight-bold text-capitalize">1</p>
                            <h5 class="font-weight-bold card-title">Suryadi</h5>
                            <p class="card-text text-capitalize">Jl. H. Gadung Rt.02/15 no.20 pondok Ranji CIputat timur, Tangerang selatan</p>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="<?= base_url('assets/image/suryadi.jpg') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="text-center font-weight-bold text-capitalize">2</p>
                            <h5 class="font-weight-bold card-title">Suryadi</h5>
                            <p class="card-text text-capitalize">Jl. H. Gadung Rt.02/15 no.20 pondok Ranji CIputat timur, Tangerang selatan</p>
                        </div>
                    </div>
                    <div class="card m-2" style="width: 18rem;">
                        <img src="<?= base_url('assets/image/suryadi.jpg') ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="text-center font-weight-bold text-capitalize">3</p>
                            <h5 class="font-weight-bold card-title">Suryadi</h5>
                            <p class="card-text text-capitalize">Jl. H. Gadung Rt.02/15 no.20 pondok Ranji CIputat timur, Tangerang selatan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row float-right">
            <div class="col-md-4">
                <button class="btn btn-danger" data-toggle="modal" data-target="#modalVote">Selesai</button>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalVote" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Konfirmasi</h5>
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
                        <label for="password" class="col-sm-2 col-form-label">NIK</label>
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