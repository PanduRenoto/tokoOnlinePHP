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
    <title>Ubah Produk</title>
</head>
<body class="bg-gray-100">
    <?php 
    include "../tampilan/header_petugas.php";
    ?>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <?php
            include "../../koneksi.php";
            $qry_get_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '" . $_GET['id_produk'] . "'");
            $dt_produk = mysqli_fetch_array($qry_get_produk);
            ?>
            <h2 class="mb-5 mx-[76px] font-bold text-3xl">Ubah produk</h2>
            <form action="proses_ubah_produk.php" method="post">
                <input type="hidden" name="id_produk" value="<?= $dt_produk['id_produk'] ?>">
                <div>
                    <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama produk</label>
                    <input type="text" name="nama_produk" value="<?= $dt_produk['nama_produk'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <input type="text" name="deskripsi" value="<?= $dt_produk['deskripsi'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" name="harga" value="<?= $dt_produk['harga'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="foto_produk" class="block text-sm font-medium text-gray-700">foto_produk</label>
                    <input type="file" name="foto_produk" value="<?= $dt_produk['foto_produk'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="pt-4">
                    <button type="submit" name="simpan" class="mx-28 bg-sky-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-sky-600 transition duration-300">Ubah Produk</button>
                </div>
            </form>
        </div>
    </div>
    <?php 
    include "../tampilan/footer.php";
    ?>
</body>
</html>