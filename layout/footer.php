<div class="container mt-5">
    <h1>Data Barang</h1>
    <hr>
    <a href="tambah.php" class="btn btn-primary mb-1">Tambah</a>
    <table class="table table-striped table-border">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>jumlah</th>
                <th>Harga</th>
                <th>tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_barang as $barang) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $barang["nama"] ?></td>
                    <td><?= $barang["jumlah"] ?></td>
                    <td>Rp. <?= number_format($barang["harga"], 0, ',', '.') ?></td>
                    <td><?= date('d/m/Y | H:i:s', strtotime($barang["tanggal"])) ?></td>
                    <td width="15%" class="text-center">
                        <a href="ubah.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-primary">Ubah</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>