<?php
// function fungsi menampilkan
function select($query)
{
    // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

// fungsi menambahkan databarang
function CreateBarang($post)
{
    global $db;

    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function updateBarang($post)
{
    global $db;

    // Pastikan parameter diakses dengan benar tanpa tanda dolar di dalam tanda kurung siku
    $id_barang = (int)$post['id_barang']; // Casting ke integer untuk keamanan

    $nama = mysqli_real_escape_string($db, $post['nama']);
    $jumlah = mysqli_real_escape_string($db, $post['jumlah']);
    $harga = mysqli_real_escape_string($db, $post['harga']);

    // Query ubah data
    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    // Menjalankan query dan memeriksa apakah berhasil
    if (mysqli_query($db, $query)) {
        return mysqli_affected_rows($db);
    } else {
        // Menangani kesalahan query
        echo "Error: " . mysqli_error($db);
        return -1; // Mengembalikan -1 jika terjadi kesalahan
    }
}

function DeleteBarang($id_barang)
{
    global $db;
    // Pastikan id_barang adalah integer untuk keamanan
    $id_barang = (int)$id_barang;

    // Query hapus data
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    // Menjalankan query dan memeriksa apakah berhasil
    if (mysqli_query($db, $query)) {
        return mysqli_affected_rows($db);
    } else {
        // Menangani kesalahan query
        echo "Error: " . mysqli_error($db);
        return -1; // Mengembalikan -1 jika terjadi kesalahan
    }
}
