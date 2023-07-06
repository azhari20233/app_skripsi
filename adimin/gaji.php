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
			        	<a title="Tambah Data" href="gaji_in.php" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a>
			            <h4 class="header-title">Data Gaji Pegawai</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Detail & Cetak</th>
			                            <th>Tanggal</th>
                                        <th>Periode Gaji</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Gaji Bersih</th>
			                            <th><i class="ti ti-settings"></i></th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM gaji INNER JOIN absensi ON gaji.id_absensi=absensi.id_absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg ORDER BY nama_lengkap ASC");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td style="vertical-align: middle;"><a title="Detail Data" href="detail_gaji.php?id_gaji=<?php echo $data['id_gaji']; ?>" class="btn btn-flat btn-info mb-3"><i class="ti ti-zoom-in"></i><input type="hidden" value="<?=$data['id_gaji'];?>"></a></td>
			                            <td><?php echo tgl_indo($data['tgl_gaji']); ?></td>
                                        <td><?php echo $data['bulan'].' / '.$data['tahun']; ?></td>
                                        <td><?php echo $data['nip']; ?></td>
                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                        <td align="right"><?php echo 'Rp. '.number_format($data['gaji_bersih']); ?></td>
			                            <td style="vertical-align: middle;" id="ikonbtn2">
											<div class="text-center">
												<a title="Edit Data?" name="id_pg" href="gaji_ed.php?id_gaji=<?php echo $data['id_gaji']; ?>" class="btn btn-warning btn-circle">
								                    <i class="ti ti-slice"></i>
								                  </a>

							                  <a title="Hapus Data" href="hapus/gaji_hp.php?id_gaji=<?php echo $data['id_gaji']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
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