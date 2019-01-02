<?php 

include "konek.php";

$idbuku = $_POST['idbuku'];
$judul=$_POST['judul'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$jenis=isset($_POST['jenis']) ?
        $_POST['jenis']:'';
$level = implode(isset($_POST['level']) ? $_POST['level']:array(), ', ');
$halamanAktif = $_POST['halaman'];

  $query = "UPDATE buku SET judul='".$judul."',pengarang='".$pengarang."', penerbit='".$penerbit."', jenis='".$jenis."', level='".$level."' WHERE idbuku='".$idbuku."'";
  $sql = mysqli_query($kon, $query); 

  if($sql){ 
    header("location: layout5.php?halaman=$halamanAktif");  

}

?>


