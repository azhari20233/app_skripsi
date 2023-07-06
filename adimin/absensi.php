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
                                        <th>Hadir </th>
                                        <th>Sakit</th>
                                        <th>Ijin</th>
                                        <th>Tanpa Keterangan</th>
                                        <th>Tgl Sakit</th>
                                        <th>Tgl Izin</th>
                                        <th>Tgl Tanpa Keterangan</th>
			                            <th><i class="ti ti-settings"></i></th>
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
                                        <td><?php echo $data['tgl_sakit']; ?></td>
                                        <td><?php echo $data['tgl_ijin']; ?></td>
                                        <td><?php echo $data['tgl_tk']; ?></td>
			                            <td style="vertical-align: middle;" id="ikonbtn2">
											<div class="text-center">
												<a title="Edit Data?" name="id_absensi" href="absensi_ed.php?id_absensi=<?php echo $data['id_absensi']; ?>" class="btn btn-warning btn-circle">
								                    <i class="ti ti-slice"></i>
								                  </a>

							                  <a title="Hapus Data" href="hapus/absensi_hp.php?id_absensi=<?php echo $data['id_absensi']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
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