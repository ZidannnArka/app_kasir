<div class="row">
    <div class="col-12">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="./proses/insert_produk.php" method="POST" enctype="multipart/form-data">
                    <div class=" form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="input_nama_produk" id="" class="form-control" placeholder="" required>

                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="number" name="input_harga_produk" id="" class="form-control" placeholder=""
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Produk</label>
                        <input type="number" name="input_stok_produk" id="" class="form-control" placeholder=""
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Produk</label>
                        <input type="text" name="input_deskripsi_produk" id="" class="form-control" placeholder=""
                            required>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Produk</label>
                        <input type="file" name="input_foto_produk" id="" class="form-control" placeholder="" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>