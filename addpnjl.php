<a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="addpenjual.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Penjual</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>No Handphone :</td>
                <td><input type="text" name="nomor"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" id=""></td>
            </tr>
            <tr> 
                <td></td>
                <?php 
                    include "config.php";
                    $query = "select * from tb_penjual";
                    $datapenjual = mysqli_query($mysqli,$query);
              
                ?>
               
             
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $nomor = $_POST['nomor'];
        $alamat = $_POST['alamat'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_penjual VALUES(null,'$nama','$nomor','$alamat')");
        
        // Show message when user added
        echo "<script>alert('Berhasil Tambah Data');
        window.location.href = 'penjual.php';
        </script>";
    }
    ?>