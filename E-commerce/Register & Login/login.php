<?php
session_start();
require "function.php";

if ( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * from user WHERE username = '$username'");

    //cek usename
    if ( mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;
            
            header("location: cd/../../Home/index.php");
            exit;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="loginstyle.css">

    <style>
        label{
          margin-left: 60px;
        }
    </style>
</head>
<body>
    <div class="container w-25">
          <div class="col">
            <form action="login.php" method="post" class="loginContainer p-3">
                <img src="traditional.png" class="w-50 d-flex mx-auto mt-5 mb-5" alt="">
            <!-- Username-->
            <div class="form-floating mb-3 mt-5">
                <input type="text" class="form-control w-75 mx-auto" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <!-- Password-->
            <div class="form-floating mb-3">
                <input type="password" class="form-control w-75 mx-auto" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

<!-- Button Container -->
                <button class="masuk d-grid btn btn-primary w-75 mx-auto mb-2 mt-4" type="submit" name="login">MASUK
                </button>
                <p>Belum memiliki akun? <a href="cd/../register.php">Daftar sekarang</a></p>
            </form>
          </div>
    </div>
</body>
</html>