<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tambah</title>
    <?php include "asset/import.php" ?>
    <link rel="stylesheet" href="css/editPage.css">
  </head>
  <body>
    <div class="jumbotron text-center">
      <h1>Add Product</h1>
    </div>
    <div class="container">
      <form class="addForm" action="crud/add.php" method="post" enctype="multipart/form-data">
        <h3>Kode Barang</h3>
        <input type="text" name="kd_brg">
        <br>
        <h3>Nama Barang</h3>
        <input type="text" name="nama_brg">
        <br>
        <h3>Nama Kategori</h3>
        <select name="nama_ktgr">
          <option value="Mouse">Mouse</option>
          <option value="Keyboard">Keyboard</option>
          <option value="Laptop">Laptop</option>
        </select>
        <br>
        <h3>Deskrpisi</h3>
        <textarea name="deskripsi" cols="40" rows="5"></textarea>
        <br>
        <h3>Harga Barang</h3>
        <input type="text" name="harga_brg">
        <br>
        <h3>Foto Barang</h3>
        <input type="file" name="file">
        <input type="submit" name="upload" value="simpan">
        <a href="index.php"><button type="button" name="button">Batal</button></a>
      </form>
    </div>
  </body>
</html>
