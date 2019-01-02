<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style> 
td{
  font-weight: bold;
  color: green;
  font-size: 20px;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
}

</style>

<body>
  <h1 align="center">Ubah Data Buku</h1>
  
  <?php
  // Load file koneksi.php
  include "konek.php";
  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $idbuku = $_GET['idbuku'];
  $halamanAktif = $_GET['halaman'];

  
  // Query untuk menampilkan data siswa berdasarkan idbuku yang dikirim
  $query = "SELECT * FROM buku WHERE idbuku='".$idbuku."'";
  $sql = mysqli_query($kon, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

  $checked = explode(', ', $data['level']);

  $query = mysqli_query($kon, "SELECT * FROM buku ORDER BY id DESC");

  ?>
  
  <div>
  <form method="post" action="edit2.php">
  <table cellpadding="8" align="center">
  <tr>
    <td>judul :</td>
    <td><input type="text" name="judul" value="<?php echo $data['judul']; ?>" size="30"></td>
  </tr>

    <tr>
    <td>pengarang :</td>
    <td><input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" size="30"></td>
  </tr>

    <tr>
    <td>penerbit : <th align="left">
          <select name="penerbit" id="">
            <option value="">pilih</option>
            <option value="Andi Offset" <?php if ($data['penerbit']=="Andi Offset") {
              echo "selected=\"selected\"";
            } ?>>Andi Offset</option>
            <option value="Gramedia" <?php if ($data['penerbit']=="Gramedia") {
              echo "selected=\"selected\"";
            } ?>>Gramedia</option>
            <option value="Tiga Serangkai" <?php if ($data['penerbit']=="Tiga Serangkai") {
              echo "selected=\"selected\"";
            } ?>>Tiga Serangkai</option>
          </select>
        </td>
  </tr>

    <tr>
    <td>Jenis :</td>
    <td>
    <?php
    if($data['jenis'] == "komputer"){
      echo "<input type='radio' name='jenis' value='komputer' checked='checked'> komputer";
      echo "<input type='radio' name='jenis' value='lainnya'> lainnya";
    }else if($data['jenis'] == "lainnya"){
      echo "<input type='radio' name='jenis' value='komputer'> komputer";
      echo "<input type='radio' name='jenis' value='lainnya' checked='checked'> lainnya";
    }else if ($data['jenis'] == "") {
      echo "  <input type='radio' name='jenis' value='komputer'> komputer
        <input type='radio' name='jenis' value='lainnya'> lainnya";
    }
    ?>
    </td>
  </tr>

  <tr>
    <td>level :</td>
    <td>
      <input type="checkbox" name="level[]" value="pemula" <?php in_array ('pemula', $checked) ? print "checked" : ""; ?> > pemula
  <input type="checkbox" name="level[]" value="menengah" <?php in_array ('menengah', $checked) ? print "checked" : ""; ?> > menengah
  <input type="checkbox" name="level[]" value="mahir" <?php in_array ('mahir', $checked) ? print "checked" : ""; ?> > mahir   
    </td>
  </tr>

  <tr>
    <td>
        <input type="submit" value="edit" class="btn btn-primary" >
        <a href="layout5.php"><input type="button" value="Batal" class="btn btn-danger"></a>
    </td>
     
   
    <input type="hidden" name="halaman" value="<?php echo $halamanAktif; ?>" >
     <input type="hidden" name="idbuku" value="<?php echo $idbuku; ?>" >
   
    
  </tr>
  </table>
  </form>
  </div>
</body>
</html>