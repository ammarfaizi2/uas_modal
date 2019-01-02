<?php 

// Load file koneksi.php
include "konek.php";

// Ambil data NIS yang dikirim oleh fungsi_edit.php melalui URL
$nim = $_GET['nim'];

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$tglahir = $_POST['tglahir'];
$jekel = $_POST['jekel'];
$alamat = $_POST['alamat'];
$jurusan = $_POST['jurusan'];
$hobi  = implode(', ', $_POST['hobi']);



if(isset($_POST['ubah_foto'])){ 

  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  $fotobaru = date('dmYHis').$foto;
  $path = "images/".$fotobaru;


 
  if(move_uploaded_file($tmp, $path)){ 
    $query = "SELECT * FROM kelompokc WHERE nim='".$nim."'";
    $sql = mysqli_query($kon, $query); 
    $data = mysqli_fetch_array($sql); 

 
    if(is_file("images/".$data['foto'])) 
      unlink("images/".$data['foto']);


   
    $query = "UPDATE kelompokc SET nama='".$nama."',tglahir='".$tglahir."', jekel='".$jekel."', alamat='".$alamat."', jurusan='".$jurusan."', foto='".$fotobaru."',hobby='".$hobi."' WHERE nim='".$nim."'";

    $sql = mysqli_query($kon, $query); 
    if($sql){ 
      header("location: layout5.php"); 
    }else{
      
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='fungsi_edit.php'>Kembali Ke Form</a>";
    }
  }else{
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='fungsi_edit.php'>Kembali Ke Form</a>";
  }
}else{ 
  $query = "UPDATE kelompokc SET nama='".$nama."',tglahir='".$tglahir."', jekel='".$jekel."', alamat='".$alamat."', jurusan='".$jurusan."',hobby='".$hobi."'  WHERE nim='".$nim."'";
  $sql = mysqli_query($kon, $query); 

  if($sql){ 
    header("location: layout5.php"); 
  }else{
    
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='fungsi_edit.php'>Kembali Ke Form</a>";
  }
} 


?>


