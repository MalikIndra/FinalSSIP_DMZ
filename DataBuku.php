<html>
    <head>
        <title>Data Buku</title>
        <link rel="icon" href="iconheader/bookicon.png">
        <script type="text/javascript" src="js/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <link href="css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>

    <body>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="index.php">Perpustakaan</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
        </button>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
        </form>
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="DataSiswa.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="DataPeminjaman.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Peminjaman</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="DataBuku.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Buku</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#modalLogout">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

        <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="modalLogoutLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Logout</h5>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin logout?
                    </div>
                    <div class="modal-footer">
                        <form action="DataBuku.php" method="post">
                        <button class="btn btn-info" name="logout">Logout</button>
                        <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(isset($_POST['logout'])){
            echo "<script>window.location.href='login.php'</script>";
        }
        ?>
        

        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Menu</a>
                    </li>
                    <li class="breadcrumb-item active">Data Buku</li>
                </ol>
                <h1>Data Buku</h1>
                <hr>
                <div class="container">    
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Buku</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Jenis Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <?php
                                include 'koneksi.php';
                                $select = mysqli_query($conn,"select * from buku order by ID_Buku asc");
                                while ($hasil = mysqli_fetch_array($select)){
                            ?>
                            <tr>
                                <td><?php echo $hasil['ID_Buku']; ?></td>
                                <td><?php echo $hasil['Judul_Buku']; ?></td>
                                <td><?php echo $hasil['Pengarang']; ?></td>
                                <td><?php echo $hasil['Penerbit']; ?></td>
                                <td><?php echo $hasil['Tahun_Terbit']; ?></td>
                                <td>
                                <button class="btn btn-primary text-center" data-toggle="modal" data-target="#modalEdit<?php echo $hasil['ID_Buku'];?>">Edit</button>    
                                <button class="btn btn-danger text-center" data-toggle="modal" data-target="#modalDelete<?php echo $hasil['ID_Buku'];?>">Delete</button>
                                </td>
                            </tr>
                    <!-- btn edit -->

                            <div class="modal fade" id="modalEdit<?php echo $hasil['ID_Buku'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Buku</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="DataBuku.php" method="get" id="edit">
                                        <div class="">
                                            <label></label>
                                            <input type="hidden" class="form-control" name="IdBuku" value = "<?php echo $hasil['ID_Buku'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Judul Buku</label>
                                            <input type="text" class="form-control" name="JudulBuku" value = "<?php echo $hasil['Judul_Buku'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input type="text" class="form-control" name="Pengarang" value = "<?php echo $hasil['Pengarang'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input type="text" class="form-control" name="Penerbit" value = "<?php echo $hasil['Penerbit'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <input type="date" class="form-control" name="TahunTerbit" value = "<?php echo $hasil['Tahun_Terbit'] ?>" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button class="btn btn-success" name="edit">Selesai</button>
                                    </form> 
                                </div>
                            </div>
                            <?php
                        if (isset($_GET['edit'])){
                                $IdBuku = $_GET['IdBuku'];
                                $JudulBuku = $_GET['JudulBuku'];
                                $Pengarang = $_GET['Pengarang'];
                                $Penerbit = $_GET['Penerbit'];
                                $TahunTerbit = $_GET['TahunTerbit'];
                                
                            $update = mysqli_query ($conn, "UPDATE buku SET Judul_Buku = '$JudulBuku',
                            Pengarang = '$Pengarang', Penerbit = '$Penerbit', Tahun_Terbit = '$TahunTerbit' 
                            WHERE ID_Buku = '$IdBuku'");
                            if ($update){
                                    Echo "<script>window.location.href='DataBuku.php'</script>";
                                }
                                else{?>
                                    <div class="alert alert-danger alert-dismissble text-center"><strong>Update Data gagal.</strong> Silahkan coba lagi
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </div>
                                <?php
                                }
                        }
                    ?>
                        </div>
                    </div>
                </div>

                <!-- Btn Delete -->
                            <div class="modal fade" id="modalDelete<?php echo $hasil['ID_Buku'];?>" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Buku</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="DataBuku.php" method="post" id="delete">
                                            <input type="hidden" name="idDelete<?php echo $hasil['ID_Buku'];?>" value="<?php echo $hasil['ID_Buku'];?>">
                                            <label>Apakah anda yakin ingin menghapus data buku?</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" name="delete<?php echo $hasil['ID_Buku'];?>">Hapus</button>
                                            <button class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                if(isset($_POST["delete".$hasil['ID_Buku']])){
                                    $id=$_POST["idDelete".$hasil['ID_Buku']];
                                    if($qDelete=mysqli_query($conn, "delete from buku where ID_Buku='$id'")){
                                        echo "<script>window.location.href='DataBuku.php'</script>";
                                    }
                                }
                            }     
                            ?>
                        </table>
                    </div>
                    
                    <!--btn tambah-->
                    <button class="btn btn-success text-center" data-toggle="modal" data-target="#modalTambah">Tambah Buku</button>

                    <div class="modal fade"id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Buku</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="DataBuku.php" method="post" id="tambah">
                                        <div class="form-group">
                                            <label>ID Buku</label>
                                            <input type="number" class="form-control" name="IdBuku" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Judul Buku</label>
                                            <input type="text" class="form-control" name="JudulBuku" required>
                                        </div>

                                        <div class="form-group">
                                        <label>Pengarang</label>
                                            <input type="text" class="form-control" name="Pengarang" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input type="text" class="form-control" name="Penerbit" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <input type="date" class="form-control" name="TahunTerbit" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                                    <button class="btn btn-success" name="tambah">Tambahkan</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST['tambah'])){
                                $IdBuku = $_POST['IdBuku'];
                                $JudulBuku = $_POST['JudulBuku'];
                                $Pengarang = $_POST['Pengarang'];
                                $Penerbit = $_POST['Penerbit'];
                                $TahunTerbit = $_POST['TahunTerbit'];

                                $insert = mysqli_query($conn, "insert into buku (ID_Buku, Judul_Buku, Pengarang, Penerbit, Tahun_Terbit)values('$IdBuku', '$JudulBuku', '$Pengarang', '$Penerbit', '$TahunTerbit')");
                                if($insert){
                                    Echo "<script>window.location.href='DataBuku.php'</script>";
                                }
                                else{?>
                                    <div class="alert alert-danger alert-dismissble text-center"><strong>Insert gagal.</strong> Silahkan coba lagi
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </div>
                                <?php
                                }
                        }
                    ?>
                </div>
            </div>
            
        </div>
        <!--<footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Created by: Dhika Pangestu Irawan, Malik Indrayanto, Zefanya Ohito Dodo Abram Laia</span>
                    </div>
                </div>
            </footer>-->
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    </body>
</html>