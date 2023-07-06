<?php
	require_once("../../koneksi.php");
	$id_kegiatan = $_REQUEST['id_kegiatan'];

	mysqli_query($koneksi, "DELETE FROM kegiatan WHERE id_kegiatan='$id_kegiatan'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../kegiatan.php';</script>";
?>