<?php 
// berisi file koneksi php ke MySQL database
// koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'app_kasir'; // database yang kita pilih

$koneksi = mysqli_connect($host, $user, $pass, $db);

// mengecek koneksi ke database, apakah berhasil?
if (!$koneksi) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

// // Check Login
// // Cek apakah session login sudah ada
// if (!isset($_SESSION['login'])) {
//     // jika belum ada, maka redirect ke halaman login
//     header('location: login.php');
//     exit;
// }
;?>