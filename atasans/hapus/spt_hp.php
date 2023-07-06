<?php
	require_once("../../koneksi.php");
	$id_spt = $_REQUEST['id_spt'];

	mysqli_query($koneksi, "DELETE FROM spt WHERE id_spt='$id_spt'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../spt.php';</script>";
?>