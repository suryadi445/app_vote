<section id="halaman_tester">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center font-weight-bold text-capitalize text-dark">Pemilihan Umum RT 02/15 tahun 2023</h3>
            </div>
        </div>

        <!-- alert -->
        <?php if ($this->session->flashdata()) : ?>
            <div class="sukses" data-id="<?= $this->session->flashdata('sukses') ?>"></div>
        <?php endif ?>

        <div class="row card shadow p-3 mb-5 bg-danger rounded">
            <div class="col-md-12">
                <h3 class="text-center mt-1 mb-3">PETUNJUK PELAKSANAAN PEMILU</h3>
                <p>
                    Pelaksanaan pemilihan umum RT 02/15 akan dilaksanakan pada tanggal <b>17 Agustus 2023</b>
                </p>
                <div class="snk">
                    <p>Syarat dan ketentuan: </p>
                    <ul>
                        <li>Setiap Kartu keluarga memiliki hak 1 suara dalam pemilihan RT.</li>
                        <li>Pemilu akan dilakukan dalam waktu 19.00 - 20.00 jam</li>
                        <li>Setiap Nomor Kartu keluarga hanya bisa masuk kedalam sistem 1 kali</li>
                    </ul>
                </div>
                <div class="tata_cara">
                    <p>Tata Cara Pemilihan :</p>
                    <ul>
                        <li>Ada 3 kandidat RT pada pemilu RT 2023</li>
                        <li>Tekan 1 Kali pada area Foto kandidat untuk memilih</li>
                        <li>Pilihan tidak bisa diubah setelah dipilih</li>
                        <li>Pemilih tidak bisa masuk kembali ketika sudah memilih</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <a href="<?= base_url('Vote') ?>" class="btn btn-success mulai_pemilu">Mulai Pemilu</a>
        </div>
    </div>
</section>