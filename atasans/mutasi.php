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
			            <h4 class="header-title">Data Mutasi Pegawai</h4>
			            <div class="data-tables datatable-dark">
			                <table id="dataTable3" class="text-center">
			                    <thead class="text-capitalize">
			                        <tr>
			                        	<th>No</th>
			                            <th>Disposisi</th>
			                            <th>Detail</th>
			                            <th>Nama & NIP</th>
			                            <th>Nomor SK</th>
			                            <th>Tanggal SK Mutasi</th>
			                            <th>Tujuan</th>
			                            <th>Jabatan Baru</th>
			                            <th>Keterangan Surat</th>
			                            <th>Status Mutasi</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        <tr>
			                        <?php $sql = mysqli_query($koneksi,"SELECT * FROM mutasi INNER JOIN t_pegawai ON mutasi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");?>
						                <?php $no = 1; 
						                  while ($data = mysqli_fetch_array($sql)) { ?>
			                            <td style="vertical-align: middle;" class="text-center"><?php echo $no++ ?></td>
										<td>
					                      <form action="" method="POST">
					                        <div class="text-center">
					                          <input type="text" class="form-control mb-2" name="ket_mutasi" placeholder="Isi Keterangan ACC/Tolak" required="">
					                          <input type="hidden" class="form-control" name="id_mutasi" id="inputName" value="<?=$data['id_mutasi'];?>">      
					                          <button type="submit" name="sub" class="btn btn-secondary btn-danger" title="Tolak">
					                          <a><i class="mdi ti-close"></i></a>
					                          </button>
					                          <button type="submit" name="tombole" class="btn btn-secondary btn-success" title="Setujui">
					                          <a ><i class="mdi ti-check"></i></a>
					                          </button>
					                      </div>
					                    </form>
					                  </td>
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
    <?php 
  if (isset($_POST['sub'])) {
    $id_mutasi = $_POST['id_mutasi'];
    $ket_mutasi = $_POST['ket_mutasi'];
    $status_mutasi = $_POST['status_mutasi'];
    $update = mysqli_query($koneksi, "UPDATE `mutasi` SET `ket_mutasi` = '$ket_mutasi',`status_mutasi` = 'Data Ditolak Atasan' WHERE `mutasi`.`id_mutasi` = $id_mutasi;");
if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'mutasi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'mutasi.php';</script><?php
        }  
  }
else if (isset($_POST['tombole'])) {
    $id_mutasi = $_POST['id_mutasi'];
    $ket_mutasi = $_POST['ket_mutasi'];
    $status_mutasi = $_POST['status_mutasi'];
    $update = mysqli_query($koneksi, "UPDATE `mutasi` SET `ket_mutasi` = '$ket_mutasi',`status_mutasi` = 'Disetujui Atasan' WHERE `mutasi`.`id_mutasi` = $id_mutasi;");
if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'mutasi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'mutasi.php';</script><?php
        }
  }
?>