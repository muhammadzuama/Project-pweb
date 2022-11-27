<?php
$connection = mysqli_connect("localhost","root","","daftar_vaksin");

function register($data)
{
    global $connection;
    $nama_lengkap=stripslashes(($data["nama"]));
    $username= stripslashes($data["username"]);
    $birtdayrtday=date('Y-m-d');
    $gender=stripslashes( $data["gender"]);
    $no_hp=stripslashes( $data["no_hp"]);
    $email=stripslashes( $data["email"]);
    $password = mysqli_real_escape_string($connection,$data["password"]);
    $password2 = mysqli_real_escape_string($connection,$data["password2"]);

    if($password !== $password2){
        echo "<script>alert('konfirmasi passsword salah')</script>";
        return false;
    }
    $result= mysqli_query($connection,"SELECT username FROM  users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('username sudah terdaftar')</script>";
        return false;
    }

    $password=password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($connection,"INSERT INTO users
    VALUES('','$username','$nama_lengkap','$gender','$birtdayrtday','$no_hp','$password','$email') ");
    return mysqli_affected_rows($connection);
}

function daftar($data){
    global $connection;
    $username= htmlspecialchars( $data["username"]);
    $nama_lengkap=htmlspecialchars(($data["nama_lengkap"]));
    $nik= htmlspecialchars( $data["nik"]);
    $birtdayrtday=date('Y-m-d');
    $gender=htmlspecialchars( $data["gender"]);
    $alamat=htmlspecialchars( $data["no_hp"]);
    $kota=htmlspecialchars($data["city_id"]);
    $rumah_sakit= $data["rs_id"];

    mysqli_query($connection,"INSERT INTO daftar
    VALUES('','$nama_lengkap','$username','$nik','$birtdayrtday','$gender','$alamat','$kota','$rumah_sakit','') ");

}

function query($query){
    global $connection;
    $result=mysqli_query($connection,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

function ubah($data)
{
    global $connection;
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
}

?>