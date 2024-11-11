<?php
if ($_POST) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    if (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } else if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } else {
        include "../../koneksi.php";
        if (empty($password)) {
            $update = mysqli_query($conn, "UPDATE pelanggan SET nama = '".$nama."', username = '".$username."', alamat = '".$alamat."', telp = '".$telp."'  WHERE id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($conn));
        } else {
        $update = mysqli_query($conn, "UPDATE pelanggan SET nama = '".$nama."', username = '".$username."', password = '".$password."', alamat = '".$alamat."', telp = '".$telp."' WHERE id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($conn));
        }
        if ($update) {
            echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal update pelanggan');location.href='tampil_pelanggan_petugas.php?id_pelanggan=".$id_pelanggan."';</script>";
        }
    }
}
?>
