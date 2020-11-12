<?php 

  $sqlm = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE idmhs = '$_GET[id]'");

  $rm = mysqli_fetch_array($sqlm);


?>


<form action="" name="form1" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="idmhs" value="<?= "$rm[idmhs]" ?>"/>
<label for="nobp">NOBP</label>
<input type="text" name="nobp" id="nobp" value="<?= "$rm[nobp]" ?>">
<br>
  <label for="nama">Nama</label>
  <input type="text" name="nama" id="nama" value="<?= "$rm[nama]" ?>">  
<br>
  Kelas
  <label>
  <?php 
    echo "<select name='kelas' id='kelas'>";
      for($i=1; $i<=3; $i++){
        if($rm["kelas"] == "IF-$i"){
          $sel = "selected";
          echo "<option value='IF-$i' $sel>IF-$i</option>";
        }else{
          echo "<option value='IF-$i'>IF-$i</option>";
        }
      }
    echo "</select>";
    ?>
  </label>
<br>
  <label for="tmplahir">Tempat /Tanggal Lahir</label>
  <input type="text" name="tmplahir" id="tmplahir" value="<?= "$rm[tmplahir]" ?>">
<br>
  <label for="tgllahir">Tanggal Lahir</label>
  <input type="date" name="tgllahir" id="tgllahir" value="<?= "$rm[tgllahir]" ?>">


<br>
  Jenis Kelamin
  <label >
    <input type="radio" name="jk" value="L" <?php if($rm['jk']=='L') echo 'checked'?>>Laki-Laki</label>
    <input type="radio" name="jk" value="P" <?php if($rm['jk']=='P') echo 'checked'?>>Perempuan</label>
<br>Alamat
  <label for="">
    <textarea name="alamat" id="alamat" cols="30" rows="10"> <?= "$rm[alamat]" ?></textarea>
  </label>
<br>
  <label for="hp">No Handphone</label>
  <input type="text" name="hp" id="hp" value="<?= "$rm[hp]" ?>">
<br>
  <label for="email">Email</label>
  <input type="email" name="email" id="email" value="<?= "$rm[email]" ?>">
  <br>
<?php 
  echo "<img src='foto/$rm[foto]' width='100px' >";
?>
<br>
  <label for="foto">Foto</label>
  <input type="file" name="foto" id="foto">
<br>
<br>
  <label>
    <input type="submit" name="simpan" id="simpan" value="Simpan Mahassiwa">
  </label>

</form>

<?php 

  if(isset($_POST["simpan"])){

    include "koneksi.php";

    $nmfoto = $_FILES["foto"]["name"];
    $lokfoto = $_FILES["foto"]["tmp_name"];

    if(!empty($lokfoto)){
      move_uploaded_file($lokfoto, "foto/$nmfoto");
      $foto = ", foto='$nmfoto'";
    }else{
      $foto = "";
    }

    $idmhs = $_POST['idmhs'];
    $nobp = $_POST["nobp"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $tmplahir = $_POST["tmplahir"];
    $tgllahir = $_POST["tgllahir"];
    $jk = $_POST["jk"];
    $alamat = $_POST["alamat"];
    $hp = $_POST["hp"];
    $email = $_POST["email"];

    $sql = "UPDATE mahasiswa SET
                   nobp='$nobp',
                   nama = '$nama',
                   kelas= 'if-4',
                   tmplahir='$tmplahir',
                   tgllahir='$tgllahir',
                   jk='$jk',
                   alamat='$alamat',
                   hp='$hp',
                   email='$email'
                   $foto
                   WHERE idmhs='$idmhs' ";

    $sqlm = mysqli_query($kon, $sql);

    // var_dump($nobp, $nama, $kelas, $tmplahir, $tgllahir, $jk, $alamat, $hp, $email, $nmfoto );

    var_dump($sqlm);

    if($sqlm == false){
      echo "gagal";
      var_dump(mysqli_error($kon));
    }

    if($sqlm){
      echo "Data Mahasiswa Berhasil disimpan";
    }else{
      "Gagal Menyimpan";
    }

    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php'>";
    
  }

?>
