<?php   

  include "koneksi.php";
  echo "<br>";
  // echo "<a href='?p=mhsadd'>Tambah Data Mahasiswa</a>";
  echo "<a href='mhsadd.php'>Tambah Data Mahasiswa</a>";
  echo "<br>";
  echo "<br>";
  echo "
        <table width='100%' border='1' cellspacing='1' cellpadding='10'>
          <tr>
            <td>No</td>
            <td>Foto</td>
            <td>Mahasiswa</td>
            <td>Data Personal</td>
            <td>Kontak</td>
            <td>Aksi</td>
          </tr>";

  $sqlm = mysqli_query($kon, "SELECT * FROM mahasiswa ORDER BY tglsimpan DESC");
  $no = 1;
  while($rm = mysqli_fetch_array($sqlm)){
    echo "
      <tr>
        <td>$no</td>
        <td><img src='foto/$rm[foto]' width='50px'></td>
        <td>
          No.Bp : <b>$rm[nobp]</b> <br>
          Nama : <b>$rm[nama]</b> <br>
          Kelas: <b>$rm[kelas]</b> <br>
          Terdaftar Sejak: <b>$rm[tglsimpan]</b>
        </td>
          <td>Tempat / Tanggal Lahir : <br>
          <b>$rm[tmplahir] / $rm[tgllahir]</b> <br>
          Jenis Kelamin : <b>$rm[jk]</b>
        </td>
        <td>
          Alamat : <b>$rm[alamat]</b> <br>
          Hp : <b>$rm[hp]</b> <br>
          Email : <b>$rm[email]</b>
        </td>
        <td>
          <a href='?p=mhsedit&id=$rm[idmhs]'>Ubah</a>
          <a href='?p=mhsdel&id=$rm[idmhs]'>Hapus</a>
        </td>
      </tr>
    ";
    $no++;
  }
  echo "</table>";

?>



