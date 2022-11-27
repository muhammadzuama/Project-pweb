<?php
require_once "config.php";
$connection=getconnection();
$nama=$_POST["nama"];
$nik=$_POST["nik"];
$birthday=$_POST["birthday"];
$gender=$_POST["gender"];
$alamat=$_POST["alamat"];
$city=$_POST["city_id"];
$rs=$_POST["rs"];
if(isset($_POST["register"])){
    mysqli_query($connection,"INSERT INTO daftars_
    VALUES('','$nama','$nik','$birthday','$gender','$alamat','$city','$rs','')");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <ul>
        <li>
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama">
        </li>
        <li>
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik">
        </li>
        <li>
            <label for="birthday">Tanggal Lahir</label>
            <input type="date" id="birthday" name="birthday">
        </li>
        <li>
            <label for="gender">Jenis Kelamin</label>
            <input type="radio" name="gender" id="gender" value="Laki-laki">Laki-laki
            <input type="radio" name="gender" id="gender" value="Perempuan">Perempuan
        </li>
        <li>
            <label for="alamat">alamat</label>
            <input type="text" name="alamat" id="alamat">
        </li>
        <!-- <li>
            <label for="city_id">Kota</label>s
            <select name="city_id" >
                <option>Pilih</option>
                <?php 
                // $query=mysqli_query($connection,"SELECT * FROM city") or die(mysqli_error($connection));
                // while($data_city=mysqli_fetch_array($query)){
                //     echo "<option values=$data_city[city_id]>$data_city[nama_city]</option>";
                // }
                ?>
            </select>
        </li>
        <li> -->
        <label for="rs_id">Rumah Sakit</label>
            <select name="rs_id" id="rs_id">
                <option value="">Pilih</option>
                <?php 
                $query=mysqli_query($connection,"SELECT * FROM hospital ;") or die(mysqli_error($connection));
                while($data_rs=mysqli_fetch_array($query)){
                    echo "<option values=$data_rs[rs_id]>$data_rs[nama_rs]</option>";
                }
                ?>
            </select>
        </li>
        <li>
            <button type="submit" name="register">Daftar</button>
        </li>
    </ul>
</form>
</body>
</html>