<?php
require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" ){

    // ambil id dari URL yg dikirim
    $id = $_GET['id'];

    // ambil semua data inputan
    $nama = $_POST['input_nama_produk'];
    $harga = $_POST['input_harga_produk'];
    $stok = $_POST['input_stok_produk'];
    $deskripsi = $_POST['input_deskripsi_produk'];

    // query update
    $query = "UPDATE tbl_produk SET nama_produk = '$nama',
    harga_produk = '$harga', deskripsi = '$deskripsi',
    stok_produk = '$stok' WHERE id_produk = '$id'";

    // eksekusi query
    $result = mysqli_query($koneksi, $query); // return bool - true or false

// jika proses query berhasil
    if ($result) {
            echo "<script>alert('Data Berhasil dihapus');
        window.location.href='../index.php?aksi=tampil_produk'</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');
        window.location.href='../index.php?aksi=edit_produk&id=$id'</script>";
        }
}
;?>