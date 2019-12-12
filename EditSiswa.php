<?php
include 'koneksi.php';
$data_edit = mysqli_query($conn,"SELECT * FROM siswa where ID_Siswa = '".$_GET['ID_Siswa']."'");
$result = mysqli_fetch_array($data_edit);
?>
<html>
    <head>
    <title>Edit Data Siswa</title>
    </head>
    <form action="" method="post">
        <body>
            <h2>Edit Data Siswa</h2>
            <a href="index.php" style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Home</a>
            <a href="DataSiswa.php" style ="padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Data Siswa</a>
            <br>
            <br>
            <table>
                <tr>
                    <td>Id Siswa</td>
                    <td>:</td>
                    <td><input type='text' name='IdSiswa' value = "<?php echo $result['ID_Siswa'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><input type='text' name='Nama' value = "<?php echo $result['Nama_Siswa'] ?>"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><input type='text' name='Kelas' value = "<?php echo $result['Kelas'] ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><input type='text' name='JenisKelamin' value = "<?php echo $result['Jenis_Kelamin'] ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type='text' name='Alamat' value = "<?php echo $result['Alamat'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type='submit' name = 'edit' value= 'Edit' style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;"></td>
                </tr>
            </table>
        </body>
    </form>
    <?php
    if (isset($_POST['edit'])){
        $update = mysqli_query ($conn, "UPDATE siswa SET Nama_Siswa = '".$_POST['Nama']."',
        Kelas = '".$_POST['Kelas']."',Jenis_Kelamin = '".$_POST['JenisKelamin']."', Alamat = '".$_POST['Alamat']."'
         WHERE ID_Siswa = '".$_GET['ID_Siswa']."'");
        if ($update){
            echo "Update Data Berhasil";
        }else {
            echo"Update Data Gagal" ;
        }
    }
    ?>
</html>