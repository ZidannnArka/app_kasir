<?php 

// Aktifkan Session php
session_start();

// Include file koneksi
include('../koneksi.php');

// inisialisasi session keranjang
// if (!isset($_SESSION['keranjang'])) {
//     $_SESSION['keranjang'] = [];
// }

// Ambil id produk dari input hidden yg dikirim
$id_produk = $_GET['id_produk'];

// Ambil data dari inputan
$jumlah = (int)$_GET['input_qty'];

// Jika ID Produk Sudah Dalam Keranjang
if(isset($_SESSION['keranjang'][$id_produk])) {
    // Maka Update Jumlah Produk
    $_SESSION['keranjang'][$id_produk] += $jumlah;
} else {
    // Jika ID Produk Belum Ada Di Keranjang
    $_SESSION['keranjang'][$id_produk] = $jumlah;
}
echo "<script>alert('produk berhasil dimasukkan ke dalam keranjang!');
   window.location.href='../index.php?aksi=tambah_transaksi'</script>";








// // Query ambil produk
// $query = "SELECT * FROM tbl_produk WHERE id_produk = $id_produk";

// // Ambil data produk dari database
// $result = mysqli_query($koneksi, $query)->fetch_assoc();

// var_dump($result);

// $data = [
//     'id_produk' => $id_produk,
//     'nama_produk' => $result['nama_produk'],
//     'harga_produk' => $result['harga_produk'],
//     'jumlah' => $jumlah,
//     'subtotal' => $result['harga_produk'] * $jumlah
// ];

// var_dump($data);
// foreach ($_SESSION['keranjang'] as $key => $value) {
//     if ($value['id_produk'] == $id_produk) {
//         // jika produk sudah di keranjang
//         // maka update jumlah produk
//         $_SESSION['keranjang'][$key]['jumlah'] += $jumlah;
//         $_SESSION['keranjang'][$key]['subtotal'] += $result['harga_produk'] * $jumlah;
//         echo "<script>alert('produk berhasil dimasukkan ke dalam keranjang!');
//         window.location.href='../index.php?aksi=tambah_transaksi'</script>";
//     } else {
//         $_SESSION['keranjang'][] = $data;
//         echo "<script>alert('produk berhasil dimasukkan ke dalam keranjang!');
//         window.location.href='../index.php?aksi=tambah_transaksi'</script>";
//     }
// }
// var_dump($_SESSION['keranjang']);
// ?>