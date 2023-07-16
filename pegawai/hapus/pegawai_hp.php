<?php
	require_once("../../koneksi.php");
	$id_pg = $_REQUEST['id_pg'];

	mysqli_query($koneksi, "DELETE FROM t_pegawai WHERE id_pg='$id_pg'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../pegawai.php';</script>";
?>