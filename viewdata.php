<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'koneksi.php';

$datauser = query( "SELECT * FROM dataform");

// search
if ( isset($_POST["search"] ) ){
    $datauser = search($_POST["keyword"]);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylei.css">
    <link rel="stylesheet" href="styleview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
    
    <div class="container my-5 div">
        
        <h1 class="h1" >Data Player</h1>
        
        
        <a class="btn btn-primary" href="tambah.php" role="button">Tambah data</a>
        <br> <br>

        <form action="" method="post">
            
            <input class="search" type="text" name="keyword" size="40"  autofocus
            placeholder="Search..." autocomplete="off" >
            <button type="submit" name ="search"class="btn btn-light">Search</button>
            <!-- <button type="submit" name="search" >Search</button> -->

        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Game</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                <?php foreach($datauser as $dtu) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?=$dtu["nama"]; ?></td>
                    <td><?=$dtu["username"]; ?></td>
                    <td><?=$dtu["email"]; ?></td>
                    <td><?=$dtu["game"]; ?></td>
                    <td><?=$dtu["comment"]; ?></td> 
                    <td>
                    <a class="btn btn-primary" href="ubah.php?id=<?= $dtu["id"]; ?>">Ubah</a>
                    <a class="btn btn-danger" href="hapus.php?id=<?= $dtu["id"]; ?>" onclick="return confirm('Anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>