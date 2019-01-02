<!DOCTYPE html>
<html>
<head>
	<title>tampil</title>

</head>

 <link rel="stylesheet" href="css/bootstrap.min.css" >
<body>
<h1 align="center">TABEL DATA MAHASISWA</h1>


</body>
</html>

<?php 

include_once('konek.php');
include_once('tgindo.php');


//pagination
$jumlahdataPerhalaman = 2;
$result = mysqli_query($kon,"SELECT * FROM kelompokc");
$jumlahdata = mysqli_num_rows($result);
$jumlahHalaman = ceil($jumlahdata / $jumlahdataPerhalaman);

$halamanAktif = (isset($_GET["halaman"]) ) ?$_GET["halaman"] : 1;
$awalData = ($jumlahdataPerhalaman * $halamanAktif ) - $jumlahdataPerhalaman;


$query =("SELECT * FROM kelompokc LIMIT $awalData,$jumlahdataPerhalaman") ;


$tb=mysqli_query($kon,$query);
if (!$tb) {
	echo "tidak ada";
}

echo "<div>";
echo "<table class='table-bordered table-striped table-dark  table-hover' align='center';>
	<tr> <td colspan='10'><a href='tambah.php' class='btn btn-success btn-sm'>tambah data</a></td></tr>
	<tr>
		<th style=\"color:white;background-color:black;\">no</th>
		<th>nim</th>
		<th>nama</th>
		<th>tanggal lahir</th>
		<th>jenis kelamin</th>
		<th>Alamat</th>
		<th>Jurusan</th>
		<th>foto</th>
		<th>hobby</th>
		<th>options</th>
	</tr>

";

$r=$tb;
$no=1;
while ($r=mysqli_fetch_array($tb)) {
	// echo $r["kode"] .$r["nama"]."<br>" ;
	// <td align='center'>".date("d-m-Y",strtotime($r['tglahir']))."</td> pemakaian fungsi date yang benar
	echo "<tr>
			<td align='center'>$no</td>
			<td align='center'>$r[nim]</td>
			<td align='center'>$r[nama]</td>
			<td align='center'>".TanggalIndo($r['tglahir'])."</td> 
			<td align='center'>$r[jekel]</td>
			<td align='center'>$r[alamat]</td>
			<td align='center'>$r[jurusan]</td>
			<td align='center'><img src=images/$r[foto] width='40' height='60'></td>
			<td align='center'>$r[hobby]</td>
			<td align='center'>
			<a href='fungsi_edit.php?nim=$r[nim]' class='btn btn-danger'>edit</a> |
			<a href='hapus.php?nim=$r[nim]' title='delete' onclick='return confirm()' class='btn btn-primary'>hapus</a>

			</td>
		 </tr>";
		 $no++;
}

echo "</table>";
echo "</div>";



 ?>
<?php if($halamanAktif > 1): ?>

<a href="?halaman=<?php echo $halamanAktif - 1; ?>">&laquo;</a>

<?php endif; ?>

<?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>
		<?php if($i == $halamanAktif): ?>
	<a href="indeks.php?halaman=<?php echo $i; ?>" style="font-weight: bold;color: red;"><?php echo $i; ?></a>
		<?php else:  ?>
			<a href="indeks.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php endif; ?>
<?php endfor; ?>


<?php if($halamanAktif < $jumlahHalaman): ?>

<a href="?halaman=<?php echo $halamanAktif + 1; ?>">&raquo;</a>

<?php endif; ?>