<?php 
require_once("../koneksi.php");


if (isset($_POST['add_masuk'])) {
	$dari = $_POST['dari'];
	$untuk = $_POST['untuk'];
	$tgl_masuk = $_POST['tgl_masuk'];
	$tgl_kegiatan = $_POST['tgl_kegiatan'];
	$jenis_surat = $_POST['jenis_surat'];
	$no_surat = $_POST['no_surat'];
	$perihal = $_POST['perihal'];
	$nip = $_POST['nip'];
	$status_surat = $_POST['status_surat'];

    $ekstensi_diperbolehkan = array('pdf','docx');
    $namafoto = $_FILES['gambar']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	      if($ukuran < 2048000){  
	        $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
	        move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

			$query = mysqli_query($koneksi, "INSERT INTO surat (dari,untuk,tgl_masuk,tgl_kegiatan,jenis_surat,no_surat,perihal,nip,status_surat,file_surat) VALUES(
                    '$dari',     
                    '$untuk',
                    '$tgl_masuk',                    
                    '$tgl_kegiatan',
                    '$jenis_surat',
                    '$no_surat',
                    '$perihal',
                    '$nip',
                    '0',
                    '$namabaru'
                  	);");
		if($query){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'tampil_masuk.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_masuk.php';</script><?php
        }
      	}else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'input_masuk.php';</script><?php
      	}
    	}else{
      	?> <script>alert('Gagal, File yang diupload format pdf atau docx!'); window.location = 'input_masuk.php';</script><?php
    	}

    }

if (isset($_POST['editmasuk'])) {
 	$id_surat 	 = $_POST['id_surat'];
 	$dari = $_POST['dari'];
	$untuk = $_POST['untuk'];
	$tgl_masuk = $_POST['tgl_masuk'];
	$tgl_kegiatan = $_POST['tgl_kegiatan'];
	$jenis_surat = $_POST['jenis_surat'];
	$no_surat = $_POST['no_surat'];
	$perihal = $_POST['perihal'];
	$nip = $_POST['nip'];

	$ekstensi_diperbolehkan	= array('pdf','docx');
	$file_surat = $_FILES['file']['name'];
	$x = explode('.', $file_surat);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_surat_tmp = $_FILES['file']['tmp_name'];
	$foto = $_FILES['file']['error'];
	$fl = $_REQUEST['fl'];

	if($foto){
		$tambah = mysqli_query($koneksi,"UPDATE surat SET dari='$dari',untuk='$untuk',tgl_masuk='$tgl_masuk',tgl_kegiatan='$tgl_kegiatan',jenis_surat='$jenis_surat',no_surat='$no_surat',perihal='$perihal',nip='$nip',file_surat='$fl' WHERE `surat`.`id_surat`='$id_surat'");?><script>alert('Data Berhasil Diubah, Tanpa Mengubah Foto!'); window.location = 'tampil_masuk.php';</script><?php

	}else{

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 1044070002){			
			move_uploaded_file($file_surat_tmp, '../fileweb/'.$file_surat);

	$ubahmasuk = mysqli_query($koneksi,"UPDATE surat SET dari='$dari',untuk='$untuk',tgl_masuk='$tgl_masuk',tgl_kegiatan='$tgl_kegiatan',jenis_surat='$jenis_surat',no_surat='$no_surat',perihal='$perihal',nip='$nip',file_surat='$file_surat' WHERE `surat`.`id_surat`='$id_surat'");

	if($ubahmasuk){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'tampil_masuk.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_masuk.php';</script><?php
        }
      	}else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'input_masuk.php';</script><?php
      	}
    	}else{
      	?> <script>alert('Gagal, File yang diupload format pdf atau docx!'); window.location = 'input_masuk.php';</script><?php
    	}
    }
}

