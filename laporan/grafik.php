<?php
include '../koneksi.php';


 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Grafik Rencana Kegiatan</title>
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
    #isi{
      line-height: 1.7;
    }
    .kiri{
      margin-top: -6%;
    }
    .kanan{
      margin-top: -10%;
    }
    img{
      
      width: 220px;
    }
    hr{
      border: solid;
      color: #333;
    }
    .wew{
      margin-right: 23%;
    }
    .tujuan{
      margin-left: 70%;
      margin-top:  -8%;
    }
    .ttd{
      margin-left: 75%;
    }
  </style>
</head>


  <div class="container" style="font-family: Calibri;"><br>
    
  <h4 class="text-center">PEMERINTAH KABUPATEN BANJAR</h4>
  <img src="../gambar/Banjar.png" class="float-left kiri"><h2 class="text-center wew"><b>DINAS PERHUBUNGAN</b></h2><img src="../gambar/dishub.png" class="float-right kanan">
  <h6 class="text-center" style="margin-right: 5%;">Jl. Sekumpul Ujung No.3, Desa Bincau, Telp (0511) 6749175 Martapura <p>Website : www.banjarkab.go.id Email : banjar@banjarkab.go.id</p></h6>
  <hr style="border: solid;">
  <br>
  <br>
  <br>
  <br>
  <center>
  <table class="kop">
    <td style="font-size: 20px; font-weight: bold;">GRAFIK RENCANA KEGIATAN</td>
  </table><br>
  </center>
 
  <div>
    <script type="text/javascript" src="../js/chartjs/Chart.js"></script>
    <?php

    $qrytahun = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip GROUP BY YEAR(waktu_kegiatan) ASC");
 ?>
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
 <body>
  <style type="text/css">
    body{
      font-family: roboto;
    }
  </style>
  <br><br><br>
<!-- kotak pencarian -->
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card text-center" style="background-color: #f8f9fa;">

    <form action="" method="post"><br>
      
      <div class="text-center">
      <div class="form-group">
        <h4>Pilih Tahun Grafik</h4>
          <select name="tahun" class="form-control" style="width: 153px; color: black; margin-left: 43%;">
            <option>-PILIH TAHUN-</option>
            <?php if(mysqli_num_rows($qrytahun)) { ?>
            <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
            <option><?php $formatwaktu = $row["waktu_kegiatan"];echo date('Y',strtotime($formatwaktu)); ?></option>
            <?php } ?>
            <?php } ?>
          </select>
      </div>
        
        <button class="submit btn btn-dark" name="proses" value="cari">PROSES</button>
        </div>
    
<!-- akhir kotak pencarian -->
<h3 style="text-align: center; margin-top: 30px;">Grafik Data Peminjaman Berdasarkan Bulan dan Tahun</h3>
<!-- grafik -->
  <div>
    <canvas id="myChart"></canvas>
  </div>

 
  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
          label: 'Jumlah Data Peminjaman',
          data: [
          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '01' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '01';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '02' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip WHERE MONTH(waktu_kegiatan)= '02';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '03' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '03';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '04' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '04';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '05' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '05';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '06' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '06';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '07' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '07';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '08' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '08';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '09' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '09';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '10' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '10';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '11' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '11';");
          echo mysqli_num_rows($result);
          }
          ?>
          ,

          <?php 
          if (ISSET($_POST['proses'])){
          $tahun = $_POST['tahun'];
          $query2 = "SELECT * FROM kegiatan WHERE MONTH(waktu_kegiatan)= '12' AND waktu_kegiatan LIKE '%$tahun%'";
             
          $sql = mysqli_query($koneksi, $query2);
          $jmlh_data = array();
          while(($row = mysqli_fetch_array($sql)) != null){
            $jmlh_data[] = $row;
          }
          $count = count($jmlh_data);
          echo "$count";
          }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip where MONTH(waktu_kegiatan)= '12';");
          echo mysqli_num_rows($result);
          }
          ?>
           ],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
<!-- akhir grafik -->
</form>
  </div>
</div>
</div>
    </div>
      </div>





</body>
</html>
 </body>

    <br>
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
