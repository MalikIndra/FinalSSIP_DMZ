<!DOCTYPE html>
<html lang="en">
<head>
<title>APLIKASI PERPUSTAKAAN</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: red;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 300px; /* only for demonstration, should be removed */
  background: yellow;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: lightblue;
  height: 300px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>
<header>
  <h2>APLIKASI PERPUSTAKAAN</h2>
</header>

<section>
  <nav>
    <ul>
      <li><a href="DataSiswa.php">Data Siswa</a></li>
      <li><a href="DataPeminjaman.php">Data Peminjaman</a></li>
      <li><a href="DataBuku.php">Data Buku</a></li>
    </ul>
  </nav>
  
  <article>
    <h1>SELAMAT DATANG</h1>
    <p>Buku adalah jembatan ilmu</p>
  </article>
</section>

<footer>
  <p>Created By Dhika Pangestu Irawan , Malik Indrayanto, Zefanya Ohito Dodo Abram Laia</p>
</footer>

</body>
</html>
