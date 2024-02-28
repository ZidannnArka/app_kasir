<?php

// agar tidak bertabrakan (fungsi : include_once)
include_once('koneksi.php');

// Ambil Semua Data Dari DataBase, tbl_produk
$query = "SELECT * FROM tbl_produk";

// eksekusi query
$result = mysqli_query($koneksi, $query); 
?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Foto</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Perulangan Data Dari DataBase -->
                            <?php foreach($result as $i => $row) {?>

                            <tr>
                                <!-- Membuat Angka Berurutan Dari 1 -->
                                <td>
                                    <?= $i += 1; ?>
                                </td>

                                <td><?= $row['nama_produk']; ?></td>
                                <td>
                                    Rp
                                    <?= number_format ($row['harga_produk'], 2); ?>
                                <td>
                                    <img src="./upload/produk/<?= $row['foto_produk']; ?>" width="100px"
                                        class="img-fluid" alt="">
                                </td>
                                </td>
                                <td><?= number_format($row['stok_produk']); ?></td>
                                <td><?= $row['deskripsi']; ?></td>
                                <td>
                                    <!-- Membuat Link untuk edit dan hapus dengan mengirimkan id_produk melalui URL -->
                                    <a name="" id="" class="btn btn-warning btn-sm"
                                        href="index.php?aksi=edit_produk&id=<?= $row['id_produk']; ?>" role="button">
                                        Edit
                                    </a>
                                    <a name="" id="" class="btn btn-danger btn-sm"
                                        href="proses/delete_produk.php?id=<?= $row['id_produk']; ?>" role="button"
                                        onclick="return confirm('Konfirmasi Jika Yakin Ingin Menghapus!')">
                                        Hapus
                                    </a>

                                </td>
                            </tr>

                            <?php } ;?>
                        </tbody>

                    </table>
                </div>

                <a name="" id="" class="btn btn-primary" href="index.php?aksi=tambah_produk" role="button">
                    <i class="fa fa-plus" aria-hidden="true">
                        Tambah
                    </i>
                </a>

            </div>
        </div>
    </div>
</div>