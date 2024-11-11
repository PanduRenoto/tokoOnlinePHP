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
    <title>Tambah Petugas</title>
</head>
<body class="bg-gray-100">
    <?php 
    include "../tampilan/header_petugas.php";
    ?>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="mb-5 mx-[76px] font-bold text-3xl">Tambah Petugas</h2>
            <form action="proses_tambah_petugas.php" method="post">
                <div>
                    <label for="nama_petugas" class="block text-sm font-medium text-gray-700">Nama Petugas</label>
                    <input type="text" name="nama_petugas" value="" placeholder="Nama Petugas" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="" placeholder="Username" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" value="" placeholder="Password" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                    <input type="text" name="level" value="" placeholder="Level" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="pt-4">
                    <button type="submit" name="simpan" class="mx-28 bg-sky-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-sky-600 transition duration-300">Tambah Petugas</button>
                </div>
            </form>
        </div>
    </div>
    <?php 
    include "../tampilan/footer.php";
    ?>
</body>
</html>