<?php
require_once "getfuntion.php";
$id=$_GET["id"];


$user=query("SELECT * FROM users WHERE user_id = '$id'")[0];


if(isset($_POST["submit"])){
    $id=$data["user_id"];
    $nama_lengkap=htmlspecialchars(($data["nama"]));
    $no_hp=htmlspecialchars( $data["no_hp"]);
    $email=htmlspecialchars( $data["email"]);

    $query="UPDATE users SET
    nama_lengkap='$nama_lengkap',
    no_hp='$no_hp',
    email= '$email';
    WHERE user_id='$id'";

    mysqli_query($connection,$query);

    return mysqli_affected_rows($connection);
    echo "<script> alert('User berhasil diubah')</script>";
    header("Location: profile.php");
    exit;
}else{
    echo "<script> alert('data gagal diubah')</script>";
    header("Location: profile_update.php");
    exit;
}

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
<h1>Update Profile</h1>
<form action="" method="POST">
    <ul>
        <input type="hidden" name="id" value="<?php echo $user["user_id"] ?>">
        <li>
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" value="<?php echo $user["nama_lengkap"] ?>">
        </li>
        <li>
            <label for="no_hp">No Hp</label>
            <input type="text" name="no_hp" id="no_hp" value="<?php echo $user["no_hp"] ?>">
        </li>
        <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $user["email"] ?>">
        </li>
        <li>
            <button type="submit" name="register">Update Profile</button>
        </li>
    </ul>
</form>
</body>
</html>