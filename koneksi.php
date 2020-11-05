<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "db_crud";

  $kon = mysqli_connect($host, $user, $pass, $db);

  // if($kon){
  //   echo "Terkoneksi dengan MYSQL Server";
  //   echo "Databse $db berhasil di akses";
  // }

  $result = mysqli_query($kon, "SELECT * FROM  mahasiswa");
  $mhs = mysqli_fetch_row($result);

?>
