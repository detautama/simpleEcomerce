<?php
  $host = "localhost";
  $dbname = "dode";
  $dbuser = "root";
  $dbpass = "";

  try {
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
     // More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
   } catch(PDOException $e) {
       echo $e->getMessage();
   }


 ?>
