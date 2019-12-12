<html>
    <head>
        <title>Data Peminjaman</title>
        <script type="text/javascript" src="../js/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <!-- <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/sb-admin-2.min.css">
        <link rel="stylesheet" href="../css/custom.css"> -->

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Custom fonts for this template-->
        <link href="../startbootstrap-sb-admin-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="../startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin.css" rel="stylesheet">
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
          <span>Kembali ke Halaman Utama</span>
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
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Buku</span></a>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">

    <header>
        <div class="container text-center">
            <h2>Data Peminjaman</h2>
        </div>
    </header>
    <div class="container">    
    <table class="table table-hover table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID Siswa</th>
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
    $select = mysqli_query($conn,"select * from peminjaman");
    while ($hasil = mysqli_fetch_array($select)){
    ?>
    <tr>
        <td><?php echo $hasil['id_siswa']; ?></td>
        <td><?php echo $hasil['nama_siswa']; ?></td>
        <td><?php echo $hasil['kelas']; ?></td>
        <td><?php echo $hasil['judul_buku']; ?></td>
        <td><?php echo $hasil['tgl_pinjam']; ?></td>
        <td><?php echo $hasil['tgl_dikembalikan']; ?></td>
        <td>
        <button class="btn btn-danger text-center" data-toggle="modal" data-target="#modalDelete<?php echo $hasil['id_siswa'];?>">Delete</button>
        <?php if($hasil['tgl_dikembalikan']==""){?><button class="btn btn-warning text-center" data-toggle="modal" data-target="#modalEdit<?php echo $hasil['id_siswa'];?>">Pengembalian</button><?php } ?>
        </td>
        </tr>

        <div class="modal fade" id="modalEdit<?php echo $hasil['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pengembalian</h5>
                    </div>
                    <div class="modal-body">
                        <form action="DataPeminjaman.php" method="post" id="kembali">
                        <input type="hidden" name="idKembali<?php echo $hasil['id_siswa'];?>" value="<?php echo $hasil['id_siswa'];?>">
                        <label>Tangal Kembali:</label><input type="date" name="tglKembali" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" name="kembali<?php echo $hasil['id_siswa'];?>">Konfirmasi</button>
                        <button class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDelete<?php echo $hasil['id_siswa'];?>" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Pinjaman</h5>
                    </div>
                    <div class="modal-body">
                        <form action="DataPeminjaman.php" method="post" id="delete">
                        <input type="hidden" name="idDelete<?php echo $hasil['id_siswa'];?>" value="<?php echo $hasil['id_siswa'];?>">
                        <label>Apakah anda yakin ingin menghapus data pinjaman ini?</label>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" name="delete<?php echo $hasil['id_siswa'];?>">Hapus</button>
                        <button class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            if(isset($_POST["delete".$hasil['id_siswa']])){
                $id=$_POST["idDelete".$hasil['id_siswa']];
                if($qDelete=mysqli_query($conn, "delete from peminjaman where id_siswa='$id'")){
                    echo "<script>window.location.href='DataPeminjaman.php'</script>";
                }
            } 

            if(isset($_POST["kembali".$hasil['id_siswa']])){
                $id=$_POST["idKembali".$hasil['id_siswa']];
                $kembali= date("d/m/Y", strtotime($_POST['tglKembali']));
                if($qUpdate=mysqli_query($conn, "update peminjaman set tgl_dikembalikan='$kembali' where id_siswa='$id'")){
                    echo "<script>window.location.href='DataPeminjaman.php'</script>";
                }else echo "gagal";
            }     
        } ?>
    </table>
    <button class="btn btn-primary text-center" data-toggle="modal" data-target="#modalTambah">Tambah Pinjaman</button>

    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pinjaman</h5>
                </div>
                <div class="modal-body">
                <!-- form tambah -->
                <form action="DataPeminjaman.php" method="post" id="tambah">
                    <div class="form-group">
                    <label>ID Siswa</label>
                    <input type="text" class="form-control" name="IdSiswa" required>
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
                    <label>Kelas</label>
                    <select class="form-control" name="kelas" required>
                        <option value="">-Pilih Kelas</option>
                        <option value="Information System">Information System</option>
                        <option value="Management">Management</option>
                        <option value="International Relation">International Relation</option>
                        <option value="Communication">Communication</option>
                        <option value="Accounting">Accounting</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label>Judul Buku</label>
                    <select class="form-control" name="judul" required>
                        <option value="">-Pilih buku</option>
                        <?php 
                            $qBuku=mysqli_query($conn, "select * from buku");
                            while($buku = mysqli_fetch_array($qBuku)){?>
                            <option value="<?php echo $buku['Judul_Buku'];?>"><?php echo $buku['Judul_Buku'];?></option>
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
                $id = $_POST['IdSiswa'];
                $nama = $_POST['nama'];
                $kelas = $_POST['kelas'];
                $judul = $_POST['judul'];
                $pinjam = date("d/m/Y", strtotime($_POST['pinjam']));

                $insert = mysqli_query($conn, "insert into peminjaman (id_siswa, nama_siswa, kelas, judul_buku, tgl_pinjam)values('$id', '$nama', '$kelas', '$judul', '$pinjam')");
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
    </div></div>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../startbootstrap-sb-admin-gh-pages/vendor/chart.js/Chart.min.js"></script>
    <script src="../startbootstrap-sb-admin-gh-pages/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../startbootstrap-sb-admin-gh-pages/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../startbootstrap-sb-admin-gh-pages/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../startbootstrap-sb-admin-gh-pages/js/demo/datatables-demo.js"></script>
    <script src="../startbootstrap-sb-admin-gh-pages/js/demo/chart-area-demo.js"></script>
    </body>
</html>