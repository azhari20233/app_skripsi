
<?php 
  require_once("../koneksi.php");
  require_once("../admins/tgl_indo.php");
  require_once("../admins/fungsi_rupiah.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Surat Monitoring Kegiatan</title>
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
    <h5><p>Rantau <?= tanggal_indo(date('Y-m-d')); ?></p>
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


	<div class="container">
	<h2 class="text-center">DAFTAR DATA MONITORING KEGIATAN</h2><br>
	<table class="table table-bordered table-hover table-sm" style="margin: 0 auto;">
			<thead class="">
				<tr class="text-center">
						<th style="vertical-align: middle;">NO</th>
						<th style="vertical-align: middle;">NIP dan Nama Pegawai</th>
            <th style="vertical-align: middle;">Nama Kegiatan</th>
            <th style="vertical-align: middle;">Tgl Awal</th>
            <th style="vertical-align: middle;">Foto Kegiatan</th>
            <th style="vertical-align: middle;">Hasil / Kesimpulan Kegiatan</th>

				</tr>
			</thead>	
				<tbody>	

				<?php 

			if (isset($_POST['cetak'])) {
                $tgl_awal = $_REQUEST['tgl_awal'];
                $tgl_akhir = $_REQUEST['tgl_akhir'];
                $result = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN t_pegawai ON t_pegawai.nip=monitoring.nip WHERE tgl_awal BETWEEN '$tgl_awal' AND '$tgl_akhir'");
              
              }else{
                $result = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN t_pegawai ON t_pegawai.nip=monitoring.nip");
              }
			$no=1;

			while($data = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td style="vertical-align: middle;"><?=$no++;?></td>
						<?php $tanggal1 = date('Y-m-d', strtotime($data['tgl_awal']));?>
            <td style="vertical-align: middle;"><?=$data['nip'],$data['nama_lengkap'];?></td>
            <td style="vertical-align: middle;"><?=$data['nama_kegiatan'];?></td>
            <td style="vertical-align: middle;"><?=tanggal_indo($tanggal1, true)?></td>

            <td style="vertical-align: middle;" style="vertical-align: middle;" class="text-center"><a target="_blank" href="../fileweb/<?php echo $data['foto']; ?>"><img style="width: 115px;" src="../fileweb/<?php echo $data['foto']; ?>" alt=""></a></td>
            <td style="vertical-align: middle;"><?=$data['kesimpulan'];?></td>
						
					</tr>
				<?php } ?>
			</tbody>
	</table>
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


  
   




  <script>
    window.print();
  </script>
