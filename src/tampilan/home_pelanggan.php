<?php 
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: ../login/login.php");
        exit();
    }
    include "header_pelanggan.php";
?>

<main class="container mx-auto px-4 py-12">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang <?=$_SESSION['nama']?> di Toko Online</h1>
        <p class="text-gray-600 mb-8">Temukan produk terbaik dengan penawaran menarik hanya di sini!</p>
        <a href="../produk/tampil_produk_pelanggan.php" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Belanja Sekarang</a>
    </div>
</main>

<?php
    include "footer.php";
?>