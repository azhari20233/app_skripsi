<?php 
  
  require_once("../fungsi_indotgl.php"); 
  require_once("../koneksi.php"); 
  require_once("../fungsi_rupiah.php"); 
  require_once("../fungsi_indotgl.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Laporan Hasil Kegiatan</title>
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
      margin-top: -4%;
      position: absolute;
      width: 120px;
    }
    .tengah{
      margin-left: -18%;
      margin-top: -2%;
      position: absolute;
      width: 380px;
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
      margin-top: -12%;
    }
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>
<?php session_start(); 
if (isset($_POST['cetak'])) {
  $bulan = $_REQUEST['bulan-cetak'];
  $tahun = $_REQUEST['tahun-cetak'];
  $result = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN kegiatan ON kegiatan.id_kegiatan=monitoring.id_kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip WHERE monitoring.tgl_akhir LIKE '%$bulan%' AND monitoring.tgl_akhir LIKE '%$tahun%' ORDER BY tgl_akhir ASC");
}else{
  $result = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN kegiatan ON kegiatan.id_kegiatan=monitoring.id_kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip");
}?>

  <div class="container" style="font-family: Times;"><br>
    
  <h3 class="text-center"><b>PEMERINTAH KABUPATEN BANJAR</b></h3>
  <img src="../gambar/banjar.png" class="float-left kiri"><h3 class="text-center wew"><b>DINAS KOMUNIKASI, INFORMATIKA, STATISTIK <p>DAN PERSANDIAN</p></b></h3>
  <h5 class="text-center">Alamat : JL.A. Yani No. 03 BTelp/Fax. (0511) 6750447 <p>Martapura Kalimantan Selatan Kode Pos: 70614</p></h5>
  <h6 class="text-center">Website : kominfo.banjarkab.go.id email : <u>kominfo.banjarkab@gamil.com</u></h6>
  <hr>
  <br>

  <table class="">
  <tbody>
    <tr>
      <td><h5>Nomor</h5></td>
      <td>:</td>
      <td><h5>776.2/ 3365.H.KGT / DISKOMINFO / 2022</h5></td>
    </tr>
    <tr>
      <td><h5>Sifat</h5></td>
      <td>:</td>
      <td><h5>Penting</h5></td>
    </tr>
    <tr>
      <td><h5>Lampiran</h5></td>
      <td>:</td>
      <td><h5>- 1 Lembar</h5></td>
    </tr>
    <tr>
      <td><h5>Perihal</h5></td>
      <td>:</td>
      <td><h5>Data Hasil Laporan Kegiatan</h5></td>
    </tr>
  </tbody>
</table>

 
  <div class="tujuan">
    <h5><p>Rantau <?php echo tgl_indo(date('Y-m-d')); ?></p>
    <p>
      Kepada&ensp;&ensp;&ensp;:
    <p>
      Yth. Kepala Pengadilan Negeri Rantau Kelas II
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


  <div class="container">
  <h2 class="text-center">HASIL DATA LAPORAN KEGIATAN</h2>
  <h3 class="text-center">Dinas Komunikasi Informatika Statistik dan Persandian</h3><br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          <th style="vertical-align: middle;">NO</th>
          <th>Pegawai yang Memonitoring</th>
          <th>Kegiatan yang Dimonitoring</th>
          <th>Tgl Membuat Laporan Kegiatan</th>
          <th>Tgl Selesai Membuat Laporan Kegiatan</th>
          <th>Kesimpulan</th>
        </tr>
        <tbody> 
      </thead>  

        
<?php 
$no = 1;
      while($data = mysqli_fetch_array($result)) {?>
          <tr class="text-center">
            <td style="vertical-align: middle;"><?=$no++;?></td>
            <td><?php echo $data['nama_lengkap'] ?></td>
            <td><?php echo $data['nama_kegiatan'] ?> Lokasi : <?php echo $data['lokasi_kegiatan'] ?></td>
            <td><?= tgl_indo($data['tgl_awal']) ?></td>
            <td><?= tgl_indo($data['tgl_akhir']) ?></td>
            <td><?php echo $data['kesimpulan'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </thead>
  </table>
</div>
</div>

<br>
<br>
<table class="text-center ttd">
  <tbody>
    <tr>
      <td><h5><b>Kepala Dinas Diskominfo Kab. Banjar</b></h5></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b><u>Faisal, ST, MM</u><p>NIP. 19780530 200604 1 017</p></b></h5></td>
    </tr>

    <tr>
      <td><h5><b></b></h5></td>
    </tr>
  </tbody>
</table>



  <script>
    window.print();
  </script>
