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
    <title>Daftar Pelanggan</title>
</head>
<body class="bg-gray-100">
    <?php 
    include "../tampilan/header_petugas.php";
    ?>
    <h1 class="m-10 font-bold text-3xl">Daftar Pelanggan</h1>
    <table class="w-[97%] border-collapse border border-black mb-10 mx-auto">
        <tr>
            <th class="bg-[#FFFF00] p-2 border border-black">NO</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Nama</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Username</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Alamat</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Nomor Telepon</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Aksi</th>
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
            <td class="p-2 border border-black text-center"><?=$dt_pelanggan['username']?></td>
            <td class="p-2 border border-black text-center"><?=$dt_pelanggan['alamat']?></td>
            <td class="p-2 border border-black text-center"><?=$dt_pelanggan['telp']?></td>
            <td class="py-5 border border-black text-center">
                <a href="ubah_pelanggan.php?id_pelanggan=<?=$dt_pelanggan['id_pelanggan']?>" class="py-2 px-4 bg-green-600 hover:bg-green-700 rounded-lg">Ubah</a> |
                <a href="hapus.php?id_pelanggan=<?=$dt_pelanggan['id_pelanggan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="py-2 px-4 bg-red-600 hover:bg-red-700 rounded-lg">Hapus</a>
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
    <a href="tambah_pelanggan.php" class="py-2 px-4 bg-sky-500 hover:bg-sky-600 rounded-lg ml-6">Tambah Pelanggan</a>
    <?php 
    include "../tampilan/footer.php";
    ?>
</body>
</html>