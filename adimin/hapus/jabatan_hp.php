<?php
	require_once("../../koneksi.php");
	$id_jabatan = $_REQUEST['id_jabatan'];

	mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jabatan='$id_jabatan'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../jabatan.php';</script>";
?>