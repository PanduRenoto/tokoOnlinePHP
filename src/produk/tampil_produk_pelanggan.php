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
    <title>Daftar Produk</title>
</head>
<body class="bg-gray-200 font-sans">
    <?php 
    include "../tampilan/header_pelanggan.php";
    ?>
    <h1 class="m-10 font-bold text-3xl">Daftar Produk</h1>
    <?php 
    include "../../koneksi.php";
    $qry_produk = mysqli_query($conn,"select * from produk");
    while($dt_produk = mysqli_fetch_array($qry_produk)){
    ?>
    <div class="bg-white border border-gray-300 rounded-lg p-[25px] shadow-md text-center mb-5">
        <img src="foto_produk/<?=$dt_produk['foto_produk']?>" alt="Barang1" class="mx-auto mb-5">
        <h3 class="text-xl font-semibold text-gray-800"><?=$dt_produk['nama_produk']?></h3>
        <p class="text-lg text-gray-800 font-bold mb-4"><?=($dt_produk['deskripsi'])?></p>
        <p class="text-gray-600 mb-6"><?=($dt_produk['harga'])?></p>
        <a href="masuk_keranjang.php?id_produk=<?=$dt_produk['id_produk']?>" class="bg-green-500 text-white py-2 px-5 rounded hover:bg-green-600">Lihat Detail</a>
    </div>
    <?php
    }
    include "../tampilan/footer.php"
    ?>
</body>
</html>