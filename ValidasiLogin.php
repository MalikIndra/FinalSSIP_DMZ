<?php
      include 'koneksi.php';
      $a=mysqli_query($conn, "select * from session where id='1'");
      $valid=mysqli_fetch_array($a);
      if($valid['login']==""){
        echo "<script>window.location.href='login.php'</script>";
      }?>