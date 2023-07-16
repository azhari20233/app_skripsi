<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("../fungsi_indotgl.php"); 

$id_pg  = $_GET['id_pg'];
$tb_surat = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_pg = '$id_pg'");
	$row = mysqli_fetch_array($tb_surat);{
?>
<div class="main-content-inner">
	<form action="" method="post">
	    <div class="row">
	        <div class="col-lg-6 col-ml-12">
	            <div class="row">
	          <!-- Textual inputs start -->
	                <div class="col-8 mt-5">
	                  <div class="card">
	                      <div class="card-body">
	                          <h4 class="header-title">Edit Data Pegawai</h4>
		                          <div class="row">
		                    	<div class="col-3">
		                    		 <div class="form-group">
		                                <label for="example-search-input" class="col-form-label">Nip</label>
		                                <input class="form-control" name="nip" type="text" value="<?=$row['nip']?>">
		                            </div>
		                    	</div>
		                            <div class="col-3">
		                              <div class="form-group">
		                                <label for="example-text-input" class="col-form-label">Nama Lengkap</label>
		                                <input class="form-control" name="nama_lengkap" type="text" value="<?=$row['nama_lengkap']?>">
		                    		</div>
		                    	</div>
		                    	<div class="col-3">
		                    		 <div class="form-group">
		                                <label for="example-email-input" class="col-form-label">Jabatan</label>
		                                <select name="id_jabatan" class="form-control">
	                                        <option value="<?=$row['id_jabatan'];?>"><?=$row['nama_jabatan'];?></option>
			                            	<?php 
			                            	$snip = mysqli_query($koneksi,"SELECT * FROM jabatan");
			                            	while ($dnip = mysqli_fetch_array($snip)) {
			                            	?>
			                            	<option name="id_jabatan" value="<?=$dnip['id_jabatan'];?>"><?=$dnip['nama_jabatan'];?></option>
			                            	<?php
			                            	}
			                            	?>
			                            </select>
		                            </div>
		                    	</div>
		                    	<div class="col-3">
		                    		 <div class="form-group">
		                                <label for="example-url-input" class="col-form-label">Jenis Kelamin</label>
		                                <select name="jenis_kelamin" class="form-control">
	                                        <option value="<?=$row['jenis_kelamin']?>"><?=$row['jenis_kelamin']?></option>
	                                        <option value="Laki - laki">Laki - laki</option>
	                                        <option value="Perempuan">Perempuan</option>
	                                    </select>
		                            </div>
		                    	</div>
		                    </div>
		                       <div class="row">
		                        	<div class="col-3">
		                        		<div class="form-group">
			                                <label for="example-text-input" class="col-form-label">Agama</label>
			                                <input class="form-control" name="agama" type="text" value="<?=$row['agama']?>">
		                        		</div>
		                        	</div>
		                        	<div class="col-3">
		                        		 <div class="form-group">
			                                <label for="example-search-input" class="col-form-label">Status</label>
			                                <input class="form-control" name="status"type="text" value="<?=$row['status']?>">
			                            </div>
		                        	</div>
		                        	<div class="col-3">
		                        		 <div class="form-group">
			                                <label for="example-email-input" class="col-form-label">Tempat Lahir</label>
			                                <input class="form-control" name="tempat_lahir" type="text" value="<?=$row['tempat_lahir']?>">
			                            </div>
		                        	</div>
		                        	<div class="col-3">
		                        		 <div class="form-group">
			                                <label for="example-url-input" class="col-form-label">Tanggal Lahir</label>
			                                <input class="form-control" name="tanggal_lahir" type="date" value="<?=$row['tanggal_lahir']?>">>
			                            </div>
		                        	</div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-3">
		                        		<div class="form-group">
			                                <label for="example-text-input" class="col-form-label">Alamat Rumah</label>
			                                <input class="form-control" name="alamat_rumah" type="text" value="<?=$row['alamat_rumah']?>">
		                        		</div>
		                        	</div>
		                        	<div class="col-3">
		                        		 <div class="form-group">
			                                <label for="example-search-input" class="col-form-label">No Telepon</label>
			                                <input class="form-control" name="no_telpon" type="text" value="<?=$row['no_telpon']?>">
			                            </div>
		                        	</div>
	                            </div>
	                            <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
	                            <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
	                            <button type="submit" name="edit" class="btn btn-warning" title="Simpan"><i class="ti ti-save"></i></button>
	                            <input type="hidden" name="id_pg" value="<?=$row['id_pg']?>">
	                      </div>
	                  <?php } ?>
	                  </div>
	              </div>
	            <!-- Textual inputs end -->
	        </div>
	      </div>
	    </div>
	</form>
  </div>

<?php
  require_once("foot.php");
?> 
<?php 
if (isset($_POST['edit'])) {
  $id_pg    = $_POST['id_pg'];

  $nip = $_REQUEST['nip'];
  $nama_lengkap = $_REQUEST['nama_lengkap'];
  $id_jabatan = $_REQUEST['id_jabatan'];
  $jenis_kelamin = $_REQUEST['jenis_kelamin'];
  $agama = $_REQUEST['agama'];
  $status = $_REQUEST['status'];
  $tempat_lahir = $_REQUEST['tempat_lahir'];
  $tanggal_lahir = $_REQUEST['tanggal_lahir'];
  $alamat_rumah = $_REQUEST['alamat_rumah'];
  $no_telpon = $_REQUEST['no_telpon'];
  $ubahsppd = mysqli_query($koneksi,"UPDATE t_pegawai SET nip = '$nip', nama_lengkap = '$nama_lengkap', id_jabatan = '$id_jabatan', jenis_kelamin = '$jenis_kelamin', agama = '$agama', status = '$status', tempat_lahir = '$tempat_lahir',tanggal_lahir = '$tanggal_lahir', alamat_rumah = '$alamat_rumah', no_telpon = '$no_telpon' WHERE id_pg = '$id_pg'");

if($ubahsppd){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pegawai.php';</script><?php
        }

    }
 ?>