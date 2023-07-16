<?php
	require_once("../../koneksi.php");
	$id_tr = $_REQUEST['id_tr'];

	mysqli_query($koneksi, "DELETE FROM transportasi WHERE id_tr='$id_tr'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../tr.php';</script>";
?>