if (isset($_POST['tambahsppd'])) {

    $id_surat = $_REQUEST['id_surat'];
    $tingkat = $_REQUEST['tingkat'];
    $maksud_dinas = $_REQUEST['maksud_dinas'];
    $transportasi = $_REQUEST['transportasi'];
    $tmpt_berangkat = $_REQUEST['tmpt_berangkat'];
    $tmpt_tujuan = $_REQUEST['tmpt_tujuan'];
    $lama = $_REQUEST['lama'];
    $dana = $_REQUEST['dana'];

    $tgl_berangkat = $_REQUEST['tgl_berangkat'];
    $tgl_kembali = $_REQUEST['tgl_kembali'];
    $instansi = $_REQUEST['instansi'];
    $no_akun = $_REQUEST['no_akun'];
    $ket = $_REQUEST['ket'];
    $no_ket = $_REQUEST['no_ket'];
    $no_regis_sppd = $_REQUEST['no_regis_sppd'];
 
    $tambah = mysqli_query($koneksi,"INSERT INTO sppd (nama_atasan,  id_surat,  tingkat, maksud_dinas,  transportasi,  tmpt_berangkat,  tmpt_tujuan, lama,dana,  tgl_berangkat, tgl_kembali, instansi,  no_akun, ket, no_ket,  no_regis_sppd, status_sppd) VALUES(
          'Kepala Dinas Komunikasi dan Informatika Kabupaten Tapin',
          '$id_surat',
          '$tingkat',
          '$maksud_dinas',
          '$transportasi',
          '$tmpt_berangkat',
          '$tmpt_tujuan',
          '$lama',
          '$dana',
          '$tgl_berangkat',
          '$tgl_kembali',
          '$instansi',
          '$no_akun',
          '$ket',
          '$no_ket',
          '$no_regis_sppd',
          '0')");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'tampil_sppd.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_sppd.php';</script><?php
        }

    }

if (isset($_POST['editsppd'])) {
  $id    = $_POST['id_sppd'];

  $id_surat = $_REQUEST['id_surat'];
  $tingkat = $_REQUEST['tingkat'];
  $maksud_dinas = $_REQUEST['maksud_dinas'];
  $transportasi = $_REQUEST['transportasi'];
  $tmpt_berangkat = $_REQUEST['tmpt_berangkat'];
  $tmpt_tujuan = $_REQUEST['tmpt_tujuan'];
  $lama = $_REQUEST['lama'];
  $dana = $_REQUEST['dana'];

  $tgl_berangkat = $_REQUEST['tgl_berangkat'];
  $tgl_kembali = $_REQUEST['tgl_kembali'];
  $instansi = $_REQUEST['instansi'];
  $no_akun = $_REQUEST['no_akun'];
  $ket = $_REQUEST['ket'];
  $no_ket = $_REQUEST['no_ket'];
  $no_regis_sppd = $_REQUEST['no_regis_sppd'];

  $ubahsppd = mysqli_query($koneksi,"UPDATE sppd SET id_surat = '$id_surat', tingkat = '$tingkat', maksud_dinas = '$maksud_dinas', transportasi = '$transportasi', tmpt_berangkat = '$tmpt_berangkat', tmpt_tujuan = '$tmpt_tujuan', lama = '$lama',dana = '$dana', tgl_berangkat = '$tgl_berangkat', tgl_kembali = '$tgl_kembali', instansi = '$instansi', no_akun = '$no_akun', ket = '$ket', no_ket = '$no_ket', no_regis_sppd = '$no_regis_sppd' WHERE id_sppd = '$id'");

if($ubahsppd){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'tampil_sppd.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'edit_sppd.php';</script><?php
        }

    }

if (isset($_POST['tambahspt'])) {
  $id_sppd = $_POST['id_sppd'];
  $maksud_dinas = $_POST['maksud_dinas'];
  $tgl_spt = $_POST['tgl_spt'];
  $no_regis_spt = $_POST['no_regis_spt'];

$tambahspt = mysqli_query($koneksi, "INSERT INTO spt (id_sppd, maksud_dinas,  tgl_spt, no_regis_spt) VALUES(
          '$id_sppd', 
          '$maksud_dinas',
          '$tgl_spt',                   
          '$no_regis_spt')");

  if($tambahspt){
          ?> <script>alert('Data Berhasil Ditambahkan!'); window.location = 'tampil_tugas.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_tugas.php';</script><?php
        }

    }

if (isset($_POST['editspt'])) {

  $id_spt = $_POST['id_spt'];

  $id_sppd = $_POST['id_sppd'];
  $maksud_dinas = $_POST['maksud_dinas'];
  $tgl_spt = $_POST['tgl_spt'];
  $no_regis_spt = $_POST['no_regis_spt'];

  $ubahspt = mysqli_query($koneksi,"UPDATE spt SET id_sppd = '$id_sppd', maksud_dinas = '$maksud_dinas', tgl_spt = '$tgl_spt', no_regis_spt = '$no_regis_spt' WHERE id_spt = '$id_spt'");

if($ubahspt){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'tampil_tugas.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'edit_tugas.php';</script><?php
        }
    }

