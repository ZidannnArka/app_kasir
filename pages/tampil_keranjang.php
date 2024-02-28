<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Keranjang Belanja</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">

                <div class="table">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Produk</th>
                            <th class="text-right">Harga</th>
                            <th class="text-right">Jumlah</th>
                            <th class="text-right">Subtotal</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                        $total = 0;
                        $no = 0;

                        // Check apakah ada data di SESSION Keranjang
                        //
                        if (isset($_SESSION['keranjang'])) {

                            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah_beli) {
                                // Query ambil data produk
                                $query = "SELECT * FROM tbl_produk WHERE id_produk = $id_produk";

                                // Eksekusi Query
                                $result = mysqli_query($koneksi, $query)->fetch_assoc();

                                // Hitung Subtotal
                                $subtotal = $result['harga_produk'] * $jumlah_beli;


                                // jumlahkan subtotal
                                $total += $subtotal;
                                ; ?>

                        <tr>
                            <td>
                                <?= $no += 1; ?>
                            </td>

                            <td>
                                <img src="./uploads/produk/<?= $result['foto_produk']; ?>" width="100px"
                                    class="img-fluid" alt="">
                            </td>

                            <td><?= $result['nama_produk']; ?></td>

                            <td class="text-right">
                                Rp
                                <?= number_format($result['harga_produk'], 2); ?>
                            </td>

                            <td class="text-right"><?= number_format($jumlah_beli); ?></td>

                            <td class="text-right">
                                Rp
                                <?= number_format($subtotal, 2); ?>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm"
                                    href="./proses/delete_keranjang.php?id_produk=<?= $id_produk; ?>" role="button"
                                    onclick="return confirm('Ingin Menghapus Data Ini?')">Hapus</a>
                            </td>
                        </tr>

                        <?php } ?>

                        <?php }
                        else {
                            echo "<tr><td colspan='7' class='text-center'>Keranjang Kosong</td></tr>";
                        }
                        ;?>

                        <tfoot>
                            <tr>
                                <td colspan='5' class="text-right">Jumlah Total</td>
                                <td class="text-right">Rp<?= number_format($total, 2); ?></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td colspan="7">
                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modelId">
                                        Selesaikan Pesanan</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selesaikan Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./proses/checkout.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" id="" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor HP</label>
                                <input type="text" name="no_hp" id="" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Jumlah Pembayaran</label>
                                <input type="number" name="input_jumlah_pembayaran" min="<?= $total ?>" id=""
                                    class=" form-control form-control-lg mb-3" placeholder="">
                                <h2 class="text-center">Total Belanja : <span
                                        class="text-danger">Rp<?= number_format($total, 2); ?></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Selesaikan</button>
                </div>
            </form>
        </div>
    </div>
</div>