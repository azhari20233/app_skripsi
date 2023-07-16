<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("fungsi_indotgl.php");	

?>
<?php
$id_pg = $_GET['id_pg'];
  $data_m = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_pg = '$id_pg' ");
?>
<?php
  $row = mysqli_fetch_array($data_m);{ 
?>
<div class="main-content-inner">
	<div class="row">
	    <div class="col-lg-12 col-ml-12">
	        <div class="row">
				<!-- Textual inputs start -->
	                <div class="col-12 mt-5">
	                    <div class="card">
	                        <div class="card-body">
	                            <h4 class="header-title">Detail Data Pegawai</h4>

	                            <div class="row">
	                            	<div class="col-6">
	                            		<div class="form-group">
			                                <label for="example-text-input" class="col-form-label">Nama Lengkap</label>
			                                <input readonly="" class="form-control" type="text" value="<?=$row['nama_lengkap']?>">
	                            		</div>
	                            	</div>
	                            	<div class="col-6">
	                            		 <div class="form-group">
			                                <label for="example-search-input" class="col-form-label">Nip</label>
			                                <input readonly="" class="form-control" type="search" value="<?=$row['nip']?>">
			                            </div>
	                            	</div>
	                            	<div class="col-6">
	                            		 <div class="form-group">
			                                <label for="example-email-input" class="col-form-label">Jabatan</label>
			                                <input readonly="" class="form-control" type="email" value="<?=$row['nama_jabatan']?>">
			                            </div>
	                            	</div>
	                            	<div class="col-6">
	                            		 <div class="form-group">
			                                <label for="example-url-input" class="col-form-label">Jenis Kelamin</label>
			                                <input readonly="" class="form-control" type="text" value="<?=$row['jenis_kelamin']?>">
			                            </div>
	                            	</div>
	                            </div>
		                           <div class="row">
		                            	<div class="col-6">
		                            		<div class="form-group">
				                                <label for="example-text-input" class="col-form-label">Agama</label>
				                                <input readonly="" class="form-control" type="text" value="<?=$row['agama']?>">
		                            		</div>
		                            	</div>
		                            	<div class="col-6">
		                            		 <div class="form-group">
				                                <label for="example-search-input" class="col-form-label">Status</label>
				                                <input readonly="" class="form-control" type="text" value="<?=$row['status']?>">
				                            </div>
		                            	</div>
		                            	<div class="col-6">
		                            		 <div class="form-group">
				                                <label for="example-email-input" class="col-form-label">Tempat Lahir</label>
				                                <input readonly="" class="form-control" type="text" value="<?=$row['tempat_lahir']?>">
				                            </div>
		                            	</div>
		                            	<div class="col-6">
		                            		 <div class="form-group">
				                                <label for="example-url-input" class="col-form-label">Tanggal Lahir</label>
				                                <input readonly="" class="form-control" type="text" value="<?=tgl_indo($row['tanggal_lahir'])?>">
				                            </div>
		                            	</div>
		                            </div>
		                            <div class="row">
		                            	<div class="col-6">
		                            		<div class="form-group">
				                                <label for="example-text-input" class="col-form-label">Alamat Rumah</label>
				                                <input readonly="" class="form-control" type="text" value="<?=$row['alamat_rumah']?>">
		                            		</div>
		                            	</div>
		                            	<div class="col-6">
		                            		 <div class="form-group">
				                                <label for="example-search-input" class="col-form-label">No Telepon</label>
				                                <input readonly="" class="form-control" type="text" value="<?=$row['no_telpon']?>">
				                            </div>
		                            	</div>
		                            </div>
		                            <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
	                            <?php } ?>
	                        </div>
	                    </div>
	                </div>
	            <!-- Textual inputs end -->
			</div>
		</div>
	</div>
</div>

<?php
	require_once("foot.php");
?> 