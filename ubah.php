<?php
include 'layout/header.php';

if (!isset($_GET['id_barang'])) {
    echo "<script>
        alert('ID Barang tidak ditemukan');
        document.location.href = 'index.php';
    </script>";
    exit;
}
// mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];

// Query data barang berdasarkan id nya
$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang");
if (empty($barang)) {
    echo "<script>
        alert('Data barang tidak ditemukan');
        document.location.href = 'index.php';
    </script>";
    exit;
}

$barang = $barang[0];

// cek apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
    if (updateBarang($_POST) > 0) {
        echo "<script>
        alert('data barang berhasil diubah');
        document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
        alert('data barang gagal diubah');
        document.location.href='index.php';
        </script>";
    }
}
?>
<h1 class="text-center">ini form ubah barang</h1>
<div class="container mt-5">
    <h1>Ubah Barang</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama'] ?>" placeholder="nama barang" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah'] ?>" placeholder="jumlah barang ...." required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga'] ?>" placeholder="harga barang ...." required>
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
    </form>
</div>