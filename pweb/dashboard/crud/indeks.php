<?php
require_once "config.php";
$connection=getconnection();
$sql= "SELECT * FROM vaksin JOIN hospital USING(vaksin_id) JOIN city USING (city_id)";
$result=$connection->query($sql);
if(isset($_POST["search"]))
{
    $cari=$_POST['cari'];
}else {
    $cari='';
}
$take_data=mysqli_query($connection,
"SELECT * FROM vaksin JOIN hospital USING(vaksin_id) JOIN city USING (city_id) WHERE nama_rs LIKE '%$cari%' OR alamat LIKE '%$cari%' OR nama_vaksin LIKE '%$cari%' OR nama_city LIKE '%$cari%'" );
$data_total=10;
$total=mysqli_num_rows($take_data);

$jumlahPagianation=ceil($total/$data_total);

$taken_data_every1=mysqli_query($connection,"SELECT * FROM vaksin JOIN hospital USING(vaksin_id) JOIN city USING (city_id) 
WHERE nama_rs LIKE '%$cari%' OR alamat LIKE '%$cari%' OR nama_vaksin LIKE '%$cari%' OR nama_city LIKE '%$cari%' LIMIT 0,$data_total");
$connection=null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <table class="table table-striped table-hover table-bordered mt-5">
            <thead class="table-dark">
                <th>Nama Rumah Sakit</th>
                <th>Alamat</th>
                <th>Jenis Vaksin</th>
                <th>Kota</th>
                <th>Action</th>
            </thead>
            <?php foreach ($taken_data_every1 as $row){ ?>
            <tr>
                <td><?php echo $row["nama_rs"]; ?></td>
                <td><?php echo $row["alamat"]; ?></td>
                <td><?php echo $row["nama_vaksin"] ?></td>
                <td><?php echo $row["nama_city"] ?></td>
                <td>
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                        <a href='' class='btn btn-sm btn-warning'>Update</a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href='' class='btn btn-sm btn-danger'>delete</a>
                        </div>
                    </div>
                   
                </td>
            </tr>
            <?php };?>
        </table>
    </div>
</body>
</html>