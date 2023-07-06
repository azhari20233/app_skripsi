<?php 
  require_once("../koneksi.php");
  require_once("../admins/tgl_indo.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Surat Kegiatan Acara</title>
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
      margin-top: 22%;
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

$id_kegiatan = $_GET['id_kegiatan'];

$result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip WHERE id_kegiatan = '$id_kegiatan'");


while( $row = mysqli_fetch_array($result) ) :

?>




  <div class="container" style="font-family: Times;"><br>
    
  <h2 class="text-center"><b>PEMERINTAH KABUPATEN TAPIN</b></h2>
  <img src="../gambar/tapin.png" class="float-left kiri"><h2 class="text-center wew"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></h2><img src="../gambar/kominfo.png" class="kanan">
  <h6 class="text-center">Jl. Jend Sudirman No. 89 Kode Pos 71111</h6>
  <h2 class="text-center"><b>RANTAU</b></h2>
  <hr>
  <br>
  <br>
  
  <h5>Nomor&ensp;&ensp;&ensp;&ensp;:  604 / <?=$row['no_surat'];?> / DISKOMINFO / KAB-TAPIN</h5>
  <h5>Lampiran&ensp;&ensp;: - 1 Lembar</h5>
  <h5>Perihal&ensp;&ensp;&ensp;&ensp;:  Surat Kegiatan Acara</h5>
  <br>
  <br>


  <div class="tujuan">
    <h5><p>Rantau <?php echo tanggal_indo(date('Y-m-d')); ?></p>
    <p>
      Kepada&ensp;&ensp;&ensp;:
    <p>
      Yth. Para Tamu Undangan
      <p>
      Di&ensp;-
      <p>
        &ensp;&ensp;&ensp;Tempat
      </p>  
      </p>
    </p>
    </p>
  </h5>
  </div>
  <br>
  <br>


   <h5 id="isi"><p><b>Assalamu’alaikum Wr. Wb</b>.<p class="text-content">Sehubungan dengan adanya keperluan <b><?php echo $row['nama_kegiatan']; ?></b> surat ini dimaksudkan untuk undangan kegiatan. Untuk lebih jelasnya detail pengajuan seperti yag ada di bawah ini : <p>
    <div class="row">
      <div class="col-md-3">
        <h5>Hari dan Tanggal</h5>
        <h5>Waktu Acara Kegiatan</h5>
        <h5>Dalam Rangka Kegiatan</h5>
        <h5>Tempat</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
        <h5>:</h5>
        <h5>:</h5>
        <h5>:</h5>
      </div>
      <div class="col-md-6">
        <?php $tanggal = date('Y-m-d', strtotime($row['waktu_kegiatan'])); ?>
        <h5 style="vertical-align: middle;"><?=tanggal_indo($tanggal, true)?></h5>
        <h5 style="vertical-align: middle;"><?=$row['waktu'];?></h5>
        <h5 style="vertical-align: middle;"><?=$row['pelaksana_kegiatan'];?></h5>
        <h5 style="vertical-align: middle;"><?=$row['lokasi_kegiatan'];?></h5>
      </div>
    </div>
  </p></p>
    <p class="text-content">Demikian surat ini diberikan sebagai Bukti telah disetujuinya surat untuk digunakan seperlunya</p></h5>
    <br>
    <br>


<table class="text-center ttd">
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


<table class="text-left ttd2">
  <tbody>
    <tr>
      <td><h5><b>Petugas Kegiatan</b></h5></td>
    </tr>
    <tr>
      <td><h5><b><?=$row['jabatan'];?></b></h5></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b><u><?=$row['nama_lengkap'];?></u></b></h5></td>
    </tr>

    <tr>
      <td><h5><b>NIP.<?=$row['nip'];?></b></h5></td>
    </tr>
  </tbody>
</table>




  <br>
  <br>
  <br>
  <br>










  <?php endwhile; ?>

  <script type="text/javascript">
    window.print();
  </script>
  </div> <!-- akhir container -->
  
</div>
</html>
