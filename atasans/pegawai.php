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
			            <h4 class="header-title">Data Pegawai</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Detail</th>
			                            <th>Nama & NIP</th>
			                            <th>Jabatan</th>
			                            <th>Jk</th>
			                            <th>Agama</th>
			                            <th>Status</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td style="vertical-align: middle;"><a title="Detail Data" href="detail_pegawai.php?id_pg=<?php echo $data['id_pg']; ?>" class="btn btn-flat btn-info mb-3"><i class="ti ti-zoom-in"></i><input type="hidden" value="<?=$data['id_pg'];?>"></a></td>
			                            <td><?php echo $data['nama_lengkap'] ?> | <?php echo $data['nip'] ?></td>
			                            <td><?php echo $data['nama_jabatan'] ?></td>
			                            <td><?php echo $data['jenis_kelamin'] ?></td>
			                            <td><?php echo $data['agama'] ?></td>
			                            <td><?php echo $data['status'] ?></td>
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