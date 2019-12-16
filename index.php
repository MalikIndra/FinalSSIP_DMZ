<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Perpustakaan - Main Menu</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
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
                      <a class="nav-link" href="#">
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
                      <form action="index.php" method="post">
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
                          <li class="breadcrumb-item active">Halaman Utama</li>
                      </ol>
                      <h1 class="display-1">SELAMAT DATANG</h1>
                      <hr>
                        <div class="container ml-1">Buku adalah Jembatan Ilmu <br><br></div>  
                        
                        <div class="row ml-1">
                          <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                              <div class="card-body">
                                <div class="card-body-icon">
                                  <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5">Data Siswa</div>
                              </div>
                              <a class="card-footer text-white clearfix small z-1" href="DataSiswa.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                                </span>
                              </a>
                            </div>
                          </div>

                          <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                              <div class="card-body">
                                <div class="card-body-icon">
                                  <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5">Data Pinjaman</div>
                              </div>
                              <a class="card-footer text-white clearfix small z-1" href="DataPeminjaman.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                                </span>
                              </a>
                            </div>
                          </div>

                          <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                              <div class="card-body">
                                <div class="card-body-icon">
                                  <i class="fas fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5">Data Buku</div>
                              </div>
                              <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                                </span>
                              </a>
                            </div>
                          </div>
                          </div>
                        </div>

                      <footer class="sticky-footer">
                          <div class="container my-auto">
                              <div class="copyright text-center my-auto">
                              <span>Created by: Dhika Pangestu Irawan, Malik Indrayanto, Zefanya Ohito Dodo Abram Laia</span>
                              </div>
                          </div>
                      </footer>
                  </div>
              </div>

              
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
</body>
</html>
