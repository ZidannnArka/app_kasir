<?php 

// ambil id dari URL yg dikirim
$id = $_GET['id'];

// ambil data bedasarkan id
$result = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk = '$id'")->fetch_assoc();

;?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="index.php?aksi=tambah_transaksi" class="btn btn-sm btn-transparent">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img class="card-img-top" src="uploads/produk/<?= $result['foto_produk']; ?>" alt=""
                            width="100%" class="img-fluid">
                    </div>
                    <div class="col-6">
                        <h1><?= $result['nama_produk']; ?></h1>
                        <h3 class="text-warning">Rp<?= number_format($result['harga_produk'], 2); ?></h3>
                        <p><?= $result['deskripsi']; ?></p>

                        <br>

                        <form action="./proses/tambah_keranjang.php" method="get">
                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="number" name="input_qty" id="qty" class="form-control w-25" value="1">

                                <!-- Menyimpan id produk sebagai key -->
                                <input type="hidden" value="<?= $result['id_produk'] ?>" name="id_produk">
                                <small>Sisa : <?= $result['stok_produk']; ?></small>
                            </div>
                            <div class=" form-group">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    Masukkan Keranjang
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Beli Sekarang
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>