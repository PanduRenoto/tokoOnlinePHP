<?php 
include "../../koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if(empty($nama_petugas)){
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else if(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else if(empty($level)){
        echo "<script>alert('Level tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else {
        $qry_tambah = "INSERT INTO petugas (nama_petugas, username, password, level) VALUES ('$nama_petugas', '$username', '$password', '$level')";
        if ($conn -> query($qry_tambah) === TRUE) {
            echo "<script>alert('Berhasil tambah petugas');location.href='tampil_petugas_petugas.php'</script>";
        } else {
            echo "Kesalahan: " . $qry_tambah . "<br>" . $conn -> error;
        }
    
        $conn -> close();
    }
}
?>