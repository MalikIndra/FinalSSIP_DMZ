<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Perpustakaan - Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script type="text/javascript" src="js/jquery-3.4.1.js"></script>
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <link href="css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" action="login.php">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus="autofocus">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
              <label for="password">Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="login">Login</button>
        </form>
        <?php
            include 'koneksi.php';
            if(isset($_POST['login'])){
                if($_POST['username'] == "admin" && $_POST['password'] == "admin"){
                    $q=mysqli_query($conn, "update session set login='test' where id='1'");
                    header("location:index.php");
                }else{?><br>    
                    <div class="alert alert-danger alert-dismissble fade show text-center">Wrong Username/Password.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            }
        ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="css/vendor/jquery/jquery.min.js"></script>
  <script src="css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="css/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
