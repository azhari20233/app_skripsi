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
			            <h4 class="header-title">Data Absensi Pegawai</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Tanggal </th>
                                        <th>NIP </th>
                                        <th>Nama Pegawai </th>
                                        <th>Hadir </th>
                                        <th>Sakit</th>
                                        <th>Ijin</th>
                                        <th>Tanpa Keterangan</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg ORDER BY nama_lengkap ASC");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td><?php echo $data['bulan'].' / '.$data['tahun']; ?></td>
                                        <td><?php echo $data['nip']; ?></td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                        <td><?php echo $data['hadir']; ?></td>
                                        <td><?php echo $data['sakit']; ?></td>
                                        <td><?php echo $data['izin']; ?></td>
                                        <td><?php echo $data['tanpa_ket']; ?></td>
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