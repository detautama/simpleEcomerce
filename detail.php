<?php
  //including the database connection file
  include_once("crud/config.php");
  $kd_barang = $_POST['kd_barang'];
  //fetching data in descending order (lastest entry first)
  $result = $dbConn->query("SELECT * FROM tbl_barang WHERE kd_barang = '".$kd_barang."'");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Detail</title>
    <?php include "asset/import.php" ?>
    <link rel="stylesheet" href="css/detail.css">
  </head>
  <body>
    <?php include "asset/navigation.php" ?>

    <?php
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="container">';
          echo '<div class="col-md-6">';
          echo '<img class="img-responsive" src="crud/file/'.$row["gambar"].'" alt="product-img">';
          echo '</div>';
          echo '<div class="col-md-6 desc">';
          echo '<h1>'.$row['nama_barang'].'</h1>';
          echo '<p>'.$row['deskripsi'].'</p>';
          echo '<h3>Price : Rp10.000</h3>';
          echo '</div>';
          echo '</div>';
      }
     ?>
  </body>
</html>
