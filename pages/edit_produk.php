<?php
include_once('koneksi.php');

// ambil id dari url yg dikirim
$id = $_GET['id'];

// ambil data bedasarkan id
$result = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk = '$id'")->fetch_assoc();


;?>

<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="./proses/update_produk.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
                    <div class=" form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="input_nama_produk" value="<?= $result['nama_produk']; ?>"
                            class="form-control" placeholder="" required>

                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="number" name="input_harga_produk" value="<?= $result['harga_produk']; ?>"
                            class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Produk</label>
                        <input type="number" name="input_stok_produk" value="<?= $result['stok_produk']; ?>"
                            class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Produk</label>
                        <input type="text" name="input_deskripsi_produk" value="<?= $result['deskripsi']; ?>"
                            class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Produk</label>
                        <input type="file" name="input_foto_produk" value="<?= $result['foto_produk']; ?>"
                            class="form-control" placeholder="">
                        <small class="mt-3">Preview</small> <br>
                        <img src="uploads/produk/<?= $result['foto_produk']; ?>" width="150px" alt=""> <br>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>