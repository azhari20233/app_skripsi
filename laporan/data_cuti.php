<?php 
  require_once("../koneksi.php"); 
  require_once("../fungsi_rupiah.php"); 
  require_once("../fungsi_indotgl.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Permohonan Cuti Pegawai</title>
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
      margin-top: -17%;
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
  $result = mysqli_query($koneksi, "SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE cuti.tgl_aw LIKE '%$bulan%' AND cuti.tgl_aw LIKE '%$tahun%' ORDER BY tgl_aw ASC");
}else{
  $result = mysqli_query($koneksi, "SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan");
}?>

  <div class="container" style="font-family: Times;"><br>
    
  <h3 class="text-center"><b>PEMERINTAH KABUPATEN TAPIN</b></h3>
  <img src="../gambar/tapin.png" class="float-left kiri"><h3 class="text-center wew"><b>BADAN KEUANGAN DAN ASET DAERAH</b></h3>
  <h5 class="text-center">JL. Datu Nuraya Rt. 01 Kelurahan Rangda Malingkung Kawasan Rantau Saru</h5>
  <h6 class="text-center"><b>RANTAU</b></h6>
  <h6 class="text-right"><b>Kode Pos 71111</b></h6>
  <hr>
  <br>

  <table class="">
  <tbody>
    <tr>
      <td><h5>Nomor</h5></td>
      <td>:</td>
      <td><h5>446.2/ 1187.S.KGT / BKAD-SET / 2022</h5></td>
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
      <td><h5>Seluruh Data Permohonan Cuti Pegawai</h5></td>
    </tr>
  </tbody>
</table>

 
  <div class="tujuan">
    <h5><p>Rantau <?php echo tgl_indo(date('Y-m-d')); ?></p>
    <p>
      Kepada&ensp;&ensp;&ensp;:
    <p>
      Yth. Kepala Dinas BKAD.Kabupaten Tapin
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
  <h2 class="text-center">DATA PERMOHONAN CUTI PEGAWAI</h2>
  <h3 class="text-center">Badan Keuangan dan Aset Daerah</h3><br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          <th style="vertical-align: middle;">NO</th>
          <th>Nama Lengkap Pegawai</th>
          <th>Tgl Awal Cuti & Akhir Cuti</th>
          <th>Total Hari Cuti</th>
          <th>Keterangan Mengajukan Cuti</th>
          <th>Keterangan Surat</th>
          <th>Nomor Surat</th>
          <th>Status Surat</th>
        </tr>
        <tbody> 
      </thead>  
<?php 
$no = 1;
      while($data = mysqli_fetch_array($result)) {?>
          <tr class="text-center">
            <td style="vertical-align: middle;"><?=$no++;?></td>
            <td><?= $data['nama_lengkap'] ?></td>
            <td><?= tgl_indo($data['tgl_aw']) ?> / <?= tgl_indo($data['tgl_ak']) ?></td>
            <td><?= $data['lama_cuti']?> Hari</td>
            <td><?= $data['keterangan']?></td>
            <td><?= $data['ket_cuti'] ?></td>
            <td><?= $data['no_cuti'] ?></td>
            <td style="vertical-align: middle;"><?php 
            if($data['status_cuti']== 'Surat Sedang Diproses Atasan'){
              echo "<p><b>Proses</b></p>";
            }else if($data['status_cuti']== 'Disetujui Atasan'){
              echo "<p><b>Disetujui</b></p>";
            }else if($data['status_cuti']== "Data Ditolak Atasan"){
              echo "<p><b>Data Ditolak</b></p>";
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
      <td><h5><b>Kepala Badan Keuangan dan Aset Daerah Kabupaten Tapin,</b></h5></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b><u>Dr. H. SUFIANSYAH, M.AP</u><p>NIP. 19700616 199003 1 002</p></b></h5></td>
    </tr>

    <tr>
      <td><h5><b></b></h5></td>
    </tr>
  </tbody>
</table>
  <script>
    window.print();
  </script>
