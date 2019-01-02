<?php 

$kon=mysqli_connect("localhost","root","","test");

if (!$kon) {
	echo "koneksi gagal".mysqli_connect_error();
}

if (!function_exists("qq")) {
	function qq($e)
	{
		return htmlspecialchars($e, ENT_QUOTES, "UTF-8");
	}	
}

 ?>