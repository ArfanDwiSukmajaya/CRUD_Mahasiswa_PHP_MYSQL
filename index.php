<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project CRUD Data Mahasiswa</title>
</head>
<body>
  <h2>Project CRUD Mahasiswa</h2>
  <?php

    include "koneksi.php";

    if(isset($_GET["p"]) == "mhsadd"){
      include "mhsadd.php";
    }else if(isset($_GET["p"]) == "mhsedit"){
      include "mhsedit.php";
    }else if(isset($_GET["p"]) == "mhsdel"){
      include "mhsdel.php";
    }else{
      include "mhs.php";
    }
  ?>
</body>
</html>