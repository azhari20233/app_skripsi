<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

?>
<form action="" method="post">
  <div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
          <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Input Data Jabatan</h4>

                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Nama Jabatan</label>
                                  <input class="form-control" name="nama_jabatan" type="text" placeholder="Nama Jabatan">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-search-input" class="col-form-label">Gaji Pokok</label>
                                  <input class="form-control" name="gajipok" type="number" placeholder="Gaji Pokok">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">Tunjangan</label>
                                  <input class="form-control" name="tunjangan" type="number" placeholder="Tunjangan">
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

    $nama_jabatan = $_REQUEST['nama_jabatan'];
    $gajipok = $_REQUEST['gajipok'];
    $tunjangan = $_REQUEST['tunjangan'];
 
    $tambah = mysqli_query($koneksi,"INSERT INTO jabatan ( nama_jabatan,  gajipok, tunjangan) VALUES(
          '$nama_jabatan',
          '$gajipok',
          '$tunjangan')");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'jabatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'jabatan_in.php';</script><?php
        }

    }
 ?>