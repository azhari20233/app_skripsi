<?php
	require_once("../../koneksi.php");
	$id_masuk = $_REQUEST['id_masuk'];

	mysqli_query($koneksi, "DELETE FROM masuk WHERE id_masuk='$id_masuk'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../masuk.php';</script>";
?>