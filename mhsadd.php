


<form action="" method="POST" enctype="multipart/form-data">

  <label for="nobp">NOBP</label>
  <input type="text" name="nobp" id="nobp">
  <br>
  <label for="nama">Nama</label>
  <input type="text" name="nama" id="nama">
  <br>
  <label>Kelas
    <select name="kelas" id="kelas">
      <option value="IF-1">IF-1</option>
      <option value="IF-1">IF-2</option>
      <option value="IF-1">IF-3</option>
    </select>
  </label>
  <br>
  <label for="tmplahir">Tempat / Tanggal Lahir</label>
  <input type="text" name="tmplahir" id="tmplahir">
  <br>
  <label for="tgllahir">Tanggal Lahir</label>
  <input type="date" name="tgllahir" id="tgllahir">
  <br>
  <label for="jk">Jenis Kelamin</label>
  <br>
  Laki-Laki
  <input type="radio" name="jk" id="jk" value="L">
  Perempuan
  <input type="radio" name="jk" id="jk" value="P">
  <br>
  <label for="">Alamat
    <textarea name="alamat" id="alamat" cols="50" rows="5"></textarea>
  </label>
  <br>
  <label for="hp">NO. Handphone</label>
  <input type="text" name="hp" id="hp">
  <br>
  <label for="email">Emai;</label>
  <input type="email" name="email" id="email">
  <br>
  <label for="foto">Foto</label>
  <input type="file" name="foto" id="foto">
  <br>
  <br>
  <label>
    <input name="simpan" type="submit"  id="simpan" value="Simpan Data">
  </label>
</form>

<?php 

  if($_POST["simpan"]){

    include "koneksi.php";

    $nmfoto = $_FILES["foto"]["name"];
    $lokfoto = $_FILES["foto"]["tmp_name"];

    if(!empty($lokfoto)){
      move_uploaded_file($lokfoto, "foto/$nmfoto");
    }

    $sql = "INSERT INTO mahasiswa (nobp, nama, kelas, tmplahir, tgllahir, Jk, alamaat, hp, email, foto, tglsimpan) VALUES ('$_POST[nobp]', '$_POST[nama]', '$_POST[kelas]', '$_POST[tmplahir]','$_POST[tgllahir]', '$_POST[jk]', '$_POST[alamat]', '$_POST[hp]', '$_POST[email]', '$nmfoto', NOW() )";

    $sqlm = mysqli_query($kon,$sql);

    if($sqlm){
      echo "Data Mahasiswa Berhasil disimpan";
    }else{
      "Gagal Menyimpan";
    }

    // echo "<META HTTP-EQUIV='Refresh', Content='1'; URL=?p=mhs>";
    
  }

?>