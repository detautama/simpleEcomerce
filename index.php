<?php
  //including the database connection file
  include_once("crud/config.php");

  //fetching data in descending order (lastest entry first)
  $result = $dbConn->query("SELECT * FROM tbl_barang ORDER BY kd_barang DESC");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <?php include "asset/import.php" ?>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css"/>
  </head>
  <body>
    <?php include "asset/navigation.php" ?>
    <div class="jumbotron text-center">
      <div class="wrap">
        <h1>Welcome to Tech Store</h1>
        <h3>The Best Computer Store</h3>
      </div>
    </div>

    <div class="latest container">
      <h1 class="text-center">New Product</h1>
      <?php
      $count = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          if ($count < 9) {
            echo '<div class="col-md-4 text-justify">';
            echo '<div class="product">';
            echo '<img class="img-responsive" src="crud/file/'.$row["gambar"].'" alt="product-img">';
            echo "<h3>".$row['nama_barang']."</h3>";

            $harga = $row['harga_barang'];
            $hargaFormat = number_format($harga,2,',','.');

            echo "<h4>Rp ".$hargaFormat."</h4>";
            echo '<h5>#'.$row['nama_kategori'].'</h5>';

            echo '<form action="detail.php" method="post">';
            echo '<input type="hidden" name="kd_barang" value='.$row["kd_barang"].'>';
            echo '<input type="submit" name='.$row["kd_barang"].' value="Detail">';
            echo '</form>';

            echo "</div>";
            echo "</div>";
            $count= $count + 1;
          }else {
            break;
          }
        }
       ?>
    </div>

    <footer>
      <h4>Tech Store Copyright &copy; 2017</h4>
    </footer>
  </body>
</html>
