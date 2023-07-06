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
  <title>Data SPT</title>
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
      margin-top: -16%;
    }
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>

    <div class="container" style="font-family: Times;"><br>
    
  <h3 class="text-center"><b>PEMERINTAH KALIMANTAN SELATAN</b></h3>
  <img src="../gambar/banjar.png" class="float-left kiri"><h3 class="text-center wew"><b>UPPD SAMSAT RANTAU</b></h3>
  <h5 class="text-center">Alamat Kantor : JL.Brigjend H.Hasan Basry KM.3 Bitahan Rantau, <p>Kabupaten Tapin, Kalimantan Selatan Tlp.(0511)4772551 Fax. (0511)4774274  71114</p></h5>
  <h5 class="text-center">Website : www.samsatrantau.kalselprov.go.id Email : <u>samsatrantau@kalselprov.go.id</u></h5>
  <hr>
  <br>

  <table class="">
  <tbody>
    <tr>
      <td><h5>Nomor</h5></td>
      <td>:</td>
      <td><h5>511.2/ 598.A-PEG / UPPD / 2022</h5></td>
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
      <td><h5>Seluruh Data SPT</h5></td>
    </tr>
  </tbody>
</table>

 
  <div class="tujuan">
    <h5><p>Rantau <?php echo tgl_indo(date('Y-m-d')); ?></p>
    <p>
      Kepada&ensp;&ensp;&ensp;:
    <p>
      Yth. Kepala UPPD Samsat Rantau
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
  <h2 class="text-center">DAFTAR DATA SURAT PERINTAH TUGAS</h2>
  <h3 class="text-center">Dinas Komunikasi Informatika Statistik dan Persandian</h3><br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          <th style="vertical-align: middle;">NO</th>
          <th>Nama Pegawai</th>
          <th>Jabatan</th>
          <th>NIP</th>
          <th>Maksud Perjalanan Dinas</th>
          <th>Tanggal SPT</th>
          <th>Nomor Regis SPT</th>
        </tr>
        <tbody> 
      </thead>  

        <?php session_start(); 

      if (isset($_POST['cetak'])) {
        $bulan = $_REQUEST['bulan-cetak'];
        $tahun = $_REQUEST['tahun-cetak'];
        $result = mysqli_query($koneksi, "SELECT * FROM spt INNER JOIN sppd ON spt.id_sppd=sppd.id_sppd INNER JOIN masuk ON sppd.id_masuk=masuk.id_masuk INNER JOIN t_pegawai ON masuk.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE spt.tgl_spt LIKE '%$bulan%' AND spt.tgl_spt LIKE '%$tahun%' ORDER BY tgl_spt ASC");

      }else{
        $result = mysqli_query($koneksi, "SELECT * FROM spt INNER JOIN sppd ON spt.id_sppd=sppd.id_sppd INNER JOIN masuk ON sppd.id_masuk=masuk.id_masuk INNER JOIN t_pegawai ON masuk.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan");
      }

$no = 1;
      while($data = mysqli_fetch_array($result)) {?>
          <tr class="text-center">
            <td style="vertical-align: middle;"><?=$no++;?></td>
            <td class="text-center"><?php echo $data['nama_lengkap'] ?></td>
            <td class="text-center"><?php echo $data['nama_jabatan'] ?></td>
            <td class="text-center"><?php echo $data['nip'] ?></td>
            <td class="text-center"><?php echo $data['maksud_dinas'] ?></td>
            <td class="text-center"><?php echo tgl_indo($data['tgl_spt']) ?></td>
            <td class="text-center"><?php echo $data['no_regis_spt'] ?></td>
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
      <td><h5><b>Kepala Unit Pelayanan Pendapatan Daerah Rantau Prov. Kal-Sel</b></h5></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b><u>R.M.E Surya Jaya, SP.M.Ap</u><p>NIP. 19691009 199803 1 009</p></b></h5></td>
    </tr>

    <tr>
      <td><h5><b></b></h5></td>
    </tr>
  </tbody>
</table>



  <script>
    window.print();
  </script>
