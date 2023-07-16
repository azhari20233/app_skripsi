<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("fungsi_indotgl.php");	

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
						<th id="ikonbtn"><i class="fas fa-cogs"></i></th>
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
						<td><?= tgl_indo($data['tanggal_lahir']);?></td>
						<td><?=$data['alamat_rumah'];?></td>
						<td><?=$data['no_telpon'];?></td>

						<td style="vertical-align: middle;" id="ikonbtn2">
							<div class="text-center">
								<a title="Edit Data?" name="id" href="edit_pegawai.php?id_pg=<?php echo $data['id_pg']; ?>" class="btn btn-warning btn-circle">
				                    <i class="fas fa-exclamation-triangle"></i>
				                  </a>
							
							<a title="Hapus Data?" href="hapus/hapus_pegawai.php?id_pg=<?php echo $data['id_pg']; ?>" class="btn btn-danger btn-circle">
			                    <i class="fas fa-trash"></i>
			                  </a>

			                
							
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
              <a href="input_pegawai.php" title="Tambah Data" class="btn btn-success btn-circle btn-lg">
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