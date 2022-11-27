<?php
function register($data)
{
    global $connection;
    $nama_lengkap=stripslashes(($data["nama"]));
    $nik= stripslashes($data["nik"]);
    $birtdayrtday=date('Ymd');
    $gender=stripslashes( $data["gender"]);
    $alamat=stripslashes( $data["alamat"]);
    $city_id=( $data["city_id"]);
    $rs_id=($data["rs_id"]);


    $result= mysqli_query($connection,"SELECT nik FROM  daftars_ WHERE nik = '$nik'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('username sudah terdaftar')</script>";
        return false;
    }

    mysqli_query($connection,"INSERT INTO daftars_
    VALUES('','$nama_lengkap','$nik','$birtdayrtday','$gender','$alamat','$city_id','$rs_id','') ");
    return mysqli_affected_rows($connection);
}
?>