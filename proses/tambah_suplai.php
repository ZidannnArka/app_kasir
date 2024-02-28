<?php 
// panggil koneksi  database
include '../koneksi.php';

// ambil data dari form
$nama_pengirim = $_POST['nama_pengirim'];

$nomor_order = $_POST['nomor_order'];

// Convert data tanggal ke format yg sesuai dgn di database
$tanggal_order = date('Y-m-d', strtotime($_POST['tanggal_order']));
// strtotime adalah fungsi untuk mengubah string menjadi format tanggal (WED, 21 Feb 2024) WED dan Feb disini adalah String yg diubah

$nama_ekspedisi = $_POST['nama_ekspedisi'];

// eksekusi query
$query = "INSERT INTO tbl_suplai_produk (tanggal_order, nomor_order, nama_pengirim, nama_ekspedisi)
            VALUES ('$tanggal_order', '$nomor_order', '$nama_pengirim', '$nama_ekspedisi')";

$insert = mysqli_query($koneksi, $query);

// ini data isinya array
$id_produk = $_POST['id_produk'];
$stok = $_POST['stok_dibeli'];

// buat array kosong buat nampung data
$data_item = [];

// Perulangan sebanyak isi pada array id_produk
for ($i = 0; $i < count($id_produk); $i++) {
 
    // jika inputan 0, berarti tidak ada yg beli
    if ($_POST['stok_dibeli'][$i] == 0) {
        continue;
    } else {


        // jika inputan lebih dari 0, berarti ada yg beli

// jika inputan lebih dari 0, berarti beli

            // pilih data produk berdasarkanid_produk
    $produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE id_produk = '$id_produk[$i]'")->fetch_assoc();

    // buat data stok baru
    $stok_baru = $produk['stok_produk'] + $stok[$i];
    
    // Update Stok baru Produk dan input database
    $update_stok = mysqli_query($koneksi, "UPDATE tbl_produk SET stok_produk = 
    '$stok_baru' WHERE id_produk = '$id_produk[$i]'");


        
         //eksekusi query
        $query = "INSERT INTO tbl_item_suplai_produk (nomor_order, id_produk, jumlah_stok)
        VALUES ('$nomor_order', '$id_produk[$i]', '$stok[$i]')";
        mysqli_query($koneksi, $query);
    }
}

 if ($insert) {
            echo "<script>alert('Data berhasil disimpan');
        window.location.href='../index.php?aksi=tampil_suplai_produk'</script>";
        } else {
            
    
            echo "<script>alert('Data gagal disimpan');
        window.location.href='../index.php?aksi=tambah_suplai_produk'</script>";
        }
// get data item yg banyak


;?>