<?php
  include_once("crud/config.php");

  //fetching data in descending order (lastest entry first)
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
      <div class="container">
        <form class="jenis" action="product.php" method="post">
          <select name="jenis">
            <option value="jenis">Jenis</option>
            <option value="Mouse">Mouse</option>
            <option value="Keyboard">Keyboard</option>
            <option value="Laptop">Laptop</option>
          </select>
          <br>
          <input id="set" type="submit" name="submit" value="Set">
        </form>
      </div>

      <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="col-md-4 text-justify">';
          echo '<div class="product">';
          echo '<img class="img-responsive" src="crud/file/'.$row["gambar"].'" alt="product-img">';
          echo "<h3>".$row['nama_barang']."</h3>";

          $harga = $row['harga_barang'];
          $hargaFormat = number_format($harga,2,',','.');

          echo "<h4>Rp".$hargaFormat."</h4>";
          echo '<h5>#'.$row['nama_kategori'].'</h5>';

          echo '<form action="detail.php" method="post">';
          echo '<input type="hidden" name="kd_barang" value='.$row["kd_barang"].'>';
          echo '<input type="submit" name='.$row["kd_barang"].' value="Detail">';
          echo '</form>';

          echo "</div>";
          echo "</div>";
        }
       ?>
    </div>

    <footer>
      <h4>Tech Store Copyright &copy; 2017</h4>
    </footer>
  </body>
</html>
