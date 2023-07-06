
<?php 
  require_once("../koneksi.php");
  require_once("../fungsi_indotgl.php");
  require_once("../fungsi_rupiah.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Surat Mutasi Pegawai</title>
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
      margin-left: 65%;
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
      margin-top: -15%;
    }
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>


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
      <td><h5>442.7/ 775.C-AGS / BKAD-SET / 2022</h5></td>
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
  <br><br>


  <div class="container">
  <h2 class="text-center">DAFTAR DATA RENCANA KEGIATAN</h2><br>
    <h3 class="text-center">Badan Keuangan dan Aset Daerah</h3><br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto;">
      <thead class="">
        <tr class="text-center">
            <th style="vertical-align: middle;">NO</th>
            <th>Nama & NIP</th>
            <th>Nomor SK</th>
            <th>Tanggal SK Mutasi</th>
            <th>Tujuan</th>
            <th>Jabatan Baru</th>
            <th>Status Mutasi</th>

        </tr>
      </thead>  
        <tbody> 

        <?php 

      if (isset($_POST['cetak'])) {
        $bulan = $_REQUEST['bulan-cetak'];
        $tahun = $_REQUEST['tahun-cetak'];
        $result = mysqli_query($koneksi, "SELECT * FROM mutasi INNER JOIN t_pegawai ON mutasi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE mutasi.tgl_sk LIKE '%$bulan%' AND mutasi.tgl_sk LIKE '%$tahun%' ORDER BY tgl_sk ASC");
              
            }else{
              $result = mysqli_query($koneksi, "SELECT * FROM mutasi INNER JOIN t_pegawai ON mutasi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan");
            }
      $no=1;
      while($data = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <td class="text-center"><?=$no++;?></td>
            <td><?php echo $data['nama_lengkap'] ?> | <?php echo $data['nip'] ?></td>
            <td><?php echo $data['no_sk'] ?></td>
            <td><?php echo tgl_indo($data['tgl_sk']) ?></td>
            <td><?php echo $data['tujuan'] ?></td>
            <td><?php echo $data['new_jabatan'] ?></td>
            <td style="vertical-align: middle;"><?php 
            if($data['status_mutasi']== 'Sedang Diproses Atasan'){
              echo "<p><b>Sedang Diproses Atasan</b></p>";
            }else if($data['status_mutasi']== 'Disetujui Atasan'){
              echo "<p><b>Disetujui Atasan</b></p>";
            }else if($data['status_mutasi']== "Data Ditolak Atasan"){
              echo "<p><b>Data Ditolak Atasan</b></p>";
            }
            
            ?></td>
          </tr>
        <?php } ?>
      </tbody>
  </table>
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
