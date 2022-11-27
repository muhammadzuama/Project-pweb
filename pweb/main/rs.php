<?php
require_once "config.php";
$connection=getconnection();
$kota_id=$_POST['kota_id'];
$sql_rs=mysqli_query($connection, "SELECT * FROM hospital  WHERE city_id=$kota_id");
echo '<option>Pili Rumah Sakit</option>';
while($row_rs=mysqli_fetch_array($sql_rs)){
    echo '<option value ="">'.$row_rs.'</option>';
}
?>