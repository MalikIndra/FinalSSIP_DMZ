<html>
    <head>
        <title>Data Peminjaman</title>
        <link rel="icon" href="iconheader/pinjamicon.jpg">
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
                        <form action="DataPeminjaman.php" method="post">
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
                    <li class="breadcrumb-item active">Data Peminjaman</li>
                </ol>
                <h1>Data Peminjaman</h1>
                <hr>
                <div class="container">    
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Peminjaman</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Dikembalikan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <?php
                                include 'koneksi.php';
                                $select = mysqli_query($conn,"SELECT peminjaman.id_peminjaman, siswa.Nama_Siswa, siswa.Kelas, buku.Judul_Buku, peminjaman.tgl_pinjam, peminjaman.tgl_dikembalikan
                                FROM peminjaman
                                INNER JOIN siswa ON peminjaman.nama_siswa=siswa.Nama_siswa 
                                INNER JOIN buku ON peminjaman.judul_buku=buku.ID_Buku order by id_peminjaman asc;");
                                while ($hasil = mysqli_fetch_array($select)){
                            ?>
                            <tr>
                                <td><?php echo $hasil['id_peminjaman']; ?></td>
                                <td><?php echo $hasil['Nama_Siswa']; ?></td>
                                <td><?php echo $hasil['Kelas']; ?></td>
                                <td><?php echo $hasil['Judul_Buku']; ?></td>
                                <td><?php echo $hasil['tgl_pinjam']; ?></td>
                                <td><?php echo $hasil['tgl_dikembalikan']; ?></td>
                                <td>
                                <button class="btn btn-danger text-center" data-toggle="modal" data-target="#modalDelete<?php echo $hasil['id_peminjaman'];?>">Delete</button>
                                <?php if($hasil['tgl_dikembalikan']==""){?><button class="btn btn-warning text-center" data-toggle="modal" data-target="#modalEdit<?php echo $hasil['id_peminjaman'];?>">Kembali</button><?php } ?>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalEdit<?php echo $hasil['id_peminjaman'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pengembalian</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="DataPeminjaman.php" method="post" id="kembali">
                                            <input type="hidden" name="idKembali<?php echo $hasil['id_peminjaman'];?>" value="<?php echo $hasil['id_peminjaman'];?>">
                                            <label>Tangal Kembali:</label><input type="date" name="tglKembali" class="form-control" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success" name="kembali<?php echo $hasil['id_peminjaman'];?>">Konfirmasi</button>
                                            <button class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modalDelete<?php echo $hasil['id_peminjaman'];?>" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Pinjaman</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="DataPeminjaman.php" method="post" id="delete">
                                            <input type="hidden" name="idDelete<?php echo $hasil['id_peminjaman'];?>" value="<?php echo $hasil['id_peminjaman'];?>">
                                            <label>Apakah anda yakin ingin menghapus data pinjaman ini?</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" name="delete<?php echo $hasil['id_peminjaman'];?>">Hapus</button>
                                            <button class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php 
                                if(isset($_POST["delete".$hasil['id_peminjaman']])){
                                    $id=$_POST["idDelete".$hasil['id_peminjaman']];
                                    if($qDelete=mysqli_query($conn, "delete from peminjaman where id_peminjaman='$id'")){
                                        echo "<script>window.location.href='DataPeminjaman.php'</script>";
                                    }
                                } 

                                if(isset($_POST["kembali".$hasil['id_peminjaman']])){
                                    $id=$_POST["idKembali".$hasil['id_peminjaman']];
                                    $kembali= date("d/m/Y", strtotime($_POST['tglKembali']));
                                    if($qUpdate=mysqli_query($conn, "update peminjaman set tgl_dikembalikan='$kembali' where id_peminjaman='$id'")){
                                        echo "<script>window.location.href='DataPeminjaman.php'</script>";
                                    }else echo "gagal";
                                }     
                            } 
                            ?>
                        </table>
                    </div>
                    <button class="btn btn-primary text-center" data-toggle="modal" data-target="#modalTambah">Tambah Pinjaman</button>

                    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pinjaman</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="DataPeminjaman.php" method="post" id="tambah">
                                        <div class="form-group">
                                            <label>ID Peminjaman</label>
                                            <input type="text" class="form-control" name="IdPinjam" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Siswa</label>
                                            <select class="form-control" name="nama" required>
                                                <option value="">-Pilih Siswa</option>
                                                <?php 
                                                    $qNama=mysqli_query($conn, "select * from siswa");
                                                    while($namaSiswa = mysqli_fetch_array($qNama)){?>
                                                    <option value="<?php echo $namaSiswa['Nama_Siswa'];?>"><?php echo $namaSiswa['Nama_Siswa'];?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Buku</label>
                                            <select class="form-control" name="judul" required>
                                                <option value="">-Pilih buku</option>
                                                <?php 
                                                    $qBuku=mysqli_query($conn, "select * from buku");
                                                    while($buku = mysqli_fetch_array($qBuku)){?>
                                                    <option value="<?php echo $buku['ID_Buku'];?>"><?php echo $buku['Judul_Buku'];?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Peminjaman</label>
                                            <input type="date" class="form-control" name="pinjam" required>
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
                                $id = $_POST['IdPinjam'];
                                $nama = $_POST['nama'];
                                $judul = $_POST['judul'];
                                $pinjam = date("d/m/Y", strtotime($_POST['pinjam']));

                                $insert = mysqli_query($conn, "insert into peminjaman (id_peminjaman, nama_siswa, judul_buku, tgl_pinjam)values('$id', '$nama', '$judul', '$pinjam')");
                                if($insert){
                                    Echo "<script>window.location.href='DataPeminjaman.php'</script>";
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
        <!--<footer class="sticky-footer">-->
        <!--        <div class="container my-auto">-->
        <!--            <div class="copyright text-center my-auto">-->
        <!--            <span>Created by: Dhika Pangestu Irawan, Malik Indrayanto, Zefanya Ohito Dodo Abram Laia</span>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </footer>-->
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    </body>
</html>
