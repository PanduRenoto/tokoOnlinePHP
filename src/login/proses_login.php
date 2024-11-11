<?php 
include "../../koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username)){
        echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
    } else if(empty($password)){
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    } else {
        $qry_login_petugas = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '".$username."' AND password = '".$password."'");
        if(mysqli_num_rows($qry_login_petugas) > 0) {
            $user_data = mysqli_fetch_assoc($qry_login_petugas);
            session_start();
            $_SESSION['id_petugas'] = $user_data['id_petugas'];
            $_SESSION['nama_petugas'] = $user_data['nama_petugas'];
            $_SESSION['status_login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'petugas';
            header("location: ../tampilan/home_petugas.php");
        } else {
            $qry_login_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '".$username."' AND password = '".$password."'");
            if(mysqli_num_rows($qry_login_pelanggan) > 0) {
                $user_data = mysqli_fetch_array($qry_login_pelanggan);
                session_start();
                $_SESSION['id_pelanggan'] = $user_data['id_pelanggan'];
                $_SESSION['nama'] = $user_data['nama'];
                $_SESSION['status_login'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'pelanggan';
                header("location: ../tampilan/home_pelanggan.php");
            } else {
                echo "<script>alert('Username atau Password salah');location.href='login.php';</script>";
            }
        }
    }
}
?>
