<?php
include 'config.php';
if(isset($_POST['delete'])) {
  $kd_barang = $_POST['kd_barang'];
  $query = $dbConn->query("DELETE FROM tbl_barang WHERE kd_barang = '".$kd_barang."'");
  if($query){
    echo $kd_barang;
    echo 'FILE BERHASIL DI DELETE';
    echo "<a href='../index.php'>Kembali</a>";
  }else{
    echo 'GAGAL DELETE FILE';
  }
}
 ?>
