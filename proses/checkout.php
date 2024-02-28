<?php 

include_once('../koneksi.php');
session_start();

// Menangkap Data Dari Form
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];

$invoice = "INV" . date('Ymd') . "0" . rand(10000, 99999);

// Jumlah Bayar
$input_jumlah_pembayaran = $_POST['input_jumlah_pembayaran'];

// Ambil ID User
$id_user = $_SESSION['data_user']['id_user'];

// Query Insert data ke database - tbl_pembelian
$query = "INSERT INTO tbl_pembelian (nama, id_user, invoice, no_hp, pembayaran) VALUES ('$nama', '$id_user','$invoice','$no_hp', '$input_jumlah_pembayaran')";

// Eksekusi Query Insert Data Ke Database
$result = mysqli_query($koneksi, $query);

// Last Insert ID Untuk Ambil Data Terakhir Di Inputkan
$id_pembelian = mysqli_insert_id($koneksi);

// Ambil Data Produk Dari SESSION
$keranjang = $_SESSION['keranjang'];

foreach($keranjang as $id_produk => $jumlah_beli) {
    // Query Ambil Data Produk
    $query = "SELECT * FROM tbl_produk WHERE id_produk = $id_produk";

    // Eksekusi Query
    $produk = mysqli_query($koneksi, $query)->fetch_assoc();

    // Hitung Subtotal
    $subtotal = $produk['harga_produk'] * $jumlah_beli;

    // Query Insert Data Ke Database - tbl item pembelian
    $query = "INSERT INTO tbl_item_pembelian (id_pembelian, id_produk, jumlah_item, jumlah_total)
    VALUES ('$id_pembelian', '$id_produk', '$jumlah_beli', '$subtotal')"; 

    // Eksekusi Query Insert Data Ke Database
    $result = mysqli_query($koneksi, $query);

    $stok = $produk['stok_produk'] - $jumlah_beli;
    $update = mysqli_query($koneksi, "UPDATE tbl_produk SET stok_produk = $stok WHERE id_produk= $id_produk ");
}




// Hitung Kembalian
$kembalian = $input_jumlah_pembayaran - $subtotal;

//if($result){
    // Kosongkan Keranjang
    unset($_SESSION['keranjang']);

    // Tampilkan Alert
echo "<script>
    alert('Transaksi Selesai!');
    alert('Kembalian : Rp" . number_format($kembalian, 2) . "');
    window.location.href='../index.php?aksi=tambah_transaksi';
    </script>"
    // }else {
//         echo "<script>alert('Transaksi Gagal!');</script>";
//         echo "<script>window.location.href='../index.php?aksi=tambah_transaksi';</script>";
//     }


;?>