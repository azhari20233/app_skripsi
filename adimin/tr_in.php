<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

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
                          <h4 class="header-title">Input Transportasi Perjalanan Dinas Pegawai</h4>

                          <div class="row">
                            <div class="col-3">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Nama Transportasi</label>
                                  <input class="form-control" name="nama_tr" type="text" placeholder="Nama Transportasi">
                              </div>
                            </div>
                            <div class="col-3">
                               <div class="form-group">
                                  <label for="example-search-input" class="col-form-label">Biaya Transportasi</label>
                                  <input class="form-control" name="biaya_tr" type="number" placeholder="Biaya Transportasi">
                              </div>
                            </div>
                            </div>
                            <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                            <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                            <button type="submit" name="input" class="btn btn-primary" title="Simpan"><i class="ti ti-save"></i></button>
                      </div>
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
if (isset($_POST['input'])) {

    $nama_tr = $_REQUEST['nama_tr'];
    $biaya_tr = $_REQUEST['biaya_tr'];
 
    $tambah = mysqli_query($koneksi,"INSERT INTO transportasi ( nama_tr,  biaya_tr) VALUES(
          '$nama_tr',
          '$biaya_tr')");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'tr.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'tr_in.php';</script><?php
        }

    }
 ?>