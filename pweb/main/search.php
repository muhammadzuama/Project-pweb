<?php
if(isset($_POST["search"])){
    include "config.php";
    $connection=getconnection();
    $no=1;
    $search=$_POST["search"];
    $data=mysqli_query($connection,"SELECT * FROM vaksin JOIN hospital USING(vaksin_id) JOIN city USING (city_id) WHERE nama_rs LIKE '%$search%' OR alamat LIKE '%$search%' OR nama_vaksin LIKE '%$search%' OR nama_city LIKE '%$search%'");
}
    
?>

