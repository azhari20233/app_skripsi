<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("tgl_indo.php");	
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-gray-800 text-center"><b>DATA RENCANA KEGIATAN</b></h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
						<th style="vertical-align: middle;">NO</th>
						<th style="vertical-align: middle;">Nama Kegiatan</th>
						<th style="vertical-align: middle;">Lokasi Kegiatan</th>
						<th style="vertical-align: middle;">Waktu Kegiatan</th>
						<th style="vertical-align: middle;">Dalam Rangka Kegiatan</th>
						<th style="vertical-align: middle;">Yang Membuat Rencana Kegiatan</th>
						<th style="vertical-align: middle;">Status Surat</th>
						<th id="ikonbtn"><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <tr style="vertical-align: middle;">
					<?php 
					$no = 1;
					$sql = mysqli_query($koneksi,"SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip");
					while ($data = mysqli_fetch_array($sql)) {
					?>
			
					<?php $tanggal = date('Y-m-d', strtotime($data['waktu_kegiatan'])); ?>

						<td style="vertical-align: middle;"><?=$no++;?></td>
						<td style="vertical-align: middle;"><?=$data['nama_kegiatan'];?></td>
						<td style="vertical-align: middle;"><?=$data['lokasi_kegiatan'];?></td>
						<td style="vertical-align: middle;"><?=tanggal_indo($tanggal, true)?></td>
						<td style="vertical-align: middle;"><?=$data['pelaksana_kegiatan'];?></td>
						<td style="vertical-align: middle;"><?=$data['nama_lengkap'];?><br><?=$data['nip'];?></td>
						<td style="vertical-align: middle;"><?php 
						if($data['status_kegiatan']== 0){
							echo "<p class='badge badge-warning'><b>Proses</b></p>";
						}else if($data['status_kegiatan']== 1){
							echo "<p class='badge badge-success'><b>Disetujui</b></p>";
						}else if($data['status_kegiatan']== 2){
							echo "<p class='badge badge-danger'><b>Ditolak</b></p>";
						}
						
						?></td>
						<td style="vertical-align: middle;">
							<?php 

			                if($data['status_kegiatan']==1){
								?>
								<a title="Cetak Surat Rencana Kegiatan" target="_blank" href="../laporan/kegiatan_id.php?id_kegiatan=<?php echo $data["id_kegiatan"]; ?>" class="btn btn-primary btn-circle">
			                    <i class="fas fa-print"></i>
			                  </a>
			                  <?php
			              		}
			                 ?>
						</td>
					</tr>
				</div>
				<?php } ?>
              </tbody>
            </table>

                
              </div><br><br>
              	  <a href="beranda.php"  title="Kembali Ke Home" class="btn btn-secondary btn-circle btn-lg">
                    <i class="fas fa-arrow-left"></i>
                  </a>
                  <a href="grafik_kegiatan.php" title="Lihat Grafik Rencana Kegiatan" class="btn btn-info btn-circle btn-lg">
                    <i class="fas fa-chart-bar"></i>
                  </a>
                  <a href="#" title="Cetak Tabel Kegiatan" class="btn btn-info btn-circle btn-lg" data-toggle="modal" data-target="#exampleModal">
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

<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Cetak Data Kegiatan</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="../laporan/kegiatan.php" method="post" target="_blank"> 
					<table>
						<tr>
							<td>
								<div class="form-group">Dari Tanggal</div>
							</td>
							<td align="center" width="5%">:</td>
							<td>
								<div class="form-group">
									<input type="date" class="form-control" name="tgl_awal" required>
								</div>
							</td>
						</tr>

						<tr>
							<td>
								<div class="form-group">Sampai Tanggal</div>
							</td>
							<td align="center" width="5%">:</td>
							<td>
								<div class="form-group">
									<input type="date" class="form-control" name="tgl_akhir" required>
								</div>
							</td>
						</tr>
						
						<tr></tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="cetak" class="btn btn-primary btn-sm" value="Cetak">
							<input type="reset" class="btn btn-secondary btn-sm" value="Reset">
						</td>

					</table>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

		        <a href="../laporan/kegiatan.php?id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>

		      </div>
		    </div>
		  </div>
		</div>