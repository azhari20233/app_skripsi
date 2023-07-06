<?php
	require_once("../../koneksi.php");
	$id_monitoring = $_REQUEST['id_monitoring'];

	mysqli_query($koneksi, "DELETE FROM monitoring WHERE id_monitoring='$id_monitoring'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../hkegiatan.php';</script>";
?>