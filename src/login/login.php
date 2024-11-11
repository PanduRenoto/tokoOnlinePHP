<?php
    session_start();
    if (isset($_SESSION['status_login']) && $_SESSION['status_login'] === true) {
        if ($_SESSION['role'] == 'petugas') {
            header("Location: ../tampilan/home_petugas.php");
        } else if ($_SESSION['role'] == 'pelanggan') {
            header("Location: ../tampilan/home_pelanggan.php");
        }
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Login</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="mb-5 mx-[152px] font-bold text-3xl">Login</h2>
            <form action="proses_login.php" method="post">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" placeholder="Username" value="" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" placeholder="Password" value="" class="mb-3 w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <button type="submit" name="simpan" class="mt-4 w-fit mx-[155px] bg-sky-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-sky-600 transition duration-300">Login</button>
            </form>
        </div>
    </div>
</body>
</html>