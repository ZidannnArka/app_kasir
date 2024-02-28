<?php

include_once('../koneksi.php');

// ambil id yg dikirim melalui URL
$id = $_GET['id'];

// ambil data berdasarkan id
$query = "SELECT * FROM tbl_produk WHERE id_produk = '$id'";

// Eksekusi Query
$result = mysqli_query($koneksi, $query)->fetch_assoc(); // return objek

//cek file, apakah ada difolder
if (file_exists("../uploads/produk/" . $result['foto_produk'])) {
    // jika ada, hapus file tersebut
    unlink("../uploads/produk/" . $result['foto_produk']);
}

// buat query untuk menghapus data dari database, table tbl_produk
$query = "DELETE FROM tbl_produk WHERE id_produk = '$id'";

// menghapus data dari tbl_produk dimana id_produk memilikii nilai $id
// value dari $id akan berubah sesuai dengan id yang dikirim melalui URL 

// Eksekusi query 
$result = mysqli_query($koneksi, $query); // return bool - true or false

// jika proses query berhasil
    if ($result) {
            echo "<script>alert('Data Berhasil dihapus');
        window.location.href='../index.php?aksi=tampil_produk'</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');
        window.location.href='../index.php?aksi=tampil_produk'</script>";
        }

;?>