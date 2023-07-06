<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("../fungsi_indotgl.php"); 

$id_jabatan  = $_GET['id_jabatan'];
$tb_surat = mysqli_query($koneksi,"SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'");
  $row = mysqli_fetch_array($tb_surat);{
?>
<div class="main-content-inner">
  <form action="" method="post">
      <div class="row">
          <div class="col-lg-12 col-ml-12">
              <div class="row">
            <!-- Textual inputs start -->
                  <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Data Pegawai</h4>
                              <div class="row">
                          <div class="col-6">
                             <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Nama Jabatan</label>
                                    <input class="form-control" name="nama_jabatan" type="text" value="<?=$row['nama_jabatan']?>">
                                </div>
                          </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Gaji Pokok</label>
                                    <input class="form-control" name="gajipok" type="text" value="<?=$row['gajipok']?>">
                            </div>
                          </div>
                          <div class="col-6">
                             <div class="form-group">
                                    <label for="example-email-input" class="col-form-label">Tunjangan</label>
                                    <input class="form-control" name="tunjangan" type="text" value="<?=$row['tunjangan']?>">
                                </div>
                          </div>
                          
                              </div>
                              <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                              <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                              <button type="submit" name="edit" class="btn btn-warning" title="Simpan"><i class="ti ti-save"></i></button>
                              <input type="hidden" name="id_jabatan" value="<?=$row['id_jabatan']?>">
                        </div>
                    <?php } ?>
                    </div>
                </div>
              <!-- Textual inputs end -->
          </div>
        </div>
      </div>
  </form>
  </div>

<?php
  require_once("foot.php");
?> 
<?php 
if (isset($_POST['edit'])) {
  $id_jabatan    = $_POST['id_jabatan'];

  $nama_jabatan = $_REQUEST['nama_jabatan'];
  $gajipok = $_REQUEST['gajipok'];
  $tunjangan = $_REQUEST['tunjangan'];
  $ubahsppd = mysqli_query($koneksi,"UPDATE jabatan SET nama_jabatan = '$nama_jabatan', gajipok = '$gajipok', tunjangan = '$tunjangan' WHERE id_jabatan = '$id_jabatan'");

if($ubahsppd){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'jabatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'jabatan.php';</script><?php
        }

    }
 ?>