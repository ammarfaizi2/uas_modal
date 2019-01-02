<?php 

include"konek.php";

if (isset($_POST['simpan'])){
$idbuku=$_POST['idbuku'];
$judul=$_POST['judul'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$jenis=isset($_POST['jenis']) ?
        $_POST['jenis']:'';
$level = implode(isset($_POST['level']) ? $_POST['level']:array(), ', ');
$halamanAktif = $_POST['halaman'];
 
 $tb=mysqli_query($kon,"SELECT * FROM buku where idbuku='$idbuku'" );
  if (mysqli_num_rows($tb)>0) {

    echo '<script>
    alert("data sudah ada!!");
    document.location.href="tambah1.php";
    
    </script>

    ';
  }else{
    
   $query = "INSERT INTO buku (idbuku,judul,pengarang,penerbit,jenis,level) VALUES('".$idbuku."', '".$judul."','".$pengarang."', '".$penerbit."', '".$jenis."','".$level."')";
  $tambah = mysqli_query($kon, $query); 
  if($tambah)
    { 
      $jumlahdataPerhalaman = 3;
      $result = mysqli_query($kon,"SELECT * FROM buku");
      $jumlahdata = mysqli_num_rows($result);
      $jumlahHalaman = ceil($jumlahdata / $jumlahdataPerhalaman);
      header("location: layout5.php?halaman=".$jumlahHalaman);  
     // header("location: layout5.php"); 
    }
}

}






?>


