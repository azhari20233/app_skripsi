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
          <br>
          <!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-gray-800 text-center"><b>DATA RENCANA KEGIATAN</b></h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
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
						<td style="vertical-align: middle;" id="ikonbtn2">
							<div class="text-center">
								<a title="Edit Data?" name="id" href="edit_kegiatan.php?id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-warning btn-circle">
				                    <i class="fas fa-exclamation-triangle"></i>
				                  </a>

			                	<a title="Hapus Data?" href="hapus/hapus_kegiatan.php?id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>


			                
							
							</div>
							</div>
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
                  <a href="input_kegiatan.php" title="Tambah Data" class="btn btn-success btn-circle btn-lg">
                    <i class="fas fa-plus"></i>
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

<?php 
	if (isset($_POST['tombol'])) {
		$status = $_POST['status'];

		echo $row['id_surat'];

		$update = mysqli_query($koneksi, "UPDATE surat SET status = '$status' WHERE id_surat = '$idgan'");


		echo '
	  <script type="text/javascript">window.location=" ?pesan=ubah";
				</script>
	 ';

		
	}
?>