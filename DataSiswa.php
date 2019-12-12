<html>
    <head>
        <h2>DATA SISWA</h2>
    </head>
    <a href = "index.php" style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Home</a>
    <br>
    <br>
    <form action="" method= "post">
        <body>
            <table>
                <tr>
                    <td>Id Siswa</td>
                    <td>:</td>
                    <td><input type='text' name='IdSiswa'></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><input type='text' name='Nama'></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><input type='text' name='Kelas'></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><input type='text' name='JenisKelamin'></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input type='text' name='Alamat'></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type='submit' name = 'simpan' value= 'Simpan' style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;"></td>
                </tr>
            </table>
        </form>
        <table  border = "1" cellspacing = "0" width = "50%">
            <tr style="text-align:center;font-weight:bold;background-color:#eee;">
                <td>ID Siswa</td>
                <td>Nama Siswa</td>
                <td>Kelas</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>
                <td>Opsi</td>
            </tr>
            <?php
include 'koneksi.php';
$select = mysqli_query($conn,"SELECT * FROM siswa");
if(mysqli_num_rows($select) > 0){
while ($hasil = mysqli_fetch_array($select)){
    ?>
    <tr style = "text-align:center;">
        <td><?php echo $hasil['ID_Siswa'] ?></td>
        <td><?php echo $hasil['Nama_Siswa'] ?></td>
        <td><?php echo $hasil['Kelas'] ?></td>
        <td><?php echo $hasil['Jenis_Kelamin'] ?></td>
        <td><?php echo $hasil['Alamat'] ?></td>
        <td>
            <a href ="EditSiswa.php?ID_Siswa=<?php echo $hasil['ID_Siswa']?>">Edit</a> ||
            <a href ="HapusSiswa.php?ID_Siswa=<?php echo $hasil['ID_Siswa']?>" onclick = "return confirm('Yakin Menghapus')">Hapus</a>
        </td>
        </tr>
        <?php }} else { ?>
        <tr>
        <td colspan = "7" style ="text-align:center">Data Kosong</td>
        </tr>
        <?php } ?>
        </table>
    </body>
<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
    $insert = mysqli_query($conn, "INSERT INTO siswa VALUES
                            ('".$_POST['IdSiswa']."',
                            '".$_POST['Nama']."',
                            '".$_POST['Kelas']."',
                            '".$_POST['JenisKelamin']."',
                            '".$_POST['Alamat']."')");
    if ($insert){
        echo "Insert Data Siswa Berhasil dilakukan";
        }
        else {
            echo "Insert Data Siswa Gagal Dilakukan";
        }
    }
?>
</html>