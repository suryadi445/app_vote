<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pengurus</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- alert -->
    <?php if ($this->session->flashdata()) : ?>
        <div class="sukses" data-id="<?= $this->session->flashdata('sukses') ?>"></div>
    <?php endif ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('auth/registrasi') ?>" class="btn btn-primary">Tambah Pengurus</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-capitalize text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. Handphone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Foto</th>
                                        <th>Aktivasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['nik'] ?></td>
                                            <td><?= $row['handphone'] ?></td>
                                            <td><?= $row['jenis_kelamin'] ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/upload_image/') ?><?= $row['gambar'] ?>" class="img-fluid" style="width: 60px; height: 80px">
                                            </td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">ON/OFF</label>
                                                </div>
                                            </td>
                                            <td style="width: 190px;">
                                                <a href="" class="btn btn-warning mr-1 edit" data-toggle="modal" data-target="#modal_pengurus" data-link="edit_pengurus" data-id="<?= $row['id'] ?>">Ubah</a>
                                                <a href="<?= base_url('admin/delete_pengurus/') ?><?= $row['id'] ?>" class="btn btn-danger ml-1 hapus">hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_pengurus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kandidat RT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <span class="col-sm-10 offset-3 error_nama eror text-danger mb-n4"></span>
                    </div>
                    <div class="form-group row">
                        <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nik" id="nik">
                        </div>
                        <span class="col-sm-9 offset-3 error_nik eror text-danger mb-n4"></span>
                    </div>
                    <div class="form-group row">
                        <label for="handphone" class="col-sm-3 col-form-label">No HP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="handphone" id="handphone">
                        </div>
                        <span class="col-sm-9 offset-3 error_handphone eror text-danger mb-n4"></span>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label pr-1">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="custom-select shadow-none" name="jenis_kelamin" id="jenis_kelamin">
                                <option disabled selected>Jenis Kelamin</option>
                                <option value="laki-laki" name="laki-laki">Laki - laki</option>
                                <option value="perempuan" name="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="label_gambar" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="label_gambar">Choose file</label>
                            </div>
                        </div>
                        <span class="col-sm-10 offset-2 error_gambar eror text-danger mb-n4"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="proses_edit" data-link="proses_edit_pengurus">Edit</button>
            </div>
        </div>
    </div>
</div>