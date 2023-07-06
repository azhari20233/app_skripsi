<?php 
require_once('../../koneksi.php');
$id_cuti = $_REQUEST['id_cuti'];
	mysqli_query($koneksi, "DELETE FROM cuti WHERE id_cuti='$id_cuti'") or die(mysqli_error());
	echo "<script>alert('Berhasil Dihapus!'); window.location = '../cuti.php';</script>"; ?>