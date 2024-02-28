<?php

include "../koneksi.php";

// Ambil tanggal awal dari URL, dan beri nilai kosong jika belum dideklarasikan di URL
$tanggal_awal = $_GET['$tanggal_awal'] ?? "";
$tanggal_akhir = $_GET['$tanggal_akhir'] ?? "";

// Jika tanggal awal dan tanggal akhir tidak sama dengan kosong (ada isinya)
if($tanggal_awal != "" and $tanggal_akhir != "") {
    
    // Query SQL ambil data dari database, tabel tbl_pembelian
    $query = "SELECT * FROM tbl_pembelian WHERE tanggal_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";

    $title = "Laporan Penjualan dari Tanggal $tanggal_awal sampai tanggal_akhir";
} else {
    // Query SQL
    $query = "SELECT * FROM tbl_pembelian";

    $title = "Laporan Penjualan";
}
$result = mysqli_query($koneksi, $query);
 ?>
<!--tututp php-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <center>
        <h1 style="margin: 0;">TOKO KITA SEJAHTERA</h1>
        <span>Jl. Pemuda, No.31, Cirebon, Jawa Barat</span>
        <br>
        <span>0891-2222-6767</span>
        <div style="border-bottom: 1px dashed black;margin:10px 0px"></div>

        <h2><?= $title; ?> </h2>
    </center>
    <br>

    <table width="100%" cellspacing="0" cellpadding="5" border="1">

        <thead>
            <tr>
                <th>No</th>
                <th>No Invoice</th>
                <th>Nama Pembeli</th>
                <th>No HP</th>
                <th>Pembayaran</th>
            </tr>
        </thead>

        <tbody>
            <!-- Perulangan Data Dari DataBase -->
            <?php
            // deklarasi awal total pendapatan
            $total_pendapatan = 0;
            foreach($result as $i => $row) {

                            //cari total pembelian dari jumlah total di tbl_item_pembelian -->
                                $query = "SELECT SUM(jumlah_total) AS total_pembelian FROM tbl_item_pembelian WHERE id_pembelian = $row[id_pembelian]";

                            // Eksekusi Query
                                $result_2 = mysqli_query($koneksi, $query)->fetch_assoc();
                            
                            // Ambil Data Dari Total pembelian
                                $total_pembelian = $result_2['total_pembelian'];

                            // hitung total pendapatan, menghitung semua total pembelian
                                $total_pendapatan += $total_pembelian;
                                ?>
            <tr>
                <!-- Membuat Angka Berurutan Dari 1 -->
                <td style="text-align: center;">
                    <?= $i += 1; ?>
                </td>
                <td><?= $row['invoice'];?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td style="text-align:right;">
                    <span class="text-danger">
                        Rp<?= number_format ($total_pembelian, 2); ?>
                    </span>
                </td>
            </tr>

            <?php } ;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align:right;"><strong>Total</strong></td>
                <td style="text-align:right;">
                    Rp<?= number_format($total_pendapatan, 2); ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <br><br><br>
    <!-- buat div jadi sebelah kanan, beri jarak biar ga mepet dengan menggunakan padding -->
    <div style=" float : right; padding-right: 100px;">
        <span>Cirebon, <?= date("d M Y"); ?></span>
        <br><br><br>
        <span>Mr Admin</span>
    </div>

    <!-- syarat biar bisa print out -->
    <script>
    window.print();
    </script>
</body>

</html>