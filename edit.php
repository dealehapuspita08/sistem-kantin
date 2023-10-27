<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id_menu'];
    
    $nama=$_POST['nama_menu'];
    $harga=$_POST['harga'];
    $jenis=$_POST['jenis'];
    $Penjual=$_POST['penjual'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama_menu='$nama', harga='$harga',jenis='$jenis', id_penjual='$Penjual' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    echo "<script>alert('Edit Berhasil');</script>";
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_menu'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id_penjual=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_menu'];
    $harga = $user_data['harga'];
    $jenis = $user_data['jenis'];
    $penjual = $user_data['id_penjual'];
}
?>
<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <tr>
        <td>
            <a href="index.php">Home</a>
            <br /><br />

            <form name="update_user" method="post" action="edit.php">
        <td>Nama Makanan</td>
        <td><input type="text" name="nama_menu" value=<?php echo $nama;?>></td>
    </tr><br>
    <tr>
        <td>Harga Makanan</td>
        <td><input type="number" name="harga" value=<?php echo $harga;?>></td>
    </tr> <br>
    <tr>
        <td>Jenis Makanan</td>
        <td><select name="jenis" id="">
                <option value=<?php echo $jenis;?>><?php echo $jenis;?></option>
                <option value="Makanan Berat">Makanan Berat</option>
                <option value="Makanan Ringan">Makanan Ringan</option>
            </select>
    </tr> <br>
    <tr>
    <tr>
        <td>Penjual</td>
        <?php 
                    include "config.php";
                    $query = "select * from penjual";
                    $datapenjual = mysqli_query($mysqli, $query);
              
                ?>
        <td><select name="penjual" id="">
                <?php 
                        while ($row = mysqli_fetch_array($datapenjual)) {
                    ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                <?php } ?>
    </tr><br>
    <tr>
        <td><input type="hidden" name="id_menu" value=<?php echo $_GET['id_menu'];?>></td>
        <td><input type="submit" name="update" value="Update"></td>
    </tr>
    </table>
    </form>
</body>

</html>