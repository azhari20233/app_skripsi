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
  <title>Data Gaji Pegawai</title>
  <link rel="stylesheet" href="../assets/css/themify-icons.css">
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
<?php
$id_gaji = $_GET['id_gaji'];
  $data_m = mysqli_query($koneksi,"SELECT * FROM gaji INNER JOIN absensi ON gaji.id_absensi=absensi.id_absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_gaji = '$id_gaji' ");
  $row = mysqli_fetch_array($data_m);{ 
?>

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
      <td><h5>Data Gaji Pegawai</h5></td>
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
  <div class="card">
      <div class="card-body">
          <h4 class="invoice-header text-center">Badan Keuangan dan Aset Daerah</h4>
          <div class="row">
            <div class="col-6">
          <div class="invoice-from">
    <address class="mt-5 mb-5">
        NIP <br />
        <strong><h5><?php echo $row['nip']; ?></h5></strong><br />
        Nama <br />
        <strong><h5><?php echo $row['nama_lengkap']; ?></h5></strong><br />
        
    </address>
  </div>
  </div>

  <div class="col-6">
  <div class="invoice-from">
    <address class="mt-5 mb-5  float-right">
        Kode Slip gaji <br />
        <strong><h5><?php echo $row['no_slip']; ?></h5></strong><br />
        Gaji Periode <br />
        <strong><h5><?php echo tgl_indo($row['tgl_gaji']); ?></h5></strong><br />
        
    </address>
  </div>
  </div>
  </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table table-invoice">
            <thead>
                <tr>
                    <th>DESKRIPSI</th>
                    <th></th>
                    <th></th>
                    <th><p align="right">TOTAL</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Gaji Pokok<br />
                    </td>
                    <td></td>
                    <td></td>
                    <td align="right"><?php echo 'Rp.'.number_format($row['gajipok']); ?></td>
                </tr>
                <tr>
                    <td>
                        Tunjangan<br />
                    </td>
                    <td></td>
                    <td></td>
                    <td align="right"><?php echo 'Rp.'.number_format($row['tunjangan']); ?></td>
                </tr>
                <tr>
                    <td>
                        Bonus<br />
                    </td>
                    <td></td>
                    <td></td>
                    <td align="right"><?php echo 'Rp.'.number_format($row['bonus']); ?></td>
                </tr>
                <tr>
                    <td>
                        Potongan<br />
                    </td>
                    <td></td>
                    <td></td>
                    <td align="right"><?php echo 'Rp.'.number_format($row['potongan']); ?></td>
                </tr>
                <tr>
                    <td>
                        Gaji Pokok <i class="ti ti-plus"> Tunjangan <i class="ti ti-plus"> Bonus <i class="ti ti-minus"></i> Potongan<br />
                    </td>
                    <td></td>
                    <td></td>
                    <input type="hidden" name="tanpa_ket" value="<?=$row['tanpa_ket']?>">
                    <input type="hidden" name="gajipok" value="<?=$row['gajipok']?>">
                    <input type="hidden" name="tunjangan" value="<?=$row['tunjangan']?>">
                    <input type="hidden" name="bonus" value="<?=$row['bonus']?>">
                    <input type="hidden" name="potongan" value="<?=$row['potongan']?>">
                 
                    <td align="right"><?php echo 'Rp.'.number_format($row['gaji_bersih'] + $row['bonus'] - $row['potongan']); ?></td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
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
