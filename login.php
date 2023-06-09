<?php 

session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
require 'koneksi.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
   
    
    // cek username
    if (mysqli_num_rows($result)=== 1){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ){

            // set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit();
        }
    }

    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylel.css">
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
        </nav>
    </header>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Login</h2>
                    <?php if (isset($error)) : ?>
                        <br><br>
                        <p style="color : red; font-style: italic; text-align: center;" >Username atau password salah</p>
                    <?php endif;?>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="username" name="username" id="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit" name="login" >Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="register.php">Register</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>   
</body>
</html>