<?php
//including the database connection file
include_once("crud/config.php");

if (isset($_POST['submit']) and $_POST['jenis'] != 'jenis') {
  $jenis = $_POST['jenis'];
  $result = $dbConn->query("SELECT * FROM tbl_barang WHERE nama_kategori = '$jenis' ");
}else {
  $jenis = 'Mouse';
  $result = $dbConn->query("SELECT * FROM tbl_barang WHERE nama_kategori = '$jenis' ");
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Product</title>
    <?php include "asset/import.php" ?>
    <link rel="stylesheet" href="css/product.css">
  </head>
  <body>
    <?php include "asset/navigation.php" ?>
    <div class="container">
      <h2>Daftar Produk</h2>
      <h3><a href="addPage.php">+ Tambah Product</a></h3>
      <div class="container">
        <form class="jenis" action="admin.php" method="post">
          <select name="jenis">
            <option value="jenis">Jenis</option>
            <option value="Mouse">Mouse</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Laptop">Laptop</option>
          </select>
          <input id="set" type="submit" name="submit" value="Set">
        </form>
      </div>

      <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="col-md-4 text-justify">';
          echo '<div class="product">';
          echo '<form class="editForm" action="editPage.php" method="post">';
          echo '<img class="img-responsive" src="crud/file/'.$row["gambar"].'" alt="product-img">';
          echo "<h3>".$row['nama_barang']."</h3>";
          echo "<h4>".$row['harga_barang']."</h4>";
          echo "<h5>".$row['kd_barang']."</h5>";
          echo '<input type="hidden" name="kd_barang" value='.$row['kd_barang'].'>';//hidden value
          echo '<input type="submit" name="edit" value="Edit">';
          echo "</form>";
          echo "</div>";
          echo "</div>";
        }
       ?>
    </div>
  </body>
</html>
