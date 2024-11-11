<?php
    session_start();
    include "../../koneksi.php";

    $id_produk = $_GET['id_produk'];
    $qty = $_POST['jumlah_beli'];
    $qry_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $dt_produk = mysqli_fetch_array($qry_produk);
    $subtotal = $dt_produk['harga'] * $qty;

    $cart_item = array (
        'id_produk' => $id_produk,
        'nama_produk' => $dt_produk['nama_produk'],
        'qty' => $qty,
        'subtotal' => $subtotal
    );

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = $cart_item;

    header("Location: keranjang.php");
?>
