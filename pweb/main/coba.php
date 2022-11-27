<?php
require_once "config.php";
$connection=getconnection();
$date=$_POST["birthday"];
$vaksin=$_POST["vaksin_id"];
if(isset($_POST["register"])){
    mysqli_query($connection,"INSERT INTO coba
    VALUES('','$date','$vaksin','')");

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
            <label for="birthday">Tanggal Lahir</label>
            <input type="date" id="birthday" name="birthday">
        </li>
        <li>
            <label for="vaksin_id">vaksin</label>
            <select name="vaksin_id" >
                <option>Pilih</option>
                <?php 
                $query=mysqli_query($connection,"SELECT * FROM vaksin") or die(mysqli_error($connection));
                while($data=mysqli_fetch_array($query)){
                    echo "<option value = $data[vaksin_id]>$data[nama_vaksin]</option>";
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