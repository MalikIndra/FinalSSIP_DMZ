<?php
    include 'koneksi.php';
    if (isset($_GET['ID_Buku'])){
        $delete = mysqli_query($conn, "DELETE FROM buku WHERE ID_Buku = '".$_GET['ID_Buku']."'");
        header('location:DataBuku.php');
    }
?>