<?php
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: ../login/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Tampil Pelanggan</title>
</head>
<body class="bg-gray-100">
    <?php 
    include "../tampilan/header_pelanggan.php";
    ?>
    <h1 class="m-10 font-bold text-3xl">Daftar Pelanggan</h1>
    <table class="w-[97%] border-collapse border border-black mb-10 mx-auto">
        <tr>
            <th class="bg-[#FFFF00] p-2 border border-black">NO</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Nama</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Alamat</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Nomor Telepon</th>
        </tr>
        <?php 
        include "../../koneksi.php";
        $qry_pelanggan = mysqli_query($conn,"select * from pelanggan");
        $no = 0;
        while($dt_pelanggan = mysqli_fetch_array($qry_pelanggan)){
        $no++;
        ?>
        <tr class="bg-blue-100 hover:bg-blue-200">
            <td class="p-2 border border-black text-center"><?=$no?></td>
            <td class="p-2 border border-black text-center"><?=$dt_pelanggan['nama']?></td>
            <td class="p-2 border border-black text-center"><?=$dt_pelanggan['alamat']?></td>
            <td class="p-2 border border-black text-center"><?=$dt_pelanggan['telp']?></td>
        </tr>
        <?php 
        }
        ?>
    </table>
    <?php 
    include "../tampilan/footer.php";
    ?>
</body>
</html>