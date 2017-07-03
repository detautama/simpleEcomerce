<?php
include_once("crud/config.php");
if (isset($_POST['edit'])) {
  $kd_barang = $_POST['kd_barang'];
  $result = $dbConn->query("SELECT * FROM tbl_barang WHERE kd_barang = '$kd_barang' ");
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <?php include "asset/import.php" ?>
    <link rel="stylesheet" href="css/editPage.css">
  </head>
  <body>
    <div class="jumbotron text-center">
      <h1>Edit Product</h1>
    </div>
    <div class="container">
        <h3>Kode Barang</h3>
        <?php
          $row = $result->fetch(PDO::FETCH_ASSOC);
            echo '<form class="addForm" action="crud/edit.php" method="post" enctype="multipart/form-data">';
            echo '<input type="text" name="kd_brg" value='.$row['kd_barang'].'>';
            echo '<br>';
            echo '<h3>Nama Barang</h3>';
            echo '<input type="text" name="nama_brg" value='.$row['nama_barang'].'>';
            echo '<br>';
            echo '<h3>Nama Kategori</h3>';
            echo '<h4>'.$row['nama_kategori'].'';
            echo '<br>';
            echo '<select name="nama_ktgr">';
            echo '<option value="Mouse">Mouse</option>';
            echo '<option value="Keyboard">Keyboard</option>';
            echo '<option value="Laptop">Laptop</option>';
            echo '</select>';
            echo '<br>';
            echo '<h3>Harga Barang</h3>';
            echo '<input type="text" name="harga_brg" value='.$row['harga_barang'].'>';
            echo '<br>';
            echo '<h3>Deskrpisi</h3>';
            echo '<textarea name="deskripsi" cols="40" rows="5">'.$row['deskripsi'].'</textarea>';
            echo '<br>';
            echo '<h3>Foto Barang</h3>';
            echo '<img class="img-responsive" src="crud/file/'.$row['gambar'].'" alt="product-img">';
            echo '<input type="file" name="file">';
            echo '<input type="submit" name="upload" value="simpan">';
            echo '<form class="deleteForm" action="crud/delete.php" method="post">';
            echo '<input type="hidden" name="kd_barang" value='.$row['kd_barang'].'>';
            echo '<input type="submit" name="delete" value="Delete">';
            echo '<a href="index.php"><button type="button" name="button">Batal</button></a>';
            echo '</form>';
         ?>
    </div>
  </body>
</html>
