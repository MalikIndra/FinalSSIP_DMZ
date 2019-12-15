<?php
include 'koneksi.php';
$data_edit = mysqli_query($conn,"SELECT * FROM peminjaman where ID_Siswa = '".$_GET['ID_Siswa']."'");
$result = mysqli_fetch_array($data_edit);
?>
<html>
    <head>
        <title>Edit Data Peminjaman</title>
    </head>
    <form action="" method="post">
        <body>
        <h2>Edit Data Peminjaman</h2>
        <a href="index.php" style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Home</a>
        <a href="DataPeminjaman.php" style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Data Peminjaman</a>
        <br>
        <br>
            <table>
                    <tr>
                        <td>ID_Siswa</td>
                        <td>:</td>
                        <td><input type="text" name='IdSiswa' value="<?php echo $result['ID_Siswa'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Nama_Siswa</td>
                        <td>:</td>
                        <td><input type="text" name='Nama' value="<?php echo $result['Nama_Siswa'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><input type="text" name='Kelas' value="<?php echo $result['Kelas'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>:</td>
                        <td><input type="text" name='Judul' value="<?php echo $result['Judul_Buku'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td>:</td>
                        <td><input type="text" name='pinjam' value="<?php echo $result['Tgl_Pinjam'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Dikembalikan</td>
                        <td>:</td>
                        <td><input type="text" name='kembali' value="<?php echo $result['Tgl_Dikembalikan'] ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type = "submit" name='edit' value='Edit'></td>
                    </tr>
            </table>
        </body>
    </form>
    <?php
    if (isset($_POST['edit'])){
        $update = mysqli_query ($conn, "UPDATE peminjaman SET Nama_Siswa = '".$_POST['Nama']."',
        Kelas = '".$_POST['Kelas']."',Judul_Buku = '".$_POST['Judul']."', Tgl_Pinjam = '".$_POST['pinjam']."',
        Tgl_Dikembalikan = '".$_POST['kembali']."' WHERE ID_Siswa = '".$_GET['ID_Siswa']."'");
        if ($update){
            echo "Update Data Berhasil";
        }else {
            echo"Update Data Gagal" ;
        }
    }
    ?>
</html>