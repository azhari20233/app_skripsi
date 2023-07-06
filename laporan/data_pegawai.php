<?php 
  
  require_once("../fungsi_indotgl.php"); 
  require_once("../koneksi.php"); 
  require_once("../fungsi_rupiah.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Pegawai</title>
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
      margin-top: -12%;
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
      <td><h5>423.4/ 775.C-AGS / BKAD-SET / 2022</h5></td>
    </tr>
    <!-- <tr>
      <td><h5>Sifat</h5></td>
      <td>:</td>
      <td><h5>Penting</h5></td>
    </tr> -->
    <tr>
      <td><h5>Lampiran</h5></td>
      <td>:</td>
      <td><h5>- 1 Lembar</h5></td>
    </tr>
    <tr>
      <td><h5>Perihal</h5></td>
      <td>:</td>
      <td><h5>Seluruh Data Pegawai</h5></td>
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
  <h2 class="text-center">DAFTAR DATA PEGAWAI</h2>
  <h3 class="text-center">Badan Keuangan dan Aset Daerah</h3><br>
  <table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
      <thead class="">
        <tr class="text-center">
          <th style="vertical-align: middle;">NO</th>
          <th>Nama & NIP</th>
          <th>Jabatan</th>
          <th>Jk</th>
          <th>Agama</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>No. Telepon</th>
          <th>Status</th>
          <th>Pegawai</th>
        </tr>
        <tbody> 
      </thead>  

        <?php session_start(); 
        $result = mysqli_query($koneksi, "SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");
        $asn = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_pegawai_asn FROM t_pegawai WHERE pegawai = 'asn';");
        $nonasn = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_pegawai_nonasn FROM t_pegawai WHERE pegawai = 'non asn';");

      $no = 1;
      while($data = mysqli_fetch_array($result)) {?>
          <tr class="text-center">
            <td style="vertical-align: middle;"><?=$no++;?></td>
            <td><?php echo $data['nama_lengkap'] ?> | <?php echo $data['nip'] ?></td>
            <td><?php echo $data['nama_jabatan'] ?></td>
            <td><?php echo $data['jenis_kelamin'] ?></td>
            <td><?php echo $data['agama'] ?></td>
            <td><?php echo $data['tempat_lahir'] ?></td>
            <td><?php echo tgl_indo($data['tanggal_lahir']) ?></td>
            <td><?php echo $data['alamat_rumah'] ?></td>
            <td><?php echo $data['no_telpon'] ?></td>
            <td><?php echo $data['status'] ?></td>
            <td><?php echo $data['pegawai'] ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td class="text-center" colspan="9">Jumlah Pegawai ASN</td>
          <td class="text-center" colspan="2"><?php echo mysqli_fetch_array($asn)[0] ?></td>
        </tr>
        <tr>
          <td class="text-center" colspan="9">Jumlah Pegawai Non ASN</td>
          <td class="text-center" colspan="2"><?php echo mysqli_fetch_array($nonasn)[0] ?></td>
        </tr>
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
