<?php
	require_once("../../koneksi.php");
	$id_gaji = $_REQUEST['id_gaji'];

	mysqli_query($koneksi, "DELETE FROM gaji WHERE id_gaji='$id_gaji'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../gaji.php';</script>";
?>