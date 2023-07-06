<?php
	require_once("../../koneksi.php");
	$id_sppd = $_REQUEST['id_sppd'];

	mysqli_query($koneksi, "DELETE FROM sppd WHERE id_sppd='$id_sppd'") or die(mysqli_error());
	
	
	header("location:../tampil_sppd.php?pesan=hapus");
?>