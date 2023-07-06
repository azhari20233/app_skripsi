<?php 
	require_once("head.php");
	$koneksi = mysqli_connect('localhost', 'root', '', 'pkl_tapin') or die ("Koneksi Gagal");

	$id   = $_GET['id_pg'];
	$tb_pegawai = mysqli_query($koneksi,"SELECT * FROM t_pegawai WHERE id_pg = '$id'");
	
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
              <h4 class="card-title text-warning">EDIT DATA SURAT</h4>
                </div><br>
                <div class="card-body">
                  
                <div class="row">
				<div class="col">

					<div class="form-group">
						<label for="inputName" class="control-label">NIP</label>
							<input type="text" class="form-control" name="nip" id="inputName" placeholder="NIP" value="<?=$data['nip'];?>">
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="inputName" placeholder="Nama Lengkap" value="<?=$data['nama_lengkap'];?>">
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="inputName" placeholder="Jabatan" value="<?=$data['jabatan'];?>">
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                            	<option value="<?=$data['jenis_kelamin'];?>"><?=$data['jenis_kelamin'];?></option>
                            	<?php 
                            	if ($data['jenis_kelamin'] == "pria") {
                            	?>
                                <option value="wanita">Wanita</option>
                            	<?php
                            	} else {
                          		?>
                                <option value="pria">Pria</option>
                          		<?php
                            	}
                            	?>
                            </select>
			  	
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Agama</label>
                            <input type="text" class="form-control" name="agama" id="inputName" placeholder="Agama" value="<?=$data['agama'];?>">
			  	
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Status</label>
                            <input type="text" class="form-control" name="status" id="inputName" placeholder="Status" value="<?=$data['status'];?>">
					</div><br>

					<div class="form-group">
						<label for="inputPassword" class="control-label">Tempat, Tanggal Lahir</label>
							<div class="row">
								<div class="form-group col-sm-6">
									<input type="text" class="form-control" id="inputPassword" placeholder="Tempat Lahir" name="tempat_lahir" value="<?=$data['tempat_lahir'];?>">
								</div>
								<div class="form-group col-sm-6">
									<input type="date" class="form-control" id="inputPasswordConfirm" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?=$data['tanggal_lahir'];?>">
								</div>
							</div>
			  	
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">Alamat Rumah</label>
                            <input type="text" class="form-control" name="alamat_rumah" id="inputName" placeholder="Alamat Rumah" value="<?=$data['alamat_rumah'];?>">
			  	
					</div><br>

					<div class="form-group">
						<label for="inputName" class="control-label">No Telpon</label>
                            <input type="text" class="form-control" name="no_telpon" id="inputName" placeholder="No Telpon" value="<?=$data['no_telpon'];?>">
			  				<input type="hidden" name="id_pg" value="<?=$data['id_pg'];?>">
					</div><br>

				<?php } ?>
				
			  		<div id="btn-tombol">
			  	<button class="btn btn-secondary">
					<a href="tampil_pegawai.php" style="color:white; text-decoration: none"><i class="fas fa-arrow-left"></i> KEMBALI</a>
			  	</button>
			  	<input type="hidden" name="id" value="<?=$id;?>">
			  	<input type="submit" name="editpg" value="UBAH" class="btn btn-warning" style="color:white;">
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