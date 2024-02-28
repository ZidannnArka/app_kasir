<?php
include_once('koneksi.php');

// tangkap inputan dari url
$tanggal_awal = $_GET['tanggal_awal'] ?? "";  // ini adalah jka tidak ada data, maka kosong
$tanggal_akhir = $_GET['tanggal_akhir'] ?? "";  // 

//jika tanggal_awal dan tanggal_akhir tidak sama dengan kosong
if ($tanggal_awal != "" and $tanggal_akhir != "") {
    // query sql amb
    $query = "SELECT * FROM tbl_pembelian WHERE tanggal_transaksi BETWEEN '$tanggal_awal' AND 'tanggal_akhir'";

    $title = "Laporan Penjualan dari tanggal $tanggal_awal sampai $tanggal_akhir";
} else {
    // Ambil Semua Data Dari DataBase, tbl_pembelian
    $query = "SELECT * FROM tbl_pembelian";

    $title = "Laporan Penjualan";

    
}


// eksekusi query
$result = mysqli_query($koneksi, $query); 
?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ;?></h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="index.php" method="get">

                    <!-- tambahkan buat url -->
                    <input type="hidden" name="aksi" value="laporan_penjualan">

                    <div class="row">
                        <div class="col-auto">
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="tanggal_awal" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- memberi spasi agar tampilan rapih -->
                            <label for="">&nbsp;</label>
                            <br>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                    aria-hidden="true"></i>
                                Cari Data
                            </button>
                        </div>

                        <?php
                        if (isset($_GET['tanggal_awal']) and isset($_GET['tanggal_akhir'])) {
                            ; ?>
                        <div class="col-auto">
                            <!-- memberi spasi agar tampilan rapih -->
                            <label for="">&nbsp;</label>
                            <br>
                            <a href="cetak/laporan.php?tanggal_awal=<?= $tanggal_awal ?>&tanggal_akhir=<?= $tanggal_akhir; ?>"
                                target="_blank" class="btn btn-success">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                Cetak Data
                            </a>
                        </div>
                        <?php } ;?>

                    </div>
                </form>


                <div class="table-responsive">
                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Invoice</th>
                                <th>Nama Pembeli</th>
                                <th>No HP</th>
                                <th>Pembayaran</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Perulangan Data Dari DataBase -->
                            <?php foreach($result as $i => $row) {

                            //cari total pembelian dari jumlah total di tbl_item_pembelian -->
                                $query = "SELECT SUM(jumlah_total) AS total_pembelian FROM tbl_item_pembelian WHERE id_pembelian = $row[id_pembelian]";

                            // Eksekusi Query
                                $result_2 = mysqli_query($koneksi, $query)->fetch_assoc();
                            
                            // Ambil Data Dari Total pembelian
                                $total_pembelian = $result_2['total_pembelian'];

                                ?>
                            <tr>
                                <!-- Membuat Angka Berurutan Dari 1 -->
                                <td>
                                    <?= $i += 1; ?>
                                </td>
                                <td><?= $row['invoice'];?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['no_hp']; ?></td>
                                <td>
                                    <strong>
                                        Total Belanja :
                                    </strong>
                                    <span class="text-danger">
                                        Rp<?= number_format ($total_pembelian, 2); ?>
                                    </span>
                                    <br>

                                    <strong>
                                        Total Bayar :
                                    </strong>
                                    <span class="text-warning">
                                        Rp<?= number_format ($row['pembayaran'], 2); ?>
                                    </span>
                                    <br>

                                    <strong>
                                        Kembalian :
                                    </strong>
                                    <span class="text-success">
                                        Rp<?= number_format ($row['pembayaran'] - $total_pembelian, 2); ?>
                                    </span>
                                    <br>
                                </td>
                            </tr>

                            <?php } ;?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>