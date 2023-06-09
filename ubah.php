<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'koneksi.php';

$id = $_GET ["id"];

$dt = query("SELECT * FROM dataform WHERE id =$id") [0];


if(isset($_POST["submit"])){

    if( ubah ($_POST)> 0 ){
        echo" 
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'viewdata.php' 
            </script> 
        ";
    } else {
        echo" 
        <script>
            alert('data gagal diubah!');
            document.location.href = 'viewdata.php' 
        </script> 
    ";

    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styler.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Ubah Data</h2>
                    <input type="hidden" name="id" value="<?= $dt["id"]; ?>" >
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nama" id="nama" required
                        value="<?= $dt["nama"]; ?>">
                        <label for="nama">Nama Lengkap</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="username" id="username" required
                        value="<?= $dt["username"]; ?>">
                        <label for="username">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" id="email" required
                        value="<?= $dt["email"]; ?>">
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="game-controller-outline"></ion-icon>
                        <input type="text" name="game" id="game" required
                        value="<?= $dt["game"]; ?>">
                        <label for="game">Game</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <input type="text" name="comment" id="comment" required
                        value="<?= $dt["comment"]; ?>">
                        <label for="comment">Comment</label>
                    </div>
                    
                    <button type="submit" name="submit">Ubah</button>
                </form>
            </div>
        </div>
    </section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>   
</body>
</html>