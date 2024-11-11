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
    <title>Histori Transaksi</title>
</head>
<body class="bg-gray-100">
    <?php 
    include "../tampilan/header_pelanggan.php";
    ?>
    <h1 class="m-10 font-bold text-3xl">Histori Transaksi</h1>
    <table class="w-[97%] border-collapse border border-black mb-10 mx-auto">
        <tr>
            <th class="bg-[#FFFF00] p-2 border border-black">NO</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Tanggal Transaksi</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Nama Produk</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Jumlah Produk</th>
            <th class="bg-[#FFFF00] p-2 border border-black">Jumlah Harga</th>
        </tr>
        <?php 
        include "../../koneksi.php";
        $qry_histori = mysqli_query($conn,"select * from transaksi order by id_transaksi desc");
        $no = 0;
        while($dt_histori = mysqli_fetch_array($qry_histori)) {
            $no++;
            $produk_dibeli = "<ol>";
            $total_qty = 0;
            $total_subtotal = 0;
            $qry_produk = mysqli_query($conn, "SELECT produk.nama_produk, detail_transaksi.qty, detail_transaksi.subtotal FROM detail_transaksi JOIN produk ON produk.id_produk = detail_transaksi.id_produk WHERE detail_transaksi.id_transaksi = '".$dt_histori['id_transaksi']."'");
            while($dt_produk = mysqli_fetch_array($qry_produk)){
                $produk_dibeli .= "<li>".$dt_produk['nama_produk']."</li>";
                $total_qty += $dt_produk['qty'];
                $total_subtotal += $dt_produk['subtotal'];
            }
            $produk_dibeli.="</ol>";
        ?>
        <tr class="bg-blue-100 hover:bg-blue-200">
            <td class="p-2 border border-black text-center"><?=$no?></td>
            <td class="p-2 border border-black text-center"><?=$dt_histori['tgl_transaksi']?></td>
            <td class="p-2 border border-black text-center"><?=$produk_dibeli?></td>
            <td class="p-2 border border-black text-center"><?=$total_qty?></td>
            <td class="p-2 border border-black text-center"><?=$total_subtotal?></td>
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