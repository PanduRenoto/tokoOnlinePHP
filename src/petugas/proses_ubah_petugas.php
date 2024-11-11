<?php
if ($_POST) {
    $id_petugas = $_POST['id_petugas'];
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if (empty($nama_petugas)) {
        echo "<script>alert('Nama Petugas tidak boleh kosong');location.href='ubah_petugas.php';</script>";
    } else if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='ubah_petugas.php';</script>";
    } else {
        include "../../koneksi.php";
        if (empty($password)) {
            $update = mysqli_query($conn, "UPDATE petugas SET nama_petugas = '".$nama_petugas."', username = '".$username."', level = '".$level."' WHERE id_petugas = '".$id_petugas."'") or die(mysqli_error($conn));
        } else {
        $update = mysqli_query($conn, "UPDATE petugas SET nama_petugas = '".$nama_petugas."', username = '".$username."', password = '".$password."', level = '".$level."' WHERE id_petugas = '".$id_petugas."'") or die(mysqli_error($conn));
        }
        if ($update) {
            echo "<script>alert('Sukses update petugas');location.href='tampil_petugas_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal update petugas');location.href='tampil_petugas_petugas.php?id_petugas=".$id_petugas."';</script>";
        }
    }
}
?>
