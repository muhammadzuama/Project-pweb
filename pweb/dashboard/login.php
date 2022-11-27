<?php
session_start();
require_once "getfuntion.php";
if(isset($_POST["login"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $result= mysqli_query($connection,"SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($result)===1){
        $row= mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"]=true;
            $_SESSION["global"]=$data_global;
            $_SESSION["id"]=$row["user_id"];
            header("Location: profile.php");
            exit;
        }
    }
    $error= true;
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
<h1>Halaman Login</h1>
<?php if(isset($error)){?>
    <p>username atau password salah</p>
<?php } ?>

<form action="" method="POST">
    <ul>
        <li>
            <label for="username">username</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <p>daftar di</p><a href="register.php">Sini</a>
        </li>
        <li>
            <a href="lupapassword.php">Lupa Password</a>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
</form>
</body>
</html>