<?php

require_once('../koneksi.php');

    if($_SERVER['REQUEST_METHOD'] == "POST" ){

        // Ambil Semua Data Inputan
    $nama = $_POST['input_nama_produk'];
    $harga = $_POST['input_harga_produk'];
    $stok = $_POST['input_stok_produk'];
    $deskripsi = $_POST['input_deskripsi_produk'];

        // Ambil Data Input
    $foto_produk = $_FILES['input_foto_produk']['name'];
    $tmp = $_FILES['input_foto_produk']['tmp_name']; // file tempory yg diupload

        // Buat Nama Baru
    $nama_baru = date('dmYHis').$foto_produk;

        // Upload File Ke Folder, gunakan nama baru dan file tempory
    move_uploaded_file($tmp, '../uploads/produk/'.$nama_baru);

        // Buat Query Insert Ke Tabel Produk
    $query = "INSERT INTO tbl_produk
    (nama_produk, harga_produk, deskripsi, foto_produk, stok_produk) # nama koloom tbl_produk 
    VALUES ('$nama', '$harga', '$deskripsi', '$nama_baru', '$stok')"; # variabel yg berisi value dari input


     // eksekusi query
    $result = mysqli_query($koneksi, $query); // return bool - true or false

        // jika proses query berhasil
    if ($result) {
            echo "<script>alert('Data Berhasil ditambahkan');
        window.location.href='../index.php?aksi=tampil_produk'</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan');
        window.location.href='../index.php?aksi=tambah_produk'</script>";
        }

    var_dump($query);

}

;?>