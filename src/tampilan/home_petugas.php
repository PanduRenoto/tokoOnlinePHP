<?php 
    session_start();
    if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
        header("Location: ../login/login.php");
        exit();
    }
    include "header_petugas.php";
?>

<main class="container mx-auto px-4 py-12">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang <?=$_SESSION['nama_petugas']?> di Toko Online</h1>
        <p class="text-gray-600 mb-8">Temukan produk terbaik dengan penawaran menarik hanya di sini!</p>
    </div>
</main>

<?php
    include "footer.php";
?>