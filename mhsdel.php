<?php 

  $sqlm = mysqli_query($kon, "DELETE FROM mahasiswa WHERE idmhs='$_GET[id]'");

  var_dump($sqlm);

  if($sqlm){
    echo "Data Mahasiswa Berhasil dihapus";
  }else{
    "Gagal Menghapus";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php'>";

?>