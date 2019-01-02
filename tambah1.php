<!Doctype HTML>
<html>
<head>
<title>Membuat Form tambah</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
</style>
</head>

 
<body style="background-color: skyblue;">

<?php

  $halamanAktif = $_GET['halaman'];

?>

<div class="container">
 <div class="col-lg-4">  
  <div class="page-header">
   <h3>Form Input Data</h3>
  </div>

  <form role="form" class="form-horizontal" method="POST" action="simpan.php">
   <div class="form-group">
    <label>id buku</label>
    <input type="text" name="idbuku" class="form-control">
   </div>
   <div class="form-group">
    <label>judul</label>
    <input type="text" name="judul" class="form-control">
   </div>
   <div class="form-group">
    <label>pengarang</label>
    <input type="text" name="pengarang" class="form-control">
   </div>
   <div class="form-group">
    <label>penerbit</label>
    <select name="penerbit" id="">
            <option value="">pilih</option>
            <option>Andi Offset</option>
            <option>Gramedia</option>
            <option>Tiga Serangkai</option>
          </select>
   </div>
    <div class="form-group">
    <label>jenis</label>
       <input type="radio" name="jenis" value="komputer"> komputer
        <input type="radio" name="jenis" value="lainnya"> lainnya
   </div>
    <div class="form-group">
    <label>level</label>
    <input type="checkbox" name="level[]" value="pemula"> pemula
      <input type="checkbox" name="level[]" value="menengah"> menengah
      <input type="checkbox" name="level[]" value="mahir"> mahir
   </div>
   <div class="form-group">
    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check"></i> Insert</button>
    <a href="layout5.php" class="btn btn-danger btn-md"><i class="fa fa-times"></i> back</a>
   </div>

   <div>
     <input type="hidden" name="halaman" value="<?php echo $halamanAktif ;?>">
   </div>
  </form>
 </div>
</div>

</body>
</html>