<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

?>
<?php
$id_mutasi  = $_GET['id_mutasi'];
$data_m = mysqli_query($koneksi,"SELECT * FROM mutasi INNER JOIN t_pegawai ON mutasi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_mutasi = '$id_mutasi'");
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
                      <div class="card">
                          <div class="card-body">
                              <h4 class="header-title">Detail Data Mutasi Pegawai</h4>

                              <div class="row">
                                <div class="col-6">
                                  <div class="form-group">
                                      <label for="example-text-input" class="col-form-label">Nama Lengkap</label>
                                      <input readonly="" class="form-control" type="text" value="<?=$row['nama_lengkap']?>">
                                  </div>
                                </div>
                                <div class="col-6">
                                   <div class="form-group">
                                      <label for="example-search-input" class="col-form-label">Nip</label>
                                      <input readonly="" class="form-control" type="search" value="<?=$row['nip']?>">
                                  </div>
                                </div>
                                <div class="col-6">
                                   <div class="form-group">
                                      <label for="example-email-input" class="col-form-label">Jabatan</label>
                                      <input readonly="" class="form-control" type="email" value="<?=$row['nama_jabatan']?>">
                                  </div>
                                </div>
                                <div class="col-6">
                                   <div class="form-group">
                                      <label for="example-url-input" class="col-form-label">Jenis Kelamin</label>
                                      <input readonly="" class="form-control" type="text" value="<?=$row['jenis_kelamin']?>">
                                  </div>
                                </div>
                              </div>
                               <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Nomor SK</label>
                                        <input readonly="" class="form-control" type="text" value="<?=$row['no_sk']?>">
                                    </div>
                                  </div>
                                  <div class="col-6">
                                     <div class="form-group">
                                        <label for="example-search-input" class="col-form-label">Tanggal SK Mutasi</label>
                                        <input readonly="" class="form-control" type="text" value="<?=tgl_indo($row['tgl_sk'])?>">
                                    </div>
                                  </div>
                                  <div class="col-6">
                                     <div class="form-group">
                                        <label for="example-email-input" class="col-form-label">Tujuan</label>
                                        <input readonly="" class="form-control" type="text" value="<?=$row['tujuan']?>">
                                    </div>
                                  </div>
                                  <div class="col-6">
                                     <div class="form-group">
                                        <label for="example-url-input" class="col-form-label">Jabatan Baru</label>
                                        <input readonly="" class="form-control" type="text" value="<?=$row['new_jabatan']?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">File Pengantar Mutasi</label>
                                        <p><a target="_blank" href="../fileweb/<?php echo $row['file_p']; ?>"><?php echo substr(strip_tags($row['file_p']),0,15).'...'?></a></p>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                     <div class="form-group">
                                        <label for="example-search-input" class="col-form-label">Status Mutasi</label>
                                        <input readonly="" class="form-control" type="text" value="<?=$row['status_mutasi']?>">
                                    </div>
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