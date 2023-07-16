<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("../fungsi_indotgl.php");	

?>
<!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
		<!-- Dark table start -->
			<div class="col-12 mt-5">
			    <div class="card">
			        <div class="card-body">
					<a title="Tambah Data" href="absensi_in.php" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a>
			            <h4 class="header-title">Data Absensi Pegawai</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Tanggal </th>
                                        <th>NIP </th>
                                        <th>Nama Pegawai </th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $id_pg = $user_row['id_pg']; $sql = mysqli_query($koneksi,"SELECT * FROM absen_pegawai INNER JOIN t_pegawai ON absen_pegawai.id_pg=t_pegawai.id_pg WHERE absen_pegawai.id_pg = " . $user_row['id_pg'] . " ORDER BY id ASC");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td><?php echo $data['tanggal'];?></td>
                                        <td><?php echo $data['nip']; ?></td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
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