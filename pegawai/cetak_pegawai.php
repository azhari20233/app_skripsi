<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("fungsi_indotgl.php");	

$pola = 'ASC';
	$polabaru = 'ASC';
	if(isset($_GET['urut'])){
		$orderby = $_GET['urut'];
		$pola = $_GET['pola'];
		if($pola=='ASC'){
			$polabaru = 'DESC';
			$kodesvg = 'M10 11V13H18V11H10M10 17V19H14V17H10M10 5V7H22V5H10M6 7H8.5L5 3.5L1.5 7H4V20H6V7Z';
		}else{
			$polabaru = 'ASC';
			$kodesvg = 'M10,13V11H18V13H10M10,19V17H14V19H10M10,7V5H22V7H10M6,17H8.5L5,20.5L1.5,17H4V4H6V17Z';
		}
	}else{
		$kodesvg = 'M10,13V11H18V13H10M10,19V17H14V19H10M10,7V5H22V7H10M6,17H8.5L5,20.5L1.5,17H4V7H1.5L5,3.5L8.5,7H6V17Z';
	}
?>
	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="hapus"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Data Berhasil Terhapus!", "Klik OK!", "warning");
						} alert1();
					</script>
				<?php 
			}
		}

		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="ubah"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Data Berhasil Diubah!", "Klik OK!", "info");
						} alert1();
					</script>
				<?php 
			}
		}

		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="tambah"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Data Berhasil Ditambah!", "Klik OK!", "success");
						} alert1();
					</script>
				<?php 
			}
		}

		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="simpan"){
				?>
					<script src="../js/sweetalert.min.js"></script>
					<script type="text/javascript">
						function alert1(){
							swal("Data Berhasil Disimpan!", "Klik OK!", "success");
						} alert1();
					</script>
				<?php 
			}
		}
	?>
 <!-- Begin Page Content -->
        <div class="container-fluid">
          <form action="" method="POST">
          <br>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 text-center"><b>DETAIL DATA PEGAWAI</b></h1>
          <br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA PEGAWAI</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
						<th style="vertical-align: middle;">NO</th>
						<th style="vertical-align: middle;">Nip</th>
						<th style="vertical-align: middle;">Nama Lengkap</th>
						<th style="vertical-align: middle;">Jabatan</th>
						<th style="vertical-align: middle;">Jenis Kelamin</th>
						<th style="vertical-align: middle;">Agama</th>
						<th style="vertical-align: middle;">Status</th>
						<th style="vertical-align: middle;">Tempat Lahir</th>
						<th style="vertical-align: middle;">Tanggal Lahir</th>
						<th style="vertical-align: middle;">Alamat Rumah</th>
						<th style="vertical-align: middle;">Nomer Telpon</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <tr style="vertical-align: middle;">
					<?php
	                $sql = mysqli_query($koneksi,"SELECT * FROM t_pegawai");
	              ?>
	                <?php
	                  $no = 1; 
	                  while ($data = mysqli_fetch_array($sql)) {
	                ?>
			

						<td><?=$no++;?></td>
						<td><?=$data['nip'];?></td>
						<td><?=$data['nama_lengkap'];?></td>
						<td><?=$data['jabatan'];?></td>
						<td><?=$data['jenis_kelamin'];?></td>
						<td><?=$data['agama'];?></td>
						<td><?=$data['status'];?></td>
						<td><?=$data['tempat_lahir'];?></td>
						<td><?=$data['tanggal_lahir'];?></td>
						<td><?=$data['alamat_rumah'];?></td>
						<td><?=$data['no_telpon'];?></td>						
					</tr>
					</div>
					<?php } ?>
                  </tbody>
                </table>
                
              </div><br><br>
              <a href="beranda.php"  title="Kembali Ke Home" class="btn btn-secondary btn-circle btn-lg">
                    <i class="fas fa-arrow-left"></i>
                  </a>
               <a href="../laporan/pegawai.php" target="_blank"  title="Cetak Tael Pegawai" class="btn btn-info btn-circle btn-lg">
                    <i class="fas fa-print"></i>
                  </a>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        </form>
      </div>
      <!-- End of Main Content -->

<?php
	require_once("foot.php");
?> 