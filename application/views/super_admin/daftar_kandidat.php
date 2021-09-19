<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kandidat RT</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Kandidat</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-capitalize text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>No. Handphone</th>
                                        <th>Foto</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) : ?>
                                        <tr>
                                            <td><?= $row['no_urut'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['nik'] ?></td>
                                            <td><?= $row['handphone'] ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/upload_kandidat/') ?><?= $row['foto'] ?>" class="img-fluid" style="width: 60px; height: 80px">
                                            </td>
                                            <td><?= $row['alamat'] ?></td>
                                            <td style="width: 190px;">
                                                <a href="" class="btn btn-warning mr-1">Ubah</a>
                                                <a href="" class="btn btn-danger ml-1">hapus</a>
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