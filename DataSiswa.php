<html>
    <head>
        <title>Data Siswa</title>
        <link rel="icon" href="iconheader/siswaicon.png">
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
                        <form action="DataSiswa.php" method="post">
                        <button class="btn btn-info" name="logout">Logout</button>
                        <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(isset($_POST['logout'])){
            include 'koneksi.php';
            $q=mysqli_query($conn, "update session set login='' where id='1'");
            echo "<script>window.location.href='login.php'</script>";
        }
        ?>

        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Menu</a>
                    </li>
                    <li class="breadcrumb-item active">Data Siswa</li>
                </ol>
                <h1>Data Siswa</h1>
                <hr>
                <div class="container">    
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Siswa</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <?php
                                include 'koneksi.php';
                                $select = mysqli_query($conn,"select * from siswa");
                                while ($hasil = mysqli_fetch_array($select)){
                            ?>
                            <tr>
                                <td><?php echo $hasil['ID_Siswa']; ?></td>
                                <td><?php echo $hasil['Nama_Siswa']; ?></td>
                                <td><?php echo $hasil['Kelas']; ?></td>
                                <td><?php echo $hasil['Jenis_Kelamin']; ?></td>
                                <td><?php echo $hasil['Alamat']; ?></td>
                                <td>
                                <button class="btn btn-danger text-center" data-toggle="modal" data-target="#modalDelete<?php echo $hasil['ID_Siswa'];?>">Delete</button>
                                <button class="btn btn-warning text-center" data-toggle="modal" data-target="#modalUpdate<?php echo $hasil['ID_Siswa'];?>">Update</button>
                                </td>
                            </tr>
                            
                        <div class="modal fade" id="modalUpdate<?php echo $hasil['ID_Siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Siswa</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="DataSiswa.php" method="get" id="update">
                                                        <input type= "hidden" class="form-control" name="IdSiswa" value="<?php echo $hasil['ID_Siswa']?>">
                                                <div class="form-group">
                                                    <label>Nama Siswa</label>
                                                        <input type="text" class="form-control" name="NamaSiswa" value="<?php echo $hasil['Nama_Siswa']?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                        <input type="text" class="form-control" name="Kelas" value="<?php echo $hasil['Kelas']?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                        <input type="text" class="form-control" name="JenisKelamin" value="<?php echo $hasil['Jenis_Kelamin']?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                        <input type="text" class="form-control" name="Alamat" value="<?php echo $hasil['Alamat']?>">
                                                </div>
                                        </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-success" name="update<?php echo $hasil['ID_Siswa']?>">Selesai</button>
                                                </form>
                                                </div>
                                    </div>
                                 </div>
                                 <?php
                        if (isset($_GET['update'.$hasil['ID_Siswa']])){
                                $IdSiswa = $_GET['IdSiswa'];
                                $NamaSiswa = $_GET['NamaSiswa'];
                                $Kelas = $_GET['Kelas'];
                                $JenisKelamin = $_GET['JenisKelamin'];
                                $Alamat = $_GET['Alamat'];
                                
                            $update = mysqli_query ($conn, "UPDATE siswa SET Nama_Siswa = '$NamaSiswa',
                            Kelas = '$Kelas', Jenis_Kelamin = '$JenisKelamin', Alamat = '$Alamat' 
                            WHERE ID_Siswa = '$IdSiswa'");
                            if ($update){
                                    Echo "<script>window.location.href='DataSiswa.php'</script>";
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
                                 
                            <div class="modal fade" id="modalDelete<?php echo $hasil['ID_Siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data Siswa</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="DataSiswa.php" method="post" id="delete">
                                            <input type="hidden" name="idDelete<?php echo $hasil['ID_Siswa'];?>" value="<?php echo $hasil['ID_Siswa'];?>">
                                            <label>Apakah anda yakin ingin menghapus data siswa ini?</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" name="delete<?php echo $hasil['ID_Siswa'];?>">Hapus</button>
                                            <button class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                if(isset($_POST["delete".$hasil['ID_Siswa']])){
                                    $id=$_POST["idDelete".$hasil['ID_Siswa']];
                                    if($qDelete=mysqli_query($conn, "delete from siswa where ID_Siswa='$id'")){
                                        echo "<script>window.location.href='DataSiswa.php'</script>";
                                    }
                                }
                            }     
                            ?>
                        </table>
                    </div>
                    <button class="btn btn-primary text-center" data-toggle="modal" data-target="#modalTambah">Tambah Siswa</button>

                    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Siswa</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="DataSiswa.php" method="post" id="tambah">
                                        <div class="form-group">
                                            <label>ID Siswa</label>
                                            <input type="text" class="form-control" name="IdSiswa" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <input type="text" class="form-control" name="NamaSiswa" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="Kelas" required>
                                                <option value="">-Pilih Kelas</option>
                                                <option value="Information System">Information System</option>
                                                <option value="Management">Management</option>
                                                <option value="International Relation">International Relation</option>
                                                <option value="Communication">Communication</option>
                                                <option value="Accounting">Accounting</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="JenisKelamin" required>
                                                <option value="">-Pilih Jenis Kelamin</option>
                                                <option value="Laki Laki">-Laki-Laki</option>
                                                <option value="Perempuan">-Perempuan-</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="Alamat" required>
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
                                $IdSiswa = $_POST['IdSiswa'];
                                $NamaSiswa = $_POST['NamaSiswa'];
                                $Kelas = $_POST['Kelas'];
                                $JenisKelamin = $_POST['JenisKelamin'];
                                $Alamat = $_POST['Alamat'];

                                $insert = mysqli_query($conn, "insert into siswa (ID_Siswa, Nama_Siswa, Kelas, Jenis_Kelamin, Alamat)values('$IdSiswa', '$NamaSiswa', '$Kelas', '$JenisKelamin', '$Alamat')");
                                if($insert){
                                    Echo "<script>window.location.href='DataSiswa.php'</script>";
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