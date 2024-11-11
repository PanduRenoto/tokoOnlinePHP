<?php 
include "../../koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $foto_produk = $_POST['foto_produk'];

    if(empty($nama_produk)){
        echo "<script>alert('Nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else if(empty($deskripsi)){
        echo "<script>alert('Deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else if(empty($harga)){
        echo "<script>alert('Harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else if(empty($foto_produk)){
        echo "<script>alert('Foto produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else {
        $qry_tambah = "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk) VALUES ('$nama_produk', '$deskripsi', '$harga', '$foto_produk')";
        if ($conn -> query($qry_tambah) === TRUE) {
            echo "<script>alert('Berhasil tambah produk');location.href='tampil_produk_petugas.php'</script>";
        } else {
            echo "Kesalahan: " . $qry_tambah . "<br>" . $conn -> error;
        }
    
        $conn -> close();
    }
}
?>