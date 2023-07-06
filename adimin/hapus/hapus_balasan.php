<?php
	require_once("../../koneksi.php");
	$id_balasan = $_REQUEST['id_balasan'];

	mysqli_query($koneksi, "DELETE FROM balasan WHERE id_balasan='$id_balasan'") or die(mysqli_error());
	
	
	header("location:../tampil_balasan.php?pesan=hapus");
?>