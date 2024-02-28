<?php

// agar tidak bertabrakan (fungsi : include_once)
include_once('koneksi.php');

// Ambil Semua Data Dari DataBase, tbl_pembelian
$query = "SELECT * FROM tbl_pembelian";

// eksekusi query
$result = mysqli_query($koneksi, $query); 
?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Semua Transaksi</h1>
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
                                <th>No Invoice</th>
                                <th>Nama Pembeli</th>
                                <th>No HP</th>
                                <th>Pembayaran</th>
                                <th style="width:150px">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Perulangan Data Dari DataBase -->
                            <?php foreach($result as $i => $row) {

                            //cari total pembelian dari jumlah total di tbl_item_pembelian -->
                                $query = "SELECT SUM(jumlah_total) AS total_pembelian FROM tbl_item_pembelian WHERE id_pembelian = $row[id_pembelian]";

                            // Eksekusi Query
                                $result_2 = mysqli_query($koneksi, $query)->fetch_assoc();
                            
                            // Ambil Data Dari Total pembelian
                                $total_pembelian = $result_2['total_pembelian'];

                                ?>
                            <tr>
                                <!-- Membuat Angka Berurutan Dari 1 -->
                                <td>
                                    <?= $i += 1; ?>
                                </td>
                                <td><?= $row['invoice'];?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['no_hp']; ?></td>
                                <td>
                                    <strong>
                                        Total Belanja :
                                    </strong>
                                    <span class="text-danger">
                                        Rp<?= number_format ($total_pembelian, 2); ?>
                                    </span>
                                    <br>

                                    <strong>
                                        Total Bayar :
                                    </strong>
                                    <span class="text-warning">
                                        Rp<?= number_format ($row['pembayaran'], 2); ?>
                                    </span>
                                    <br>

                                    <strong>
                                        Kembalian :
                                    </strong>
                                    <span class="text-success">
                                        Rp<?= number_format ($row['pembayaran'] - $total_pembelian, 2); ?>
                                    </span>
                                    <br>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="index.php?aksi=detail_transaksi&id=<?= $row['id_pembelian']; ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        Detail
                                    </a>
                                    <a class=" btn btn-success btn-sm"
                                        href="cetak/transaksi.php?id=<?= $row['id_pembelian']; ?>" role="button"
                                        target="_blank" onclick="return confirm('Ingin Mencetak Data Ini?')">Cetak
                                        <i class="fa fa-print" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php } ;?>
                        </tbody>

                    </table>
                </div>

                <a name="" id="" class="btn btn-primary" href="index.php?aksi=tambah_transaksi" role="button">
                    <i class="fa fa-plus" aria-hidden="true">
                        Tambah
                    </i>
                </a>

            </div>
        </div>
    </div>
</div>