<!DOCTYPE html>
 <html>
 <head>
 	<title>layout php mysql</title>	
 	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  
 	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<style>
	</style>
 <body style="background-image: url(images/.jpg);background-repeat: no-repeat;background-size: cover; 
			background-attachment: fixed;">
 <h1 align="center" style="font-family: times ;color: #FFFF00;font-size: 50px;font-weight: bold;background-color: navy;">DAFTAR BUKU PERPUSTAKAAN PROBOLINGGO</h1>
<?php 

include_once('konek.php');

//pagination
$jumlahdataPerhalaman = 3;
$result = mysqli_query($kon,"SELECT * FROM buku");
$jumlahdata = mysqli_num_rows($result);
$jumlahHalaman = ceil($jumlahdata / $jumlahdataPerhalaman);
$halamanAktif = (isset($_GET["halaman"]) ) ?$_GET["halaman"] : 1 ;
$awalData = ($jumlahdataPerhalaman * $halamanAktif ) - $jumlahdataPerhalaman;


$query =("SELECT * FROM buku LIMIT $awalData,$jumlahdataPerhalaman") ;


$tb=mysqli_query($kon,$query);
if (!$tb) {
	echo "tidak ada";
}
 ?>

<div class="container"> 
  <div class="table-responsive"> 


<form action="layout5.php" method="get">
	<label>Pencarian :</label>
	<input type="text" name="cari">
	<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
</form>
 
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "";
}
?>

<table class="table-bordered table-striped table-dark table-hover" align="center" width="100%" cellpadding="5" style="text-align: left;">
	<thead class="thead-light">
	<tr>
		<td colspan="10"><a href='tambah1.php?halaman=<?php echo $halamanAktif ?>' class="btn btn-success btn-lg btn-sm"><i class="fa fa-plus"></i> add new</a></td>
	</tr>
	<tr>
		<th>no</th>
		<th>idbuku</th>
		<th>judul</th>
		<th>pengarang</th>
		<th>penerbit</th>
		<th>jenis</th>
		<th>level</th>
		<th>options</th>
	</tr>
	</thead>
	
	<?php
		if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$tb = mysqli_query($kon,"select * from buku where judul like '%".$cari."%' LIMIT $awalData,$jumlahdataPerhalaman ");				
	}else{
		$tb = mysqli_query($kon,"select * from buku LIMIT $awalData,$jumlahdataPerhalaman");
	}  
		$no=1;		
		while ($r=mysqli_fetch_array($tb)) {
	?>
	<tr>
		<td><?php echo $no ; ?></td>
		<td><?php echo $r['idbuku'] ;?></td>
		<td><?php echo $r['judul'] ;?></td>
		<td><?php echo $r['pengarang'] ;?></td>
		<td><?php echo $r['penerbit'] ;?></td>
		<td><?php echo $r['jenis'] ;?></td>
		<td><?php echo $r['level'] ;?></td>
		<td><a href="fungsi_edit.php?idbuku=<?php echo $r['idbuku']; ?>&halaman=<?php echo $halamanAktif; ?>" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i>edit</a> 
		<a onclick="return confirm('yakin untuk menghapus?')" href="hapus.php?idbuku=<?php echo $r['idbuku']; ?>&halaman=<?php echo $halamanAktif; ?>" class="btn btn-danger btn-sm" >
		<i class="fa fa-trash"> delete</i> </a>
				<a href='#edit_modal' class='btn btn-default btn-small' data-toggle='modal' data-idbuku="<?php echo $r['idbuku']; ?>&halaman=<?php echo $halamanAktif; ?>">Detail</a>


		</td>
		<?php $no++ ?>
	</tr>
	<?php } ?>
</table>

  <div class="modal fade" id="edit_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Buku</h4>
                </div>
                <div class="modal-body">
                    <div class="hasil-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('idbuku');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  'idx='+ idx + "&halaman=<?php print isset($_GET["halaman"])?$_GET["halaman"]:1; ?>",
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<br><br>
		
</div>
</div>
<?php if($halamanAktif > 1): ?>
		<ul>
			<li>
				<a href="?halaman=<?php echo $halamanAktif - 1; ?>">&laquo;</a>
			</li>
		</ul>
<?php endif; ?>

<?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>
		<?php if($i == $halamanAktif): ?>

		<ul>
			<li>
				<a class="active" href="layout5.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
			</li>
		</ul>	

<?php else:  ?>

		<ul>
			<li>
				<a href="layout5.php?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
			</li>
		</ul>

		<?php endif; ?>
<?php endfor; ?>


<?php if($halamanAktif < $jumlahHalaman): ?>

		<ul>
			<li>
				<a href="?halaman=<?php echo $halamanAktif + 1; ?>">&raquo;</a>
			</li>
		</ul>

<?php endif; ?>

 </body>
 </html> 