if (isset($_POST['tambahbls'])) {
  $id_surat = $_POST['id_surat'];
  $tgl_balasan = $_POST['tgl_balasan'];
  $keterangan = $_POST['keterangan'];

$tambahbls = mysqli_query($koneksi, "INSERT INTO balasan (id_surat, tgl_balasan,  keterangan) VALUES(
          '$id_surat', 
          '$tgl_balasan',
          '$keterangan')");

  if($tambahbls){
          ?> <script>alert('Data Berhasil Ditambahkan!'); window.location = 'tampil_balasan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_balasan.php';</script><?php
        }

    }

if (isset($_POST['editbls'])) {

  $id_balasan = $_POST['id_balasan'];

  $id_surat = $_POST['id_surat'];
  $tgl_balasan = $_POST['tgl_balasan'];
  $keterangan = $_POST['keterangan'];

  $ubahbls = mysqli_query($koneksi,"UPDATE balasan SET id_surat = '$id_surat', tgl_balasan = '$tgl_balasan', keterangan = '$keterangan' WHERE id_balasan = '$id_balasan'");

if($ubahbls){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'tampil_balasan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'edit_balasan.php';</script><?php
        }
    }

if (isset($_POST['tambahkegiatan'])) {

  $nama_kegiatan = $_POST['nama_kegiatan'];
  $lokasi_kegiatan = $_POST['lokasi_kegiatan'];
  $waktu_kegiatan = $_POST['waktu_kegiatan'];
  $pelaksana_kegiatan = $_POST['pelaksana_kegiatan'];
  $nip = $_POST['nip'];
  $no_surat = $_POST['no_surat'];
  $waktu = $_POST['waktu'];
 
  $tambahegiatan = mysqli_query($koneksi,"INSERT INTO kegiatan SET nama_kegiatan='$nama_kegiatan',lokasi_kegiatan='$lokasi_kegiatan',waktu_kegiatan='$waktu_kegiatan',pelaksana_kegiatan='$pelaksana_kegiatan',nip='$nip',no_surat='$no_surat',waktu='$waktu',status_kegiatan='0' ");

if($tambahegiatan){
          ?> <script>alert('Data Berhasil Ditambah!'); window.location = 'tampil_kegiatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_kegiatan.php';</script><?php
        }
    }

if (isset($_POST['editkegiatan'])) {
  $id_kegiatan    = $_POST['id_kegiatan'];

  $nama_kegiatan = $_POST['nama_kegiatan'];
  $lokasi_kegiatan = $_POST['lokasi_kegiatan'];
  $waktu_kegiatan = $_POST['waktu_kegiatan'];
  $pelaksana_kegiatan = $_POST['pelaksana_kegiatan'];
  $nip = $_POST['nip'];
  $no_surat = $_POST['no_surat'];
  $waktu = $_POST['waktu'];
  
  $ubahkegiatan = mysqli_query($koneksi,"UPDATE kegiatan SET nama_kegiatan='$nama_kegiatan',lokasi_kegiatan='$lokasi_kegiatan',waktu_kegiatan='$waktu_kegiatan',pelaksana_kegiatan='$pelaksana_kegiatan',nip='$nip',no_surat='$no_surat',waktu='$waktu' WHERE id_kegiatan='$id_kegiatan'");

  if($ubahkegiatan){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'tampil_kegiatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'edit_kegiatan.php';</script><?php
        }
    }

if (isset($_POST['tambahmk'])) {
  $nip = $_POST['nip'];
  $nama_kegiatan = $_POST['nama_kegiatan'];
  $tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];
  $kesimpulan = $_POST['kesimpulan'];

  $ekstensi_diperbolehkan = array('png','jpg','jpeg','jp');
    $namafoto = $_FILES['gambar']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 2048000){  
        $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
        move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

      $tambahmk = mysqli_query($koneksi, "INSERT INTO monitoring (nip,nama_kegiatan,tgl_awal,tgl_akhir,kesimpulan,status_mk,foto) VALUES(
                    '$nip',     
                    '$nama_kegiatan',
                    '$tgl_awal',                    
                    '$tgl_akhir',
                    '$kesimpulan',
                    '0',
                    '$namabaru'
                    );");
      if($tambahmk){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'tampil_mk.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_mk.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'input_mk.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format harus png, jpg, jpeg, jp!'); window.location = 'input_mk.php';</script><?php
      }

    }

