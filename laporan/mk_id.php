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
  <title>Surat Monitoring Kegiatan</title>
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
      margin-top: 12%;
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
      margin-left: 68%;
      margin-top: -17%;
      position: absolute;
    }
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>
<?php 

$id_monitoring = $_GET['id_monitoring'];

$result = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN t_pegawai ON t_pegawai.nip=monitoring.nip WHERE id_monitoring = '$id_monitoring'");


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
  
  <h5>Nomor&ensp;&ensp;&ensp;&ensp;:  604 / SP / KOMINFO / Kal-Sel</h5>
  <h5>Lampiran&ensp;&ensp;: - 1 Lembar</h5>
  <h5>Perihal&ensp;&ensp;&ensp;&ensp;:  Surat Keperluan Monitoring Kegiatan</h5><br>
  <br>
  <br>


  <div class="tujuan">
    <h5><p>Rantau <?= tgl_indo(date('Y-m-d')); ?></p>
    <p>
      Kepada&ensp;&ensp;&ensp;:
    <p>
      Yth. Kepala Dinas Perhubungan Kabupaten Banjar 
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


  <h5 id="isi"><p><b>Assalamu’alaikum Wr. Wb</b>.<p class="text-content">Sehubungan dengan adanya keperluan Monitoring Anggaran. Untuk lebih jelasnya detail pengajuan seperti yag ada di bawah ini : <p>
    <div class="row">
      <div class="col-md-4">
        <h5>Nama Pegawai</h5>
        <h5>Nama Kegiatan</h5>
        <h5>Tanggal Awal</h5>
        <h5>Tanggal Akhir</h5>
        <h5>Hasil Kegiatan /Kesimpulan</h5>
      </div>
      <div class="col-md-1">
        <h5>:</h5>
        <h5>:</h5>
        <h5>:</h5>
        <h5>:</h5>
        <h5>:</h5>
      </div>
      <div class="col-md-7">
        <h5 style="vertical-align: middle;"><?=$row['nama_lengkap'];?></h5>
        <h5 style="vertical-align: middle;"><?=$row['nama_kegiatan'];?></h5>
        <h5 style="vertical-align: middle;"><?=tgl_indo($row['tgl_awal']);?></h5>
        <h5 style="vertical-align: middle;"><?=tgl_indo($row['tgl_akhir']);?></h5>
        <h5 style="vertical-align: middle;"><?=$row['kesimpulan'];?></h5>
      </div>
    </div>
  </p></p>
    <p class="text-content">Demikian surat ini diberikan sebagai Bukti telah disetujuinya surat untuk digunakan seperlunya</p></h5>
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
