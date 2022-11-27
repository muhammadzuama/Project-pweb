<?php
    include "config.php";
    $connection=getconnection();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#kota').change(function(){
                var kota_id=$(this).val();

                $.ajax({
                    type:'POST',
                    url:'rs.php',
                    data:'kota_id='+kota_id,
                    success:function(response){
                        $('#rs').html(Response);
                    }
                })
            })
        });
    </script>
</head>
<body>
    <form action="" method="post">
        <label>Kota :</label><br>
        <?php $query=mysqli_query($connection,"SELECT nama_city FROM city") or die(mysqli_error($connection));?>
        <select name="kota" id="kota">
            <option value="">Pilih Kota</option>
            <?php  while($data_city=mysqli_fetch_array($query)){
                    echo "<option values=$data_city[city_id]>$data_city[nama_city]</option>";
                } ?>
        </select></br>
        <label > Rumah Sakit</label>
        <select name="rs" id="rs">
            <option value="">Pilih Rumah Sakit</option>

        </select>

    </form>
</body>
</html>