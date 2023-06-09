<?php 

require 'koneksi.php';

if ( isset($_POST["register"])){
    if ( registrasi ($_POST) > 0 ){
        echo " <script>
                alert ('user bershasil ditambahkan');
                document.location.href = 'viewdata.php' 
               </script>";
    } else{
        echo mysqli_error($conn);

    }
        
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="styler.css" />
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
        </nav>
    </header> 


    <section>
      <div class="form-box">
        <div class="form-value">
          <form action="" method="post">
            <h2>Register</h2>
            <div class="inputbox">
              <ion-icon name="person-outline"></ion-icon>
              <input type="text" name="nama" id="nama" required />
              <label for="nama">Nama Lengkap</label>
            </div>
            <div class="inputbox">
              <ion-icon name="person-outline"></ion-icon>
              <input type="text" name="username" id="username" required />
              <label for="username">Username</label>
            </div>
            <div class="inputbox">
              <ion-icon name="mail-outline"></ion-icon>
              <input type="email" name="email" id="email" required />
              <label for="email">Email</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <input type="password" name="password" id="password" required />
              <label for="password">Password</label>
            </div>
            <button type="submit" name="register" >Register</button>
            <div class="register">
              <p>Don't have a account <a href="login.php">Log in</a></p>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
