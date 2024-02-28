<?php

// Nyalakan SESSION
session_start();

// Tangkap Id Produk Dari URL
$id_produk = $_GET['id_produk'];

// Hapus Produk Dari Keranjang
unset($_SESSION['keranjang'][$id_produk]);

// Redirect Ke Halaman Tampil Keranjang
echo "<script>alert('produk berhasil dihapus dari keranjang!');
   window.location.href='../index.php?aksi=tampil_keranjang'</script>";


;?>