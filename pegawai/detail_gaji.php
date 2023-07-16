<?php 
	require_once("../koneksi.php"); 
	require_once("head.php");
	require_once("fungsi_indotgl.php");	

?>
<?php
$id_gaji = $_GET['id_gaji'];
  $data_m = mysqli_query($koneksi,"SELECT * FROM gaji INNER JOIN absensi ON gaji.id_absensi=absensi.id_absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_gaji = '$id_gaji' ");
?>
<?php
  $row = mysqli_fetch_array($data_m);{ 
?>
<div class="main-content-inner">
	<div class="row">
	    <div class="col-lg-12 col-ml-12">
	        <div class="row">
				<!-- Textual inputs start -->
	                <div class="col-12 mt-5">
	                	<h4 class="header-title">Detail Gaji Pegawai</h4>
	                    <div class="card">
	                        <div class="card-body">
	                            <h4 class="invoice-header text-center">Badan Keuangan dan Aset Daerah</h4>
	                            <div class="row">
	                            	<div class="col-6">
	                            <div class="invoice-from">
						            <address class="mt-5 mb-5">
						                NIP <br />
						                <strong><h5><?php echo $row['nip']; ?></h5></strong><br />
						                Nama <br />
						                <strong><h5><?php echo $row['nama_lengkap']; ?></h5></strong><br />
						                
						            </address>
						        </div>
						        </div>

						        <div class="col-6">
						        <div class="invoice-from">
						            <address class="mt-5 mb-5  float-right">
						                Kode Slip gaji <br />
						                <strong><h5><?php echo $row['no_slip']; ?></h5></strong><br />
						                Gaji Periode <br />
						                <strong><h5><?php echo tgl_indo($row['tgl_gaji']); ?></h5></strong><br />
						                
						            </address>
						        </div>
						        </div>
						        </div>

	                            <div class="row">
	                            	<div class="table-responsive">
							            <table class="table table-invoice">
							                <thead>
							                    <tr>
							                        <th>DESKRIPSI</th>
							                        <th></th>
							                        <th></th>
							                        <th><p align="right">TOTAL</p></th>
							                    </tr>
							                </thead>
							                <tbody>
							                    <tr>
							                        <td>
							                            Gaji Pokok<br />
							                        </td>
							                        <td></td>
							                        <td></td>
							                        <td align="right"><?php echo 'Rp.'.number_format($row['gajipok']); ?></td>
							                    </tr>
							                    <tr>
							                        <td>
							                            Tunjangan<br />
							                        </td>
							                        <td></td>
							                        <td></td>
							                        <td align="right"><?php echo 'Rp.'.number_format($row['tunjangan']); ?></td>
							                    </tr>
							                    <tr>
							                        <td>
							                            Bonus<br />
							                        </td>
							                        <td></td>
							                        <td></td>
							                        <td align="right"><?php echo 'Rp.'.number_format($row['bonus']); ?></td>
							                    </tr>
							                    <tr>
							                        <td>
							                            Potongan<br />
							                        </td>
							                        <td></td>
							                        <td></td>
							                        <td align="right"><?php echo 'Rp.'.number_format($row['potongan']); ?></td>
							                    </tr>
							                    <tr>
							                        <td>
							                            Gaji Pokok <i class="ti ti-plus"> Tunjangan <i class="ti ti-plus"> Bonus <i class="ti ti-minus"></i> Potongan<br />
							                        </td>
							                        <td></td>
							                        <td></td>
							                        <input type="hidden" name="tanpa_ket" value="<?=$row['tanpa_ket']?>">
							                        <input type="hidden" name="gajipok" value="<?=$row['gajipok']?>">
							                        <input type="hidden" name="tunjangan" value="<?=$row['tunjangan']?>">
							                        <input type="hidden" name="bonus" value="<?=$row['bonus']?>">
							                        <input type="hidden" name="potongan" value="<?=$row['potongan']?>">
						                       
							                        <td align="right"><?php echo 'Rp.'.number_format($row['gaji_bersih'] + $row['bonus'] - $row['potongan']); ?></td>
							                    </tr>
							                </tbody>
							            </table>
							        </div>
		                            </div>

		                            <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
	                            <?php } ?>
	                        </div>
	                    </div>
	                </div>
	            <!-- Textual inputs end -->
			</div>
		</div>
	</div>
</div>

<?php
	require_once("foot.php");
?> 