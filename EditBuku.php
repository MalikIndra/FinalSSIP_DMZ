<?php
include 'koneksi.php';
$data_edit = mysqli_query($conn,"SELECT * FROM buku where ID_Buku = '".$_GET['ID_Buku']."'");
$result = mysqli_fetch_array($data_edit);
?>
<html>
    <head>
    <title>Edit Data Buku</title>
    </head>
    <form action="" method="post">
        <body>
            <h2>Edit Data Buku</h2>
            <a href="index.php" style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Home</a>
            <a href="DataBuku.php" style ="padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Data Siswa</a>
            <br>
            <br>
            <table>
                <tr>
                    <td>Id Buku</td>
                    <td>:</td>
                    <td><input type='text' name='IdBuku' value = "<?php echo $result['ID_Buku'] ?>"></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td>:</td>
                    <td><input type='text' name='JudulBuku' value = "<?php echo $result['Judul_Buku'] ?>"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>:</td>
                    <td><input type='text' name='Pengarang' value = "<?php echo $result['Pengarang'] ?>"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:</td>
                    <td><input type='text' name='Penerbit' value = "<?php echo $result['Penerbit'] ?>"></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>:</td>
                    <td><input type='text' name='TahunTerbit' value = "<?php echo $result['Tahun_Terbit'] ?>"></td>
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
        $update = mysqli_query ($conn, "UPDATE buku SET Judul_Buku = '".$_POST['JudulBuku']."',
        Pengarang = '".$_POST['Pengarang']."',Penerbit = '".$_POST['Penerbit']."', Tahun_Terbit = '".$_POST['TahunTerbit']."'
         WHERE ID_Buku = '".$_GET['ID_Buku']."'");
        if ($update){
            echo "Update Data Buku Berhasil";
        }else {
            echo"Update Data Buku Gagal" ;
        }
    }
    ?>
</html>