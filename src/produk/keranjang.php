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
    <title>Keranjang</title>
</head>
<body class="bg-gray-100">
    <?php 
    include "../tampilan/header_pelanggan.php";
    ?>
    <h1 class="m-10 font-bold text-3xl">Keranjang</h1>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <table class="w-[97%] border-collapse border border-black mb-10 mx-auto">
        <tr>
            <th class="bg-[#FFFF00] p-2 border border-black">NO</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Nama Produk</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Jumlah</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Total Harga</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Aksi</th>
        </tr>
        <?php 
        foreach (@$_SESSION['cart'] as $key_produk => $val_produk):
        ?>
        <tr class="bg-blue-100 hover:bg-blue-200">
            <td class="p-2 border border-black text-center"><?=($key_produk + 1)?></td>
            <td class="p-2 border border-black text-center"><?=$val_produk['nama_produk']?></td>
            <td class="p-2 border border-black text-center"><?=$val_produk['qty']?></td>
            <td class="p-2 border border-black text-center"><?=$val_produk['subtotal']?></td>
            <td class="p-2 border border-black text-center">
                <a href="hapus_cart.php?id=<?=$key_produk?>" class="bg-red-600 hover:bg-red-700 py-2 px-4 rounded-lg">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <a href="checkout.php" class="bg-sky-500 hover:bg-sky-600 py-2 px-4 rounded-lg">Check Out</a>
    <?php else: ?>
        <p class="text-center text-gray-700 font-semibold">Tidak ada item di keranjang</p>
    <?php endif; ?>
    <?php 
    include "../tampilan/footer.php";
    ?>
</body>
</html>