if (isset($_POST['editmk'])) {
  $id_monitoring    = $_POST['id_monitoring'];
  $nip = $_POST['nip'];
  $nama_kegiatan = $_POST['nama_kegiatan'];
  $tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];
  $kesimpulan = $_POST['kesimpulan'];

  $ekstensi_diperbolehkan = array('png','jpg','jpeg','jp');
  $file_foto = $_FILES['file']['name'];
  $x = explode('.', $file_foto);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['file']['size'];
  $file_surat_tmp = $_FILES['file']['tmp_name'];
  $foto = $_FILES['file']['error'];
  $fl = $_REQUEST['fl'];

  if($foto){
    $tambah = mysqli_query($koneksi,"UPDATE monitoring SET nip='$nip',nama_kegiatan='$nama_kegiatan',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',kesimpulan='$kesimpulan',foto='$fl' WHERE `monitoring`.`id_monitoring`='$id_monitoring'");?><script>alert('Data Berhasil Diubah, Tanpa Mengubah Foto!'); window.location = 'tampil_mk.php';</script><?php

  }else{

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070002){     
      move_uploaded_file($file_surat_tmp, '../fileweb/'.$file_foto);

  $ubahmasuk = mysqli_query($koneksi,"UPDATE monitoring SET nip='$nip',nama_kegiatan='$nama_kegiatan',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',kesimpulan='$kesimpulan',foto='$file_foto' WHERE `monitoring`.`id_monitoring`='$id_monitoring'");

  if($ubahmasuk){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'tampil_mk.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_mk.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'input_mk.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format png, jpg, jpeg atau jp!'); window.location = 'input_mk.php';</script><?php
      }
    }
}


if (isset($_POST['tambahpg'])) {

    $nip = $_REQUEST['nip'];
    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $jabatan = $_REQUEST['jabatan'];
    $jenis_kelamin = $_REQUEST['jenis_kelamin'];
    $agama = $_REQUEST['agama'];
    $status = $_REQUEST['status'];
    $tempat_lahir = $_REQUEST['tempat_lahir'];
    $tanggal_lahir = $_REQUEST['tanggal_lahir'];
    $alamat_rumah = $_REQUEST['alamat_rumah'];
    $no_telpon = $_REQUEST['no_telpon'];
 
    $tambah = mysqli_query($koneksi,"INSERT INTO t_pegawai ( nip,  nama_lengkap, jabatan,  jenis_kelamin,  agama,  status, tempat_lahir,tanggal_lahir,  alamat_rumah, no_telpon) VALUES(
          '$nip',
          '$nama_lengkap',
          '$jabatan',
          '$jenis_kelamin',
          '$agama',
          '$status',
          '$tempat_lahir',
          '$tanggal_lahir',
          '$alamat_rumah',
          '$no_telpon')");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'tampil_pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'input_pegawai.php';</script><?php
        }

    }

if (isset($_POST['editpg'])) {
  $id    = $_POST['id_pg'];

  $nip = $_REQUEST['nip'];
  $nama_lengkap = $_REQUEST['nama_lengkap'];
  $jabatan = $_REQUEST['jabatan'];
  $jenis_kelamin = $_REQUEST['jenis_kelamin'];
  $agama = $_REQUEST['agama'];
  $status = $_REQUEST['status'];
  $tempat_lahir = $_REQUEST['tempat_lahir'];
  $tanggal_lahir = $_REQUEST['tanggal_lahir'];
  $alamat_rumah = $_REQUEST['alamat_rumah'];
  $no_telpon = $_REQUEST['no_telpon'];

  $ubahsppd = mysqli_query($koneksi,"UPDATE t_pegawai SET nip = '$nip', nama_lengkap = '$nama_lengkap', jabatan = '$jabatan', jenis_kelamin = '$jenis_kelamin', agama = '$agama', status = '$status', tempat_lahir = '$tempat_lahir',tanggal_lahir = '$tanggal_lahir', alamat_rumah = '$alamat_rumah', no_telpon = '$no_telpon' WHERE id_pg = '$id'");

if($ubahsppd){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'tampil_pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'edit_pegawai.php';</script><?php
        }

    }



?><!-- tambah -->