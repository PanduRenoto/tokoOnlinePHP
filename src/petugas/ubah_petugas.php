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
    <title>Ubah Petugas</title>
</head>
<body class="bg-gray-100">
    <?php 
    include "../tampilan/header_petugas.php";
    ?>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <?php
            include "../../koneksi.php";
            $qry_get_petugas = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas = '" . $_GET['id_petugas'] . "'");
            $dt_petugas = mysqli_fetch_array($qry_get_petugas);
            ?>
            <h2 class="mb-5 mx-[76px] font-bold text-3xl">Ubah Petugas</h2>
            <form action="proses_ubah_petugas.php" method="post">
                <input type="hidden" name="id_petugas" value="<?= $dt_petugas['id_petugas'] ?>">
                <div>
                    <label for="nama_petugas" class="block text-sm font-medium text-gray-700">Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="<?= $dt_petugas['nama_petugas'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="<?= $dt_petugas['username'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" value="<?= $dt_petugas['password'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                    <input type="text" name="level" value="<?= $dt_petugas['level'] ?>" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="pt-4">
                    <button type="submit" name="simpan" class="mx-28 bg-sky-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-sky-600 transition duration-300">Ubah Petugas</button>
                </div>
            </form>
        </div>
    </div>
    <?php 
    include "../tampilan/footer.php";
    ?>
</body>
</html>