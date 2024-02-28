<?php 

// Tangkap ID dari pembelian
$id_pembelian = $_GET['id'];

// Query ambil data pembelian
$query = "SELECT * FROM tbl_pembelian WHERE id_pembelian = $id_pembelian";

// Eksekusi Query
$result = mysqli_query($koneksi, $query)->fetch_assoc();

$query_2 = "SELECT * FROM tbl_item_pembelian JOIN tbl_produk ON tbl_item_pembelian.id_produk = tbl_produk.id_produk  WHERE id_pembelian = $id_pembelian";

// Eksekusi Query
$result_item_pembelian = mysqli_query($koneksi, $query_2);?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Detail Transaksi</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-borderless w-50">
                            <tr>
                                <th>Invoice</th>
                                <th>:</th>
                                <th><?= $result['invoice'] ?></th>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th><?= $result['nama'] ?></th>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <th>:</th>
                                <th><?= $result['no_hp'] ?></th>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>:</th>
                                <th><?= $result['tanggal_transaksi'] ?></th>
                            </tr>
                            <tr>
                                <th>Pembayaran</th>
                                <th>:</th>
                                <th><?= $result['pembayaran'] ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
$no = 1;
$total = 0;
foreach ($result_item_pembelian as $row) :
    $subtotal = $row['harga_produk'] * $row['jumlah_item'];
    $total += $subtotal;?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><?= $row['harga_produk'] ?></td>
                            <td><?= $row['jumlah_item'] ?></td>
                            <td><?= $subtotal ?></td>
                        </tr>
                        <?php endforeach; ;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>