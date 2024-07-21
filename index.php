<?php
include 'database.php';
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
}

$data_barang = select(("SELECT * FROM barang"))
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud-php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-success navbar-success">
            <div class="container">
                <a class="navbar-brand" href="#">Crud PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php">Barang</a>
                        <a class="nav-link" href="#">Mahasiswa</a>
                        <a class="nav-link" href="#">Modal</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <h1>Data Barang</h1>
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
                        <td><?= $barang["harga"] ?></td>
                        <td><?= $barang["tanggal"] ?></td>
                        <td width="15%" class="text-center">
                            <a href="#" class="btn btn-primary">Ubah</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>