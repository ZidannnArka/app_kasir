<?php 

// Mengaktifkan session php
session_start();

// Hancurkan semua session
session_destroy();

// Redirect ke halaman login
 echo "<script>alert('Anda Telah Keluar');
        window.location.href='../login.php'</script>";


;?>