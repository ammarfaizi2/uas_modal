<?php 

include"konek.php";

if (isset($_POST['simpan'])){
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$tglahir=$_POST['tglahir'];
$jekel=isset($_POST['jekel']) ?
        $_POST['jekel']:'';
$alamat=$_POST['alamat'];
$jurusan=$_POST['jurusan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
// $status=isset($_POST['status']) ?
//         $_POST['status']:'';
$hobi = implode(isset($_POST['hobi']) ? $_POST['hobi']:array(), ', ');

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;

  // cek data 
  $tb=mysqli_query($kon,"SELECT * FROM kelompokc where nim='$nim'" );

  // jika data sudah ada 
  if (mysqli_num_rows($tb)>0) {

    echo '<script>
          alert("data sudah ada!!");
          document.location.href="tambah.php";
          </script>
          ';

  // jika data blm ada kemudian cek apakah file fotonya ada
  } else { 

    // jika file foto kosong 
    if(empty($foto)){

        // input data tanpa foto
        $query = mysqli_query($kon, "INSERT INTO kelompokc (nim,nama,tglahir,jekel,alamat,jurusan,foto,hobby) VALUES('".$nim."', '".$nama."','".$tglahir."', '".$jekel."', '".$alamat."', '".$jurusan."','','".$hobi."')";

        //jika input data sukses
        if($query){

          echo '<script>
            alert("Data Berhasil diinput tanpa foto !");
            document.location.href="layout5.php";
            </script>
            ';

        } else {

           echo '<script>
            alert("Data Tanpa Foto GAGAL diinput !");
            document.location.href="tambah.php";
            </script>
            ';

        }
        
    } else {

    // jika file foto ada, maka upload foto ..
      if(move_uploaded_file($tmp, $path)){ 

        // Proses simpan ke Database
        $query = "INSERT INTO kelompokc (nim,nama,tglahir,jekel,alamat,jurusan,foto,hobby) VALUES('".$nim."', '".$nama."','".$tglahir."', '".$jekel."', '".$alamat."', '".$jurusan."', '".$fotobaru."','".$hobi."')";
        $tambah = mysqli_query($kon, $query); // Eksekusi/ Jalankan query dari variabel $query

        if($tambah){ // Cek jika proses simpan ke database sukses atau tidak

          // Jika Sukses, Lakukan :
          header("location: layout5.php"); // Redirect ke halaman index.php

        }else{

          // Jika Gagal, Lakukan :
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
          echo "<br><a href='tambah.php'>Kembali Ke Form</a>";
        }

      }else{
          
        // Jika gambar gagal diupload, Lakukan :
        // echo "Maaf, Gambar gagal untuk diupload.";
        // echo "<br><a href='tambah.php'>Kembali Ke Form</a>";
         $query = "INSERT INTO kelompokc (nim,nama,tglahir,jekel,alamat,jurusan,foto,hobby) VALUES('".$nim."', '".$nama."','".$tglahir."', '".$jekel."', '".$alamat."', '".$jurusan."','','".$hobi."')";
        $tambah = mysqli_query($kon, $query); // Eksekusi/ Jalankan query dari variabel $query
        if($tambah){ // Cek jika proses simpan ke database sukses atau tidak
          // Jika Sukses, Lakukan :
          header("location: layout5.php"); // Redirect ke halaman index.php
          }
      }
    }

}
?>


