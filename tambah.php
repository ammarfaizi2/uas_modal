<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<body style="background-color: yellow">

<h3 align="center">silahkan input data</h3>
<form method="POST" action="simpan.php" >
	<table cellpadding="1" align="center">
		<div class="form-group">
			<tr>
			<td>idbuku</td>
			<td><input type="text" name="idbuku" size="10"></td>
		</tr>
	
		</div>
		
		<div class="form-group">
		<tr>
			<td>judul</td>
			<td><input type="text" name="judul" size="30"></td>
		</tr>
		</div>

		<tr>
			<td>pengarang</td>
			<td><input type="text" name="pengarang" size="30"></td>
		</tr>
		</div>

  		<tr>
  			<td>penerbit <th align="left">
  				<select name="penerbit" id="">
  					<option value="">pilih</option>
  					<option>Andi Offset</option>
  					<option>Gramedia</option>
  					<option>Tiga Serangkai</option>
  				</select>
  			</td>
  		</tr>

  		<tr>
		    <td>Jenis</td>
		    <td>
		    <input type="radio" name="jenis" value="komputer"> komputer
		    <input type="radio" name="jenis" value="lainnya"> lainnya
		    </td>
  		</tr>

 		<tr>
 		 	<td>level</td>
 		 	<td>
 		 	<input type="checkbox" name="level[]" value="pemula"> pemula
			<input type="checkbox" name="level[]" value="menengah"> menengah
			<input type="checkbox" name="level[]" value="mahir"> mahir
		 		 	</td>
		 		 </tr>
		<tr>
			<td colspan="2">
			<input type="submit" name="simpan" class="btn btn-success ">
			<a href="layout5.php"><input type="button" value="Batal" class="btn btn-danger "></a>
			</td>

		</tr>
	</table>

</form>
</body>
</html>
