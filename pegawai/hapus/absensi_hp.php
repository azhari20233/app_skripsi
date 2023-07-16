<?php
	require_once("../../koneksi.php");
	$id_absensi = $_REQUEST['id_absensi'];

	mysqli_query($koneksi, "DELETE FROM absensi WHERE id_absensi='$id_absensi'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../absensi.php';</script>";
?>