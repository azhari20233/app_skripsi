<?php 
  require_once("../koneksi.php");
  require_once("../admins/fungsi_indotgl.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Surat Perintah Tugas</title>
	<link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap.min.css.map">
	<link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-grid.min.css.map">
	<link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../bootstrap4/dist/css/bootstrap-reboot.min.css.map">
 
 <style>
    .text-content{
      text-indent: 50px;
    }
    .ttd{
      margin-left: 62%;
      margin-top: 19%;
      position: absolute;
    }
    .ttd2{
      margin-right: 75%;
      margin-top: 21%;
      position: absolute;
    }
    #isi{
      line-height: 1.7;
    }
    .kiri{
      margin-top: -3%;
      position: absolute;
      width: 115px;
    }
    .kanan{
      margin-top: -7%;
      margin-left: 82%;
      width: 115px;
      position: absolute;
    }
    img{
      
      width: 220px;
    }
    hr{
      border: solid;
      color: #333;
    }
    .wew{
      
    }
    .tujuan{
      margin-left: 70%;
      margin-bottom: 2%;
      margin-top: -16%;
    }
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>

<?php 

$id_spt = $_GET['id_spt'];

$query = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN surat ON surat.nip=t_pegawai.nip INNER JOIN sppd ON surat.id_surat=sppd.id_surat INNER JOIN spt ON sppd.id_sppd=spt.id_sppd WHERE id_spt = '$id_spt'");

while ($baris = mysqli_fetch_array($query)) {



 ?>



	  <div class="container" style="font-family: Times;"><br>
    
  <h2 class="text-center"><b>PEMERINTAH KABUPATEN TAPIN</b></h2>
  <img src="../gambar/tapin.png" class="float-left kiri"><h2 class="text-center wew"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></h2><img src="../gambar/kominfo.png" class="kanan">
  <h6 class="text-center">Jl. Jend Sudirman No. 89 Kode Pos 71111</h6>
  <h2 class="text-center"><b>RANTAU</b></h2>
  <hr>
  <br>
  <br>


	<h4 class="text-center"><b><u>SURAT PERINTAH TUGAS</u></b></h4>
	<h4 class="text-center"> Nomor : 094 / <?php echo $baris['no_regis_spt'] ?> / SPT / DAK /DISKOMINFO-KB / 2021 </h4>
	<br>
	<br>
	<br>

<div class="row">
      <div class="col-md-2">
        <h5>Dasar</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
      </div>
      <div class="col-md-1">
        <h5>1.</h5>
      </div>
      <div class="col-md-8">
        <h5>Dokumen Pelaksanaan Anggaran Satuan Kerja Perangkat Daerah ( DPA – SKPD ) Tahun Anggaran 2019 Kegiatan Peningkatan Sumber Daya Manusia Aparatur Dukcapil Provinsi dan Kabupaten/Kota No. DPPA – 2.05.2.05.01.00.15.29.5.2.P (DAK) Tahun Anggaran 2019.</h5>
    </div>
</div>

<div class="row">
	<div class="col-md-2">
        <h5></h5>
      </div>
      <div class="col-md-1">
        <h5></h5>
      </div>
      <div class="col-md-1">
        <h5>2.</h5>
      </div>
      <div class="col-md-7">
        <h5>SPPD Persetujuan Nomor 903/<?php echo $baris['no_regis_sppd'] ?>/SPPD/PPDK/DISKOMINFO-KB/TAPIN/2020.</h5>
    </div>
</div>
	<br>
	<br>

	<h4 class="text-center"><b><u>MEMERINTAHKAN :</u></b></h4>
	<br>
	<br>
	<br>

<div class="row">
      <div class="col-md-2">
        <h5>Kepada</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
      </div>
      <div class="col-md-1">
        <h5>Nama</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
      </div>
      <div class="col-md-7">
        <h5><?=$baris['nama_lengkap'];?></h5>
    </div>
</div>

<div class="row">
      <div class="col-md-2">
        <h5></h5>
      </div>
      <div class="col-md-1">
        <h5></h5>
      </div>
      <div class="col-md-1">
        <h5>NIP</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
      </div>
      <div class="col-md-7">
        <h5><?=$baris['nip'];?></h5>
    </div>
</div>

<div class="row">
      <div class="col-md-2">
        <h5></h5>
      </div>
      <div class="col-md-1">
        <h5></h5>
      </div>
      <div class="col-md-1">
        <h5>Jabatan</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
      </div>
      <div class="col-md-7">
        <h5><?=$baris['jabatan'];?></h5>
    </div>
</div>
<br>
<br>
<br>

<div class="row">
      <div class="col-md-2">
        <h5>Untuk</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
      </div>
      <div class="col-md-8">
        <h5><?=$baris['maksud_dinas'];?> (yang bertempat di <?=$baris['tmpt_tujuan'];?> Selama <?=$baris['lama'];?> terhitung mulai tanggal <?=tgl_indo($baris['tgl_berangkat']);?> s/d <?=tgl_indo($baris['tgl_kembali']);?>)</h5>
      </div>
</div>


<table class="text-left ttd">
  <tbody>
    <tr>
      <td><h5><b>An. KEPALA DINAS KOMUNIKASI DAN INFORMATIKA KAB, TAPIN</b></h5> <h6><b>Kabid Penyelenggaraan E Government</b></h6></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b><u>Aryanadi, S.Sos</u></b></h5></td>
    </tr>

    <tr>
      <td><h5><b>NIP.197301081993031003</b></h5></td>
    </tr>
  </tbody>
</table>







<?php } ?>


	<script type="text/javascript">
		window.print();
	</script>
	</div> <!-- akhir container -->
	
</div>
</html>
