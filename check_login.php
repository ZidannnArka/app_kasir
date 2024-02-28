<?php 

if (!isset($_SESSION['login'])) {
    // jika belum ada, maka redirect akan ke halaman login
    echo "<script>alert('Silahkan Masuk Terlebih Dahulu!');
    window.location.href='login.php'</script>";
    exit;
}

if ($_SESSION['login'] != true) {
    echo "<script>alert('Silahkan Masuk Terlebih Dahulu!');
    window.location.href='login.php'</script>";
}


;?>