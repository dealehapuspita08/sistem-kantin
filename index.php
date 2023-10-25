<?php 

include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM menu a join penjual b on b.id = a.id_penjual ORDER BY id_penjual DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="add.php">add</a>
    <br/><br/>
    <div class="container">
    <table class="tabel" width='80%' border=1> 


<tr>
        <th>Nama Makanan</th> 
        <th>Harga</th>
        <th>Jenis Makanan</th> 
        <th>Penjual</th>
        <th>Aksi</th>

    </tr>

    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
    ?>
  <tr>
     <td><?= $user_data['nama_menu'] ?></td>
     <td>Rp.<?= number_format($user_data['harga'],2,',','.') ?></td>
     <td><?= $user_data['jenis'] ?></td>   
     <td><?= $user_data['nama'] ?></td>    

     <td><a href="edit.php?id=<?= $user_data['id'] ?>">Edit</a> | <a href="delete.php?id=<?= $user_data['id'] ?>">Delete</a></td></tr>  

<?php } ?>
    </table><br>

    <!-- <?php 
    
        //  while($user_data = mysqli_fetch_array($result ))  {         
            
        //     echo "<p>Nama Makanan :$user_data['nama_menu'] ?></p>";
        //     echo "<p>Harga Makanan :".$user_data['harga'] ?>."</p>";
        //     echo "<p>Jenis Makanan :".$user_data['jenis']."</p>";   
           

        //  }
       ?> -->
       
    </div>
</body>
</html>