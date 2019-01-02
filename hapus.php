<?php
include "konek.php";

// Ambil data idbuku yang dikirim oleh index.php melalui URL
$idbuku = $_GET['idbuku'];
$halamanAktif = $_GET['halaman'];

$query = "SELECT * FROM buku WHERE idbuku='".$idbuku."'";
$sql = mysqli_query($kon, $query); 
$data = mysqli_fetch_array($sql); 

$query2 = "DELETE FROM buku WHERE idbuku='".$idbuku."'";
$sql2 = mysqli_query($kon, $query2); 

if($sql2){ 
	 // header("location: layout5.php?halaman=$halamanAktif");  
	  $jumlahdataPerhalaman = 3;
      $result = mysqli_query($kon,"SELECT * FROM buku");
      $jumlahdata = mysqli_num_rows($result);
      $jumlahHalaman = ceil($jumlahdata / $jumlahdataPerhalaman);
      header("location: layout5.php?halaman=".$jumlahHalaman);  
}else{
  echo "Data gagal dihapus. <a href='layout5.php'>Kembali</a>";
}
?>