<?php
include 'layout/header.php';
$data_barang = select(("SELECT * FROM barang"));
?>

<div class="container mt-5"></div>

<?php
include 'layout/footer.php';
?>