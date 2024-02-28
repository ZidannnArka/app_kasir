<?php

// agar tidak bertabrakan (fungsi : include_once)
include_once('koneksi.php');

// Tangkap Query pencarian dari url
$cari = $_GET['cari'] ?? "";

// Ambil Semua Data Dari DataBase, tbl_produk
$query = "SELECT * FROM tbl_produk WHERE nama_produk LIKE '%$cari%'";

// eksekusi query
$result = mysqli_query($koneksi, $query); 
?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Menampilkan Pencarian</h1>
    </div>
</div>

<div class="row">
    <?php
    foreach ($result as $row) {
        ?>
    <div class="col-md-3 pb-3">
        <a href="index.php?aksi=detail_produk&id=<?= $row['id_produk']; ?>" style="text-decoration: none;"
            class=" text-dark">
            <div class="card h-100">
                <img class="card-img-top" src="uploads/produk/<?= $row['foto_produk']; ?>" alt="produk" width="auto"
                    height="270px">
                <div class="card-body">
                    <h5 class="card-title"><?= $row ['nama_produk']; ?></h5>
                    <p class="card-text text-warning">Rp. <?= number_format($row['harga_produk'], 2); ?></p>
                </div>
            </div>
        </a>
    </div>
    <?php } ;?>
</div>