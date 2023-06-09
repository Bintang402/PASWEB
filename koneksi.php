<?php

$conn = mysqli_connect("sql104.infinityfree.com", "if0_34390552", "rqmg04MyvI4D2", "if0_34390552_uasweb");
if($conn->connect_error) {
    die("Koneksi ke database Gagal: " . $conn->connect_error);
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row; 
    }
    return $rows;
}


function tambah($data){
    global $conn;

    $nama =htmlspecialchars( $data['nama']);
    $username =htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
    $game =htmlspecialchars ($data['game']);
    $comment =htmlspecialchars($data['comment']);

    $query = "INSERT INTO dataform VALUES ('','$nama','$username','$email','$game','$comment')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM dataform WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data ["id"];
    $nama =htmlspecialchars( $data['nama']);
    $username =htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
    $game =htmlspecialchars ($data['game']);
    $comment =htmlspecialchars($data['comment']);

    $query = "UPDATE dataform SET 
                nama = '$nama',
                username = '$username',
                email = '$email',
                game = '$game',
                comment= '$comment'
              WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function search($keyword){
    $query = "SELECT * FROM dataform WHERE 
                nama LIKE '%$keyword%' OR
                username LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                game LIKE '%$keyword%' 

                ";

    
    return query($query);
}


function registrasi($data){
    global $conn;


    $nama = $data ["nama"];
    $username = $data["username"];
    $email = $data ["email"];
    $password = $data ["password"];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users 
            WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo " <script>
                alert ('Username sudah terdaftar,Silakan gunakan username lain!');
               </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES('','$nama','$username','$email','$password')");

    return mysqli_affected_rows($conn);


}
?>

