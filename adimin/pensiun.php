<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("../fungsi_indotgl.php");	
	require_once("../fungsi_rupiah.php");	

?>
<!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
		<!-- Dark table start -->
			<div class="col-12 mt-5">
			    <div class="card">
			        <div class="card-body">
			        	<a title="Tambah Data" href="pensiun_in.php" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a>
			            <h4 class="header-title">Data Pensiun</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                        	<th>No Surat</th>
			                            <th>Nama Pegawai</th>
			                            <th>NIP</th>
			                            <th>Pangkat/Gol</th>
			                            <th>Tgl Surat</th>
			                            <th>Tgl Pensiun</th>
			                            <th>Alamat</th>
			                            <th><i class="ti ti-settings"></i></th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM t_pensiun INNER JOIN T_pegawai ON t_pensiun.nip=t_pegawai.nip");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td><?php echo $data['no_surat'] ?></td>
			                            <td><?php echo $data['nama_lengkap'] ?></td>
			                            <td><?php echo $data['nip'] ?></td>
			                            <td><?php echo $data['pangkat_gol'] ?></td>
			                            <td><?php echo $data['tgl_surat'] ?></td>
			                            <td><?php echo $data['tgl_pensiun'] ?></td>
			                            <td><?php echo $data['alamat_pensiun'] ?></td>
			                            <td style="vertical-align: middle;" id="ikonbtn2">
											<div class="text-center">
												<a title="Edit Data?" name="id_pensiun" href="pensiun_ed.php?id_pensiun=<?= $data['id_pensiun']; ?>" class="btn btn-warning btn-circle">
								                    <i class="ti ti-slice"></i>
								                  </a>

							                  <a title="Hapus Data" href="hapus/pensiun_hp.php?id_pensiun=<?php echo $data['id_pensiun']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
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