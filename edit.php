<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $nohp=$_POST['nohp'];
    $alamat=$_POST['alamat'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjual SET id='$id',nama='$nama',nohp='$nohp',alamat='$alamat' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $id = $user_data['id'];
    $nama = $user_data['nama'];
    $nohp= $user_data['nohp'];
    $alamat= $user_data['alamat'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>id</td>
                <td><input type="text" name="id" value=<?php echo $id;?>></td>
            </tr>
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>nohp</td>
                <td><input type="text" name="nohp" value=<?php echo $nohp;?>></td>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>