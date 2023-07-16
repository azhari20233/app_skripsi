<?php
	require_once("../../koneksi.php");
	$id_surat = $_REQUEST['id_surat'];

	mysqli_query($koneksi, "DELETE FROM surat WHERE id_surat='$id_surat'") or die(mysqli_error());
	
	
	header("location:../tampil_masuk.php?pesan=hapus");
?>