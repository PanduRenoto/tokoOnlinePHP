<?php
if ($_POST) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $foto_produk = $_POST['foto_produk'];

    if (empty($nama_produk)) {
        echo "<script>alert('Nama Produk tidak boleh kosong');location.href='ubah_produk.php';</script>";
    } else if (empty($deskripsi)) {
        echo "<script>alert('Deskripsi tidak boleh kosong');location.href='ubah_produk.php';</script>";
    }  else if (empty($harga)) {
        echo "<script>alert('Harga tidak boleh kosong');location.href='ubah_produk.php';</script>";
    } else {
        include "../../koneksi.php";
        if (empty($foto_produk)) {
            $query = mysqli_query($conn, "SELECT foto_produk FROM produk WHERE id_produk = '".$id_produk."'");
            $data = mysqli_fetch_array($query);
            $foto_produk = $data['foto_produk'];
        }
        $update = mysqli_query($conn, "UPDATE produk SET nama_produk = '".$nama_produk."', deskripsi = '".$deskripsi."', harga = '".$harga."', foto_produk = '".$foto_produk."' WHERE id_produk = '".$id_produk."'") or die(mysqli_error($conn));
        if ($update) {
            echo "<script>alert('Sukses update produk');location.href='tampil_produk_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal update produk');location.href='tampil_produk_petugas.php?id_produk=".$id_produk."';</script>";
        }
    }
}
?>
