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
			        	<a title="Tambah Data" href="jabatan_in.php" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a>
			            <h4 class="header-title">Data Jabatan</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Nama Jabatan</th>
			                            <th>Gaji Pokok</th>
			                            <th>Tunjangan</th>
			                            <th><i class="ti ti-settings"></i></th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM jabatan");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td><?php echo $data['nama_jabatan'] ?></td>
			                            <td><?php echo rupiah($data['gajipok']) ?></td>
			                            <td><?php echo rupiah($data['tunjangan']) ?></td>
			                            <td style="vertical-align: middle;" id="ikonbtn2">
											<div class="text-center">
												<a title="Edit Data?" name="id_jabatan" href="jabatan_ed.php?id_jabatan=<?= $data['id_jabatan']; ?>" class="btn btn-warning btn-circle">
								                    <i class="ti ti-slice"></i>
								                  </a>

							                  <a title="Hapus Data" href="hapus/jabatan_hp.php?id_jabatan=<?php echo $data['id_jabatan']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
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