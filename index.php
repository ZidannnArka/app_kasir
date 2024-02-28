<?php 

//panggil koneksi ke database
include('koneksi.php');
session_start();

//include file check login
include('check_login.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>App Kasir</title>

    <?php include('components/css.php') ;?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('components/sidebar.php')  ;?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('components/topbar.php')  ;?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <?php

                    $aksi = $_GET['aksi'] ?? "";

                    switch ($aksi) {
                        case 'tambah_produk':
                            include('pages/tambah_produk.php');
                            break;

                        case 'tampil_produk':
                            include('pages/tampil_produk.php');
                            break;

                        case 'cari_produk':
                            include('pages/cari_produk.php');
                            break;

                        case 'edit_produk':
                            include('pages/edit_produk.php');
                            break;

                        case 'detail_produk':
                            include('pages/detail_produk.php');
                            break;

                        case 'tambah_transaksi':
                            include('pages/tambah_transaksi.php');
                            break;

                        case 'tampil_keranjang':
                            include('pages/tampil_keranjang.php');
                            break;

                        case 'tampil_transaksi':
                            include('pages/tampil_transaksi.php');
                            break;

                        case 'detail_transaksi':
                            include('pages/detail_transaksi.php');
                            break;

                        case 'laporan_penjualan':
                            include('pages/laporan_penjualan.php');
                            break;

                        case 'tambah_suplai_produk':
                            include('pages/tambah_suplai_produk.php');
                            break;

                        case 'tampil_suplai_produk':
                            include('pages/tampil_suplai.php');
                            break;

                        default:
                            include('pages/dashboard.php');
                            break;
                    }
                    
                    ;?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('components/footer.php')  ;?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include ('components/script.php') ;?>
</body>

</html>