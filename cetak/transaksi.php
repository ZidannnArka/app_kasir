<?php
include_once('../koneksi.php');

// Tangkap id dari url
$id_pembelian = $_GET['id'];

// Query ambil data pembelian
$query = "SELECT * FROM tbl_pembelian WHERE id_pembelian = $id_pembelian";

// eksekusi query
$result = mysqli_query($koneksi, $query)->fetch_assoc();

//ambil data di item pembelian
$query_2 = "SELECT * FROM tbl_item_pembelian JOIN tbl_produk ON tbl_item_pembelian.id_produk = tbl_produk.id_produk  WHERE id_pembelian = $id_pembelian";

// eksekusi query 2
$result_item = mysqli_query($koneksi, $query_2);
;?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> Cetak Transaksi <?= $result['invoice']; ?></title>
</head>

<body>
    <center>
        <h1 style="margin: 0;">TOKO KITA SEJAHTERA</h1>
        <span>Jl. Pemuda, No.31, Cirebon, Jawa Barat</span>
        <br>
        <span>0891-2222-6767</span>
        <div style="border-bottom: 1px dashed black;margin:10px 0px"></div>
    </center>
    <br>
    <table width="100%">
        <?php
    // Deklarasi Awal total
        $total = 0; 
        
        foreach ($result_item as $row) { 
            
            // <!-- Hitung Total Dari Semua Item  --> 
            $total += $row['jumlah_total'];
            
            ;?>
        <tr>
            <td style="width : 50%">
                <?= $row['nama_produk']; ?>
            </td>
            <td style="width : 20%">
                x<?= $row['jumlah_item']; ?>
            </td>
            <td style="width : 30%" align="right">
                Rp<?= number_format($row['jumlah_total'], 2); ?>
            </td>
        </tr>
        <?php } ;?>
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td style="width : 50%">
                Total
            </td>
            <td style="width : 20%">
            </td>
            <td style="width : 30%" align="right">
                Rp<?= number_format($total, 2); ?>
            </td>
        </tr>
        <tr>
            <td style="width : 50%">
                Jumlah Pembayaran
            </td>
            <td style="width : 20%">
            </td>
            <td style="width : 30%" align="right">
                Rp<?= number_format($result['pembayaran'], 2); ?>
            </td>
        </tr>
        <tr>
            <td style="width : 50%">
                Kembalian
            </td>
            <td style="width : 20%">
            </td>
            <td style="width : 30%" align="right">
                Rp<?= number_format($result['pembayaran']- $total, 2); ?>
            </td>
        </tr>
    </table>

    <br>
    <hr>
    <br>
    <center>
        <h2>Terimakasih</h2>
        <span><?= date('Y-m-d-H:i:s'); ?></span>
    </center>
    <script>
    window.print();
    </script>
</body>

</html>