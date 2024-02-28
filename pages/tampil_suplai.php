<?php

?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Semua Transaksi</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Order</th>
                                <th>Detail</th>
                                <th>Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // agar tidak bertabrakan (fungsi : include_once)
                            include_once('koneksi.php');
                            // Ambil Semua Data Dari DataBase, tbl_pembelian
                            $query = "SELECT * FROM tbl_suplai_produk";
                            // eksekusi query
                            $result = mysqli_query($koneksi, $query); 

                            foreach($result as $i => $row) :
                                // get item yg di beli saat suplai
                                $items = mysqli_query($koneksi, "SELECT * FROM tbl_item_suplai_produk a JOIN tbl_produk b ON a.id_produk=b.id_produk WHERE nomor_order = '$row[nomor_order]'");
                                
                            ;?>
                            <tr>
                                <td><?= $i += 1 ;?></td>
                                <td><strong><?= $row['nomor_order'] ;?></strong></td>
                                <td><strong><?=  $row['nama_pengirim'] ;?></strong>
                                    <br>
                                    <small><?= date('D, d m Y', strtotime($row['tanggal_order'])) ;?></small>
                                </td>
                                <td>
                                    <strong>Item Dibeli</strong>
                                    <table class="table table-sm table-bordered">
                                        <?php 
                                        // subtotal deklarasi awal adalah 0
                                        $sub_total = 0;
                                        foreach($items as $item) {
                                            // mencari subtotal pada tiap item
                                            $sub_total = $item['jumlah_stok'] * $item['harga_produk'];
                                        
                                        ;?>

                                        <tr>
                                            <td><?= $item['nama_produk']; ?></td>
                                            <td><?= $item['harga_produk']; ?></td>
                                            <td><?= $item['jumlah_stok']; ?></td>
                                            <td><?= $sub_total; ?></td>
                                        </tr>
                                        <?php } ;?>
                                    </table>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

                <a name="" id="" class="btn btn-primary" href="index.php?aksi=tambah_suplai_produk" role="button">
                    <i class="fa fa-plus" aria-hidden="true">
                        Tambah
                    </i>
                </a>

            </div>
        </div>
    </div>
</div>