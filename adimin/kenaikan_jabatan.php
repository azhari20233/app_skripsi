<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("../fungsi_indotgl.php");	
	require_once("../fungsi_rupiah.php");	

?>
<!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
			<div class="col-12 mt-5">
			    <div class="card">
			        <div class="card-body">
			        	<a title="Tambah Data" href="kenaikan_jabatan_in.php" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a>
			            <h4 class="header-title">Data Kenaikan Jabatan</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Nama Pegawai</th>
			                            <th>NIP</th>
			                            <th>Jenis Kelamin</th>
			                            <th>No. Telpon</th>
			                            <th>Golongan</th>
			                            <th>Jabatan</th>
			                            <th>Bidang</th>
			                            <th><i class="ti ti-settings"></i></th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM kenaikan_jabatan INNER JOIN T_pegawai ON kenaikan_jabatan.nip=t_pegawai.nip");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td><?php echo $data['nama_lengkap'] ?></td>
			                            <td><?php echo $data['nip'] ?></td>
			                            <td><?php echo $data['jenis_kelamin'] ?></td>
			                            <td><?php echo $data['no_telpon'] ?></td>
			                            <td><?php echo $data['golongan_baru'] ?></td>
			                            <td><?php echo $data['jabatan_baru'] ?></td>
			                            <td><?php echo $data['bidang'] ?></td>
			                            <td style="vertical-align: middle;" id="ikonbtn2">
											<div class="text-center">
												<a title="Edit Data?" name="id_kenaikan" href="pensiun_ed.php?id_kenaikan=<?= $data['id_kenaikan']; ?>" class="btn btn-warning btn-circle">
								                    <i class="ti ti-slice"></i>
								                  </a>

							                  <a title="Hapus Data" href="hapus/pensiun_hp.php?id_kenaikan=<?php echo $data['id_kenaikan']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
											</div>
										</td>
			                        </tr>
			                    <?php } ?>
			                    </tbody>
			                </table>
			            </div>
			        </div>
			    </div>
			</div>
		<!-- Dark table end -->
	</div>
</div>

<?php
	require_once("foot.php");
?> 