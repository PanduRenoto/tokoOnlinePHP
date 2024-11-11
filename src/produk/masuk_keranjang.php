<?php
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: ../login/login.php");
        exit();
    }
    include "../../koneksi.php";
    $qry_detail_produk = mysqli_query($conn,"select * from produk where id_produk = '".$_GET['id_produk']."'");
    $dt_produk = mysqli_fetch_array($qry_detail_produk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Keranjang</title>
</head>
<body>
    <?php 
    include "../tampilan/header_pelanggan.php";
    ?>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Masuk ke Keranjang</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <img src="foto_produk/<?=$dt_produk['foto_produk']?>" class="w-full h-auto rounded-lg shadow-md">
            </div>
            <div>
                <form action="masukkankeranjang.php?id_produk=<?=$dt_produk['id_produk']?>" method="post">
                    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
                        <thead>
                            <tr class="bg-gray-100">
                                <td class="p-4 font-semibold text-gray-700">Nama Produk</td>
                                <td class="p-4"><?=$dt_produk['nama_produk']?></td>
                            </tr>
                            <tr>
                                <td class="p-4 font-semibold text-gray-700">Deskripsi</td>
                                <td class="p-4"><?=$dt_produk['deskripsi']?></td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="p-4 font-semibold text-gray-700">Harga Satuan</td>
                                <td class="p-4" id="harga_satuan"><?=$dt_produk['harga']?></td>
                            </tr>
                            <tr>
                                <td class="p-4 font-semibold text-gray-700">Jumlah Beli</td>
                                <td class="p-4">
                                    <input type="number" id="jumlah_beli" name="jumlah_beli" value="1" min="1" class="border border-gray-300 rounded-md p-2 w-full" oninput="updateTotalHarga()">
                                </td>
                            </tr>
                            <tr class="bg-gray-100">
                                <td class="p-4 font-semibold text-gray-700">Total Harga</td>
                                <td class="p-4" id="total_harga"><?=$dt_produk['harga']?></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="p-4">
                                    <input class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md" type="submit" value="Masukkan ke Keranjang">
                                </td>
                            </tr>
                        </thead>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script>
        function updateTotalHarga() {
            var hargaSatuan = parseInt(document.getElementById('harga_satuan').textContent);
            var jumlahBeli = parseInt(document.getElementById('jumlah_beli').value);
            if (!isNaN(hargaSatuan) && !isNaN(jumlahBeli)) {
                var totalHarga = hargaSatuan * jumlahBeli;
                document.getElementById('total_harga').textContent = totalHarga;
            } else {
                document.getElementById('total_harga').textContent = "Invalid input";
            }
        }
    </script>
    <?php 
    include "../tampilan/footer.php";
    ?>
</body>
</html>