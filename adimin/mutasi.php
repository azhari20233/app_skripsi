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
			        	<a title="Tambah Data" href="mutasi_in.php" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a>
			            <h4 class="header-title">Data Mutasi Pegawai</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Detail</th>
			                            <th>Nama & NIP</th>
			                            <th>Nomor SK</th>
			                            <th>Tanggal SK Mutasi</th>
			                            <th>Tujuan</th>
			                            <th>Jabatan Baru</th>
			                            <th>Keterangan Surat</th>
			                            <th>Status Mutasi</th>
			                            <th><i class="ti ti-settings"></i></th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM mutasi INNER JOIN t_pegawai ON mutasi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
			                            <td style="vertical-align: middle;"><a title="Detail Data" href="detail_mutasi.php?id_mutasi=<?php echo $data['id_mutasi']; ?>" class="btn btn-flat btn-info mb-3"><i class="ti ti-zoom-in"></i><input type="hidden" value="<?=$data['id_mutasi'];?>"></a></td>
			                            <td><?php echo $data['nama_lengkap'] ?> | <?php echo $data['nip'] ?></td>
			                            <td><?php echo $data['no_sk'] ?></td>
			                            <td><?php echo tgl_indo($data['tgl_sk']) ?></td>
			                            <td><?php echo $data['tujuan'] ?></td>
			                            <td><?php echo $data['new_jabatan'] ?></td>
			                            <td><?=$data['ket_mutasi']?></td>
			                            <td style="vertical-align: middle;"><?php 
										if($data['status_mutasi']== 'Sedang Diproses Atasan'){
											echo "<p class='badge badge-warning'><b>Sedang Diproses Atasan</b></p>";
										}else if($data['status_mutasi']== 'Disetujui Atasan'){
											echo "<p class='badge badge-success'><b>Disetujui Atasan</b></p>";
										}else if($data['status_mutasi']== "Data Ditolak Atasan"){
											echo "<p class='badge badge-danger'><b>Data Ditolak Atasan</b></p>";
										}
										
										?></td>
			                            <td style="vertical-align: middle;" id="ikonbtn2">
											<div class="text-center">
												<a title="Edit Data?" name="id_mutasi" href="mutasi_ed.php?id_mutasi=<?php echo $data['id_mutasi']; ?>" class="btn btn-warning btn-circle">
								                    <i class="ti ti-slice"></i>
								                  </a>

							                  <a title="Hapus Data" href="hapus/mutasi_hp.php?id_mutasi=<?php echo $data['id_mutasi']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
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