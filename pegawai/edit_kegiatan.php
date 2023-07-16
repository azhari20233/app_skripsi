<?php 
	require_once("head.php");
	require_once("../koneksi.php");
	

	$id_kegiatan   = $_GET['id_kegiatan'];
	$tb_pegawai = mysqli_query($koneksi,"SELECT * FROM kegiatan INNER JOIN t_pegawai ON t_pegawai.nip=kegiatan.nip WHERE id_kegiatan='$id_kegiatan'");
	
	$data = mysqli_fetch_array($tb_pegawai);{
?>

<div class="container">
	<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="gagal"){
					echo "<div class='alert alert-primary alert-dismissible fade show text-center'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<b>Id Telah Digunakan!</b> gunakan Id yang lain ya bro.
			</div>";
				}
			}
		?>
		<form action="proses_all.php" method="post" enctype="multipart/form-data">
			


<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-warning">EDIT DATA RENCANA KEGIATAN</h4>
                </div><br>
                <div class="card-body">
                  
                <div class="row">
				<div class="col">

					<div class="form-group">
						<label for="inputName" class="control-label">Nama Kegiatan</label>
							<input type="text" class="form-control" name="nama_kegiatan" id="inputName" placeholder="Nama Kegiatan" value="<?=$data['nama_kegiatan'];?>">
			  	
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Lokasi_kegiatan</label>
                            <input type="text" class="form-control" name="lokasi_kegiatan" id="inputName" placeholder="Lokasi kegiatan" value="<?=$data['lokasi_kegiatan'];?>">
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Waktu Kegiatan</label>
                            <input type="date" class="form-control" name="waktu_kegiatan" id="inputName" value="<?=$data['waktu_kegiatan'];?>">
					</div><br>

					<div class="form-group">
						<label for="inputPassword" class="control-label">Pelaksana Kegiatan</label>
							<input type="text" class="form-control" id="inputPassword" placeholder="pelaksana_kegiatan" name="pelaksana_kegiatan" value="<?=$data['pelaksana_kegiatan'];?>">
			  	
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Pegawai yang Membuat Rencana Kegiatan</label>
                            
						<select name="nip" class="form-control">
                            	<option value="<?=$data['nip'];?>"><?=$data['nip'];?>|<?=$data['nama_lengkap'];?></option>
                            	<?php 
                            	$snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai");
                            	while ($dnip = mysqli_fetch_array($snip)) {
                            	?>
                            	<option name="nip" value="<?=$dnip['nip'];?>"><?=$dnip['nip'];?>|<?=$dnip['nama_lengkap'];?></option>
                            	<?php
                            	}
                            	?>
                            </select>
					</div><br>
					<div class="form-group">
			            <label for="inputName" class="control-label">Nomor Surat Rencana Kegiatan</label>
			              <input type="number" class="form-control" name="no_surat" id="inputName" value="<?=$data['no_surat']?>" required>
			          </div><br>
			        <div class="form-group">
			            <label for="inputName" class="control-label">Waktu/Jam Mulai Kegiatan</label>
			              <input type="text" class="form-control" name="waktu" id="inputName" value="<?=$data['waktu']?>" required>
			          </div><br>
					<input type="hidden" name="id_kegiatan" value="<?=$data['id_kegiatan']?>">

				<?php } ?>
				
			  		<div id="btn-tombol">
			  	<button type="button" class="btn btn-secondary"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i> Kembali</a></button>
			  	<input type="hidden" name="id" value="<?=$id;?>">
			  	<input type="submit" name="editkegiatan" value="UBAH" class="btn btn-warning" style="color:white;">
			  </div>
				</div>
			</div>
				</div>
			</div>
                       
                </div>
              </div>
            </div>

		</form>
	</div>
	
	
	</div> <!-- akhir container -->



<?php
	require_once("foot.php");
?> 