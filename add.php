<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Makanan</td>
                <td><input type="text" name="nama_menu"></td>
            </tr>
            <tr> 
                <td>Harga Makanan :</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td>Jenis Makanan</td>
                <td><select name="jenis" id="">
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                </select></td>
            </tr>
            <tr> 
                <td>Penjual</td>
                <?php 
                    include "config.php";
                    $query = "select * from tb_penjual";
                    $datapenjual = mysqli_query($mysqli,$query);
              
                ?>
                <td><select name="penjual" id="">
                    <?php 
                        while ($row = mysqli_fetch_array($datapenjual)) {
                    ?>
                    <option value="<?= $row['id_penjual'] ?>"><?= $row['nama'] ?></option>
                    <?php } ?>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga'];
        $jenis = $_POST['jenis'];
        $penjual = $_POST['penjual'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_menu VALUES(null,'$jenis','$harga','$nama','$penjual')");
        
        // Show message when user added
        echo "<script>alert('Berhasil Tambah Data');
        window.location.href = 'index.php';
        </script>";
    }
    ?>
</body>
</html>