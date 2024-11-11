<?php 
include "../../koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    if(empty($nama)){
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else if(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else if(empty($alamat)){
        echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    }  else if(empty($telp)) {
        echo "<script>alert('Nomor Telepon tidak boleh kosong');location.href='tambah_pelanggan.php'</script>";
    } else {
        $qry_tambah = "INSERT INTO pelanggan (nama, username, password, alamat, telp) VALUES ('$nama', '$username', '$password', '$alamat', '$telp')";
        if ($conn -> query($qry_tambah) === TRUE) {
            echo "<script>alert('Berhasil tambah pelanggan');location.href='tampil_pelanggan_petugas.php'</script>";
        } else {
            echo "Kesalahan: " . $qry_tambah . "<br>" . $conn -> error;
        }
    
        $conn -> close();
    }
}
?>