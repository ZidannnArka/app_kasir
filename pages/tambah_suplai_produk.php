<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Suplai Produk</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="proses/tambah_suplai.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" name="tanggal_order" value="<?= date('D, d M Y'); ?>"
                                    class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Order</label>
                                <input type="text" name="nomor_order"
                                    value="#<?= strtoupper(substr(uniqid(), 4, 6)); ?>" class="form-control" readonly>
                                <!-- Fungsi strtoupper adalah membuat String menjadi besar semua -->
                                <!-- Fungsi disabled mempatenkan/ membuat kata/huruf yg tdk bisa diubah -->
                                <!-- readonly fungsi nya hanya untuk menampilkan tapi masih bisa digunaka -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pengirim</label>
                                <input type="text" name="nama_pengirim" id="nama_pengirim_id" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Ekspedisi</label>
                                <input type="text" name="nama_ekspedisi" id="nama_ekspedisi_id" class="form-control">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4>Data Produk</h4>
                    <hr>

                    <table class="table table-bordered">
                        <?php 
                        // Query ambil semua data produk
                        $query = "SELECT * FROM tbl_produk";
                        $result = mysqli_query($koneksi, $query);
                        foreach ($result as $row) { ?>
                        <tr>
                            <!-- Foto Produk -->
                            <td>
                                <img src="./uploads/produk/<?= $row['foto_produk']; ?>" width="70px" class="img-fluid"
                                    alt="">
                            </td>
                            <!-- Nama Produk -->
                            <td><?= $row['nama_produk']; ?></td>
                            <td>
                                <div class="form-group">
                                    <label for="">Stok untuk dibeli :</label>
                                    <input type="hidden" name="id_produk[]" value="<?= $row['id_produk']; ?>">
                                    <input type="number" min="0" max="9999" value="0" name="stok_dibeli[]"
                                        class="form-control">
                                </div>
                            </td>
                        </tr>
                        <?php } ;?>
                    </table>

                    <br>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary px-5">
                            Buat Orderan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>