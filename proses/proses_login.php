<?php

include_once('../koneksi.php');
session_start();

// ambil data dari form 
$email = $_POST['input_email'];
$password = $_POST['input_password'];

// anti sql injection
$email = mysqli_real_escape_string($koneksi, $email);
$password = mysqli_real_escape_string($koneksi, $password);

// Cek apaakah data ada di database
$result = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'")->fetch_assoc();


if($result){
    //buat sesi login
    $_SESSION['login'] = true;
    $_SESSION['data_user'] = $result;
    header('Location: ../index.php');
} else {
    echo "<script>alert('Username/Password Salah!');
    window.location.href='../login.php'</script>";
}
?>