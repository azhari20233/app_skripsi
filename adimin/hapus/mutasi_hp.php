<?php
	require_once("../../koneksi.php");
	$id_mutasi = $_REQUEST['id_mutasi'];

	mysqli_query($koneksi, "DELETE FROM mutasi WHERE id_mutasi='$id_mutasi'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../mutasi.php';</script>";
?>