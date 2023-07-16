<?php 

require_once "../koneksi.php";
require_once "head.php";

$qrytahun = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip GROUP BY YEAR(waktu_kegiatan) ASC");
 ?>
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
 <body>
	<br><br><br>
<!-- kotak pencarian -->
<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card text-center" style="background-color: #f8f9fa;">

    <form action="" method="post"><br>
    	<h3 style="text-align: center; margin-bottom: 32px;">Grafik Data Rencana Kegiatan</h3>
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
<h3 style="text-align: center; margin-top: 30px;">Grafik Rencana Kegatan Berdasarkan Bulan dan Tahun</h3>
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
					label: 'Jumlah Data Rencana Kegiatan Di Bulan ini',
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
<br><br>
<a href="../laporan/grafik.php" target="_blank" title="Grafik Rencana Kegiatan" class="btn btn-info btn-circle btn-lg">
                    <i class="fas fa-print"></i>
                  </a>
<button type="button" class="btn btn-secondary btn-circle btn-lg" onclick="history.back()"><i class="fas fa-arrow-left"></i></button>

 <?php 
require_once "foot.php";
  ?>
  </div>
</div>
</div>
    </div>
  		</div>





</body>
</html>
 </body>