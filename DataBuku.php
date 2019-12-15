<html>
    <head>
        <h2>DATA BUKU</h2>
    </head>
    <a href = "index.php" style = "padding:0.4% 0.8%;background-color:#009900;color:#fff;border-radius:2px;text-decoration:none;">Home</a>
    <br>
    <br>
    <form action="" method= "post">
        <body>
            <table>
                <tr>
                    <td>ID Buku</td>
                    <td>:</td>
                    <td><input type='text' name='IdBuku'></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td>:</td>
                    <td><input type='text' name='JudulBuku'></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>:</td>
                    <td><input type='text' name='Pengarang'></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:</td>
                    <td><input type='text' name='Penerbit'></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td>:</td>
                    <td><input type='text' name='TahunTerbit'></td>
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
                <td>ID Buku</td>
                <td>Judul Buku</td>
                <td>Pengarang</td>
                <td>Penerbit</td>
                <td>Tahun Terbit</td>
                <td>Opsi</td>
            </tr>
            <?php
include 'koneksi.php';
$select = mysqli_query($conn,"SELECT * FROM buku");
if(mysqli_num_rows($select) > 0){
while ($hasil = mysqli_fetch_array($select)){
    ?>
    <tr style = "text-align:center;">
        <td><?php echo $hasil['ID_Buku'] ?></td>
        <td><?php echo $hasil['Judul_Buku'] ?></td>
        <td><?php echo $hasil['Pengarang'] ?></td>
        <td><?php echo $hasil['Penerbit'] ?></td>
        <td><?php echo $hasil['Tahun_Terbit'] ?></td>
        <td>
            <a href ="EditBuku.php?ID_Buku=<?php echo $hasil['ID_Buku']?>">Edit</a> ||
            <a href ="HapusBuku.php?ID_Buku=<?php echo $hasil['ID_Buku']?>" onclick = "return confirm('Yakin Menghapus')">Hapus</a>
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
    $insert = mysqli_query($conn, "INSERT INTO buku VALUES
                            ('".$_POST['IdBuku']."',
                            '".$_POST['JudulBuku']."',
                            '".$_POST['Pengarang']."',
                            '".$_POST['Penerbit']."',
                            '".$_POST['TahunTerbit']."')");
    if ($insert){
        echo "Insert Data Buku telah ditambahkan";
        }
        else {
            echo "Insert Data Buku gagal dilakukan";
        }
    }
?>
</html>