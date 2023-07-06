
<?php 
  require_once("../koneksi.php");
  require_once("../admins/fungsi_indotgl.php"); 
    require_once("../admins/fungsi_rupiah.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SPPD</title>
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
      margin-left: 75%;
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
      margin-top:  -8%;
    }
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>
<?php 

  $koneksi = mysqli_connect("localhost","root","","pkl_tapin"); 
 
$id_sppd = $_GET['id_sppd'];

$query = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN surat ON surat.nip=t_pegawai.nip INNER JOIN sppd ON surat.id_surat=sppd.id_surat WHERE id_sppd = '$id_sppd'");

while ($baris = mysqli_fetch_array($query)) {
$i=1;


 ?>

  <div class="container" style="font-family: Times;"><br>
    
  <h2 class="text-center"><b>PEMERINTAH KABUPATEN TAPIN</b></h2>
  <img src="../gambar/tapin.png" class="float-left kiri"><h2 class="text-center wew"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></h2><img src="../gambar/kominfo.png" class="kanan">
  <h6 class="text-center">Jl. Jend Sudirman No. 89 Kode Pos 71111</h6>
  <h2 class="text-center"><b>RANTAU</b></h2>
  <hr>
  <br>
  <br>
  <br>
  <br>

  <div class="tujuan">
    <h5>
      Nomor&ensp;: 903/<?php echo $baris['no_regis_sppd'] ?>/SPPD/PPDK/DISKOMINFO-KB/2021
  </h5>
  </div>

  <br>




  <div class="container">
  <h2 class="text-center"><b>SURAT PERINTAH PERJALANAN DINAS (SPPD)</b></h2><br> <br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          


        </tr>
        <tbody> 
      </thead>  


          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>Pejabat Yang Memberi Perintah&emsp;:&emsp;Kepala Dinas Kependudukan, Pencatatan Sipil dan Keluarga Berencana</h5></td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>Nama/Nip Pegawai yang melaksaakan perjalanan dinas&emsp;:&emsp;<?php echo $baris['nama_lengkap'] ?><p>
              <?php echo $baris['nip'] ?>
            </p></h5></td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>a.  Jabatan dan Golongan menurut PP No. 6 Tahun 1997&emsp;:&emsp;<?php echo $baris['jabatan'] ?></h5>
              <h5>b.  Tingkat Perjalanan Dinas&emsp;:&emsp;<?php echo $baris['tingkat'] ?>.</h5></td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>Maksud Perjalanan Dinas&emsp;:&emsp;<?php echo $baris['maksud_dinas'] ?></h5></td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>Alat angkutan yang dipergunakan&emsp;:&emsp;<?php echo $baris['transportasi'] ?></h5></td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>a.  Tempat Berangkat&emsp;:&emsp;<?php echo $baris['tmpt_berangkat'] ?></h5>
              <h5>b.  Tempat Tujuan&emsp;:&emsp;<?php echo $baris['tmpt_tujuan'] ?></h5>
              </td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>a.  Lamanya Perjalanan Dinas&emsp;:&emsp;<?php echo $baris['lama'] ?></h5>
              <h5>b.  Dana yang Digunakan&emsp;:&emsp;<?php echo rupiah($baris['dana']) ?></h5>
              <h5>c.  Tanggal Berangkat&emsp;:&emsp;<?php echo tgl_indo($baris['tgl_berangkat']) ?></h5>
              <h5>d.  Tanggal Harus Kembali&emsp;:&emsp;<?php echo tgl_indo($baris['tgl_kembali']) ?>.</h5></td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left">
              <h5>Pembeban Anggaran&emsp;:&emsp;</h5>
              <h5>a.  instansi&emsp;:&emsp;<?php echo $baris['instansi'] ?></h5>
              <h5>b.  Akun&emsp;:&emsp;<?php echo $baris['no_akun'] ?></h5>
              </td>
          </tr>

          <tr>
            <td style="vertical-align: middle;" class="text-center"><?php echo $i++ ?></td>

            <td style="vertical-align: middle;" class="text-left"><h5>Keterangan Lain-lain&emsp;:&emsp;<?php echo $baris['ket'] ?><p>
              <?php echo $baris['no_ket'] ?>
            </p></h5></td>
          </tr>

        
      </tbody>
    </thead>
  </table>
</div>
</div>

<br>
<br>
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




	<script>
		window.print();
	</script>
