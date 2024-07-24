<?php
include 'config/app.php';
// Menerima id_barang yang dipilih pengguna
if (isset($_GET['id_barang'])) {
    $id_barang = (int)$_GET['id_barang'];

    if (deleteBarang($id_barang) > 0) {
        echo "<script>
            alert('Data barang berhasil dihapus');
            document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            document.location.href='index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID barang tidak ditemukan');
        document.location.href='index.php';
    </script>";
}
