<?php 
  
  require_once("../fungsi_indotgl.php"); 
  require_once("../koneksi.php"); 
  require_once("../fungsi_rupiah.php"); 
  require_once("../tgl_indo.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Surat Masuk</title>
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
      <td><h5>442.7/ 775.C-AGS / DISKOMINFO / 2022</h5></td>
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
      <td><h5>Seluruh Data Surat Masuk</h5></td>
    </tr>
  </tbody>
</table>

 
  <div class="tujuan">
    <h5><p>Rantau <?php echo tgl_indo(date('Y-m-d')); ?></p>
    <p>
      Kepada&ensp;&ensp;&ensp;:
    <p>
      Yth. Kepala Dinas Diskominfo Kabupaten Banjar
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
  <h2 class="text-center">DAFTAR SURAT MASUK</h2>
  <h3 class="text-center">Dinas Komunikasi Informatika Statistik dan Persandian</h3><br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          <th style="vertical-align: middle;">NO</th>
          <th>Pengirim Surat</th>
          <th>Kepada</th>
          <th>Tgl Masuk</th>
          <th>Tgl Pelaksanaan</th>
          <th>Jemis Surat</th>
          <th>No. Surat</th>
          <th>Perihal</th>
          <th>Yang Bersangkutan</th>
          <th>Status</th>
        </tr>
        <tbody> 
      </thead>  

        <?php session_start(); 

      if (isset($_POST['cetak'])) {
        $bulan = $_REQUEST['bulan-cetak'];
        $tahun = $_REQUEST['tahun-cetak'];
        $result = mysqli_query($koneksi, "SELECT * FROM masuk LEFT JOIN t_pegawai ON masuk.nip=t_pegawai.nip WHERE masuk.tgl_masuk LIKE '%$bulan%' AND masuk.tgl_masuk LIKE '%$tahun%' ORDER BY tgl_masuk ASC");

      }else{
        $result = mysqli_query($koneksi, "SELECT * FROM masuk LEFT JOIN t_pegawai ON masuk.nip=t_pegawai.nip");
      }

$no = 1;
      while($data = mysqli_fetch_array($result)) {?>
          <tr class="text-center">
            <td style="vertical-align: middle;"><?=$no++;?></td>
            <td><?php echo $data['dari'] ?></td>
            <td><?php echo $data['untuk'] ?></td>
            <td><?php echo tgl_indo($data['tgl_masuk']) ?></td>
            <td><?php echo tgl_indo($data['tgl_kegiatan']) ?></td>
            <td><?php echo $data['jenis_surat'] ?></td>
            <td><?php echo $data['no_surat'] ?></td>
            <td><?php echo $data['perihal'] ?></td>
            <td><?php echo $data['nama_lengkap'] ?></td>
            <td style="vertical-align: middle;"><?php 
            if($data['status_surat']== 'Surat Sedang Diproses Atasan'){
              echo "<p><b>Sedang Diproses Atasan</b></p>";
            }else if($data['status_surat']== 'Disetujui Atasan'){
              echo "<p><b>Disetujui Atasan</b></p>";
            }else if($data['status_surat']== "Data Ditolak Atasan"){
              echo "<p><b>Data Ditolak Atasan</b></p>";
            }
            
            ?></td>
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
