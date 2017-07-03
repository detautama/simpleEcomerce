<?php
  include 'config.php';
  if (isset($_POST['upload'])) {
    $kd_barang = $_POST['kd_brg'];
    $nama_barang = $_POST['nama_brg'];
    $nama_kategori = $_POST['nama_ktgr'];
    $deskripsi = $_POST['deskripsi'];
    $harga_barang = $_POST['harga_brg'];

    $ekstensi_diperbolehkan	= array('png','jpg','jpeg','webp');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){
					move_uploaded_file($file_tmp, 'file/'.$nama);
          $query = $dbConn->query("UPDATE tbl_barang SET nama_barang='".$nama_barang."', nama_kategori='".$nama_kategori."', harga_barang = ".$harga_barang.", gambar='".$nama."', deskripsi='".$deskripsi."'  WHERE kd_barang='".$kd_barang."'");
          //$query = $dbConn->query("INSERT INTO tbl_gambar VALUES('$nama')");
					if($query){
            echo '<script type="text/javascript">';
            echo 'AlertIt();';
            echo 'function AlertIt() {';
            echo 'var answer = confirm ("File berhasil di update");';
            echo 'if (answer)';
            echo 'window.location="../index.php";';
            echo '}';
            echo '</script>';
					}else{
            echo '<script type="text/javascript">';
            echo 'AlertIt();';
            echo 'function AlertIt() {';
            echo 'var answer = confirm ("Gagal mengupload gambar");';
            echo 'if (answer)';
            echo 'window.location="../index.php";';
            echo '}';
            echo '</script>';
					}echo 'if (answer)';
            echo 'window.location="../index.php";';
            echo '}';
				}else{
          echo '<script type="text/javascript">';
          echo 'AlertIt();';
          echo 'function AlertIt() {';
          echo 'var answer = confirm ("Ukuran file terlalu besar");';
          echo 'if (answer)';
          echo 'window.location="../index.php";';
          echo '}';
          echo '</script>';
				}
			}else{
        echo '<script type="text/javascript">';
        echo 'AlertIt();';
        echo 'function AlertIt() {';
        echo 'var answer = confirm ("Ekstensi file yang diupload tidak diperbolehkan");';
        echo 'if (answer)';
        echo 'window.location="../index.php";';
        echo '}';
        echo '</script>';
		  }
	} elseif (isset($_POST['delete'])) {
	  $kd_barang = $_POST['kd_brg'];
    $query = $dbConn->query("DELETE FROM tbl_barang WHERE kd_barang = '".$kd_barang."'");
    if($query){
      echo 'FILE BERHASIL DI DELETE';
      echo "<a href='../index.php'>Kembali</a>";
    }else{
      echo 'GAGAL DELETE FILE';
    }
	}
 ?>
