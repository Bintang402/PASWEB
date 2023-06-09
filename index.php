<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'koneksi.php';
?>
<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="stylei.css">
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylei.css">
</head>
<body>

    <header>
        <h2 class="logo">MabarKUY!!</h2>
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a href="viewdata.php">Data</a>
            <a href="">ComingSoon!</a>
            <a href="">ComingSoon!</a>
            <a class="btnLogout-popup" href="logout.php">Logout</a>
        </nav>
    </header> 

    <div class="kolom">
        <p class="deskripsi">Project UAS Pemrograman Berbasis Web</p>
        <h1>Selamat Datang Di Web MabarKUY!!</h1>
        <br>
        <p class="p">Web ini adalah project untuk penilaian UAS Pemrograman Berbasis Web, <br>
            Tema web ini adalah web untuk mencari teman main game dengan <br>
                megimplentasikan mekanisme Regristrasi,Login dan CRUD</p>
    </div>
    
</body>
</html>
    
</body>
</html>
