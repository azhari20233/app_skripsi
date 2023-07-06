<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

$id_tr  = $_GET['id_tr'];
$tb_surat = mysqli_query($koneksi,"SELECT * FROM transportasi WHERE id_tr = '$id_tr'");
  $row = mysqli_fetch_array($tb_surat);{
?>
<form action="" method="post">
  <div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
          <!-- Textual inputs start -->
                <div class="col-8 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Edit Transportasi Perjalanan Dinas Pegawai</h4>

                          <div class="row">
                            <div class="col-3">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Nama Transportasi</label>
                                  <input class="form-control" name="nama_tr" type="text" value="<?=$row['nama_tr']?>">
                              </div>
                            </div>
                            <div class="col-3">
                               <div class="form-group">
                                  <label for="example-search-input" class="col-form-label">Biaya Transportasi</label>
                                  <input class="form-control" name="biaya_tr" type="number" value="<?=$row['biaya_tr']?>">
                              </div>
                            </div>
                            </div>
                            <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                            <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                            <button type="submit" name="edit" class="btn btn-warning" title="Simpan"><i class="ti ti-save"></i></button>

                            <input type="hidden" name="id_tr" value="<?=$row['id_tr']?>">
                      </div>
                    <?php } ?>
                  </div>
              </div>
            <!-- Textual inputs end -->
        </div>
      </div>
    </div>
  </div>
</form>

<?php
  require_once("foot.php");
?> 
<?php 
if (isset($_POST['edit'])) {
  $id_tr    = $_POST['id_tr'];

    $nama_tr = $_REQUEST['nama_tr'];
    $biaya_tr = $_REQUEST['biaya_tr'];
  $ubahsppd = mysqli_query($koneksi,"UPDATE transportasi SET nama_tr = '$nama_tr', biaya_tr = '$biaya_tr' WHERE id_tr = '$id_tr'");

if($ubahsppd){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'tr.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'tr.php';</script><?php
        }

    }
 ?>