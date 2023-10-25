<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    $nama=$_POST['nama'];
    $hp=$_POST['no_hp'];
    $alamat=$_POST['alamat'];

        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_penjual SET nama='$nama', no_hp='$hp',alamat='$alamat' WHERE id_penjual='$id'");
    
    // Redirect to homepage to display updated user in list
    header("Location: penjual.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_penjual WHERE id_penjual=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $no_hp = $user_data['no_hp'];
    $alamat = $user_data['alamat'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="editpenjual.php">
        <table border="0">
            <tr> 
                <td>Nama Penjual</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr> 
                <td>Nomor Handphone</td>
                <td><input type="number" name="no_hp" value="<?php echo $no_hp;?>"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>