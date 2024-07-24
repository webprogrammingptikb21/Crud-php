<?php
include 'layout/header.php';

$title = 'Daftar Mahasiswa';

// menampilkan data mahasiswa
$dataMahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC");
?>
<div class="container mt-5">
    <h1>Data Mahasiswa</h1>
    <hr>
    <a href="tambahMahasiswa.php" class="btn btn-primary mb-1">Tambah</a>
    <table class="table table-striped table-border" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($dataMahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['prodi'] ?></td>
                    <td><?= $mhs['jk'] ?></td>
                    <td><?= $mhs['telepon'] ?></td>
                    <td class="text-center" width="15%">
                        <a href="detailMahasiswa.php" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="#" class="btn btn-success btn-sm">Ubah</a>
                        <a href="#" class="btn btn-danger btn-sm">Ubah</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include 'layout/footer.php' ?>