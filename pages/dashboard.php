<?php

include_once('koneksi.php');

$data = [
    'Januari' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 1 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Februari' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 2 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Maret' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 3 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'April' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 4 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Mei' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 5 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Juni' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 6 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Juli' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 7 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Agustus' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 8 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'September' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 9 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Oktober' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 10 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'November' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 11 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
    'Desember' => mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_penjualan FROM tbl_pembelian WHERE MONTH(tanggal_transaksi) = 12 AND YEAR(CURRENT_DATE)")->fetch_assoc()['jumlah_penjualan'],
];
//var_dump($data);
// GET ARRAY KEY AND VALUES
$list_label_penjualan = array_keys($data);
$list_data_penjualan = array_values($data);



// --------------------------------------------
// Query dapet jumlah terjual dan nama produk
$query = "SELECT SUM(jumlah_item) as jumlah_item, tbl_produk.nama_produk
FROM tbl_item_pembelian LEFT JOIN tbl_produk
ON tbl_item_pembelian.id_produk=tbl_produk.id_produk
GROUP BY tbl_item_pembelian.id_produk
ORDER BY jumlah_item DESC LIMIT 5";

//Eksekusi Query
$result = mysqli_query($koneksi, $query);

$list_data = [];
$list_label = [];

//var_dump($result->fetch_assoc());
// Bikin Jadi Array Satu Dimensi
// Contoh
// $list_data = [10, 20, 30, 40, 50];
foreach ($result as $row) {
$list_data[] = $row ['jumlah_item'];
$list_label[] = $row ['nama_produk'];
}                       

// // Query dapat jumlah penjualan perbulan
// $query = "SELECT MONTH(tanggal_transaksi) AS bulan,
//             COUNT(*) AS jumlah_penjualan
//             FROM tbl_pembelian
//             WHERE YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE)
//             GROUP BY MONTH(tanggal_transaksi)";

// // Eksekusi Query
// $result_2 = mysqli_query($koneksi, $query);

// $list_data_penjualan = [];
// $list_label_penjualan = [];

// // Bikin jadi array satu dimensi
// //Contoh
// foreach ($result_2 as $row) {
//     $list_data_penjualan[] = $row['jumlah_penjualan'];
// }
// // hitung sisa bulan yg kosong
// $count = 12 - count($list_data_penjualan);

// // isi dengan 0
// if ($count > 0) {
//     for ($i = 0; $i < $count; $i++) {
//         $list_data_penjualan[] = 0;
//     }
// }

// var_dump($list_data_penjualan);

;?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-12">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pendapatan</div>
                        <div class="h4 mb-3 font-weight-bold text-gray-800">
                            <?php
                                    $query = "SELECT SUM(jumlah_total) AS amount FROM tbl_item_pembelian";
                                    $total_pendapatan = mysqli_query($koneksi, $query)->fetch_assoc();
                                    echo "Rp" . number_format($total_pendapatan['amount'], 0);
                            ?>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Pengeluaran</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            <?php
                                    $query = "SELECT SUM(jumlah_stok * harga_produk) AS amount FROM tbl_item_suplai_produk JOIN tbl_produk ON tbl_item_suplai_produk.id_produk=tbl_produk.id_produk";
                                    $total_pendapatan = mysqli_query($koneksi, $query)->fetch_assoc();
                                    echo "Rp" . number_format($total_pendapatan['amount'], 0);
                            ?>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Produk Aktif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                    $query = "SELECT COUNT(id_produk) AS total_produk FROM tbl_produk";
                                    echo mysqli_query($koneksi, $query)->fetch_assoc()['total_produk'];;?>

                                </div>
                            </div>
                            <div class="col-auto">

                                <i class="fa fa-boxes fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Transaksi Hari Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                $query = "SELECT COUNT(*) AS total_transaksi FROM tbl_pembelian
                                   WHERE DATE(tanggal_transaksi) = DATE(CURRENT_DATE)";
                                    // eksekusi query
                            $result_3 = mysqli_query($koneksi, $query)->fetch_assoc();
                            echo $result_3['total_transaksi'];
                            ;?>


                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Produk Terjual Habis
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                    $query = "SELECT COUNT(id_produk) AS total_produk FROM tbl_produk WHERE stok_produk = 0";
                                    echo mysqli_query($koneksi, $query)->fetch_assoc()['total_produk'];;?>

                                </div>
                            </div>
                            <div class="col-auto">

                                <i class="fa fa-boxes fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Jumlah Karyawan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php
                                    $query = "SELECT COUNT(id_user) AS total_pengguna FROM tbl_user";
                                    echo mysqli_query($koneksi, $query)->fetch_assoc()['total_pengguna'];;?>

                                </div>
                            </div>
                            <div class="col-auto">

                                <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-7">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penjualan Dalam Setahun</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="penjualan_tahunan"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Produk Terlaris</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="best_selling_product"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito',
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("best_selling_product");
var best_selling_product = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?= json_encode($list_label); ?>,
        datasets: [{
            data: <?= json_encode($list_data); ?>,
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f1f1f1', '#e743a3b'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#1cc88a', '#e743a3b'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: true
        }
    },
});
</script>

<script>
// Area Chart Example
var ctx = document.getElementById("penjualan_tahunan");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($list_label_penjualan); ?>,
        datasets: [{
            label: "Earnings",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?php echo json_encode($list_data_penjualan);?>
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 12
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 10,
                    padding: 10,
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
        }
    }
});
</script>